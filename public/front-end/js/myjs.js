$(document).ready(function(){
	// APPEND ELEMENT
	let widthBody = $('body').css('width');
	let toolRight = $('.tool-right');
	let logo = $('.logo');
	let showMenu = $('.btn-showmenu');

	if(parseInt(widthBody) <= 992){
		toolRight.appendTo(logo);
	}

	// CLICK SHOW INPUT SEACRH
	$('.tool-right .append_search').click(function(){
		$('.search-wrap').toggle();
	})

	// CLICK LI HREF
	if(parseInt($('body').css('width')) <= 992)
	{
		let i = '<i class="fas fa-angle-right"></i>'
		let a = $(".menu ul li:has(ul)");
		a.children('.chil-a').append(i);
		$('.menu ul li .chil-a').click(function(e){
			if($(this).next().length != 0){
				e.preventDefault();
				if($(this).next('.sub-menu').css('display') == 'none'){
					$(this).next('.sub-menu').slideDown()
					$(this).children('i').css('transform','rotate(90deg)')
				}
				else{
					$(this).next('.sub-menu').slideUp()
					$(this).children('i').css('transform','rotate(0deg)')
				}
				
				
			}
				
		})
	}
	//e.preventDefault()


	// CLICK BUTTON HIDDEN MENU
	// $('.close').click(function(){
	// 	$('.main-header-top').css('display','none');
	// 	$('.main-header').css('display','none');
	// })
	if(parseInt($('body').css('width')) > 576)
	{
		$( ".btn-showmenu" ).click(function() {

			$('.cover-header').animate({
				marginLeft : '+=45%',
			},200);

		});

		$( ".close" ).click(function() {

			$('.cover-header').animate({
				marginLeft : '-=45%',
			},200);
		});
	}

	if(parseInt($('body').css('width')) <= 576)
	{
		$( ".btn-showmenu" ).click(function() {

			$('.cover-header').animate({
				marginLeft : '+=65%',
			},200);

		
		});

		$( ".close" ).click(function() {

			$('.cover-header').animate({
				marginLeft : '-=65%',
			},200);


		});
	}
	
	
	


	// SLIDER
	let slideWrapper = $('.slide-wrapper .slide')
	
	let idx = 0;
	let attr = slideWrapper.attr('idx')

	function slide(){
		setInterval(function(){
			$('.slide-wrapper').css('marginLeft','-=100%')
			idx = idx + 1;
			if(idx == 4){
				idx = 0;
				$('.slide-wrapper').css('marginLeft','0')
			}
		},1500)
	}

	// HOVER PRODUCT IMAGE
	$('.product-image').hover(function(){
		let defaultImg = $(this).children('.default-img');
		let hoverImg = $(this).children('.hover-img');

		if(defaultImg.css('display') != 'none' && hoverImg.css('display') == 'none'){
			defaultImg.css('display','none');
			hoverImg.css('display','block');
		}
		else{
			defaultImg.css('display','block');
			hoverImg.css('display','none');
		}
	})
	
	let heightImg = $('.product-image img').css('height');
	
	let newHeight =  parseInt(heightImg) - 2;
	
	// $('.product-image img').css('height',newHeight);

	// BOTTOM
	$('.group-footer p').click(function(){
		if($(this).next().css('display') == 'none'){
			$(this).next().slideDown(300);
			$(this).children('i').css('transform','rotate(90deg)');
		}
		else{
			$(this).next().slideUp(300);
			$(this).children('i').css('transform','rotate(0deg)');
		}
		
	})

	// TÙY CHỌN SẮP XẾP SẢN PHẨM
	if(parseInt($('body').css('width')) >= 992)
	{
		$('.switch-facet p').click(function(){
			if($(this).attr('show') == '4')
			{
				$('.product-item').animate({
					width : '30%',
				},500);
				$(this).attr('show','3')
				
			}
			else
			{
				$('.product-item').animate({
					width : '22.5%',
				},500)
				$(this).attr('show','4')
			}
		})
	}
	if(parseInt($('body').css('width')) < 992){
		$('.switch-facet').css('display','none')
	}

	// Thêm sản phẩm vào giỏ hàng
	let valInput = parseInt($('.input-number input').val());
	$('.plus').click(function(e){
		valInput = valInput + 1;
		$('.input-number input').val(valInput)
	})
	$('.minus').click(function(e){
		
		if(valInput > 1){
			valInput = valInput - 1;
			$('.input-number input').val(valInput)
		}
		
	})

	// CLICK DETAIL PRODUCT
	$('.click-size-guide').click(function(e){
		$(this).addClass('active');
		$('.click-detail-product').removeClass('active')
		$('.body .sub-menu-info-detail').css('display','none')
		$('.body .size-guide').css('display','block');

	})

	$('.click-detail-product').click(function(e){
		$(this).addClass('active');
		$('.click-size-guide').removeClass('active')
		$('.body .sub-menu-info-detail').css('display','block')
		$('.body .size-guide').css('display','none');	
	})

	// SHOW POPUP ADD
	$('.btn button').click(function(e){
		if($('.size input[name="size"]').val() == "Tất cả"){
			e.preventDefault();
			$('.popup-warning').css('display','block');
			if($('.popup-warning').css('display') == 'block'){
				setTimeout(function(){
					$('.popup-warning').fadeOut(2000);
				},2000)
			}
		}
	})
	// ALERT warning
	if($('.alert-warning').css('display') == 'block'){
		setTimeout(function(){
					$('.alert-warning').fadeOut(2000);
				},2000)
	}

	// HIDDEN POPUP ADD
	$('.popup-head .hide').click(function(e){
		if($('.popup-add').css('display') == 'block')
		{
			$('.popup-add').css('display','none');
			$('body').css('overflow','auto');
		}
	})

	// APPEN INFO BILL
	if(parseInt($('body').css('width')) <= 992){
		$('.shipping').appendTo($('.payments'));
		
	}

	// Choose size product
	$('.size ul li').click(function(){
		let val = $(this).text();
		
		$('.size input').val(parseInt(val))
	})

	// SET HEIGHT IMG
	let width = $('.product-item img').css('width');
	let height = parseInt(width) * 100 / 73;
	$('.product-item img').css('height',parseInt(height))

	// popup warning
	if($('.popup-success').css('display') == 'block')
	{
		setTimeout(function(){
			$('.popup-success').fadeOut(2000);
		},2000)
		
	}


	// Ajax click quantity
	$('.quantity .plus').click(function(e){
		let val = $(this).siblings('.value').children().val();
		$(this).siblings('.value').children().val(parseInt(val) + 1);
		console.log(val);
		$.ajax({
			url : 'text-ajax',
			type : 'GET',
			data : {val : val},
			dataType : 'html',
			success : function(data){
				console.log(data);
			}
		})
	})

	// SHOW FORM ADD ADDRESS
	$('.show-add-newAddress').click(function(){
			$('.new-address').toggle();
		
	})
})	