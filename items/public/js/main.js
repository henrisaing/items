$(function(){
  // darkens background
  //opens lightbox, calls controller
  $('a.lightbox-open , button.lightbox-open').click(function(){
    $('#fade').css('display','block');
    $('#light').css('display','block');

    //get func attr test
    // console.log($(this).attr('func'));
    $.get($(this).attr('func'), function( data ){
      $("#lightbox-content").html(data);
    });
  });

  // undarkens background
  $('a.lightbox-close , button.lightbox-close').click(function(){
    $('#fade').css('display','none');
    $('#light').css('display','none');
  });
});