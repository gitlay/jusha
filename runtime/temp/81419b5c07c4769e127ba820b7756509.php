<?php /*a:4:{s:55:"/www/wwwroot/jusha/application/home/view/page_show.html";i:1547031663;s:59:"/www/wwwroot/jusha/application/home/view/common_header.html";i:1547447708;s:56:"/www/wwwroot/jusha/application/home/view/common_nav.html";i:1545543491;s:59:"/www/wwwroot/jusha/application/home/view/common_footer.html";i:1548127836;}*/ ?>
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
            <a href="/"><img src="<?php echo htmlentities($sys['logo']); ?>" alt=""></a>
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
<!--         <div class="slider">
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
        </div> -->
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
                        <div class="slide-item prevImg" id="<?php echo htmlentities($array[$i]); ?>">
                            <img src="<?php echo htmlentities($v['pic']); ?>">
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                      <!--   <div class="slide-item" id="midd">
                            <img src="img/web/about3.jpg">
                        </div>
                        <div class="slide-item nextImg" id="right">
                            <img src="img/web/about4.jpg">
                        </div> -->
                    </div>
                    <div class="prev">
                        <
                    </div>
                    <div class="next" status="1">
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

           <?php echo htmlentities($sys['copyright']); ?><br>
            版权所有    <?php echo htmlentities($sys['bah']); ?>
        </div>
    </div>
    <style>
        .link-list a{
            color: #000;
        }
    </style>
    <div class="pc-web">
        <div class="fixation">
            <div class="top">
                <div class="left">
                    <img src="<?php echo htmlentities($sys['logoa']); ?>" onclick="bottom_logo()" style="cursor:pointer">
                </div>
              <script>
            		function bottom_logo(){
                        window.location.href="/";
                    }
                
              </script>
                <div class="mid">
                  <div class="link-list">
                    <div class="title"><a href="/about-2.html">公司简介</a></div>
                    <div class="list-box">

                    </div>
                  </div>
                  <div class="link-list">
                    <div class="title"><a href="/home/trade/index/catId/46.html#a">行业动态</a></div>
                    <div class="list-box">
                      <li><a href="/home/trade/index/catId/46.html#a">政策</a></li>
                      <li><a href="/home/trade/index/catId/46.html#b">证照相关</a></li>
                      <li><a href="/home/trade/index/catId/46.html#c">合规公司优势</a></li>
                    </div>
                  </div>
                  <div class="link-list">
                    <div class="title"><a href="/home/car/index/catId/55.html">车型展示</a></div>
                    <div class="list-box">
                      <li><a href="/home/car/index/catId/55.html">车型展示</a></li>
                      <li><a href="/home/car/index/catId/55.html">车辆细节</a></li>
                      <li><a href="/home/car/index/catId/55.html">车辆参数</a></li>
                    </div>
                  </div>
                  <div class="link-list">
                    <div class="title"><a href="/home/goodness/index/catId/50.html">公司优势</a></div>
                    <div class="list-box">
                      <li><a href="/home/goodness/index/catId/50.html">岗前培训</a></li>
                      <li><a href="/home/goodness/index/catId/50.html">运营分析</a></li>
                      <li><a href="/home/goodness/index/catId/50.html">专人对接</a></li>
                      <li><a href="/home/goodness/index/catId/50.html">车辆保证</a></li>
                    </div>
                  </div>
                  <div class="link-list">
                    <div class="title"><a href="/home/join/index/catId/53.html">加入我们</a></div>
                    <div class="list-box">
                      <li><a href="/home/join/index/catId/53.html">报名入口</a></li>
                      <li><a href="/home/join/index/catId/53.html">公司地址</a></li>
                      <li><a href="/home/join/index/catId/53.html">联系方式</a></li>
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
