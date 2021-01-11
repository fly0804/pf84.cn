<?php

return array(
    'code'=> 'weixin',
    'name' => '微信支付',
    'version' => '1.0',
    'author' => 'IT宇宙人',
    'desc' => 'PC端+微信公众号支付',
    'icon' => 'logo.jpg',
    'app_icon' => 'app_logo.jpg',
    'scene' => 0,  // 使用场景 0 PC+手机 1 手机 2 PC
    // 'config' => array(
    //     array('name' => 'appid','label'=>'绑定支付的APPID','type' => 'text',   'value' => 'wx80189ba14ed46e76'), // * APPID：绑定支付的APPID（必须配置，开户邮件中可查看）
    //     array('name' => 'mchid',   'label'=>'商户号', 'type' => 'text',   'value' => '1504088141'), // * MCHID：商户号（必须配置，开户邮件中可查看）
    //     array('name' => 'key',  'label'=>'商户支付密钥', 'type' => 'text',   'value' => 'LKP4641SWX4WPNNJS46319YIPN14AWE9'), // KEY：商户支付密钥，参考开户邮件设置（必须配置，登录商户平台自行设置）
    // ),
    'config' => array(
        array('name' => 'appid','label'=>'绑定支付的APPID','type' => 'text',   'value' => 'wx327d60e64fcb6f9a'), // * APPID：绑定支付的APPID（必须配置，开户邮件中可查看）
        array('name' => 'mchid',   'label'=>'商户号', 'type' => 'text',   'value' => '1500672861'), // * MCHID：商户号（必须配置，开户邮件中可查看）
        array('name' => 'key',  'label'=>'商户支付密钥', 'type' => 'text',   'value' => 'HBLSZXDSWYYJTYXGSlkkjuyrhfdswqxx'), // KEY：商户支付密钥，参考开户邮件设置（必须配置，登录商户平台自行设置）
    ),
);