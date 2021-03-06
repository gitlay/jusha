<?php /*a:1:{s:55:"/www/wwwroot/jusha/application/home/view/cars_list.html";i:1548128028;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport"   content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<title><?php echo isset($info['title']) ? htmlentities($info['title']) : ($title ? $title : $sys['title']); ?></title>
		<meta name="keywords" content="<?php echo isset($info['keywords']) ? htmlentities($info['keywords']) : ($keywords ? $keywords : $sys['key']); ?>"/>
		<meta name="description" content="<?php echo isset($info['description']) ? htmlentities($info['description']) : ($description ? $description : $sys['des']); ?>"/>
		<link rel="stylesheet" type="text/css" href="/template/lib/mui.min.css"/>
		<link rel="stylesheet" type="text/css" href="/template/lib/swiper-3.4.2.min.css"/>
		<link rel="stylesheet" type="text/css" href="/template/lib/certify.css"/>
		<script type="text/javascript" src="/template/lib/jquery.min.js"></script>
		<script type="text/javascript" src="/template/lib/swiper-3.4.2.jquery.min.js"></script>
		<script type="text/javascript" src="/template/lib/vue.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/template/css/index.css"/>
	</head>
	<body>
		<div class="body">
			<div class="info ">
				<!---->
				<div class="brand ">
					<img @click="toggleNav" src="/template/img/brand.png"/>
					<ul class="brand-nav" v-show="navShow">
						<div class="triangle_border_up">
							<span></span>
						</div>
						<li><a href="/">首页</a></li>
						<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li><a href="<?php echo url('home/'.$vo['catdir'].'/index',['catId'=>$vo['id']] ); ?>"><?php echo htmlentities($vo['catname']); ?></a></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<!--中间汽车-->
				<div class="car-box">
					<img class="car" v-if="activeCar" :src="activeCar.bg"/>
				</div>
				<!--左侧标签-->
				<div class="left-tags">
					<div class="tag-box">
						<!--车辆名称-->
						<!--<div class="tag ">
							<div class="tin" >{{activeCar.name}}</div>
						    <span class="triangle_border_right"></span>
						</div>-->
						<div class="tag black">
							<div class="tin" >{{activeCar.title}}</div>
						    <span class="triangle_border_right"></span>
						</div>
						<!--油电-->
						<div class="tag dark mshort" v-if="activeCar&&activeCar.type=='油电混动'">
							<div class="tin" >{{activeCar.type}}</div>
						    <span class="triangle_border_right"></span>
						</div>
						<!--插电-->
						<div class="tag chadian mshort" v-if="activeCar&&activeCar.type=='插电式混合'">
							<div class="tin" >{{activeCar.type}}</div>
						    <span class="triangle_border_right"></span>
						</div>
						<!--纯电动-->
						<div class="tag chundian mshort" v-if="activeCar&&activeCar.type=='纯电动'">
							<div class="tin" >{{activeCar.type}}</div>
						    <span class="triangle_border_right"></span>
						</div>
						<!--油气混动-->
						<div class="tag youqi mshort" v-if="activeCar&&activeCar.type=='油气混动'">
							<div class="tin" >{{activeCar.type}}</div>
						    <span class="triangle_border_right"></span>
						</div>
						<div class="tag normal xshort" v-if="activeCar&&activeCar.tag=='优享'">
							<div class="tin" >{{activeCar.tag}}</div>
							<!--<div class="tin" v-if="activeCar&&activeCar.tag=='快车'">{{activeCar.tag}}</div>-->
						    <span class="triangle_border_right"></span>
						</div>
						<div class="tag kc xshort" v-if="activeCar&&activeCar.tag=='快车'">
							<div class="tin" >{{activeCar.tag}}</div>
						    <span class="triangle_border_right"></span>
						</div>
						<!--<div class="tag dark">
							<div class="tin">油电混合</div>
						    <span class="triangle_border_right"></span>
						</div>-->
						<!--<div class="triangle_border_right">
						    <span></span>
						</div>-->
					</div>
				</div>
				<!--右侧导航-->
				<div class="right-nav">
					<div class="nav-item" :class="{active:activeIndex==0}" @click="fixShow(0)">车辆细节</div>
					<div class="nav-item" :class="{active:activeIndex==1}" @click="fixShow(1)">车辆参数</div>
					<div class="nav-item" :class="{active:activeIndex==2}" @click="fixShow(2)">运营分析</div>
					<div class="nav-item" :class="{active:activeIndex==3}" @click="fixShow(3)">加入我们</div>
				</div>

				<!--底部轮播-->
				<div class="cars-swiper" id="certify">
					<div class="swiper-container">
						<div class="swiper-wrapper">
							<div class="swiper-slide"  :style="{background:item.bgimg}" v-for="(item,index) in cars">
								<img :src="item.simg" />
							    <p class="name">{{item.title}}</p>
							    <p class="desc">{{item.ys}}</p>
							</div>
						</div>
					</div>
					<div class="swiper-button-prev" ></div>
					<div class="swiper-button-next" ></div>
				</div>
				<div class="bottom">
					<div class="link-wrap">
						<div class="link-box">
							<ul class="logo-wrap">
								<div class="logo-box">
									<img src="<?php echo htmlentities($sys['logoa']); ?>" onclick="bottom_logo()"  style="cursor:pointer">
								</div>
							</ul>
                            <script>
                            function bottom_logo(){
                                window.location.href="/";
                            }
               
            				  </script>
							<ul class="intro">
								<li><a href="/about-2.html" class="title">公司简介</a></li>

							</ul>
							<ul class="intro">
								<li class="line"></li>
							</ul>
							<ul class="intro">
								<li><a class="title" href="/home/trade/index/catId/46.html#a">行业动态</a></li>
								<li><a  href="/home/trade/index/catId/46.html#a">政策</a></li>
								<li><a  href="/home/trade/index/catId/46.html#b">证照相关</a></li>
								<li><a  href="/home/trade/index/catId/46.html#c">合规公司优势</a></li>
							</ul>
							<ul class="intro">
								<li class="line"></li>
							</ul>
							<ul class="intro">
								<li><a class="title" href="/home/car/index/catId/55.html">公司优势</a></li>
								<li><a href="/home/car/index/catId/55.html">岗前培训</a></li>
								<li><a href="/home/car/index/catId/55.html">运营分析</a></li>
								<li><a href="/home/car/index/catId/55.html">专人对接</a></li>
								<li><a href="/home/car/index/catId/55.html">车辆保证</a></li>
							</ul>
							<ul class="intro">
								<li class="line"></li>
							</ul>
							<ul class="intro">
								<li><a class="title" href="/home/join/index/catId/53.html">加入我们</a></li>
								<li><a href="/home/join/index/catId/53.html">报名入口</a></li>
								<li><a href="/home/join/index/catId/53.html">公司地址</a></li>
								<li><a href="/home/join/index/catId/53.html">联系方式</a></li>
							</ul>
							<ul class="intro">
								<li class="line"></li>
							</ul>
							<ul class="qrcode">
								<img src="<?php echo htmlentities($sys['qrcode']); ?>">
								<p style="margin-top: 10px;">扫描二维码关注微信公众号</p>
							</ul>
						</div>
					</div>
					<div class="copyright">
						<?php echo htmlentities($sys['copyright']); ?> <?php echo htmlentities($sys['bah']); ?>
					</div>
				</div>
			</div>

			<!--弹窗-->
			<div class="fixed-wrap" v-cloak v-show="introShow">
				<div class="fixed-container">
					<!--车辆细节-->
				    <div class="fixed-swipper">
				    	    <div class="cancel-box" @click="cancel"><img src="/template/img/cancel2.jpg"/></div>
				        <div class="swiper-container fixed-swipper-box">
							<div class="swiper-wrapper">
								<div class="swiper-slide" v-for="(item,index) in bSwipers" :key="index">
									<div class="title">
										<div class="t">
											<div class="left"></div>
											{{item.title}}
											<div class="right"></div>
										</div>
									</div>
									<!--:data-src="item.img"-->
									<img class="swiper-lazy" :src="item.img"  />
								</div>
								<!--<div class="swiper-slide">
									<div class="title">
										<div class="t">
											<div class="left"></div>
											大中控2
											<div class="right"></div>
										</div>
									</div>
									<img src="img/zk.png" />
								</div>-->
							</div>
						</div>
						<div class=" pbtn prev "></div>
						<div class=" pbtn next "></div>
				    </div>

				</div>
			</div>
			 <!--车辆参数-->
		    <div class="param-container" v-cloak v-if="paramShow && activeCar">
		    	    <div class="param-wrap">
		    	    	    <div class="param-title">车辆参数
		    	    	      <img class="imgcancel" @click="paramHide" src="/template/img/cancel2.jpg"/>
		    	    	    </div>
		    	    	    <div class="param-box">
		    	    	       <div class="param-left">
		    	    	       	 <div class="param-item">
		    	    	       	   <div class="name">裸车价</div>
		    	    	       	   <div class="num">{{activeCar.price}}万</div>
		    	    	       	 </div>
		    	    	       	 <div class="param-item">
		    	    	       	   <div class="name">能源类型</div>
		    	    	       	   <div class="num">{{activeCar.type}}</div>
		    	    	       	 </div>
		    	    	       	 <div class="param-item">
		    	    	       	   <div class="name">最大功率(KW)</div>
		    	    	       	   <div class="num">{{activeCar.maxKw}}</div>
		    	    	       	 </div>
		    	    	       	 <div class="param-item">
		    	    	       	   <div class="name">最大扭矩(N*M)</div>
		    	    	       	   <div class="num">{{activeCar.maxNm}}</div>
		    	    	       	 </div>
		    	    	       	 <div class="param-item">
		    	    	       	   <div class="name">发动机</div>
		    	    	       	   <div class="num">{{activeCar.engine}}</div>
		    	    	       	 </div>
		    	    	       	 <div class="param-item">
		    	    	       	   <div class="name">变速箱</div>
		    	    	       	   <div class="num">{{activeCar.bsx}}</div>
		    	    	       	 </div>
		    	    	       	 <div class="param-item">
		    	    	       	   <div class="name">长*宽*高(MM)</div>
		    	    	       	   <div class="num">{{activeCar.size}}</div>
		    	    	       	 </div>
		    	    	       	 <div class="param-item">
		    	    	       	   <div class="name">工信部综合油耗(L/100KM)</div>
		    	    	       	   <div class="num">{{activeCar.zhyh}}</div>
		    	    	       	 </div>
		    	    	       <div class="middle-line"></div>

		    	    	       </div>

		    	    	       <div class="param-right">
		    	    	       	 <div class="param-item">
		    	    	       	    <div class="name">整车质保</div>
		    	    	       	    <div class="num">{{activeCar.zb}}</div>
		    	    	       	  </div>
		    	    	       	  <div class="param-item">
		    	    	       	    <div class="name">轴距(MM)</div>
		    	    	       	    <div class="num">{{activeCar.zj}}</div>
		    	    	       	  </div>
		    	    	       	  <div class="param-item">
		    	    	       	    <div class="name">{{activeCar.riTitle}}</div>
		    	    	       	    <div class="num">{{activeCar.rj}}</div>
		    	    	       	  </div>
		    	    	       	  <div class="param-item">
		    	    	       	    <div class="name">电池类型</div>
		    	    	       	    <div class="num">{{activeCar.dc}}</div>
		    	    	       	  </div>
		    	    	       	  <div class="param-item">
		    	    	       	    <div class="name">工信部续航里程(KM)</div>
		    	    	       	    <div class="num">{{activeCar.lc}}</div>
		    	    	       	  </div>
		    	    	       	  <!-- <div class="param-item">
		    	    	       	    <div class="name">动力成本</div>
		    	    	       	    <div class="num">{{activeCar.dlcb}}</div>
		    	    	       	  </div>
		    	    	       	  <div class="param-item">
		    	    	       	    <div class="name">保养成本</div>
		    	    	       	    <div class="num">{{activeCar.bycb}}</div>
		    	    	       	  </div> -->
		    	    	       </div>
		    	    	    </div>
		    	    </div>
		    </div>

			<!--运营分析-->
			<div class="yunying" v-cloak v-if="yunyingShow && activeCar">
				<div class="yunying-box">
					<div class="yunying-title" style="padding-left: 19px;">运营分析
		    	    	      <img class="imgcancel" @click="yunyingHide" src="/template/img/cancel2.jpg"/>
					</div>
					<div class="y-line"></div>
					<div class="cbbox">
						<div class="item">动力成本：{{activeCar.dlcb}}</div>
					    <div class="item">保养成本：{{activeCar.bycb}}</div>
					</div>
					<div>优势：{{activeCar.ys}}。劣势：{{activeCar.ls}}</div>
				    <div style="margin-top: 26px;">推荐指数</div>
					<div class="y-line"></div>
				    <div class="star-wrap">
				      	<div class="star-box">
					    		<div class="star1">
					    	   	  <span>外观</span>
					    	   	  <!--{{fullSt}} {{halfSt}} {{nullSt}}
					    	   	  {{Math.floor(this.cars[this.currentIndex].wg)}}-->
					    	   	  <img v-for="(item,index) in fullS(activeCar.wgS)" src="/template/img/full.png"/>
					    	   	  <!--<img src="img/star-full.png"/>
					    	   	  <img src="img/star-full.png"/>-->
					    	   	  <img v-for="(item,index) in halfS(activeCar.wgS)" src="/template/img/half.png"/>
					    	   	  <img v-for="(item,index) in nullS(activeCar.wgS)" src="/template/img/star.png"/>
					    	   </div>
					    	   <div class="star2">
					    	   	  <span>成本</span>
					    	   	  <img v-for="(item,index) in fullS(activeCar.cbS)" src="/template/img/full.png"/>
					    	   	  <!--<img src="img/star-full.png"/>
					    	   	  <img src="img/star-full.png"/>-->
					    	   	  <img v-for="(item,index) in halfS(activeCar.cbS)" src="/template/img/half.png"/>
					    	   	  <img v-for="(item,index) in nullS(activeCar.cbS)" src="/template/img/star.png"/>
					    	   </div>
				    	    </div>

				    	   <div class="star-box">
					    		<div class="star1">
					    	   	  <span>动力</span>
					    	   	  <img v-for="(item,index) in fullS(activeCar.dlS)" src="/template/img/full.png"/>
					    	   	  <!--<img src="img/star-full.png"/>
					    	   	  <img src="img/star-full.png"/>-->
					    	   	  <img v-for="(item,index) in halfS(activeCar.dlS)" src="/template/img/half.png"/>
					    	   	  <img v-for="(item,index) in nullS(activeCar.dlS)" src="/template/img/star.png"/>
					    	   </div>
					    	   <div class="star2">
					    	   	  <span>质保</span>
					    	   	  <img v-for="(item,index) in fullS(activeCar.zbS)" src="/template/img/full.png"/>
					    	   	  <!--<img src="img/star-full.png"/>
					    	   	  <img src="img/star-full.png"/>-->
					    	   	  <img v-for="(item,index) in halfS(activeCar.zbS)" src="/template/img/half.png"/>
					    	   	  <img v-for="(item,index) in nullS(activeCar.zbS)" src="/template/img/star.png"/>
					    	   </div>
				    	    </div>
				    </div>
				</div>
			</div>
		</div>



	</body>
</html>



<script>
    var app = new Vue({
        el:'.body',
        data:{
            introShow:false,//介绍
            navShow:false,
            activeIndex:-1,
            paramShow:false,//参数
            yunyingShow:false,//运营分析
            cars:<?php echo json_encode($cars); ?>,
            currentIndex:0,
            initNewSwiperFlag:false,
            progress:false,
            newSwiper:'',
            bSwipers:[]
        },
        computed:{
            activeCar(){
                return this.cars[this.currentIndex]
            },
            fullSt(){
                return Math.floor(this.cars[this.currentIndex].wg)
            },
            halfSt(){
                return Math.ceil(this.cars[this.currentIndex].wg) - Math.floor(this.cars[this.currentIndex].wg)
            },
            nullSt(){
                return 5-Math.ceil(this.cars[this.currentIndex].wg)
            }
        },
        methods:{
            toggleNav:function(){
                this.navShow = !this.navShow
            },
            carbg:function(item){
                console.log(item.type)
                if(item.type=="油电混动"){
                    return '/template/img/3-1.png'
                }else if(item.type=="油气混动"){
                    return '/template/img/3-2.png'
                }else if(item.type=="插电混动"){
                    return '/template/img/3-4.png'
                }else if(item.type=="纯电动"){
                    return '/template/img/3-3.png'
                }
            },
            fixShow:function(i){
                this.activeIndex = i
                if(i==0){
                    this.introShow = true
                    this.paramShow = false
                    this.yunyingShow = false
                    this.bSwipers = this.cars[this.currentIndex].bimgs
                    initFixSwiper()

                }else if(i==1){
                    this.introShow = false
                    this.paramShow = true
                    this.yunyingShow = false
                }else if(i==2){
                    this.introShow = false
                    this.paramShow = false
                    this.yunyingShow = true
                }else if(i==3){
                    this.introShow = false
                    this.paramShow = false
                    this.yunyingShow = false
                    window.location.href="/home/join/index/catId/53.html";
                }

            },
            prevSlide:function(){
                this.currentIndex += 1
            },
            nextSlide:function(){
                this.currentIndex -= 1
            },
            cancel:function(){
                this.introShow = false
                this.activeIndex = -1
                this.bSwipers = []
            },
            yunyingHide:function(){
                this.yunyingShow = false
                this.activeIndex = -1
            },
            paramHide:function(){
                this.paramShow = false
                this.activeIndex = -1
            },
            fullS:function(num){
                return Math.floor(num)
            },
            halfS:function(num){
                return Math.ceil(num)-Math.floor(num)
            },
            nullS:function(num){
                return 5-Math.ceil(num)
            }
        },
        mounted:function(){
            var that = this
            this.$nextTick(function(){
//					initSwiper(that)
                initNewSwiper(that)
            })

        }
    })
    function initFixSwiper(){
        var fixedsSwiper = new Swiper('.fixed-swipper .fixed-swipper-box', {
//			watchSlidesProgress: true,
//			slidesPerView: 'auto',
            centeredSlides: true,
            slidesPerView : 1,
            loop: true,
            autoplay: false,
            prevButton: '.prev',
            nextButton: '.next',
            observer:true ,
            observeParents:true,
            lazyLoading : true,
        })
    }

    function initNewSwiper(that){

        that.newSwiper = new Swiper('.cars-swiper .swiper-container', {
            loop : true,
            pagination: '.swiper-pagination',
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            slidesPerView: 'auto',
            observer:true ,
            observeParents:true,
            coverflow: {
                rotate: 0,// 旋转的角度
                stretch: 15,// 拉伸   图片间左右的间距和密集度
                depth: 70,// 深度   切换图片间上下的间距和密集度
                modifier: 2,// 修正值 该值越大前面的效果越明显
                slideShadows : true// 页面阴影效果
            },
            watchSlidesProgress: true,
            watchSlidesVisibility : true,
            onProgress: function(swiper, progress) {
//					if($("body").width()>500)return
                if(that.initNewSwiperFlag){
                    that.initNewSwiperFlag = false
                    that.progress = true
                    that.currentIndex = 0
                    that.bSwipers = that.cars[that.currentIndex].bimgs
                    swiper.updateSlidesSize()
//						that.zeroInit = true
                    setTimeout(function(){
//							that.zeroInit = false
                        that.progress = false
                    },50)
                }
                if(that.zeroInit){
                    var length = that.cars.length
                    that.currentIndex = swiper.activeIndex % length
                    that.bSwipers = that.cars[that.currentIndex].bimgs
                    swiper.updateSlidesSize()
//						that.$set(that,'bSwipers',[])
//						that.$set(that,'bSwipers',that.cars[that.currentIndex].bimgs)
                    that.progress = true
                }
            },
            onSlideChangeStart: function(swiper){

            },
            onSlideChangeEnd: function(swiper){
                console.log(swiper.activeIndex);
                console.log('onSlideChangeEnd')
                that.progress = false
                var length = that.cars.length
                if(!that.zeroInit&&swiper.activeIndex % length>0)return
                that.currentIndex = swiper.activeIndex % length
                that.bSwipers = that.cars[that.currentIndex].bimgs
                swiper.updateSlidesSize()
            },
            onInit:function(swiper){
//					that.currentIndex = 0
                that.initNewSwiperFlag = true
                that.progress = false
                that.zeroInit = false
                setTimeout(function(){
                    that.zeroInit = true
                    that.currentIndex = 0
                    that.bSwipers = that.cars[that.currentIndex].bimgs
                },100)
            }
        });


    }


    function initSwiper(that){

        var certifySwiper = new Swiper('.cars-swiper .swiper-container', {
            initialSlide :0,
            watchSlidesProgress: true,
            slidesPerView: 2,
            centeredSlides: true,
            loop: true,
            loopedSlides: 3,
            autoplay: false,
            normalizeSlideIndex:false,
            prevButton: '.swiper-button-prev',
            nextButton: '.swiper-button-next',
            pagination: '.swiper-pagination',
            //paginationClickable :true,
            observer:true,
            observeParents:true,
            onProgress: function(swiper, progress) {
//				that.currentIndex = (swiper.activeIndex -3 ) % 6
//				that.currentIndex = swiper.activeIndex % 6 - 3
                for (i = 0; i < swiper.slides.length; i++) {
                    var slide = swiper.slides.eq(i);
                    var slideProgress = swiper.slides[i].progress;
                    modify = 1;
                    if (Math.abs(slideProgress) > 1) {
                        modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
                    }
                    translate = slideProgress * modify * 65 + 'px';
                    scale = 1 - Math.abs(slideProgress) / 5;
                    zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
                    slide.transform('translateX(' + translate + ') scale(' + scale + ')');
                    slide.css('zIndex', zIndex);
                    slide.css('opacity', 1);
                    if (Math.abs(slideProgress) > 3) {
                        slide.css('opacity', 0);
                    }
                }
//		    		that.currentIndex = (swiper.activeIndex -3 ) % 6
            },
            onInit:function(swiper){
                console.log(swiper.slides.length)
            },
            onSlideChangeEnd: function(swiper){
                var i = ''
                if(swiper.activeIndex == 2){
                    that.currentIndex = 5
                }else if(swiper.activeIndex == 9){
                    that.currentIndex = ( swiper.activeIndex - 3) % 6
                }else{
                    that.currentIndex = (Math.abs(swiper.activeIndex -3)) % 6
                }

//				that.currentIndex = (Math.abs(swiper.activeIndex -3)) % 6
                console.log(swiper.activeIndex,that.activeCar.name)
//		      that.currentIndex = swiper.activeIndex % 6
//0 吉利  1 卡罗拉  2.比亚迪 3.荣威 4.起亚 5.噢啦
// 3       4        5        6    7      8
// 9								 		2
//  3 4 5 0 1 2 3 4 5 0 1  2
//  0 1 2 3 4 5 6 7 8 9 10 11
            },
            onSlideNextEnd: function(swiper){
//		      	that.currentIndex = (swiper.activeIndex -3 ) % 6
            },
        });
    }





</script>