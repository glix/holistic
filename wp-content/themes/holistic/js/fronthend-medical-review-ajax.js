
$(function(){
	//handler of create list of generate comparison 
	var rate = '';
	var slug = '';
	var data2 ={
		'action': 'action',
	};

	$.post(my_ajax_obj.ajax_url, data2, function(response) {
		$("#productlist1").html(response);
		$("#productlist2").html(response);
	});


	$('#productlist1').select2().on('change', function(){
		var id = $(this).val();

		var data ={
			'action' : 'action',
			'id' : id
		};
		$.post(my_ajax_obj.ajax_url, data, function(response) {

			$("#productlist2").html(response);

		});					
		
	});
	
	
	$('#productlist2').select2().on('change', function(){
			var id = $(this).val();

			var data ={
				'action' : 'action',
				'id' : id
			};
			$.post(my_ajax_obj.ajax_url, data, function(response) {
				$("#productlist1").html(response);
			});					
		});
	
	//end hander of generate comparison

	//hander of all product  page ajax requrest
	$('input[name="all-rating"]').on('change',function(){
		var all_rate;
		 all_rate = $(this).val();
		window.all_rate = all_rate;	
		
		
		if (window.medicol_condition != 0 && window.medicol_condition != '' && window.medicol_condition != 'undefined' && window.medicol_condition != 0) {

			var rating = {
				'action' : 'all_action',
				'rating' : all_rate,
				'slug': window.medicol_condition
				};	
		
		}
		else {
			var rating = {
			'action':  'all_action',
			'rating': all_rate
			};	

		}
			$('.upper-footer').css('margin-top','320px');
			$('.preload-image').show();
			$('#product-row').hide();
			$.post(my_ajax_obj.ajax_url,rating,function(response){
				$('.preload-image').hide();
				$('.upper-footer').css('margin-top','0px');
				$('#product-row').show();
				console.log( response );
				if (response=='<div id="product-row" class="row"></div>') {

				}
				if (response=='0') {
					$("#product-row").replaceWith('<div id="product-row" class="row"><div class="ajax-error">Not Product Available! </div></div>'); 	
				}else{
					$("#product-row").replaceWith(response); 	
				}
			});

	});
	
	$('#all-products .product-col3-hide').hide();

	$('.all-product-medicol-condition').on('change',function(){
		
		var medicol_condition = null;
		medicol_condition = $(this).val();
		window.medicol_condition = medicol_condition;

		if (window.medicol_condition != 0 && window.medicol_condition != undefined) {
			$('#all-products .product-col3-hide').fadeOut(900);
			$('#all-products .product-col3-hide').slideDown();
		}
		else{
			$('#all-products .product-col3-hide').fadeOut(900);
		}
		
		if (window.all_rate != null && window.all_rate != 'undefined' && window.all_rate !=0) {
			var data3 = {
				'action' : 'all_action',
				'rating' : window.all_rate,
				'slug': medicol_condition
				};	
				
		} else if (window.medicol_condition==0 && window.all_rate == undefined) {
					var data3 = {
						'action' : 'all_action',
						'slug': 0,
						'rating': 0
					};
			}

		else{	
			var data3 = {
				'action' : 'all_action',
				'slug': medicol_condition
			};
		}
		$('.upper-footer').css('margin-top','320px');
		
		$('.preload-image').show();
		$('#product-row').hide();
		$.post(my_ajax_obj.ajax_url,data3,function(response){
			$('.preload-image').hide();
			$('.upper-footer').css('margin-top','0px');
			$('#product-row').show();
			if (response=='0') {
				$("#product-row").replaceWith('<div id="product-row" class="row"><div class="ajax-error">Not Product Available! </div></div>'); 	
			} else if(response == '<div id="product-row" class="row"></div>'){
				$("#product-row").replaceWith('<div id="product-row" class="row"><div class="ajax-error">Not Product Available! </div></div>'); 	
			}else{
				$("#product-row").replaceWith(response); 	
			}
		});
	});

//end of ajax request of all product page


// hander of ajax of home page
	$('input[name="rating"]').on('change',function(){
		var rate = $(this).val();
		
		window.rate = rate;
		if(window.slug !=null && window.slug != 'undefined'){
				var rating = {
				'action' : 'my_action',
				'rating' : rate,
				'slug': window.slug
				};	
		}
		else {
			var rating = {
				'action':  'my_action',
				'rating': rate
			};
		}
		$("#product_list_wrapper").hide(); 		
		$('.ajax-error').remove();
		$('.preload-image').show();
		$.post(my_ajax_obj.ajax_url,rating,function(response){
			$('.preload-image').hide();
			$("#product_list_wrapper").show(); 	
			if (response=='<ul class="es-slides" id="product_list_wrapper"></ul>') {

				$("#product_list_wrapper").replaceWith('<div class="ajax-error">Not Product Available!</div><ul class="es-slides" id="product_list_wrapper"></ul>'); 	
			}else{
				$("#product_list_wrapper").replaceWith(response); 		
				$('#productCarousel').everslider();  
			}

		});
	});

	$('#productlist').select2().on('change', function(e){
		var slug = $(this).val();
		window.slug = slug;
		if( window.rate == '' && window.slug === '0' ){
			var data3 = {
				'action' : 'my_action',
				'rating' : 0,
				'slug': 0
				};	
		}else if(window.rate !=''&& window.rate !=undefined ){
				var data3 = {
				'action' : 'my_action',
				'rating' : window.rate,
				'slug': slug
				};	
		}
		else {
			window.rate ='';		
			var data3 = {
			'action' : 'my_action',
			'slug': slug
			};
		}
		// $("#productCarousel").replaceWith(" <div id='productCarousel' class='everslider'></div>"); 		
		$("#product_list_wrapper").hide(); 		
		$('.ajax-error').remove();
		$('.preload-image').show();
		$.post(my_ajax_obj.ajax_url,data3,function(response){	
			$('.preload-image').hide();
			$("#product_list_wrapper").show(); 	
			if (response=='<ul class="es-slides" id="product_list_wrapper"></ul>') {

				$("#product_list_wrapper").replaceWith('<div class="ajax-error">Not Product Available!</div><ul class="es-slides" id="product_list_wrapper"></ul>'); 	
			}else{
				$("#product_list_wrapper").replaceWith(response); 		
				$('#productCarousel').everslider();  
			}

			
		});

	});
	return false;
});