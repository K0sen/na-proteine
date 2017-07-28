$(document).ready(function() {

	var logo1 = $("#logo1, #logo_fix1").find("img");
	var logo2 = $("#logo2, #logo_fix2").find("img");
	var logo3 = $("#logo3, #logo_fix3").find("img");

	function logo() {
		logo3.fadeOut(2000);
		setTimeout(function(){ logo2.fadeOut(2000); }, 2000);
		setTimeout(function(){ logo2.fadeIn(2000); }, 4000);
		setTimeout(function(){ logo3.fadeIn(2000); }, 6000);
	}
	logo();
	setInterval(logo, 8000);

	$('.active').find('.brandname').show();

	$(".arrow").click(function(){
		$(this).next('div').slideToggle('slow');
		$(this).parent().siblings().find('.brandname').slideUp('slow');
		$(this).parent().siblings('li').removeClass('active');
		$(this).parent().toggleClass('active');
	});

	$(document).click(function (e) {
		var menu = $('.collapse');
		var target = $( event.target );
		//alert(e.pageY + ' , ' + e.pageX);
		if ( !target.is('.collapse')  ) {
			menu[0].className = 'collapse';
			if (menu[1]) {
				menu[1].className = 'collapse';
			}
		}
	});

	window.onscroll = function () {
		//if(jQuery.fx.off) {
		//	jQuery.fx.off = false;
		//} else {
		//	jQuery.fx.off = true;
		//}
		var h_fix = $('#header_fix');
		h_fix['slide'+ (window.pageYOffset > 160 ? 'Down': 'Up')](150);
		var menu_fix = document.getElementsByClassName('collapse');
		menu_fix[0].className = 'collapse';
		menu_fix[1].className = 'collapse';
		if(window.pageYOffset > 160) {
			$(".stick-menu").css('position', 'fixed').css('top', '110px');
			$("#basket-info").css('position', 'fixed').css('left', ($(window).width()/2 - 100)).css('top', '80px');
		} else {
			$(".stick-menu").css('position', 'absolute').css('top', '153px');
			$("#basket-info").css('position', 'relative').css('left', 0).css('top', 0);
		}
	};
	if(window.pageYOffset > 160) {
		$('#header_fix').slideDown(150);
	}

	$('.stick-but').click(function(){
		$(".stick-arrow").toggleClass('active');
		$(".stick-group").toggle(800);
	});

	//$('.stick-but').hover(function(){
	//	$(this)
	//})

	$('.stick-bottom').hover(function(){
		$(this).find('.stick-triangle').css('borderTopColor', '#13c30a');
		$(this).parent('.active').find('.stick-triangle').css('borderBottomColor', '#13c30a');
	}, function(){
		$(this).find('.stick-triangle').css("borderTopColor", "#e7e7e7");
		$(this).parent('.active').find('.stick-triangle').css('borderBottomColor', '#e7e7e7');
	}).click(function(){
		$(this).prev('div').slideToggle('slow');
		$(this).parent().siblings().find('.brandname').slideUp('slow');
		$(this).parent().siblings('li').removeClass('active');
		$(this).parent().toggleClass('active');
	});

	var __GET_PARAMS = window.location.search.replace('?','').split('&').reduce(
		function(p,e){
			var a = e.split('=');
			p[ decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
			return p;
		},
		{}); // GET params in object

	cartCount();
	addOrCart();

	$('.basket__add').click(basketAddAnimation);

	//FOR SINGLE PRODUCT
	$('.cartAdd').click(addToCart);
	if(__GET_PARAMS.show == 'comments'){
		$('#text-characteristic').hide();
		$('#text-replies').show();
	}
	$('.characteristic').click(function(){
		$('#text-characteristic').show();
		$('#text-replies').hide();
	});
	$('.replies').click(function(){
		$('#text-characteristic').hide();
		$('#text-replies').show();
	});

	//FUNCTIONS

	function idInCookies() {
		var cook = Cookies.get('product_id');
		if (cook) {
			var array = cook.split(', ');
			var href = window.location.href.split('/');
			var id = href[href.length - 1];
			var verify = false;

			for (var i = 0; i < array.length; i++) {
				if (array[i] == id) {
					verify = true;
				}
			}

			return verify;
		} else {
			return false;
		}

	}

	function addOrCart() {
		if (idInCookies()){
			$('.cartAdd').hide();
			$('.toCart').show();
		} else {
			$('.cartAdd').show();
		}
	}

	function cartCountText(length){
		length = String(length);
		var lastNumb = length.slice(-1);
		var ending = '';
		if (lastNumb == 2 || lastNumb == 3 || lastNumb == 4) {
			ending = 'а';
		} else if(lastNumb == 5 || lastNumb == 6 || lastNumb == 7 || lastNumb == 8 || lastNumb == 9 || lastNumb == 0){
			ending = 'ов';
		}
		return length + ' товар' + ending + ' в корзине';
	}

	function cartCount() {
		var cook = Cookies.get('product_id');
		if (cook) {
			var array = cook.split(', ');
			var bc = $('#basket-count');
			var bi = $('#basket-info');
			var shadow = 'black 0 0 1px, black 0 0 2px, black 0 0 3px, black 0 0 4px, black 0 0 5px, black 0 0 6px';
			var boldShadow = shadow + ', black 0 0 8px, black 0 0 9px, black 0 0 10px, black 0 0 11px, black 0 0 12px, black 0 0 13px';
			bi.show();
			bi.css('boxShadow', '0 0 20px #000');
			bi.hover(function () {
				bc.css('textShadow', boldShadow);
				bi.find('a').css('text-decoration', 'none');
			}, function() {
				bc.css('textShadow', shadow);
			});
			bc.text(cartCountText(array.length));
			bc.show();
			bi.css('boxShadow', '0 0 20px #000');
			bc.css('textShadow', boldShadow);
			setTimeout(function() {
				bc.css('textShadow', shadow);
			}, 2000);
		} else {
			$('#basket-info').hide();
		}
	}

	function addToCart(){
		var cook = Cookies.get('product_id');
		var href = window.location.href.split('/');
		var id = href[href.length - 1];

		if(cook) {
			var ids = Cookies.get('product_id') + ', ' + id;
			Cookies.set('product_id', ids);
		} else {
			Cookies.set('product_id', id);
		}
		$(this).before("<span class='infoCart infoRed'>Add to cart</span>");
		setTimeout(function(){ $('.infoCart').fadeOut(500); }, 2000);

		cartCount();
		addOrCart();
	}

	function basketAddAnimation() {
		var id = $(this).parents('.information').find('.hidden_id').val();
		var cook = Cookies.get('product_id');

		if (cook) {
			var s = cook.split(', ');
			var verify = true;
			for(var i = 0; i < s.length; i++) {
				if(s[i] == id){
					verify = false;
				}
			}
			if (verify) {
				var ids = Cookies.get('product_id') + ', ' + id;
				Cookies.set('product_id', ids);
				$('#basket-count').hide();
				$('#basket-info').css('boxShadow', 'none');
				$('#telejka').show(400, cartAnimation(id));
				$(this).before("<span class='infoCart infoRed'>Add to cart</span>");
				setTimeout(function(){ $('.infoCart').fadeOut(500); }, 2000);
			} else {
				$(this).before("<span class='infoCart'>Already in cart</span>");
				setTimeout(function(){ $('.infoCart').fadeOut(500); }, 2000);
			}
		} else {
			$('#basket-info').show();
			Cookies.set('product_id', id);
			$('#basket-count').hide();
			$('#telejka').show(400, cartAnimation(id));
		}
	}

	function cartAnimation(id){
		var img = $("input[value='" + id + "']").parents('.information').find('img');

		$('.basket').unbind('click');
		imagePosition = img.offset(); // получаем позицию изображения
		cartPosition = $('#basket-info').offset(); // получаем позицию корзины

		$('body').prepend('<div id="imageToCart"><img src="'+ img.attr('src') +'" class="clone"><img src="../img/hand.png" class="hand" ></div>'); // вставляем картинку в самом низу страницы
		// моментально накладываем нашу новую картинку поверх существующей
		$('#imageToCart .clone').css({
			'position': 'absolute',
			'z-index': '7',
			'left': imagePosition.left,
			'top': imagePosition.top,
			'width': img.width() + 10,
			'height': img.height() + 10
		});

		$('#imageToCart .hand').css({
			'position': 'absolute',
			'z-index': '7',
			'left': imagePosition.left - 300,
			'top': imagePosition.top - 300,
			'width': 50,
			'height': 50
		});

		$('#imageToCart .hand').animate({'left': imagePosition.left + 30, 'top': imagePosition.top + 50}, 1000, function() {
			$('.hand').attr('src', '../img/hand_1.png');

			$('#imageToCart .hand').animate({
				top: cartPosition.top,
				left: cartPosition.left + 60,
				opacity: '0',
				width: 50 / 3,
				height: 50 / 3
			}, 1000);

			// поехала анимация в направлении корзины
			$('#imageToCart .clone').animate({
				top: cartPosition.top,
				left: cartPosition.left + 50,
				opacity: '0',
				width: img.width() / 3,
				height: img.height() / 3
			}, 1000, function() {
				$('#imageToCart').remove();
				$('#telejka').hide(800, function(){
					$('.basket').bind('click', basketAddAnimation);
					cartCount();
				});
			});
		});
	}

	function awaw() {
		$('.owl-carousel').owlCarousel({
			loop : false,
			nav  : true,
			autoplay : true,
			rewind   : true,			// Go backwards when the boundary has reached.
			autoplayTimeout : 7000,	    // def: 5000
			autoplayHoverPause : true,  // customize
			responsive : {
				0 : {
					items : 1
				},
				450 : {
					items : 2
				},
				600 : {
					items : 3
				},
				1200 : {
					items : 4
				}
			}
		});

		$('#bicepscurl').css('display', 'none');
		$('.information-title').css('display', 'block');
	}
	setTimeout(awaw, 2000);

});


