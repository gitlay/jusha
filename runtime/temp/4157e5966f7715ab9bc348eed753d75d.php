<?php /*a:4:{s:58:"E:\phpStudy\WWW\jusha\application\home\view\page_show.html";i:1545457033;s:62:"E:\phpStudy\WWW\jusha\application\home\view\common_header.html";i:1545453667;s:59:"E:\phpStudy\WWW\jusha\application\home\view\common_nav.html";i:1545453445;s:62:"E:\phpStudy\WWW\jusha\application\home\view\common_footer.html";i:1545490685;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title><?php echo isset($info['title']) ? htmlentities($info['title']) : ($title ? $title : $sys['title']); ?></title>
    <meta name="keywords" content="<?php echo isset($info['keywords']) ? htmlentities($info['keywords']) : ($keywords ? $keywords : $sys['key']); ?>"/>
    <meta name="description" content="<?php echo isset($info['description']) ? htmlentities($info['description']) : ($description ? $description : $sys['des']); ?>"/>
    <link rel="stylesheet" type="text/css" href="/template/css/style.css">
    <link rel="stylesheet" type="text/css" href="/template/css/other.css">
    <script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp&key=YLBBZ-4RYKO-5JGWR-SEJDQ-M5DPF-KRFUP"></script>
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
    $info = $page->getPage(44);
     $category = $page->getCategory(45,db('picture'));
?>
<div class="content">
    <div class="banner">
        <img src="<?php echo htmlentities($info['image']); ?>" class="pc-banner">
        <img src="<?php echo htmlentities($info['imageMobile']); ?>" class="mb-banner">
    </div>
    <div class="floor">
        <div class="floor-title">

            <?php echo htmlentities($info['catname']); ?><br>
            <span><?php echo htmlentities($info['catdir']); ?></span>
        </div>
        <div class="brief">
            <?php echo $info['content']; ?>
        </div>
        <div class="slider">
            <div class="back-img">
                <img src="<?php echo htmlentities($category['image']); ?>" class="pc-web">
                <img src="<?php echo htmlentities($category['imageMobile']); ?>" class="mb-web">
            </div>
            <div class="slide-box">
                <div class="slide-wrapper" id="slide-wrapper">
                    <?php
                    $array=['','left','midd','right'];
                    if(is_array($category['list']) || $category['list'] instanceof \think\Collection || $category['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $category['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <div class="slide-item" id="<?php echo htmlentities($array[$i]); ?>">
                        <img src="<?php echo htmlentities($v['pic']); ?>">
                    </div>
                   <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="prev">
                    <
                </div>
                <div class="next">
                    >
                </div>
            </div>
        </div>
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
