<?php /*a:2:{s:41:"../template/default/home\tool\bejson.html";i:1610164163;s:37:"../template/default/layouts\base.html";i:1607757410;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  	<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <title><?php if($routeUri == 'index/index'): ?><?php echo htmlentities($setting['shop_title']); ?> - <?php echo htmlentities($title); else: ?><?php echo htmlentities($title); ?>  - <?php echo htmlentities($setting['shop_title']); ?><?php endif; ?></title>
    <meta name="keywords" content="<?php echo htmlentities($setting['keywords']); ?>" />
    <meta name="description" content="<?php echo htmlentities($setting['description']); ?>" />
    
<style type="text/css">
html, body, form, fieldset, input, p, img, ul, ol, li, dl, dt, dd, h1, h2, h3, h4, h5, h6 {
    margin: 0;
    padding: 0;
}
img, fieldset {
    border: none;
}
body {
    background: #fff;
    font-size: 12px;
    font-family: arial;
    min-height: 512px;
    min-width: 1000px;
    position: relative;
  height: 100%;
}
#main {
    clear: both;
    margin: 0 auto;
    padding-bottom: 75px;
    width: 900px;
    margin-top: 5%;
     min-height: 100%;
}
#main .has-jinju {
    margin-bottom: 30px;
}
#bd_search {
    margin-bottom: 70px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
    -webkit-transition: margin-bottom .4s;
    transition: margin-bottom .4s;
    width: 640px;
    _z-index: 1;
    z-index: 2001;
}
#input-container {
    background: #fff;
    position: relative;
    width: 640px;
    z-index: 9;
}
.skin-text {
    font-size: 18px;
    margin-bottom: 30px;
    max-height: 40px;
    text-align: center;
}
#suggest-align {
    height: 500px;
    padding: 5px 10px;
    position: relative;
    vertical-align: top;
    width: 100%;
}
.skin-search-input {
    border: 1px solid #bbb;
}
#input.lowie-bg {
    filter: alpha(opacity=10);
}
#input, #search-button {
    outline: none;
    position: absolute;
}
#input {
    *background: transparent;
    background: rgba(0,0,0,.001);
    border: none;
    color: #333;
    float: left;
    font-size: 16px;
    height: 500px;
    left: 10px;
    line-height: 30px;
    top: 5px;
    width: 100%;
}
#search-button {
    -webkit-appearance: none;
    border: 0;
    border-radius: 0;
    cursor: pointer;
    font-family: "Microsoft YaHei";
    font-size: 18px;
    height: 46px;
    left: 50%;
    letter-spacing: 1px;
    vertical-align: top;
    width: 100px;
}
#input, #search-button {
    outline: none;
    position: absolute;
}
.skin-search-button {
    background: #5e6664;
    color: #fff;
}
.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
}
</style>

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

   
  <!-- main -->
  <div class="main-news">
    <div class="layui-container">
      <div id="main">
        <section id="bd_search" class="has-jinju" style="height: 46px;">
          <div class="fixed">
              <fieldset id="input-container" class="">
                  <div id="suggest-align" class="skin-search-input">
                    <textarea type="text" name="q" class="placeholder lowie-bg" id="input"  placeholder="请输入您格式化的json字符串" suggestwidth="540px" autocomplete="off"></textarea>
                  </div>
                  <br />
                  <input type="submit" id="search-button" class="skin-search-button" value="格式化">
              </fieldset>
          </div>
        </section>
        <div class="jsonshow"> 
        </div>
      </div>
    </div>
</div>
<script type="text/javascript" src="/static/js/jquery/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/clipboard.min.js"></script>
<script type="text/javascript">
  $(function (){
    $("#search-button").click(function (){
      var text_value = $("#input").val();
  　　if(text_value == ""){
     　　alert("不能为空");  
     　　return false;
  　　} else {
          text_value = eval("'" + text_value + "'");
          //text_value = unescape(text_value.replace(/\u/g, "%u"))
          var res="";
          for(var i=0,j=0,k=0,ii,ele;i<text_value.length;i++)
          {
              ele=text_value.charAt(i);
              if(j%2==0&&ele=="}")
              {
                  k--;                
                  for(ii=0;ii<k;ii++) ele="    "+ele;
                  ele="\n"+ele;
              }
              else if(j%2==0&&ele=="{")
              {
                  ele+="\n";
                  k++;          
                  for(ii=0;ii<k;ii++) ele+="    ";
              }
              else if(j%2==0&&ele==",")
              {
                  ele+="\n";
                  for(ii=0;ii<k;ii++) ele+="    ";
              }
              else if(ele=="\"") j++;
              res+=ele;        
          }
          $("#input").val(res) 
  　　}
    })
  })
</script>
 

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