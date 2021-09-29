$(document).ready(function(){
	// CLICK INPUT SEARCH
	$('body').click(function(event){
		let searchInput = $('.user .search input');
		let infoUser = $('.user .info-user .username');
		let widthSearch = $('.user .search').css('width');
		let menuUserDisplay = $('.user .info-user .menu-user').css('display');
		
		let width = '220px';
		if(event.target != searchInput[0] && widthSearch == width)
		{
			$('.user .search').animate({
			width : '40px',
			
			},250);
		}
		if($(event.target).parent()[0] != infoUser[0] && menuUserDisplay == 'block')
		{
			console.log('ok')
			$('.user .info-user .menu-user').css('display','none')
			$('.user .info-user .username').css('background','#8b5c7e')
		}
		

	})
	$('.user .search').click(function(e){
		
		if($('.user .search').css('width') == '40px'){
			e.preventDefault()
		}
		// $('.user .search input').animate({
		// 	display : 'block',
		// },2000)
		// -webkit-border-radius: 100px;
		$('.user .search').animate({
			width : '220px',
			webkitBorderRadius : '100px'
		},250);
	});
	
	// CLICK USERNAME
	$('.user .info-user').click(function(){
		let menuUserDisplay = $('.user .info-user .menu-user').css('display');
		if(menuUserDisplay == 'none'){
			$(this).children('.menu-user').show()
			$(this).children('.username').css('background','#fa9fa4')
		}
		else{
			$(this).children('.menu-user').hide()
			$(this).children('.username').css('background','#8b5c7e')
		}
	})
	// DISPLAY SUBMENU
	$('.wrapper ul > li').click(function(e){
		
		let subMenuDisplay = $(this).children('.sub-menu').css('display');
		if(subMenuDisplay == 'none')
		{
			$(this).children('a').css('background','rgba(40, 40, 46, 0.28)')
			$(this).children('.sub-menu').slideDown(500)

		}
		else
		{
			if($(e.target).parent()[0] == $(this)[0])
			{
				$(this).children('a').css('background','none')
				$(this).children('.sub-menu').slideUp(500)
			}
		}
	})
	function clickTaget(){
		$('body').click(function(event){
			console.log($(event.target))
		})
	}
	//clickTaget();
	// Show sideBar
	$('.show-sidebar').click(function(){
		let fixMarginLeft = parseInt($('.side-bar').css('marginLeft'))
		let widthBody = '-' + parseInt($('body').css('width'))/2 + 'px';
		if($('.side-bar').css('marginLeft') == widthBody)
		{
			$('.side-bar').animate({
				marginLeft : '+=50%'
			},250)
		}
		else
		{
			$('.side-bar').animate({
				marginLeft : '-50%'
			},250)	
		}
	})
	//Fix Side-bar
	
	$('#table-main').DataTable();
	// $('.side-bar').niceScroll({
	// 	cursorcolor: "#1FB5AD",
 //        cursorborder: "0px solid #fff",
 //        cursorborderradius: "0px",
 //        cursorwidth: "3px"
	// })
	// $('.main').niceScroll({
	// 	cursorcolor: "#333",
 //        cursorborder: "0px solid #fff",
 //        cursorborderradius: "0px",
 //        cursorwidth: "3px"
	// })
	
	// SUCCESS POPUP
	if($('.popup-success').css('display') == 'block')
	{
		setTimeout(function(){
			$('.popup-success').fadeOut(2000);
		},2000)
		
	}
})