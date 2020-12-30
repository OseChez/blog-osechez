$(document).ready(function () {
   var form = $('#registration');
    form.submit(function (e) {
     e.preventDefault();
      $.ajax({
        url: form.attr('action'),
        type: "POST",
        data: form.serialize(),
        dataType: "json"
    })
   .done(function (response) {
   	var openDiv ='<div id="msg" class="alert alert-warning" role="alert">';
        var closeDiv='</div>';
        $('.comment-form').html(openDiv+response.message+closeDiv)
    })
   .fail(function () {
      
    });
  });
});
