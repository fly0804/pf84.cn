<?php /*a:2:{s:40:"../template/default/home\index\news.html";i:1603791254;s:37:"../template/default/layouts\base.html";i:1607752477;}*/ ?>
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
<style type="text/css">
  .footer {
    position: fixed;
    bottom: 0;
    width: 100%;
  }
</style>
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
  <div class="banner news">
    <div class="title active">
      <p>实时新闻</p>
      <p class="en">Real-time News</p>
    </div>
  </div>
  <!-- main -->
  <div class="main-news">
    <div class="layui-container">
      <div class="layui-row layui-col-space20">
      	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="layui-col-lg6 content" style="height: 150px;">
          <div>
            <div class="news-img"><img src="<?php echo htmlentities($vo['imgsrc']); ?>"></div><div class="news-panel">
              <strong><?php echo htmlentities($vo['title']); ?></strong>
              <p class="detail"><span><?php echo htmlentities($vo['digest']); ?></span></p>
              <p class="read-push">阅读 <span><?php echo htmlentities($vo['priority']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;发布时间：<span><?php echo htmlentities($vo['ptime']); ?></span></p>
            </div>
          </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      
      </div>
      <!--<div id="newsPage"><div class="layui-box layui-laypage layui-laypage-molv" id="layui-laypage-1"><span class="layui-laypage-curr"><em class="layui-laypage-em" style="background-color:#2db5a3;"></em><em>1</em></span><a href="javascript:;" data-page="2">2</a><a href="javascript:;" data-page="3">3</a><a href="javascript:;" data-page="4">4</a><a href="javascript:;" data-page="5">5</a><a href="javascript:;" class="layui-laypage-next" data-page="2">下一页</a></div></div>-->
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