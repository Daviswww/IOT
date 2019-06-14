var counter = 0;
$(function()
{
  alert('in func');
  
  setInterval(function(){ compute(); } ,1000);
  function compute()
  {
      $("#qwe123").html('data: ' + counter++);
  }
});