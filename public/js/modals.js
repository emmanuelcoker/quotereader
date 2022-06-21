//new quote form
var newQuoteForm = document.getElementById('newQuoteForm');

//get user post data

newQuoteForm.addEventListener('submit', function(e){
	e.preventDefault();
	// var postData =  new Object();
	// 	postData.author_id = 	authorName.value;
	// 	postData.category_id = 	categoryName.value;
	// 	postData.content = 		desc.value;
	// 	postData.scheduled_date = schedule.value;
	
	  var dd = document.getElementById('dd').value;
      var mm = document.getElementById('mm').value;
      var yyyy = document.getElementById('yyyy').value;
      var fulldate = yyyy + '/'+ mm +'/'+ dd;
      var today = new Date();
     var year = today.getFullYear();

  if(moment(fulldate, 'YYYY/MM/DD',true).isValid()){
        document.getElementById('dob').value = fulldate;
        document.getElementById('dateBox').style.border = "1px solid green";
    }else{
       document.getElementById('dateBox').style.border = "1px solid red"; 
       console.log('invalid date');
    }     


	var authorName = document.getElementById('author');
	var categoryName = document.getElementById('category');
	var desc = document.getElementById('desc');
	var schedule = fulldate;
	var csrf = document.getElementById('csrfToken').value;
	// const postData = {
	// 	author_id: parseInt(authorName.value),
	// 	category_id: parseInt(categoryName.value),
	// 	content: desc.value,
	// 	schedule_date: schedule.value
	// }
	 var postData = "author_id=" + parseInt(authorName.value)+"&category_id=" + parseInt(categoryName.value)
	 + "&content="+ parseInt(desc.value)+"&scheduled_date="+ parseInt(schedule.value);	
	// let urlEncodedData = "", urlEncodedPairs = [], name;
	// for(name in postData){
	// 	urlEncodedPairs.push(encodeURIComponent(name)+'='+encodeURIComponent(postData[name]));
	// }
	// console.log(urlEncodedPairs)
	//create an ajax request to post the data to the db
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('POST', 'http://myquotes.com/api/quotes/create', true);
        xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                               
        xmlhttp.setRequestHeader('X-CSRF-TOKEN', csrf);

       
	    xmlhttp.onload = function(){
	    	console.log(xmlhttp.responseText)
	        alert( 'Yeah! Data sent and response loaded.' );
	    };

	    xmlhttp.onerror = function(){
	      alert( 'Oops! Something went wrong.' );

	    };

         // xmlhttp.send(JSON.stringify(postData));
         xmlhttp.send(postData);
         
})