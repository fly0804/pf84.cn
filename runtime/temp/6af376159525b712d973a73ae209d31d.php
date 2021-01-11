<?php /*a:2:{s:41:"../template/default/home\index\cases.html";i:1605841872;s:37:"../template/default/layouts\base.html";i:1607589005;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <title><?php if($routeUri == 'index/index'): ?><?php echo htmlentities($setting['shop_title']); ?> - <?php echo htmlentities($title); else: ?><?php echo htmlentities($title); ?>  - <?php echo htmlentities($setting['shop_title']); ?><?php endif; ?></title>
    <meta name="keywords" content="<?php echo htmlentities($setting['keywords']); ?>" />
    <meta name="description" content="<?php echo htmlentities($setting['description']); ?>" />
    
	<link rel="stylesheet" href="/static/home/layui/css/layui.css">
  	<link rel="stylesheet" href="/static/home/static/css/index.css">
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?2cdb388d55b65a0a654e34743dabd814";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</head>
<body >
   <!-- nav部分 -->
  <div class="nav index scroll" style="background: #FFF;">
    <div class="layui-container">
      <!-- 公司logo -->
      <div class="nav-logo">
        <a href="/">
          <img src="/static/home/static/img/logonew.png" style="height:82px;" alt="<?php echo htmlentities($setting['shop_title']); ?>">
        </a>
      </div>
      <div class="nav-list">
        <button>
          <span></span><span></span><span></span>
        </button>
        <ul class="layui-nav" lay-filter="">
          <li class="layui-nav-item"><a href="/product">产品</a></li>
          <li class="layui-nav-item"><a href="/news">动态</a></li>
          <li class="layui-nav-item"><a href="/cases">案例</a></li>
          <li class="layui-nav-item"><a href="/about">关于</a></li>
        <span class="layui-nav-bar" style="left: 626px; top: 78px; width: 0px; opacity: 0;"></span></ul>
      </div>
    </div>
  </div>

   
  <!-- banner部分 -->
  <div class="banner case">
    <div class="title active">
      <p>成功案例</p>
      <p class="en">Successful Case</p>
    </div>
  </div>
  <!-- main部分 -->
  <div class="main-case">
    <div class="layui-container">
      <div class="layui-row">
        <div class="layui-inline content">
          <div class="layui-inline case-img"><img src="/static/home/static/img/xmhyd.jpg"></div>
          <p class="lable">细莫全球会员店</p>
          <p>精选全球极具匠心的特色产品，细莫全球与品牌实力商家合作，产品保证产品品质的同时，价格比其他平台有优势，加入细莫全球，吃的、喝的、给孩子买的零食都能用最优惠的价格买到，比海淘代购都便宜</p>
        </div>
        <div class="layui-inline content even center">
          <div class="layui-inline case-img"><img src="/static/home/static/img/youa.jpg"></div>
          <p class="lable">友阿微店</p>
          <p>目前已完全实现了真正的O2O模式,同时也建立了完整的供应链系统,搭建了高效的开放式加盟平台;基于互联网思维,以用户化需求为导向,聚焦湖南上万小区市场,整合线上线下优质服务资源，旨在让优质生活一步到位。</p>
        </div>
        <div class="layui-inline content">
          <div class="layui-inline case-img"><img src="/static/home/static/img/citizen.jpg"></div>
          <p class="lable">西铁城官方商城</p>
          <p>查询西铁城手表官方网上商城最新产品资讯；了解西铁城手表官方网上商城最新优惠活动，官方商城为您提供西铁城官方商城、西铁城官方旗舰店商务休闲手表、时尚手表、运动手表、正装等产品信息</p>
        </div>
        <div class="layui-inline content">
          <div class="layui-inline case-img"><img src="/static/home/static/img/dyk.jpg"></div>
          <p class="lable">起亚官网</p>
          <p>东风悦达起亚官网目前提供KX CROSS、KX7、KX5、新KX3、新智跑等的SUV和焕驰、凯绅、全新K5、K4、新K3、新一代K3等的轿车信息及K5混动版、华骐 300E等新能源车的车型外观、内饰图片和信息</p>
        </div>
        <div class="layui-inline content  even center">
          <div class="layui-inline case-img"><img src="/static/home/static/img/xmshop.jpg" style="width:50%;"></div>
          <p class="lable">细莫商城</p>
          <p>细莫主打“安全、健康、放心、美味”的食品体系，致力于打造全球好货集一体的创业平台</p>
        </div>
        <div class="layui-inline content">
          <div class="layui-inline case-img"><img src="/static/home/static/img/cuncaoxin.jpg"  style="width:50%;"></div>
          <p class="lable">寸草心教育系统</p>
          <p>唤醒每个生命持续学习，愿每个孩子都被温柔以待，打造一套在线课程报名二级分销系统</p>
        </div>
      </div>
      <!--<div id="casePage"><div class="layui-box layui-laypage layui-laypage-molv" id="layui-laypage-2"><span class="layui-laypage-curr"><em class="layui-laypage-em" style="background-color:#2db5a3;"></em><em>1</em></span><a href="javascript:;" data-page="2">2</a><a href="javascript:;" data-page="3">3</a><a href="javascript:;" data-page="4">4</a><a href="javascript:;" data-page="5">5</a><a href="javascript:;" class="layui-laypage-next" data-page="2">下一页</a></div></div>-->
    </div>
  </div>
   

 <!-- footer部分 -->
  <div class="footer">
    <div class="layui-container">
      <!-- <p class="footer-web" style="display:none">
        <a href="javascript:;">合作伙伴</a>
        <a href="javascript:;">企业画报</a>
        <a href="javascript:;">JS网</a>
        <a href="javascript:;">千图网</a>
        <a href="javascript:;">昵图网</a>
        <a href="javascript:;">素材网</a>
        <a href="javascript:;">花瓣网</a>
      </p> -->
      <div class="layui-row footer-contact" style="padding-top:20px;">
        <div class="layui-col-sm2 layui-col-lg1"><img src="/static/home/static/img/erweima.jpg" style="width:6rem;"></div>
        <div class="layui-col-sm10 layui-col-lg11">
          <div class="layui-row">
            <div class="layui-col-sm6 layui-col-md8 layui-col-lg8">
              <p class="contact-top"><i class="layui-icon layui-icon-cellphone"></i>&nbsp;15399910100&nbsp;&nbsp;(9:00-21:00)</p>
              <p class="contact-bottom"><i class="layui-icon layui-icon-home"></i>&nbsp;344848968@qq.com</p>
            </div>
            <div class="layui-col-sm6 layui-col-md4 layui-col-lg4">
              <p class="contact-bottom"><span class="right">Copyright&nbsp;©&nbsp;2019-2020&nbsp;&nbsp;<a href="http://beian.miit.gov.cn" style="color:#fff" target="_blank">京ICP备14013839号-5</a></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="/static/home/layui/layui.js"></script>
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
  layui.config({
    base: '/static/home/static/js/' 
  }).use('firm'); 
</script>

</body></html>