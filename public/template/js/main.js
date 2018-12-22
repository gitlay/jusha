$(document).ready(function() {
	function chooseCity() {
		var btn = $('#chooseBtn')
		btn.click(function() {
			var chooseBox = $('#city-choose')
			var status = btn.attr("status")
			if (status=="show") {
				chooseBox.slideDown(300);
				btn.attr('status','close')
			} else if(status == "close"){
				chooseBox.slideUp(300);
				btn.attr('status','show')
			}
		});
	}
	chooseCity()
	function cityList() {
		var cityList = $('.city-list')
		cityList.click(function() {
			var text = $(this).text()
			var btn = $('#chooseBtn')
			var chooseBox = $('#city-choose')
			chooseBox.slideUp(300);
			btn.attr('status','show')
			btn.text(text)
		})
	}
	cityList()
	function getPx() {
		var nav = $("#nav")
		nav.click(function() {
			var window_width = $(window).width()
			if (window_width<750) {
				mobile()
			}else if(window_width>751){
				pc_fun()
			}
		})
	}
	getPx()
	function mobile() {
		var nav_box = $("#nav-box")
		var list = $('#nav-box li')
		var nav = $('#nav')
		var status = nav.attr('status')
		console.log(status)
		if (status == 'show') {
			nav_box.animate({
				'display': 'block',
				'width': '60%'},
				300, function() {
					list.fadeIn(300)
					nav.attr('status', 'none');
			});
		}else if(status == 'none'){
			list.fadeOut(300, function() {
				nav_box.animate({
					'display': 'none',
					'width': '0px'},
					300, function() {
						nav.attr('status', 'show');
				})
			});
		}
	}
	function pc_fun(status) {
		var nav_box = $("#nav-box")
		var list = $('#nav-box li')
		var nav = $('#nav')
		var status = nav.attr('status')
		if (status == 'show') {
			nav_box.animate({
				'display': 'block',
				'width': '600px'},
				300, function() {
					list.fadeIn(300)
					nav.attr('status', 'none');
			});
		}else if(status == 'none'){
			list.fadeOut(300, function() {
				nav_box.animate({
					'display': 'none',
					'width': '0px'},
					300, function() {
						nav.attr('status', 'show');
				})
			});
		}
	}

	//切换TAB
	function tab() {
		var tab_nav_item = $('.tab-nav-item')
		tab_nav_item.click(function() {
			$(this).attr('id', 'selected').siblings('.tab-nav-item').attr('id', '');
			var index = tab_nav_item.index($(this))
			var window_item = $('.window-item')
			console.log(index)
			window_item.eq(index).attr('id', 'item-selected').siblings('.window-item').attr('id', '');
		});
	}
	tab()

	function slide(){
		//向下
		var next = $(".next")
		next.click(nextImg);
		var right = $("#right")
		right.click(nextImg);
		function nextImg(){
			var src1 = $('#left').find('img').attr('src')
			var src2 = $('#midd').find('img').attr('src')
			var src3 = $('#right').find('img').attr('src')
			$('#left').find('img').attr('src',src2)
			$('#midd').find('img').attr('src',src3)
			$('#right').find('img').attr('src',src1)
		}
		//向上
		var prev = $(".prev")
		prev.click(prevImg)
		var left = $("#left")
		left.click(prevImg)
		function prevImg(){
			var src1 = $('#left').find('img').attr('src')
			var src2 = $('#midd').find('img').attr('src')
			var src3 = $('#right').find('img').attr('src')
			$('#left').find('img').attr('src',src3)
			$('#midd').find('img').attr('src',src1)
			$('#right').find('img').attr('src',src2)
		}
	}
	slide()
});