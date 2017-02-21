

;(function($){

var $btnMenu = $('#btn-menu'),
      $menu = $('.header__menu');
  
  //new WOW().init();
  // var myScroll;
 
  //   myScroll = new IScroll('.tour-category-items', { mouseWheel: true });

  $('.datepicker').pickadate();

  $btnMenu.on('click', function (e) {
    
      $menu.toggle();

  });

 $menu.find(".menu-item-has-children").hoverIntent({
      over: function() {
            $(this).find(">.sub-menu").slideDown(200 );
          },
      out:  function() {
            $(this).find(">.sub-menu").slideUp(200);
          },
      timeout: 200

       });

 $(".owl-carousel").owlCarousel({
      items : 1,
      autoplay : true,
      loop : true,
      nav : true,
      navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>']
      /*onChange : function (e) {
        console.log(e.target);
        $('.owl-item.active span').addClass('animated');
        $('.owl-item.active h1').addClass('animated');
      }*/
      /*slideSpeed : 300,
      paginationSpeed : 400,*/
      /*singleItem:true*/
  });

 $('.request-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {

                this.st.mainClass = 'mfp-zoom-out';
                $('body').addClass('mfp-open');
            },
            beforeClose: function() {

               
                $('body').removeClass('mfp-open');
            }

        }

       
    });

 // FUNCTION FOR includes

    var btnIncludes = $('.product-description-accordion-button');
    var IncludesContent = $('.product-description-accordion-content');
    
    IncludesContent.addClass('hidden');

    btnIncludes.on('click', function (e) {
        $(this)
            .next()
            .slideToggle(200);
            /*.siblings('.product-description-accordion-content')
            .slideUp(200);*/

    });

 // SMOOTH ANCHOR SCROLLING
    var $root = jQuery('html, body');
    jQuery('a.anchor').click(function(e) {
        var href = jQuery.attr(this, 'href');

        if (typeof(jQuery(href)) != 'undefined' && jQuery(href).length > 0) {
            var anchor = '';

            if (href.indexOf("#") != -1) {
                anchor = href.substring(href.lastIndexOf("#"));
            }
           
            if (anchor.length > 0) {
                /*console.log(jQuery(anchor).offset().top);
                console.log(anchor);*/


                $root.animate({
                    scrollTop: jQuery(anchor).offset().top-155
                }, 500, function() {
                    window.location.hash = anchor;
                });
                e.preventDefault();
            }
        }else{ // si no esta la seccion se va al home
           window.location.replace('/' + href);
        }
    });
     
    function fillSelectTour(){
          var selectedCategory = ($('#selectedCategory').val()) ? $('#selectedCategory').val() : 'atv';
          
          $.ajax({
                type: 'GET',
                url: '/lizardtours/api/taxonomy/get_taxonomy_posts/?taxonomy=tour_category&slug='+ selectedCategory,//'/api/get_posts/?post_type=tour&count=-1',
                
                success: function(data){
                   //console.log(data)
                   
                  var items = [];

                var select = $('select[name="selecttour"]').empty();
                $.each(data.posts, function(i,item) {
                  select.append( '<option value="'
                                       + $.trim(item.title) + '">'
                                       + item.title
                                       + '</option>' ); 


           
                });
          

                select.prepend('<option value="" selected><span style="color:red;">Select a tour</span></option>');
          

                },
                error:function(e){
                   console.log(e);
                   //$('div[data-project="'+ post_id +'"]').find('.content-project').html('<p>Ohh Error</p>');
                }
            });
    }

    function fillSelectTourHome(){
         
          
          $.ajax({
                type: 'GET',
                url: '/lizardtours/api/get_posts/?post_type=product&count=-1',
                
                success: function(data){
                   //console.log(data)
                   
                  var items = [];

                var select = $('select[name="selecttour2"]').empty();
                $.each(data.posts, function(i,item) {
                  select.append( '<option value="'
                                       + $.trim(item.title) + '">'
                                       + item.title
                                       + '</option>' ); 


           
                });
          

                select.prepend('<option value="" selected><span style="color:red;">Select a tour</span></option>');
          

                },
                error:function(e){
                   console.log(e);
                   //$('div[data-project="'+ post_id +'"]').find('.content-project').html('<p>Ohh Error</p>');
                }
            });
    }
     

   

    // mini-contact form
  $('.mini-contact__btn').on('click', function (e) {
      
      $(this).toggleClass('open');
      $('.mini-contact').toggleClass('open');;    
  });
  
  $('.mini-contact__close').on('click', function (e) {
      
      $('.mini-contact__btn').removeClass('open');
      $('.mini-contact').removeClass('open');    
  });

   // Forms with ajax process
    $('form[data-remote]').on('submit', function(e){
        var form =$(this);
        var method = form.find('input[name="_method"]').val() || 'POST';
        var url = form.prop('action');
        form.find('.loader').show();
        $.ajax({
            type: method,
            url: url,
            data: form.serialize(),
            success: function(){
                var message = form.data('remote-success-message');
                form.find('.loader').hide();
                if(message)
                {

                    $('.response').removeClass('message-error').addClass('message-success').html(message).fadeIn(300).delay(4500).fadeOut(300);
                }
            },
            error:function(){
                form.find('.loader').hide();
                $('.response').removeClass('message-success').addClass('message-error').html('Whoops, looks like something went wrong.').fadeIn(300).delay(4500).fadeOut(300);

            }
        });

        limpiaForm(form);

        e.preventDefault();
    });

    $('input[data-confirm], button[data-confirm]').on('click', function(e){
       var input = $(this);

        input.prop('disabled','disabled');

        if(! confirm(input.data('confirm'))){
            e.preventDefault();
        }
    });

    function limpiaForm(miForm) {

        // recorremos todos los campos que tiene el formulario
        $(":input", miForm).each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase();
            //limpiamos los valores de los campos…
            if (type == 'text' || type == 'password'  || type == 'email' || tag == 'textarea')
                this.value = "";
            // excepto de los checkboxes y radios, le quitamos el checked
            // pero su valor no debe ser cambiado
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            // los selects le ponesmos el indice a -
            else if (tag == 'select')
                this.selectedIndex = -1;
        });
    }
      
      
      

    //$(".chosen-select").chosen();
    
    //SCROLL WINDOW FUNCTIONALITY

    /*$(window).scroll(function () {
          if ($(this).scrollTop() > 50) {
              $('.header').addClass("header--fixed");
          } else {
              $('.header').removeClass("header--fixed");
          }
      });*/

    

    $(window).load(function() {
     
     
      resizes();
      fillSelectTour();
      fillSelectTourHome();
    });

    $(window).resize(resizes);

    function resizes()
     {
      
      
        if(getWindowWidth() > 900){
         
        
          $('.intro__banner').height($(".intro__featured").height());
          $('.contact__map iframe').height($(".contact__map").height());
          //$('.intro__banner__slide img').height($(".intro__featured").height());
           $(".nano").nanoScroller();
           $(".tour-category-items").addClass('nano');
        
        }else{
          $('.intro__banner').height('auto');
          $('.contact__map').height('auto');
          $(".nano").nanoScroller({ destroy: true });
          $(".tour-category-items").removeClass('nano');
        } 
          
      

     }






})(jQuery);


function getScrollerWidth() {
  var scr = null;
  var inn = null;
  var wNoScroll = 0;
  var wScroll = 0;

  // Outer scrolling div
  scr = document.createElement('div');
  scr.style.position = 'absolute';
  scr.style.top = '-1000px';
  scr.style.left = '-1000px';
  scr.style.width = '100px';
  scr.style.height = '50px';
  // Start with no scrollbar
  scr.style.overflow = 'hidden';

  // Inner content div
  inn = document.createElement('div');
  inn.style.width = '100%';
  inn.style.height = '200px';

  // Put the inner div in the scrolling div
  scr.appendChild(inn);
  // Append the scrolling div to the doc
  document.body.appendChild(scr);

  // Width of the inner div sans scrollbar
  wNoScroll = inn.offsetWidth;
  // Add the scrollbar
  scr.style.overflow = 'auto';
  // Width of the inner div width scrollbar
  wScroll = inn.offsetWidth;

  // Remove the scrolling div from the doc
  document.body.removeChild(
    document.body.lastChild);

  // Pixel width of the scroller
  return (wNoScroll - wScroll);
}

function getWindowHeight() {
  var windowHeight=0;
  if (typeof(window.innerHeight)=='number') {
    windowHeight=window.innerHeight;
  } else {
    if (document.documentElement && document.documentElement.clientHeight) {
      windowHeight = document.documentElement.clientHeight;
    } else {
      if (document.body && document.body.clientHeight) {
        windowHeight=document.body.clientHeight;
      }
    }
  }
  return windowHeight;
}

function getWindowWidth() {
  var windowWidth=0;
  if (typeof(window.innerWidth)=='number') {
    windowWidth=window.innerWidth;
  } else {
    if (document.documentElement && document.documentElement.clientWidth) {
      windowWidth = document.documentElement.clientWidth;
    } else {
      if (document.body && document.body.clientWidth) {
        windowWidth=document.body.clientWidth;
      }
    }
  }
  return windowWidth;
}

