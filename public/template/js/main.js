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
		$('.slide-wrapper').delegate('.nextImg', 'click',nextImg);
		function nextImg(){
			var windowWidth = $(window).width()
			if(windowWidth>1199){
				var status = $('.next').attr('status')
				var lwidth,lheight,lmargin_top,lleft,lindex
				var mwidth,mheight,mmargin_top,mleft,mindex
				var rwidth,rheight,rmargin_top,rleft,rindex

				if(status == 1){
					lwidth = '220px'
					lheight = '280px'
					lmargin_top = '10px'
					lleft = '500px'
					lindex = 8
					mwidth = '220px'
					mheight = '280px'
					mmargin_top = '10px'
					mleft = '100px'
					mindex = 8
					rwidth = '240px'
					rheight = '300px'
					rmargin_top = '0px'
					rleft = '300px'
					rindex = 9
					$('.next').attr('status', '2');
					$('#left').attr('class', 'slide-item nextImg');
					$('#midd').attr('class', 'slide-item prevImg');
					$('#right').attr('class', 'slide-item');
				}else if(status == 2){
					lwidth = '240px'
					lheight = '300px'
					lmargin_top = '00px'
					lleft = '300px'
					lindex = 9
					mwidth = '220px'
					mheight = '280px'
					mmargin_top = '10px'
					mleft = '500px'
					mindex = 8
					rwidth = '220px'
					rheight = '280px'
					rmargin_top = '10px'
					rleft = '100px'
					rindex = 8
					$('.next').attr('status', '3');
					$('#left').attr('class', 'slide-item');
					$('#midd').attr('class', 'slide-item nextImg');
					$('#right').attr('class', 'slide-item prevImg');
				}else if(status == 3){
					lwidth = '220px'
					lheight = '280px'
					lmargin_top = '10px'
					lleft = '100px'
					lindex = 8
					mwidth = '240px'
					mheight = '300px'
					mmargin_top = '0px'
					mleft = '300px'
					mindex = 9
					rwidth = '220px'
					rheight = '280px'
					rmargin_top = '10px'
					rleft = '500px'
					rindex = 8
					$('.next').attr('status', '1');
					$('#left').attr('class', 'slide-item prevImg');
					$('#midd').attr('class', 'slide-item');
					$('#right').attr('class', 'slide-item nextImg');
				}
				$("#right").animate({'width':rwidth,'height':rheight,'margin-top':rmargin_top,'left':rleft,'z-index':rindex}, 300)
				$("#left").animate({'width':lwidth,'height':lheight,'margin-top':lmargin_top,'left':lleft,'z-index':lindex}, 300)
				$("#midd").animate({'width':mwidth,'height':mheight,'margin-top':mmargin_top,'left':mleft,'z-index':mindex}, 300)
			}else{
				var src1 = $('#left').find('img').attr('src')
				var src2 = $('#midd').find('img').attr('src')
				var src3 = $('#right').find('img').attr('src')
				$('#left').find('img').attr('src',src2)
				$('#midd').find('img').attr('src',src3)
				$('#right').find('img').attr('src',src1)
			}
		}
		//向上
		var prev = $(".prev")
		prev.click(prevImg)
		$('.slide-wrapper').delegate('.prevImg', 'click',prevImg);
		function prevImg(){
			var windowWidth = $(window).width()
			if(windowWidth>1199){
				var status = $('.next').attr('status')
				var lwidth,lheight,lmargin_top,lleft,lindex
				var mwidth,mheight,mmargin_top,mleft,mindex
				var rwidth,rheight,rmargin_top,rleft,rindex
				if(status == 1){
					lwidth = '240px'
					lheight = '300px'
					lmargin_top = '0px'
					lleft = '300px'
					lindex = 9
					mwidth = '220px'
					mheight = '280px'
					mmargin_top = '10px'
					mleft = '500px'
					mindex = 8
					rwidth = '220px'
					rheight = '280px'
					rmargin_top = '10px'
					rleft = '100px'
					rindex = 8
					$('.next').attr('status', '2');
					$('#left').attr('class', 'slide-item');
					$('#midd').attr('class', 'slide-item nextImg');
					$('#right').attr('class', 'slide-item prevImg');
				}else if(status == 2){
					lwidth = '220px'
					lheight = '280px'
					lmargin_top = '10px'
					lleft = '500px'
					lindex = 8
					mwidth = '220px'
					mheight = '280px'
					mmargin_top = '10px'
					mleft = '100px'
					mindex = 8
					rwidth = '240px'
					rheight = '300px'
					rmargin_top = '0px'
					rleft = '300px'
					rindex = 9
					$('.next').attr('status', '3');
					$('#left').attr('class', 'slide-item nextImg');
					$('#midd').attr('class', 'slide-item prevImg');
					$('#right').attr('class', 'slide-item');
				}else if(status == 3){
					lwidth = '220px'
					lheight = '280px'
					lmargin_top = '10px'
					lleft = '100px'
					lindex = 8
					mwidth = '240px'
					mheight = '300px'
					mmargin_top = '0px'
					mleft = '300px'
					mindex = 9
					rwidth = '220px'
					rheight = '280px'
					rmargin_top = '10px'
					rleft = '500px'
					rindex = 8
					$('.next').attr('status', '1');
					$('#left').attr('class', 'slide-item prevImg');
					$('#midd').attr('class', 'slide-item');
					$('#right').attr('class', 'slide-item nextImg');
				}
				$("#right").animate({'width':rwidth,'height':rheight,'margin-top':rmargin_top,'left':rleft,'z-index':rindex}, 300)
				$("#left").animate({'width':lwidth,'height':lheight,'margin-top':lmargin_top,'left':lleft,'z-index':lindex}, 300)
				$("#midd").animate({'width':mwidth,'height':mheight,'margin-top':mmargin_top,'left':mleft,'z-index':mindex}, 300)
			}else{
				var src1 = $('#left').find('img').attr('src')
				var src2 = $('#midd').find('img').attr('src')
				var src3 = $('#right').find('img').attr('src')
				$('#left').find('img').attr('src',src3)
				$('#midd').find('img').attr('src',src1)
				$('#right').find('img').attr('src',src2)
			}
		}
	}
	slide()
});