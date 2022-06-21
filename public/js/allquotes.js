
//container to render the search result
var searchInput = document.getElementById('search_val');

var categoryFilter = document.getElementById('category-filter');
var authorFilter = document.getElementById('author-filter');
var quoteFilter = document.getElementById('quote-filter');
   
    quoteFilter.addEventListener('click', function(){
        //searchInput.setAttribute('placeholder', 'Search quotes...');
        this.classList.add('active');
        categoryFilter.classList.remove('active');
        authorFilter.classList.remove('active');
    });
   
   categoryFilter.addEventListener('click', function(){
        //searchInput.setAttribute('placeholder', 'Search categories...');
        this.classList.add('active');
        quoteFilter.classList.remove('active');
        authorFilter.classList.remove('active');
    });

   authorFilter.addEventListener('click', function(){
        //searchInput.setAttribute('placeholder', 'Search authors...');
        this.classList.add('active');
        categoryFilter.classList.remove('active');
        quoteFilter.classList.remove('active');
    });

  searchInput.addEventListener('keyup', function(e){
          e.preventDefault();
        console.log('something 1');
    if(categoryFilter.classList.contains('active'))
    {
        var categoryspan = document.getElementsByClassName('category');
        for (var i = 0; i < categoryspan.length; i++) {
            if( !categoryspan[i].innerHTML.toLowerCase().includes( searchInput.value.toLowerCase() ) ) {
                categoryspan[i].parentElement.parentElement.parentElement.style.display = "none";
            }else{
                categoryspan[i].parentElement.parentElement.parentElement.style.display = "table-row";
            }
        }
    }else if(authorFilter.classList.contains('active')){
        var authorspan = document.getElementsByClassName('author');
         for (var i = 0; i < authorspan.length; i++) {
            if(!authorspan[i].innerHTML.toLowerCase().includes( searchInput.value.toLowerCase() ) ){
                authorspan[i].parentElement.parentElement.parentElement.style.display = "none";
            }else{
                authorspan[i].parentElement.parentElement.parentElement.style.display = "table-row";
            }
        }

    }else if(quoteFilter.classList.contains('active')){
        var quotespan = document.getElementsByClassName('quote');
         for (var i = 0; i < quotespan.length; i++) {
            if(!quotespan[i].innerHTML.toLowerCase().includes( searchInput.value.toLowerCase() ) ){
                quotespan[i].parentElement.parentElement.parentElement.style.display = "none";
            }else{
                quotespan[i].parentElement.parentElement.parentElement.style.display = "table-row";
            }
        }

    }
});


