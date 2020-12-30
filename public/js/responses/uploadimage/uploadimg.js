$(document).ready(function(){
  $('#image').fileinput({
     allowedFileExtensions:['jpg','jpeg','png',"gif", "JPG", "PNG", "GIF"],
     browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
     browseLabel: 'Buscar',
     defaultPreviewContent: '<img src="img/blog/author.jpg" alt="Profile Image" style="width:10%;">',
     dropZoneEnabled:true,
     initialPreviewAsData:true,
     language:'es',
     maxFileSize:1000,
     showUpload:false,
     showClose:false,
  });
});