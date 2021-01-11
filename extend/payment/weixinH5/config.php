<?php

return array(
    'code'=> 'weixinH5',
    'name' => '微信支付',
    'version' => '1.0',
    'author' => 'lhb',
    'desc' => '微信支付【H5】',
    'icon' => 'logo.jpg',
    'scene' => 1,  // 使用场景 0 PC+手机 1 手机 2 PC
    'config' => array(
        array('name' => 'appid','label'=>'绑定支付的APPID','type' => 'text',   'value' => 'wx80189ba14ed46e76'), // * APPID：绑定支付的APPID（必须配置，开户邮件中可查看）
        array('name' => 'mchid',   'label'=>'商户号', 'type' => 'text',   'value' => '1504088141'), // * MCHID：商户号（必须配置，开户邮件中可查看）
        array('name' => 'key',  'label'=>'商户支付密钥', 'type' => 'text',   'value' => 'LKP4641SWX4WPNNJS46319YIPN14AWE9'), // KEY：商户支付密钥，参考开户邮件设置（必须配置，登录商户平台自行设置）
    ),
);