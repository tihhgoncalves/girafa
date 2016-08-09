$(document).ready(function(){
  
  $('#icones div').click(function(){
    
    $('#Icon').val($(this).attr('arquivonome'));

    $('.iconeSelected').removeClass('iconeSelected').addClass('icone');
    
    $(this).removeClass('icone').addClass('iconeSelected');
    
  });
  
});