<?php /*a:1:{s:55:"/www/wwwroot/jusha/application/home/view/cars_list.html";i:1545543491;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport"   content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<title></title>
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
									<img src="<?php echo htmlentities($sys['logoa']); ?>">
								</div>
							</ul>
							<ul class="intro">
								<li><a class="title">公司简介</a></li>
								<li><a >车型展示</a></li>
								<li><a >车辆细节</a></li>
								<li><a >车辆参数</a></li>
								<li><a >运营分析</a></li>
							</ul>
							<ul class="intro">
								<li class="line"></li>
							</ul>
							<ul class="intro">
								<li><a class="title">行业动态</a></li>
								<li><a >政策</a></li>
								<li><a >证照相关</a></li>
								<li><a >合规公司优势</a></li>
							</ul>
							<ul class="intro">
								<li class="line"></li>
							</ul>
							<ul class="intro">
								<li><a class="title">公司优势</a></li>
								<li><a >岗前培训</a></li>
								<li><a >运营分析</a></li>
								<li><a >专人对接</a></li>
								<li><a >车辆保证</a></li>
							</ul>
							<ul class="intro">
								<li class="line"></li>
							</ul>
							<ul class="intro">
								<li><a class="title">加入我们</a></li>
								<li><a >报名入口</a></li>
								<li><a >公司地址</a></li>
								<li><a >联系方式</a></li>
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
           /* cars:[

            <?php  $num = count($cars); if(is_array($cars) || $cars instanceof \think\Collection || $cars instanceof \think\Paginator): $i = 0; $__LIST__ = $cars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>

    {
        title:'<?php echo htmlentities($v['title']); ?>',
            tag:'<?php echo htmlentities($v['tag']); ?>',
        price:'<?php echo htmlentities($v['price']); ?>',
        type:'<?php echo htmlentities($v['type']); ?>',
        maxKw:'<?php echo htmlentities($v['maxKw']); ?>',
        maxNm:'<?php echo htmlentities($v['maxNm']); ?>',
        engine:'<?php echo htmlentities($v['engine']); ?>',
        bsx:'<?php echo htmlentities($v['bsx']); ?>',
        size:'<?php echo htmlentities($v['size']); ?>',
        zhyh:'<?php echo htmlentities($v['zhyh']); ?>',//综合油耗O
        zb:'<?php echo htmlentities($v['zb']); ?>',//质保
        zj:'<?php echo htmlentities($v['zj']); ?>',//轴距
        riTitle:'<?php echo htmlentities($v['riTitle']); ?>',
        rj:'<?php echo htmlentities($v['rj']); ?>',//容积
        dc:'<?php echo htmlentities($v['dc']); ?>',//电池
        lc:'<?php echo htmlentities($v['lc']); ?>',//里程
        dlcb:'<?php echo htmlentities($v['dlcb']); ?>',//动力成本
        bycb:'<?php echo htmlentities($v['bycb']); ?>',//保养成本
        ys:'<?php echo htmlentities($v['ys']); ?>',//优势
        ls:'<?php echo htmlentities($v['ls']); ?>',//劣势
        wgS:<?php echo htmlentities($v['wgS']); ?>,
        cbS:<?php echo htmlentities($v['cbS']); ?>,
        dlS:<?php echo htmlentities($v['dlS']); ?>,
        zbS:<?php echo htmlentities($v['zbS']); ?>,
        bgimg:'url("<?php echo htmlentities($v['bgimg']); ?>")',
            bg:'<?php echo htmlentities($v['bg']); ?>',
        simg:'<?php echo htmlentities($v['simg']); ?>',
        bimgs:[
    <?php  $n = count($v['bimgs']); if(is_array($v['bimgs']) || $v['bimgs'] instanceof \think\Collection || $v['bimgs'] instanceof \think\Paginator): $k = 0; $__LIST__ = $v['bimgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$o): $mod = ($k % 2 );++$k;?>
        { title:'<?php echo htmlentities($o['title']); ?>',img:'<?php echo htmlentities($o['img']); ?>' }
        <?php if($k != $n): ?>,<?php endif; ?>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        ]
        }
        <?php if($i != $num): ?>,<?php endif; ?>
            <?php endforeach; endif; else: echo "" ;endif; ?>


            ],*/
           /* cars:[
                {
                    title:'吉利帝豪EV450',
                    tag:'快车',
                    price:'13.58',
                    type:'纯电动',
                    maxKw:'120',
                    maxNm:'250',
                    engine:'--',
                    bsx:'单速',
                    size:'4631*1789*1495',
                    zhyh:'--',//综合油耗O
                    zb:'营运超长质保',//质保
                    zj:'2650',//轴距
                    riTitle:'电池容量（kWh）',
                    rj:'52',//容积
                    dc:'三元锂电池',//电池
                    lc:'400',//里程
                    dlcb:'百公里用电13度',//动力成本
                    bycb:'约0.01元/公里',//保养成本
                    ys:'可快充，免购置税，不限行，有一定的市场知名度，外观具有现代感，内饰相比同级别电车具备科技感与档次',//优势
                    ls:'充电需要快慢充交替进行',//劣势
                    wgS:3,
                    cbS:4,
                    dlS:5,
                    zbS:3,
                    bgimg:'url("img/3-3.png")',
                    bg:'carimg/jili.png',
                    simg:'carimg/jili-s.png',
                    bimgs:[
                        { title:'中控',img:'jiliImgs/01.png' },
                        { title:'天窗',img:'jiliImgs/02.png' },
                        { title:'轮胎',img:'jiliImgs/03.png' },
                        { title:'后备厢',img:'jiliImgs/04.png' },
                        { title:'发动机',img:'jiliImgs/05.png' },
                        { title:'车尾',img:'jiliImgs/06.png' },
                        { title:'车体分解图',img:'jiliImgs/07.png' },
                        { title:'车辆空间',img:'jiliImgs/08.png' },
                        { title:'安全气囊',img:'jiliImgs/09.png' }
                    ]
                },
                {
                    title:'卡罗拉双擎',
                    tag:'优享',
                    price:'14.18',
                    type:'油电混动',
                    maxKw:'--',
                    maxNm:'--',
                    engine:'1.8L 99马力 L4',
                    bsx:'无级变速',
                    size:'4630*1775*1485',
                    zhyh:'4.2',//综合油耗O
                    zb:'营运超长质保',//质保
                    zj:'2700',//轴距
                    riTitle:'油箱容积（L）',
                    rj:'45',//容积
                    dc:'镍氢电池',//电池
                    lc:'--',//里程
                    dlcb:'综合油耗百公里4.2L',//动力成本
                    bycb:'约0.1元/公里',//保养成本
                    ys:'市场占有率高，车辆保值，质量可靠，安全稳定，客户认可',//优势
                    ls:'保养成本高于新能源汽车，受限行管控',//劣势
                    wgS:4,
                    cbS:4,
                    dlS:3.5,
                    zbS:3.5,
                    bgimg:'url("img/3-1.png")',
                    bg:'carimg/kll.png',
                    simg:'carimg/kll-s.png',
                    bimgs:[
                        { title:'中控',img:'kll/01.png' },
                        { title:'天窗',img:'kll/02.png' },
                        { title:'轮胎',img:'kll/03.png' },
                        { title:'后备厢',img:'kll/04.png' },
                        { title:'发动机',img:'kll/05.png' },
                        { title:'大灯',img:'kll/06.png' },
                        { title:'车尾',img:'kll/07.png' },
                        { title:'安全气囊',img:'kll/08.png' }
                    ]
                },
                {
                    title:'比亚迪秦80',
                    tag:'快车',
                    price:'13.99',
                    type:'插电式混合',
                    maxKw:'217',
                    maxNm:'479',
                    engine:'1.5T 154马力 L4',
                    bsx:'6挡双离合',
                    size:'4740*1770*1480',
                    zhyh:'--',//综合油耗O
                    zb:'营运超长质保',//质保
                    zj:'2670',//轴距
                    riTitle:'油箱容积（L）',
                    rj:'39',//容积
                    dc:'三元锂电池',//电池
                    lc:'80',//里程
                    dlcb:'市区工况百公里4.7L',//动力成本
                    bycb:'约0.08元/公里',//保养成本
                    ys:'外观时尚，内饰新颖，原车自带倒车影像、雷达',//优势
                    ls:'不能快充，动力及保养成本介于纯电动车和传统燃油车之间',//劣势
                    wgS:4.5,
                    cbS:4,
                    dlS:4,
                    zbS:4.5,
                    bgimg:'url("img/3-2.png")',
                    bg:'carimg/qin.png',
                    simg:'carimg/qin-s.png',
                    bimgs:[
                        { title:'中控',img:'qin/01.png' },
                        { title:'尾灯',img:'qin/02.png' },
                        { title:'轮胎',img:'qin/03.png' },
                        { title:'加油口',img:'qin/04.png' },
                        { title:'发动机',img:'qin/05.png' },
                        { title:'充电口',img:'qin/06.png' },
                        { title:'车尾',img:'qin/07.png' }
                    ]
                },
                {
                    title:'荣威ei6',
                    tag:'优享',
                    price:'15.28',
                    type:'插电式混合',
                    maxKw:'168',
                    maxNm:'622',
                    engine:'1.0T 125马力 L3',
                    bsx:'2挡自动',
                    size:'4671*1835*1460',
                    zhyh:'4.9',//综合油耗O
                    zb:'营运超长质保',//质保
                    zj:'2715',//轴距
                    riTitle:'油箱容积（L）',
                    rj:'30',//容积
                    dc:'三元锂电池',//电池
                    lc:'53',//里程
                    dlcb:'百公里1.5L',//动力成本
                    bycb:'约0.07元/公里',//保养成本
                    ys:'外观时尚，免购置税，不受限行管控，比较受网约车司机青睐',//优势
                    ls:'动力及保养成本介于纯电动车和传统燃油车之间',//劣势
                    wgS:4,
                    cbS:4.5,
                    dlS:3.5,
                    zbS:3.5,
                    bgimg:'url("img/3-2.png")',
                    bg:'carimg/rw.png',
                    simg:'carimg/rw-s.png',
                    bimgs:[
                        { title:'中控',img:'rw/01.png' },
                        { title:'旋钮式换挡杆',img:'rw/02.png' },
                        { title:'前舱',img:'rw/03.png' },
                        { title:'轮胎',img:'rw/04.png' },
                        { title:'后排空间',img:'rw/05.png' },
                        { title:'后备厢',img:'rw/06.png' },
                        { title:'发动机',img:'rw/07.png' },
                        { title:'充电口',img:'rw/08.png' },
                        { title:'车尾',img:'rw/09.png' }
                    ]
                },
                {
                    title:'起亚K5',
                    tag:'优享',
                    price:'12.18',
                    type:'油气混动',
                    maxKw:'118',
                    maxNm:'193',
                    engine:'2.0L 161马力 L4',
                    bsx:'6挡手动',
                    size:'4855*1860*1475',
                    zhyh:'--',//综合油耗O
                    zb:'营运超长质保',//质保
                    zj:'2805',//轴距
                    riTitle:'油箱容积（L）',
                    rj:'60',//容积
                    dc:'--',//电池
                    lc:'--',//里程
                    dlcb:'用气百公里9.1立方米',//动力成本
                    bycb:'约0.07元/公里',//保养成本
                    ys:'车价低，空间大，客户认可度较高',//优势
                    ls:'手动挡，油气车后备厢空间小，受限行管控',//劣势
                    wgS:4.5,
                    cbS:4,
                    dlS:3.5,
                    zbS:3,
                    bgimg:'url("img/3-4.png")',
                    bg:'carimg/k5.png',
                    simg:'carimg/k5-s.png',
                    bimgs:[
                        { title:'中控',img:'k5/01.png' },
                        { title:'轮胎',img:'k5/02.png' },
                        { title:'后备厢',img:'k5/03.png' },
                        { title:'发动机',img:'k5/04.png' },
                        { title:'车尾',img:'k5/05.png' },
                    ]
                },
                {
                    title:'长城欧拉IQ',
                    tag:'快车',
                    price:'9.98',
                    type:'纯电动',
                    maxKw:'120',
                    maxNm:'280',
                    engine:'--',
                    bsx:'单速',
                    size:'4445*1735*1567',
                    zhyh:'--',//综合油耗O
                    zb:'营运超长质保',//质保
                    zj:'2615',//轴距
                    riTitle:'电池容量（kWh）',
                    rj:'47',//容积
                    dc:'三元锂电池',//电池
                    lc:'401',//里程
                    dlcb:'百公里用电13度',//动力成本
                    bycb:'约0.01元/公里',//保养成本
                    ys:'可快充，免购置税，不限行，车价较低，空间大，绿牌不限号，性价比高',//优势
                    ls:'充电需要快慢充交替进行',//劣势
                    wgS:2.5,
                    cbS:3.2,
                    dlS:5,
                    zbS:4,
                    bgimg:'url("img/3-3.png")',
                    bg:'carimg/ola.png',
                    simg:'carimg/ola-s.png',
                    bimgs:[
                        { title:'中控',img:'ola/01.png' },
                        { title:'尾灯',img:'ola/02.png' },
                        { title:'轮胎',img:'ola/03.png' },
                        { title:'后备厢',img:'ola/04.png' },
                        { title:'发动机',img:'ola/05.png' },
                        { title:'充电口',img:'ola/06.png' },
                        { title:'车尾',img:'ola/07.png' },
                        { title:'车体骨架',img:'ola/08.png' }
                    ]
                },

            ],*/
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
                    return 'img/3-1.png'
                }else if(item.type=="油气混动"){
                    return 'img/3-2.png'
                }else if(item.type=="插电混动"){
                    return 'img/3-4.png'
                }else if(item.type=="纯电动"){
                    return 'img/3-3.png'
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
                    },500)
                }
//					console.log(that.progress)
                if(that.zeroInit){
//						console.log(swiper.activeIndex)
                    that.currentIndex = swiper.activeIndex % 6
//						that.bSwipers = that.cars[that.currentIndex].bimgs
                    that.bSwipers = that.cars[that.currentIndex].bimgs
                    swiper.updateSlidesSize()
//						that.$set(that,'bSwipers',[])
//						that.$set(that,'bSwipers',that.cars[that.currentIndex].bimgs)
                    console.log(that.bSwipers)
                    that.progress = true
                }
            },
            onSlideChangeStart: function(swiper){
//					that.currentIndex = swiper.activeIndex % 6
//			      if(that.zeroInit&&!that.progress){
//			      	console.log(swiper.activeIndex);
//					   that.currentIndex = swiper.activeIndex % 6
//					   that.progress = true
//					}
            },
            onSlideChangeEnd: function(swiper){
                console.log(swiper.activeIndex);
                console.log('onSlideChangeEnd')
                that.progress = false
                if(!that.zeroInit&&swiper.activeIndex % 6>0)return
                that.currentIndex = swiper.activeIndex % 6
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