<?php /*a:4:{s:57:"/www/wwwroot/jusha/application/home/view/index_index.html";i:1545543491;s:59:"/www/wwwroot/jusha/application/home/view/common_header.html";i:1545543491;s:56:"/www/wwwroot/jusha/application/home/view/common_nav.html";i:1545543491;s:59:"/www/wwwroot/jusha/application/home/view/common_footer.html";i:1545543491;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	<title><?php echo isset($info['title']) ? htmlentities($info['title']) : ($title ? $title : $sys['title']); ?></title>
	<meta name="keywords" content="<?php echo isset($info['keywords']) ? htmlentities($info['keywords']) : ($keywords ? $keywords : $sys['key']); ?>" />
	<meta name="description" content="<?php echo isset($info['description']) ? htmlentities($info['description']) : ($description ? $description : $sys['des']); ?>" />
	<link rel="stylesheet" type="text/css" href="/template/css/style.css">
</head>
<body>
<div class="header">
    <div class="fixation">
        <div class="logo">
            <a href=""><img src="<?php echo htmlentities($sys['logo']); ?>" alt=""></a>
        </div>
        <div class="name">
            <?php echo htmlentities($sys['company']); ?>
        </div>
        <div class="city">
            <div class="now-city">
                <div class="city-name" id="chooseBtn" status="show">
                    <?php
                    session('address_id')?:session('address_id',1);
                    $address_id = session('address_id');

                    echo $address[$address_id]['val'];
                    ?>

                </div>
                <div class="arrow">
                    <img src="/template/img/web/arrow.png" alt="">
                </div>
            </div>
            <div class="city-choose" id="city-choose">
                <?php if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li class="city-list" id="<?php echo htmlentities($v['key']); ?>" onclick="setConfig(this)"><?php echo htmlentities($v['val']); ?></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <script>
                function setConfig(obj){
                    $.get("<?php echo url('home/index/setConfig'); ?>",{address_id:$(obj).attr('id')},function(data){
                        console.log(data);

                    })
                }

            </script>

        </div>
        <div class="nav" id="nav" status="show">
            <div class="nav-button">
                <img src="/template/img/web/menu.png" alt="">
            </div>
        </div>
        <div class="nav-box" id="nav-box">
            <li><a href="/">首页</a></li>
<?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li><a href="<?php echo url('home/'.$vo['catdir'].'/index',['catId'=>$vo['id']] ); ?>"><?php echo htmlentities($vo['catname']); ?></a></li>
<?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
	<div class="container">
		<div class="main-img">
			<div class="img-box">
				<img src="/template/img/web/main.png" alt="" class="mobile-main-img">
				<img src="/template/img/web/pc-main.png" alt="" class="pc-main-img">
			</div>
			<div class="fixation">
				<div class="list">
					<div class="add-icon">
						<div class="circle">
							+
						</div>
					</div>
					<div class="big-word">
						体面
					</div>
					<div class="small-word">
						做自己的老板 让每一滴血汗更加体面尊严
					</div>
				</div>
				<div class="list">
					<div class="add-icon">
						<div class="circle">
							+
						</div>
					</div>
					<div class="big-word">
						自由
					</div>
					<div class="small-word">
						上班自由灵活 时间地点随你选告别传统打卡模式
					</div>
				</div>
				<div class="list">
					<div class="add-icon">
						<div class="circle">
							+
						</div>
					</div>
					<div class="big-word">
						责任
					</div>
					<div class="small-word">
						我们的每一份努力 都是为城市出行做贡献 让出行更美好。
					</div>
				</div>
			</div>
		</div>
		<div class="button-list">
			<div class="btn"><a href=""><span class="btn-span">无车加盟</span><span class="img"><img src="/template/img/web/right.png" alt=""></span></a></div>
			<div class="btn"><a href=""><span class="btn-span">有车加盟</span><span class="img"><img src="/template/img/web/right.png" alt=""></span></a></div>
		</div>
	</div>
	<div class="footer">
    <div class="mobile">
        <div class="qr-code">
            <div class="code-img">
                <img src="<?php echo htmlentities($sys['qrcode']); ?>" alt="">
            </div>
            <div class="word">
                扫二维码关注公众号
            </div>
        </div>
        <div class="copyright">
            © 2005-2011,WWW.XXXXXX.COM巨鲨汽车网站<br>
            版权所有 沪ICP备XXXXXX号
        </div>
    </div>
    <div class="pc-web">
        <div class="fixation">
            <div class="top">
                <div class="left">
                    <img src="<?php echo htmlentities($sys['logoa']); ?>">
                </div>
                <div class="mid">
                    <div class="link-list">
                        <div class="title">公司简介</div>
                        <div class="list-box">
                            <li><a href="">车型展示</a></li>
                            <li><a href="">车辆细节</a></li>
                            <li><a href="">车辆参数</a></li>
                            <li><a href="">运营分析</a></li>
                        </div>
                    </div>
                    <div class="link-list">
                        <div class="title">行业动态</div>
                        <div class="list-box">
                            <li><a href="">政策</a></li>
                            <li><a href="">证照相关</a></li>
                            <li><a href="">合规公司优势</a></li>
                        </div>
                    </div>
                    <div class="link-list">
                        <div class="title">公司优势</div>
                        <div class="list-box">
                            <li><a href="">岗前培训</a></li>
                            <li><a href="">运营分析</a></li>
                            <li><a href="">专人对接</a></li>
                            <li><a href="">车辆保证</a></li>
                        </div>
                    </div>
                    <div class="link-list">
                        <div class="title">加入我们</div>
                        <div class="list-box">
                            <li><a href="">报名入口</a></li>
                            <li><a href="">公司地址</a></li>
                            <li><a href="">联系方式</a></li>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="qr-code">
                        <img src="/template/img/web/qrcode.png">
                    </div>
                    <div class="word">
                        扫描二维码关注公众号
                    </div>
                </div>
            </div>
            <div class="copyright">
                <?php echo htmlentities($sys['copyright']); ?> <?php echo htmlentities($sys['bah']); ?>
            </div>
        </div>
    </div>
</div>
<script src="/template/js/jquery-3.3.1.min.js"></script>
<script src="/template/js/main.js"></script>
</body>
</html>
