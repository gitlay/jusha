<?php /*a:4:{s:58:"/www/wwwroot/jusha/application/home/view/page_contact.html";i:1548302893;s:59:"/www/wwwroot/jusha/application/home/view/common_header.html";i:1547447708;s:56:"/www/wwwroot/jusha/application/home/view/common_nav.html";i:1545543491;s:59:"/www/wwwroot/jusha/application/home/view/common_footer.html";i:1548127836;}*/ ?>
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
<div class="content">
    <div class="banner">
        <img src="<?php echo htmlentities($image); ?>" class="pc-banner">
        <img src="<?php echo htmlentities($imageMobile); ?>" class="mb-banner">
    </div>
    <div class="form-area">
        <form>
            <div class="form-line">
                <div class="line-box">
                    <div class="icon"><img src="/template/img/web/user.png"></div>
                    <div class="input-box"><input placeholder="姓名" type="text" id="name"></div>
                </div>
            </div>
            <div class="form-line">
                <div class="line-box">
                    <div class="icon"><img src="/template/img/web/telphone.png"></div>
                    <div class="input-box"><input placeholder="联系方式" type="text" id="mobile"></div>
                </div>
            </div>
            <div class="form-line">
                <div class="line-box">
                    <div class="icon"><img src="/template/img/web/time.png"></div>
                    <div class="input-box"><input placeholder="驾龄" type="number" id="number"></div>
                </div>
            </div>
            <div class="form-line">
                <input type="button" value="提交" name="" class="sub-btn">
            </div>
        </form>
    </div>
    <div class="contact-information">
        <div class="phone-number">
            <div class="icon">
                <img src="/template/img/web/phone.png">
            </div>
            <div class="number">
                联系电话：<?php echo htmlentities($sys['tel']); ?>
            </div>
        </div>
        <div class="position">
            <div class="icon">
                <img src="/template/img/web/position.png">
            </div>
            <?php
            $page = new app\services\PageService();

            $category = $page->getCategory(54,db('address'));
            ?>
            <div class="address">
                <?php if(is_array($category['list']) || $category['list'] instanceof \think\Collection || $category['list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $category['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <span lon="<?php echo htmlentities($v['lon']); ?>" id="address_<?php echo htmlentities($v['id']); ?>" lat="<?php echo htmlentities($v['lat']); ?>" onclick="  initMap(<?php echo htmlentities($v['lon']); ?>,<?php echo htmlentities($v['lat']); ?>,this)"><?php echo htmlentities($v['address']); ?></span><br>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div class="map">
        <div class="fixation">
            <div class="map-area" id="map-area">

            </div>
            <div class="address" id="address">
                石家庄市长安区建华北大街138号百川大厦东塔22层
            </div>
        </div>
    </div>
    <div class="qr-code">
        <div class="fixation">
            <div class="code-item">
                <div class="code-img"><img src="<?php echo htmlentities($sys['qrcodec']); ?>" alt=""></div>
                <div class="code-word">扫一扫进入手机端车辆店铺</div>
            </div>
            <div class="code-item">
                <div class="code-img"><img src="<?php echo htmlentities($sys['qrcode']); ?>" alt=""></div>
                <div class="code-word">扫一扫进入手机端公众号</div>
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


<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=56srZYI3vAB9XzW2B0u544hHhsdWdE7X"></script>
<?php
    $address_id = session('address_id')?session('address_id'):1;
    $index = $address_id-1;
?>
<script type="text/javascript">
    //创建和初始化地图函数：
    function initMap(lon,lat,obj){
        $('#address').text($(obj).text())
        createMap(lon,lat);//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
        addMapOverlay(lon,lat);//向地图添加覆盖物

    }
    function createMap(lon,lat){
        map = new BMap.Map("map-area");
        map.centerAndZoom(new BMap.Point(lon,lat),18);
    }
    function setMapEvent(){
        map.enableScrollWheelZoom();
        map.enableKeyboard();
        map.enableDragging();
        map.enableDoubleClickZoom()
    }
    function addClickHandler(target,window){
        target.addEventListener("click",function(){
            target.openInfoWindow(window);
        });
    }
    function addMapOverlay(lon,lat){
        var markers = [

            {content:"巨鲨汽车",title:"巨鲨汽车",imageOffset: {width:-46,height:-21},position:{lat:lat,lng:lon}}
        ];
        for(var index = 0; index < markers.length; index++ ){
            var point = new BMap.Point(markers[index].position.lng,markers[index].position.lat);
            var marker = new BMap.Marker(point,{icon:new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png",new BMap.Size(20,25),{
                    imageOffset: new BMap.Size(markers[index].imageOffset.width,markers[index].imageOffset.height)
                })});
            var label = new BMap.Label(markers[index].title,{offset: new BMap.Size(25,5)});
            var opts = {
                width: 200,
                title: markers[index].title,
                enableMessage: false
            };
            var infoWindow = new BMap.InfoWindow(markers[index].content,opts);
            marker.setLabel(label);
            addClickHandler(marker,infoWindow);
            map.addOverlay(marker);
        };
    }
    //向地图添加控件
    function addMapControl(){
        var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
        scaleControl.setUnit(BMAP_UNIT_IMPERIAL);
        map.addControl(scaleControl);
        var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
        map.addControl(navControl);
        var overviewControl = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:true});
        map.addControl(overviewControl);
    }
    var map;
    $(function () {

        $('#address_<?php echo session("address_id"); ?>').click();
    })

</script>

<script>
    $('.sub-btn').click(function(){
        var name = $('#name').val();
        var mobile = $('#mobile').val();
        var number = $('#number').val();

        if($.trim(name)==''){
            alert('姓名不能为空');
            return false;
        }
        if($.trim(mobile)==''){
            alert('联系方式不能为空');
            return false;
        }
        if($.trim(number)==''){
            alert('驾龄不能为空');
            return false;
        }

        $.post("<?php echo url('home/index/senmsg'); ?>",{name:name,mobile:mobile,number:number},function(data){
            console.log(data);
            if(data.status==1){
                alert('留言成功！感谢您对我们的支持！');
                window.location.reload()
            }else{
                alert('留言失败！重新提交试试！');
            }
        })
    })
</script>