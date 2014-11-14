$('.fancybox').fancybox({
	type: "iframe",
	height: 400,
	width: 400,
});

$('.fancybox-inline').fancybox();

$('.fancybox-media')
	.attr('rel', 'media-gallery')
	.fancybox({
		openEffect : 'none',
		closeEffect : 'none',
		prevEffect : 'none',
		nextEffect : 'none',

		arrows : false,
		helpers : {
			media : {},
			buttons : {}
		}
	});

$(function(){
	$('.select').select2(); 
});
//compresion
$(function(){
	$('#productlist1').select2().on('change', function(){
		window.product1 = $(this).val();
		
	});
});

$(function(){
	$('#productlist2').select2().on('change', function(){
		window.product2 = $(this).val();
		
	});
});

$(function(){

	$('.generate-btn>a').click(function(e){
		e.preventDefault();
		$('.compare-module .msg .alert').remove();
		var path = $(this).attr('href');

		if ((window.product1 !=0 && window.product2 !=0) && (window.product1 !=  undefined && window.product2 !=  undefined)) {

			window.location.href = path+'?product1='+window.product1+'&product2='+window.product2;			
		}
		else{
			
			alert='<div class="alert alert-danger" role="alert">Please select Product Models.</div>';
			$('.compare-module .msg').append(alert);
			
		}
	});
});
//disable button
 // $(".generate-btn>a").attr("disabled", true);

$(document).ready(function(){  
	$('#productCarousel').everslider({  
	    mode: 'carousel',  
	    moveSlides: 1,
	    itemWidth : 165,
	    itemHeight: 280,
	    itemMargin: 10,
	    
	});  
});

$(function () {
	$('.nav-tabs').tab();
});

$(function(){
	$('#search').focus(function(){
		$('.search').css('z-index', 1);
	}).blur(function(){
    	$('.search').css('z-index', 0);
  	})
});

$(window).bind('scroll', function() {
     if ($(window).scrollTop() > 50) {
         $('.navbar.navbar-default').addClass('fixed');
         $('.top-header').addClass('fixed');
     }
     else {
         $('.navbar.navbar-default').removeClass('fixed');
         $('.top-header').removeClass('fixed');
     }
});

$(document).ready(function() {
	$('#mainSlider .col3').hide();
	$('#productlist').select2().on('change', function(){
		window.condition = $(this).val();
		if (window.condition != 0 && window.condition != undefined) {
			$('#mainSlider .col3').fadeOut(900);
			$('#mainSlider .col3').slideDown();
		}
		else{
			$('#mainSlider .col3').fadeOut(950);
		}
	});
});




$(document).ready(function() {
   $('.read-more p').expander({
   	 slicePoint: 0
   })
});

$(document).ready(function() {
   $('.product_read p').expander({
   	 slicePoint: 900
   })
});

$(document).ready(function() {
   $('.product_analysis_read p').expander({
   	slicePoint: 370
   })
});

$(document).ready(function() {
	$('.nav.nav-tabs li').click(function(i)
	{
  	 	var relation = $(this).attr('rel'); 
  	 	$('.spec-progressbar').removeClass('ins');
  	 	if(relation == "spec"){
  	 		

			$('.spec-progressbar').removeClass('ins').delay(0).queue(function(next){
				$(this).addClass('ins');
		        next();
			    return false;
			});
  	 	}
	});
});
$(document).ready(function(){
	$(".fancybox-popup").fancybox({
		'autoSize' : false,
		height: 300,
		width: 600
	});
	$(".vibratim").fancybox({
		'autoSize' : false,
		height: 300,
		width: 600
	});

	$(".fancybox").fancybox({
		type: 'iframe',
		height: 500,
		width: 500
	});
});

$(document).ready(function() { 
	$('.spec-progressbar1').removeClass('ins');

	$('.spec-progressbar1').removeClass('ins').delay(0).queue(function(next){
		$(this).addClass('ins');
		next();
		return false;
	});

});
$(function(){
	$('#productlist3').select2().on('change', function(){
		var product_2 = $(this).val();
		var url = $('.grey-arrow-btn').attr('href')+product_2;
		$('.grey-arrow-btn').attr('href', url);
	});
});

$(document).ready(function(){
			$(".slider-change-picture img").click(function(){
				var abc = $(this).attr("src");
				 $(".main-img a").attr("href", abc);
				 $(".fancybox img").attr("src", abc);
		});	
	});
		jQuery(function(){
			$(".tmb-caption img").click(function(){

			    var that = this;
				$(".main-slide-img").fadeOut(600, function(){
				
					$(this).attr("src", 	   $(that).attr("src"))
						   .attr("data-large", $(that).attr("data-tmb-large"))
						   .fadeIn(1000);				
				});

			    return false;
			});  
			 $('.bx-slider').bxSlider({
			    slideWidth: 55,
			    minSlides: 6,
			    maxSlides: 6,
			    moveSlides: 4,
			    slideMargin: 10,
			    pager: false,
			    infiniteLoop: false,
			  });
		});
$(function(){
	$('.cust-tab').click(function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		var tabclass = id.replace('#','.');
		$('.nav-tabs li').removeClass('active');
		$('.tab-content .tab-pane').removeClass('active');
		$('.nav-tabs '+tabclass).addClass('active');
		$('.tab-content '+id).addClass('active');
	});
});

// comparison-all-product-scroll-bar
// niceScroll
$(document).ready(function(){
   $('.col-ctm-9').doubleScroll();
});