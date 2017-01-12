$(function(){
  // darkens background
  //opens lightbox, calls controller
  $('a.lightbox-open , button.lightbox-open').click(function(){
    $('#fade').css('display','block');
    $('#light').css('display','block');

    //get func attr
    // console.log($(this).attr('func'));
    $.get($(this).attr('func'), function(data){
      $("#lightbox-content").html(data);
    });
  });

  // undarkens background
  $('a.lightbox-close , button.lightbox-close').click(function(){
    $('#fade').css('display','none');
    $('#light').css('display','none');
  });

  //main ajax calls
  $('a.ajax-main , button.ajax-main').click(function(){
    $.get($(this).attr('func'), function(data){
      $("#main").html(data);
    });
  });

  //toggles info on tables
  $('tr.toggle').click(function(){
    var item = $(this).attr('item');
    $('p.toggle-item-'+item).slideToggle().removeClass('hide');
  });

  //datepicker initializer
  $('.datetimepicker').datetimepicker();
  
/*  $('#range-input').change(function(){
    // $('.range-number').html($(this).val());
    console.log($(this).val());
  });*/
});