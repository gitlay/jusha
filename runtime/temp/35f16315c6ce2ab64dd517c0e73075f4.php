<?php /*a:4:{s:63:"E:\phpStudy\WWW\jusha\application\home\view\page_advantage.html";i:1545462840;s:62:"E:\phpStudy\WWW\jusha\application\home\view\common_header.html";i:1545453667;s:59:"E:\phpStudy\WWW\jusha\application\home\view\common_nav.html";i:1545453445;s:62:"E:\phpStudy\WWW\jusha\application\home\view\common_footer.html";i:1545453545;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	<title><?php echo isset($info['title']) ? htmlentities($info['title']) : ($title ? $title : $sys['title']); ?></title>
	<meta name="keywords" content="<?php echo isset($info['keywords']) ? htmlentities($info['keywords']) : ($keywords ? $keywords : $sys['key']); ?>"/>
	<meta name="description" content="<?php echo isset($info['description']) ? htmlentities($info['description']) : ($description ? $description : $sys['des']); ?>"/>
	<link rel="stylesheet" type="text/css" href="/template/css/style.css">
	<link rel="stylesheet" type="text/css" href="/template/css/other.css">
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
                    石家庄
                </div>
                <div class="arrow">
                    <img src="/template/img/web/arrow.png" alt="">
                </div>
            </div>
            <div class="city-choose" id="city-choose">
                <li class="city-list">石家庄</li>
                <li class="city-list">保定</li>
            </div>
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
<?php
    $page = new app\services\PageService();
    $info = $page->getPage(52);
	$category = $page->getCategory(51,db('question'));
?>
	<div class="content">
		<div class="banner">
			<img src="<?php echo htmlentities($image); ?>" class="pc-banner">
			<img src="<?php echo htmlentities($imageMobile); ?>" class="mb-banner">
		</div>
		<div class="floor">
			<div class="floor-title">
				<?php echo htmlentities($category['catname']); ?><br>
				<span><?php echo htmlentities($category['catdir']); ?></span>
			</div>
			<?php if(is_array($category['list']) || $category['list'] instanceof \think\Collection || $category['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $category['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
			<div <?php if($mod == '1'): ?>class="left"<?php else: ?>class="right"<?php endif; ?>>
				<div class="fixation">
					<div class="img">
						<img src="<?php echo htmlentities($v['image']); ?>">
					</div>
					<div class="word">
						<div class="big-number">
							0<?php echo htmlentities($i); ?>
						</div>
						<div class="big-title">
							<?php echo htmlentities($v['title']); ?><br>
							<span><?php echo htmlentities($v['english']); ?></span>
						</div>
						<div class="text">
							<?php echo $v['content']; ?>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="driver">
			<div class="floor-title">
				<?php echo htmlentities($info['catname']); ?><br>
				<span><?php echo htmlentities($info['catdir']); ?></span>
			</div>
			<div class="bg-img">
				<img src="/template/img/web/bottom-banner2.png" class="mb-bottom">
				<img src="/template/img/web/bottom-banner.png" class="pc-bottom">
			</div>
			<div class="word-box">
				<?php echo $info['content']; ?>
			</div>
		</div>
	</div>
<div class="footer">
    <div class="mobile">
        <div class="qr-code">
            <div class="code-img">
                <img src="/template/img/web/qrcode.png" alt="">
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
                © 2005-2011,WWW.XXXXXX.COM巨鲨汽车网站 版权所有 沪ICP备XXXXXX号
            </div>
        </div>
    </div>
</div>
<script src="/template/js/jquery-3.3.1.min.js"></script>
<script src="/template/js/main.js"></script>
</body>
</html>