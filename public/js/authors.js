var searchBtn = document.getElementById('searchbtn');

//container to render the search result
var searchBox = document.getElementById('table-body');
var searchInput = document.getElementById('search_val');

searchBtn.addEventListener('click', function(e){

             e.preventDefault();
            // var search = document.getElementById('search_val').value;
            QuoteSearch.prototype = new NewSearch();

            var searchItem = new QuoteSearch();

            searchItem.search_val = document.getElementById('search_val').value;
            searchItem.url = 'http://myquotes.com/api/author/search?search_val='+searchItem.search_val;
            searchItem.request_type = 'GET';
            searchItem.renderResponse();

        });

searchInput.addEventListener('keyup', function(e){
            
             e.preventDefault();
            // var search = document.getElementById('search_val').value;
            AuthorSearch.prototype = new NewSearch();

            var searchItem = new AuthorSearch();

            searchItem.search_val = document.getElementById('search_val').value;
            searchItem.url = 'http://myquotes.com/api/author/search?search_val='+searchItem.search_val;
            searchItem.request_type = 'GET';
            searchItem.renderResponse();

        });

//constructor method
  function NewSearch(url, request_type){
        this.url = url;
        this.request_type = request_type;

        this.renderResponse = function(){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open(this.request_type, this.url, true);

            xmlhttp.onload = function(event){
                var result = JSON.parse(xmlhttp.responseText);
                renderHtml(searchBox, result.data.data);
            };

            xmlhttp.onerror = function(event){
                console.log("An error has occured");
            }

            xmlhttp.send();
        }
  }

function AuthorSearch(search_val){
    this.search_val = search_val;
}

    function renderHtml(container, data){
        this.container = container;
        this.data = data;
        var html = [];
        for (var i = 0; i < this.data.length; i++) {
            html[i] = '<tr class="tb-tnx-item">'+
                '<td class="tb-tnx-id">'+
                    '<a href="#"><span>'+ this.data[i].id + '</span></a>'+
                '</td>'+

                '<td class="tb-tnx-info">'+
                    '<div class="tb-tnx-desc nameDiv">'+
                            '<span class="title">'+ this.data[i].author_name + '</span>'+
                        '</div>'+
                        '<div class="tb-tnx-date">'+
                                '<span class="date">'+ this.data[i].about +'</span>'+
                        '</div>'+
                    '</td>'+
                    '<td class="tb-tnx-amount is-alt">'+
                        '<div class="tb-tnx-total">'+
                            '<span class="amount">'+ this.data[i].quotes_count +'</span>'+
                        '</div>'+
                        '<div class="tb-tnx-status">'+
                            '<span class="badge badge-dot badge-success">active</span>'+
                        '</div>'+
                    '</td>'+

                    '<td class="tb-tnx-action">'+
                        '<div class="dropdown">'+
                            '<a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>'+
                            '<div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">'+
                                '<ul class="link-list-plain">'+
                                    '<li><a href="#">View quotes</a></li>'+
                                    '<li><a href="#">Edit</a></li>'+
                                    '<li><a href="#">Remove</a></li>'+
                                '</ul>'+
                            '</div>'+
                        '</div>'+
                   '</td>'+
                   '</tr>';        
            } 

            html.reduce(function(prev, curr){
                    return prev + curr
            }, 0);

            searchBox.innerHTML = html;    
        }



