$(document).ready(function(){
    alert('doc');
});

$(document).on('mouseover', '.box_categories', function(){
  alert('aaa');
  $(".box_categories").css("background-color", "yellow");
});