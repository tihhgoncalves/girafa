$(document).ready(function(){
  
  $('#icones div').click(function(){
    
    $('#Icon').val($(this).attr('arquivonome'));

    $('.iconeSelected').removeClass('iconeSelected');
    
    $(this).addClass('iconeSelected');
    
  });
  
});