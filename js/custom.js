(function($) {
  "use strict";

$(document).ready(function(){
      //About Gallery
      if( $('#out-team').length > 0 ){
      $('#out-team').owlCarousel({
              loop:true,
              margin:30,
              nav:true,
              dots:false,
              dotData:false,
              autoplay:true,
              autoplayTimeout:3600,
              navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
              responsive:{
                  0:{
                      items:1
                  },
                  768:{
                      items:2
                  },
                  992:{
                      items:3
                  },
                  1000:{
                      items:3
                  }

              }

           })
          }

});



 // Pharmachy Thumb
if( $('.pharmachy-thumb').length > 0 ){
$(".pharmachy-thumb").hover(
   function() {
      $(this).find(".trainer-title").stop(true,true).fadeOut(200);

   },
   function() {
       $(this).find(".trainer-title").stop(true,true).fadeIn(800);
   }
);
}



// Patient Review
if( $('#patient-review').length > 0 ){
$('#patient-review').owlCarousel({
    loop:true,
    margin:30,
    items:1,
    autoHeight:true,
    nav:true,
    dots:false,
    dotData:false,
    autoplay:true,
    autoplayTimeout:3600,
    navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
});
}


	//Load more blog post on blog listing page
	$('#blog-list-main article:lt(4)').show();
    var items =  8;
    var shown =  2;
    $('#load-more').on('click', function(e) {
        shown = $('#blog-list-main article:visible').length+2;
        console.log(shown);
        if(shown< items) {
          $('#blog-list-main article:lt('+shown+')').show();
        }
        else {$('#blog-list-main article:lt('+items+')').show();
             $('#load-more').hide();
             }
    });


//Blog Calendar
if( $('.responsive-calendar').length > 0 ){
    $(".responsive-calendar").responsiveCalendar();
}



/*---- Custom file upload----*/

$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});
$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});
/*---- Custom file upload----*/


})(jQuery);