<?php /*a:2:{s:41:"../template/default/home\index\about.html";i:1605841383;s:37:"../template/default/layouts\base.html";i:1607589005;}*/ ?>
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
  <div class="banner about">
    <div class="title active">
      <p>关于我们</p>
      <p class="en">About Us</p>
    </div>
  </div>
  <!-- main部分 -->
  <div class="main-about">
    <div class="layui-container">
      <div class="layui-row">
        <ul class="aboutab">
          <li class="layui-this">工作室简介</li><li>招贤纳士</li><li>发展历程</li>
        </ul>
        <div class="tabIntro">
          <div class="content">
            <div class="layui-inline img"><img src="/static/home/static/img/us_img1.jpg"></div><div class="layui-inline panel">
              <p>身处在互联网时代的繁荣之下，我们都在有意或无意地追逐。而我们偏偏回望当初，奔赴在返璞归真的漫漫征途，自信并勇敢着，追寻于原生态的书写指令，试图以最简单的方式诠释高效。</p>
            </div>
          </div>
          <div class="content">
            <div class="layui-inline panel p_block">
              <p>如果眼下还是一团零星之火，那运筹帷幄之后，迎面东风，就是一场烈焰燎原吧，那必定会是一番尽情的燃烧。待，秋风萧瑟时，散作满天星辰，你看那四季轮回，正是我们不灭的执念。</p>
            </div><div class="layui-inline img"><img src="/static/home/static/img/us_img2.jpg"></div>
              <!-- <p class="p_hidden">如果眼下还是一团零星之火，那运筹帷幄之后，迎面东风，就是一场烈焰燎原吧，那必定会是一番尽情的燃烧。待，秋风萧瑟时，散作满天星辰，你看那四季轮回，正是Layui不灭的执念。</p> -->
          </div>
          <div class="content">
            <div class="layui-inline img"><img src="/static/home/static/img/us_img3.jpg"></div><div class="layui-inline panel">
              <p>拥有双面的不仅是人生，还有我们。一面极简，一面丰盈。极简是视觉所见的外在，是开发所念的简易。丰盈是倾情雕琢的内在，是信手拈来的承诺。一切本应如此，简而全，双重体验。</p>
            </div>
          </div>         
        </div>
        <div class="tabJob">
          <div class="content">
            <p class="title">前端开发工程师</p>
            <p>&gt; 职位描述</p>
            <ol>
              <li>前端开发及维护工作；</li>
              <li>有良好的技术基础，熟悉 Web 标准，熟练掌握多种 Web 前端技术；</li>
              <li>掌握行业内流行的类库，Vue.js， React 等主流框架；</li>
              <li>参与公司前端工程的设计、研发；</li>
              <li>了解不同浏览器之间的差异，移动设备之间的差异。</li>
            </ol>
          </div>
          <!--<div class="content">
            <p class="title">IOS 开发工程师</p>
            <p>&gt; 职位描述</p>
            <ol>
              <li>前端开发及维护工作；</li>
              <li>有良好的技术基础，熟悉 Web 标准，熟练掌握多种 Web 前端技术；</li>
              <li>掌握行业内流行的类库，Vue.js， React 等主流框架；</li>
              <li>参与公司前端工程的设计、研发；</li>
              <li>了解不同浏览器之间的差异，移动设备之间的差异。</li>
            </ol>
          </div>-->
          <div class="content">
            <p class="title">PHP 工程师</p>
            <p>&gt; 职位描述</p>
            <ol>
              <li>熟练掌握PHP+MySQL，熟悉thinkphp框架，熟悉性能优化和安全优化；</li>
              <li>熟练使用mysql，对mysql优化有深入了解和实践；</li>
              <li>熟练使用redis并能够在项目中使用；</li>
              <li>有微信小程序开发经验优先；</li>
              <li>对前沿技术感兴趣，善于探索，善于交流和表达。</li>
            </ol>
          </div>
        </div>
        <div class="tabCour">
          <p class="title">我们的蜕变</p>
          <ul class="timeline">
            <li class="odd">
              <div class="cour-img"><img src="/static/home/static/img/us_img4.png"></div>
              <div class="cour-panel layui-col-sm4 layui-col-lg5">
                <p class="label">2019 年 12 月</p>
                <p>我们成立了，来到了长沙这个美丽的地方。</p>
              </div>
            </li>
           <!-- <li>
              <div class="cour-img"><img src="/static/home/static/img/us_img5.png"></div>
              <div class="cour-panel layui-col-sm4 layui-col-sm-offset8 layui-col-lg5 layui-col-lg-offset7">
                <p class="label">2017 年 6 月</p>
                <p>我们成立了，来到了杭州西湖这个美丽的地方。</p>
              </div>
            </li>
            <li class="odd">
              <div class="cour-img"><img src="/static/home/static/img/us_img6.png"></div>
              <div class="cour-panel layui-col-sm4 layui-col-lg5">
                <p class="label">2017 年 6 月</p>
                <p>我们成立了，来到了杭州西湖这个美丽的地方。</p>
              </div>
            </li>
            <li>
              <div class="cour-img"><img src="/static/home/static/img/us_img7.png"></div>
              <div class="cour-panel layui-col-sm4 layui-col-sm-offset8 layui-col-lg5 layui-col-lg-offset7">
                <p class="label">2017 年 6 月</p>
                <p>我们成立了，来到了杭州西湖这个美丽的地方。</p>
              </div>
            </li>
            <li class="odd">
              <div class="cour-img"><img src="/static/home/static/img/us_img8.png"></div>
            </li>-->
          </ul>
        </div>
      </div>
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