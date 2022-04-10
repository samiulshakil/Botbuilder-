(function ($) {
    "use strict"

	/* Document on load functions */
	$(window).on('load', function () {
        preLoader();
		headerHeightFixer();
    });
	/* Document on Resize functions */
	$(window).on('resize', function () {
		headerHeightFixer();
    });

	/* Preloader init */
	function preLoader(){
		$(".preloader").delay(1700).fadeOut("slow");
		setTimeout(function(){
			$("html").removeClass("overflow-hidden");
		}, 1700);
	}

	/* scroll top */
	$(".scroll-top").on("click", function () {
		$("html,body").animate({scrollTop: 0},50);
	});
	$(window).on("scroll", function () {
		var scrolling = $(this).scrollTop();

		if (scrolling > 200) {
			$(".scroll-top").fadeIn();
		} else {
			$(".scroll-top").fadeOut();
		}
	});

	/* Fix Header Height function */
    function headerHeightFixer(){
    	$('.header-height-fix').css('height', $('.header').outerHeight() +'px');
	};

	/* On Document Content Loaded functions */
	$(document).ready(function(){
		$('.footer').after('<div class="header-height-fix"></div>');

		/* Closes responsive menu when a navbar link is clicked */
		$(".nav-link, .dropdown-item").on("click", function (e) {
			if( $(this).hasClass("dropdown-toggle") ){
				e.preventDefault();
			}else{
				$(".navbar-collapse").collapse("hide");
				$("html").removeClass("overflow-hidden");
			}
		});
		$('.navbar-toggler').on('click', function () {
			$("html").toggleClass('overflow-hidden');
		});
 
		/* Character Customization function */
		(function(){
			/* For Boy */
			// $(".customization__wrapper--boy .customization__tab__card--head").on("click", function(){
			// 	$("#boy_face").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));			
			// });
		
			// $(".customization__wrapper--boy .customization__tab__card--eye").on("click", function(){
			// 	$("#boy_eye").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
		
			// $(".customization__wrapper--boy .customization__tab__card--upperwear").on("click", function(){
			// 	$("#boy_upperwear").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
		
			// $(".customization__wrapper--boy .customization__tab__card--innerwear").on("click", function(){
			// 	$("#boy_innerwear").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
		
			// $(".customization__wrapper--boy .customization__tab__card--hand").on("click", function(){
			// 	$("#boy_hand").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
		
			// $(".customization__wrapper--boy .customization__tab__card--watch").on("click", function(){
			// 	$("#boy_watch").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
		
			// $(".customization__wrapper--boy .customization__tab__card--pant").on("click", function(){
			// 	$("#boy_pant").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
		
			// $(".customization__wrapper--boy .customization__tab__card--underware").on("click", function(){
			// 	$("#boy_underware").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
		
			// $(".customization__wrapper--boy .customization__tab__card--shoe").on("click", function(){
			// 	$("#boy_shoe").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
	
	
			// /* For Girl */
			// $(".customization__wrapper--girl .customization__tab__card--hair").on("click", function(){
			// 	$("#girl_hair").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });

			// $(".customization__wrapper--girl .customization__tab__card--eye").on("click", function(){
			// 	$("#girl_eye").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
	
			// $(".customization__wrapper--girl .customization__tab__card--upperwear").on("click", function(){
			// 	$("#girl_upperwear").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
	
			// $(".customization__wrapper--girl .customization__tab__card--innerwear").on("click", function(){
			// 	$("#girl_innerwear").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
	
			// $(".customization__wrapper--girl .customization__tab__card--pant").on("click", function(){
			// 	$("#girl_pant").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });

			// $(".customization__wrapper--girl .customization__tab__card--shoe").on("click", function(){
			// 	$("#girl_shoe").attr("src", $(this).find(".customization__tab__card__image--main").attr("src"));
			// });
					
		})();

		/* Theme Toggler Functions */
		(function(){
			let lightMode = localStorage.getItem("lightMode");
	
			// Enable LightMode Function
			function enableLightMode(){
				// 1. Add the class lightMode to the root Element
				$('html').addClass("light-layout");
				// 2. Add the class toggle to themeToggler
				$(".theme-toggler").addClass("active");
				// 3. Update lightMode in the localStorage
				localStorage.setItem("lightMode", "enabled");
			}
	
			// Disable LightMode Function
			function disableLightMode(){
				// 1. Remove the class lightMode to the root Element
				$('html').removeClass("light-layout");
				// 2. Remove the class toggle to themeToggler
				$(".theme-toggler").removeClass("active");
				// 3. Update lightMode in the localStorage
				localStorage.setItem("lightMode", null);
			}
	
			// Check localStorage lightMode value
			if(lightMode === "enabled"){
				enableLightMode();
			}
	
			// Theme Change Event Functions
			$(".theme-toggler").on("click", function(){
				$(this).toggleClass("active");
				lightMode = localStorage.getItem("lightMode");
				if(lightMode !== "enabled"){
					enableLightMode();
				} else{
					disableLightMode();
				}
			});
		})();

	})

	/*  Banner slider */
	$(".products__slider").slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000,
		speed: 500,
		arrows: false,
		centerMode: true,
		dots: false,
		pauseOnHover: false,
		pauseOnFocus: false,
		infinite: true,
		variableWidth: true,
	});
	

})(jQuery);