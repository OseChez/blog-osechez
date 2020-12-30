$(document).ready(function(){
	 var url ="/posts/store";  
    $.ajax({
             url: url,
             type: 'POST',
             data: {},
             dataType: 'json',
             cache: false,
             contentType: false,
             processData: false,
               success: function (response) {
                   alert(response.message);
                }
            });
})