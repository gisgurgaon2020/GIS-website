/*!
 * jQuery Scrollspy Plugin
 * Author: @sxalexander
 * Licensed under the MIT license
 */
;(function ( $, window, document, undefined ) {

    $.fn.extend({
      scrollspy: function ( options ) {
        
          var defaults = {
            min: 0,
            max: 0,
            mode: 'vertical',
            namespace: 'scrollspy',
            buffer: 0,
            container: window,
            onEnter: options.onEnter ? options.onEnter : [],
            onLeave: options.onLeave ? options.onLeave : [],
            onTick: options.onTick ? options.onTick : []
          }
          
          var options = $.extend( {}, defaults, options );

          return this.each(function (i) {

              var element = this;
              var o = options;
              var $container = $(o.container);
              var mode = o.mode;
              var buffer = o.buffer;
              var enters = leaves = 0;
              var inside = false;
                            
              /* add listener to container */
              $container.bind('scroll.' + o.namespace, function(e){
                  var position = {top: $(this).scrollTop(), left: $(this).scrollLeft()};
                  var xy = (mode == 'vertical') ? position.top + buffer : position.left + buffer;
                  var max = o.max;
                  var min = o.min;
                  
                  /* fix max */
                  if($.isFunction(o.max)){
                    max = o.max();
                  }

                  /* fix max */
                  if($.isFunction(o.min)){
                    min = o.min();
                  }

                  if(max == 0){
                      max = (mode == 'vertical') ? $container.height() : $container.outerWidth() + $(element).outerWidth();
                  }
                  
                  /* if we have reached the minimum bound but are below the max ... */
                  if(xy >= min && xy <= max){
                    /* trigger enter event */
                    if(!inside){
                       inside = true;
                       enters++;
                       
                       /* fire enter event */
                       $(element).trigger('scrollEnter', {position: position})
                       if($.isFunction(o.onEnter)){
                         o.onEnter(element, position);
                       }
                      
                     }
                     
                     /* trigger tick event */
                     $(element).trigger('scrollTick', {position: position, inside: inside, enters: enters, leaves: leaves})
                     if($.isFunction(o.onTick)){
                       o.onTick(element, position, inside, enters, leaves);
                     }
                  }else{
                    
                    if(inside){
                      inside = false;
                      leaves++;
                      /* trigger leave event */
                      $(element).trigger('scrollLeave', {position: position, leaves:leaves})

                      if($.isFunction(o.onLeave)){
                        o.onLeave(element, position);
                      }
                    }
                  }
              }); 

          });
      }

    })

    
})( jQuery, window, document, undefined );

// Nav
!function(a){"use strict";a('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function(){}),a(".js-scroll-trigger").click(function(){}),a("body").scrollspy({target:"#mainNav",offset:100});var t=function(){a("#mainNav").offset().top>100?a("#mainNav").addClass("navbar-shrink"):a("#mainNav").removeClass("navbar-shrink")};t(),a(window).scroll(t)}(jQuery),$(document).on("click","#sendMailBtn",function(a){});

// Nav Collapse
$('.navbar-toggler').click(function() {
  $('.navbar-collapse').toggleClass('collapse');
});

// Carousel

function showSlides(slide, slideIndex = 0) {
    var i;
    var slides = document.querySelectorAll(`${slide} .mySlides`);

    if (slides.length === 0) {
      return;
    }
    var dots = document.querySelectorAll(`${slide} .dot`);
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(function() { showSlides(slide, slideIndex) }, 3000); // Change image every 3 seconds
};

$(document).ready(function() {
    var i;
    var slides = [".slideshow-container-1", ".slideshow-container-2"];
    
    for(i = 0; i < slides.length; i++) {
        showSlides(slides[i]);
    }
});