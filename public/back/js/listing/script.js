$(document).on('ready',function(){
	"use strict";

	//**** Store Location ****//
	$('.quick-btn-headers li > span').on('click', function(){
		if ($('.quick-btn-headers > li > div').css('display') == 'block') {
			$('.quick-btn-headers > li > div').hide();
		} else {
			$('.quick-btn-headers > li > div').show();
		}
		return false;
	});
	$('body').on('click', function(){
		$('.quick-btn-headers li > span').next('div').hide();
	});
	$(".quick-btn-headers li > div").on("click",function(e){
        e.stopPropagation();
    });

	//**** Account Login Popup ****//
	$('.account-login').on('click', function(){
		$('.popup-sec').addClass('active');
		$('.login-account').addClass('active');
		$('html').addClass('stop-scroll');
	});
	$('.close-account').on('click', function(){
		$('.popup-sec').removeClass('active');
		$('.login-account').removeClass('active');
		$('html').removeClass('stop-scroll');
	});

	//**** Account Login Popup ****//
	$('.account-register').on('click', function(){
		$('.popup-sec').addClass('active');
		$('.register-account').addClass('active');
		$('html').addClass('stop-scroll');
	});
	$('.close-account').on('click', function(){
		$('.popup-sec').removeClass('active');
		$('.register-account').removeClass('active');
		$('html').removeClass('stop-scroll');
	});

	//**** Accordians ****//
	$('.accordian-box:first').addClass('active');
	$('.accordian-box:first .acco-content').slideDown();
	$('.accordian-box > h2').on('click', function(){
		$('.accordian-box').removeClass('active');
		$('.accordian-box .acco-content').slideUp();
		$(this).parent().addClass('active');
		$(this).next().slideDown();
	});

	//**** Close tips ****//
	$('.close-tip').on('click', function(){
		$(this).parent().slideUp();
	});

	//**** Close Listing Above ****//
	$('.close-listing-above').on('click', function(){
		$(this).parent().parent().fadeOut();
	});

	//**** Delete Gallery ****//
	$('.galleries-images > a i.la-trash-o').on('click', function(){
		$(this).parent().fadeOut();
	});

	/* =============== Ajax Contact Form ===================== */
    $('#contactform').submit(function(){
        var action = $(this).attr('action');
        $("#message").slideUp(750,function() {
        $('#message').hide();
            $('#submit')
            .after('<img src="images/ajax-loader.gif" class="loader" />')
            .attr('disabled','disabled');
        $.post(action, {
            name: $('#name').val(),
            email: $('#email').val(),
            comments: $('#comments').val(),
            verify: $('#verify').val()
        },
            function(data){
                document.getElementById('message').innerHTML = data;
                $('#message').slideDown('slow');
                $('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
                $('#submit').removeAttr('disabled');
                if(data.match('success') != null) $('#contactform').slideUp('slow');

            }
        );
        });
        return false;
    });  


    //**** Choose File Upload ****//
    $('#chooseFile').bind('change', function () {
	  var filename = $("#chooseFile").val();
	  if (/^\s*$/.test(filename)) {
	    $(".file-upload").removeClass('active');
	    $("#noFile").text("No file chosen..."); 
	  }
	  else {
	    $(".file-upload").addClass('active');
	    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
	  }
	});


	/*=================== Sticky on Scroll ===================*/ 
	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();
		if (scroll >= 1) {
		$("header").addClass("sticky");
		}
		else{
		$("header").removeClass("sticky");
		$("header").addClass("");
		}
	});


	//**** Show Header on Scroll Up ****//
	var scroll_pos = 0;
	var scroll_time;
	$(window).on('scroll', function(){
	    clearTimeout(scroll_time);
	    var current_scroll = $(window).scrollTop();
	    
	    if (current_scroll >= $('header').outerHeight()) {
	        if (current_scroll <= scroll_pos) {
	            $('header').removeClass('hidden');    
	        }
	        else {
	            $('header').addClass('hidden');  
	        }
	    }
	    scroll_time = setTimeout(function() {
	        scroll_pos = $(window).scrollTop();
	    }, 0);
	});

	//**** Open Responsive Menu ****//
	$('.open-responsive-menu').on('click', function(){
		$(this).toggleClass('active');
		$('header').toggleClass('active');
	});
	$('body').on('click', function(){
		$('header').removeClass('active');
		$('.open-responsive-menu').removeClass('active');
	});
	$('header.active .open-responsive-menu').on('click', function(){
		$('header').removeClass('active');
		$('.open-responsive-menu').removeClass('active');
	});
	$("header").on("click",function(e){
        e.stopPropagation();
    });

	//**** Responsive Menu Dropdown ****//
	if ($(window).width() < 980) {
	   	$('.header-menus nav > ul > li.menu-item-has-children > a').on('click', function(){
			$('.header-menus nav > ul > li.menu-item-has-children > ul').slideUp();
			$(this).parent().find('ul').slideDown();
		});
	}

	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove();
		});
	}, 5000);
});