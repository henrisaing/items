$(function(){
  // darkens background
  //opens lightbox, calls controller
  $('a.lightbox-open , button.lightbox-open').click(function(){
    $('#fade').css('display','block');
    $('#light').css('display','block');

    //get func attr
    // console.log($(this).attr('func'));
    $.get($(this).attr('func'), function( data ){
      $("#lightbox-content").html(data);
    });
  });

  $('tr.toggle').click(function(){
    // $('p.toggle-item:first').slideToggle();
    // console.log($(this).attr('item'));
    var item = $(this).attr('item');
    $('p.toggle-item-'+item).slideToggle().removeClass('hide');
  });

  // undarkens background
  $('a.lightbox-close , button.lightbox-close').click(function(){
    $('#fade').css('display','none');
    $('#light').css('display','none');
  });
});