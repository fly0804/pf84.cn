<?php /*a:2:{s:41:"../template/default/home\index\index.html";i:1606980660;s:37:"../template/default/layouts\base.html";i:1607757410;}*/ ?>
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
          <li class="layui-nav-item"><a href="/s">短链</a></li>
          <li class="layui-nav-item"><a href="/about">关于</a></li>
        <span class="layui-nav-bar" style="left: 626px; top: 78px; width: 0px; opacity: 0;"></span></ul>
      </div>
    </div>
  </div>

   
  <!-- banner部分 -->
  <div>
    <div class="layui-carousel" id="banner" lay-anim="" lay-indicator="inside" lay-arrow="always" style="width: 100%; height: 898px;">
      <div carousel-item="">
        <div class="layui-this">
          <img src="/static/home/static/img/banner1.jpg">
          <div class="panel" style="width: 480px;">
            <p class="title" style="color: #333;"><?php echo htmlentities($setting['shop_title']); ?></p>
            <p>提供技术解决方案</p>
          </div>
        </div>
        <div class="">
          <img src="/static/home/static/img/banner2.jpg">
          <div class="panel" style="width: 480px;">
            <p class="title" style="color: #333;"><?php echo htmlentities($setting['shop_title']); ?></p>
            <p>提供完美前端体验</p>
          </div>
        </div>
      </div>
    <div class="layui-carousel-ind"><ul><li class="layui-this"></li><li class=""></li></ul></div><button class="layui-icon layui-carousel-arrow" lay-type="sub"></button><button class="layui-icon layui-carousel-arrow" lay-type="add"></button></div>
  </div>
  <!-- main部分 -->
  <div class="main-product">
    <div class="layui-container">
      <p class="title">专为前端而研制的<span>核心产品</span></p>
      <div class="layui-row layui-col-space25">
        <div class="layui-col-sm6 layui-col-md3">
          <div class="content">
            <div><img src="/static/home/static/img/Big_icon1.png"></div>
            <div>
              <p class="label">JS基础库</p>
              <p>从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。</p>
            </div>
            <!-- <a href="javascript:;">查看产品 &gt;</a> -->
          </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3 ">
          <div class="content">
            <div><img src="/static/home/static/img/Big_icon2.png"></div>
            <div>
              <p class="label">CSS处理</p>
              <p>从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。</p>
            </div>
            <!-- <a href="javascript:;">查看产品 &gt;</a> -->
          </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3 ">
          <div class="content">
            <div><img src="/static/home/static/img/Big_icon3.png"></div>
            <div>
              <p class="label">兼容性</p>
              <p>从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。</p>
            </div>
            <!-- <a href="javascript:;">查看产品 &gt;</a> -->
          </div>
        </div>
        <div class="layui-col-sm6 layui-col-md3 ">
          <div class="content">
            <div><img src="/static/home/static/img/Big_icon4.png"></div>
            <div>
              <p class="label">响应式</p>
              <p>从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。</p>
            </div>
            <!-- <a href="javascript:;">查看产品 &gt;</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main-service">
    <div class="layui-container">
      <p class="title">为客户打造完美的<span>专业服务</span></p>
      <div class="layui-row layui-col-space25 layui-col-space80">
        <div class="layui-col-sm6">
          <div class="content">
            <div class="content-left"><img src="/static/home/static/img/home_img1.jpg"></div>
            <div class="content-right">
              <p class="label">1 对 1 前端指导</p>
              <span></span>
              <p>更有多个包含不同主题的Web组件，可快速构建界面出色、体验优秀的跨屏页面，大幅提升开发效率。</p>
            </div>
          </div>
        </div>
        <!-- <div class="layui-col-sm6">
          <div class="content">
            <div class="content-left"><img src="/static/home/static/img/home_img3.jpg"></div>
            <div class="content-right">
              <p class="label">1 对 1 技术指导</p>
              <span></span>
              <p>更有多个包含不同主题的Web组件，可快速构建界面出色、体验优秀的跨屏页面，大幅提升开发效率。</p>
            </div>
          </div>
        </div> -->
        <div class="layui-col-sm6">
          <div class="content">
            <div class="content-left"><img src="/static/home/static/img/home_img4.jpg"></div>
            <div class="content-right">
              <p class="label">技术需求方案制定</p>
              <span></span>
              <p>专业出版，根据客户业务需求制定技术需求方案的能力</p>
            </div>
          </div>
        </div>
      </div>
      <!--<div class="service-more"><a href="index.html">查看更多</a></div>-->
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