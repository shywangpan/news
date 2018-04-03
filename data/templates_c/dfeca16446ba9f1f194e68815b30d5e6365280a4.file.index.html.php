<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:15:37
         compiled from "E:/WWW/qy/templates\admin\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1500458cf8fa984ff08-79269696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfeca16446ba9f1f194e68815b30d5e6365280a4' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\index.html',
      1 => 1489648838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1500458cf8fa984ff08-79269696',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf8fa989b93',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf8fa989b93')) {function content_58cf8fa989b93($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
     
    <link rel="stylesheet" href="../../qy/static/css/pintuer.css">
    <link rel="stylesheet" href="../../qy/static/css/admin.css">
    <script src="../../qy/static/js/jquery.js"></script>   
    
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="../../qy/static/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="login.php"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="admin.php?" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    
  </ul>  
   <?php echo $_smarty_tpl->tpl_vars['html']->value;?>

  <!--<h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
  <ul>
   
  <li><a href="list.html" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
    <li><a href="add.html" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
    <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>分类管理</a></li>      
  </ul>  -->
</div>

<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>

<ul class="bread">
  <!--<li><a href="" target="right" class="icon-home"> 首页</a></li>-->
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="info.html" name="right" width="100%" height="100%"></iframe>
</div>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html><?php }} ?>