<?php /* Smarty version Smarty 3.1.0, created on 2017-03-09 10:10:01
         compiled from "E:/WWW/qy/templates\admin\goods_gallery_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1078058c0b9798346b4-20772624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e6af5f5ddd67a08c6a93377de5c42bea922be55' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\goods_gallery_list.html',
      1 => 1488852902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1078058c0b9798346b4-20772624',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'goods_gallery' => 0,
    'one' => 0,
    'html' => 0,
    'goods_gallery2' => 0,
    'html2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58c0b9798aae3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c0b9798aae3')) {function content_58c0b9798aae3($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>

<!--
<style>
tr,td{margin:0;
   padding:0;
   border:0px solid #ccc
}
</style>
-->

<body>
<h1><a href='index.php'>回到首页</a></h1>
 <h1> <a href="goods_gallery.php?act=add">添加商品图片</a></h1>
 
 <table border="1">
  <tr>
    <td>图片id</td>
    <td>图片描述</td>
    <td>商品id</td>
    <td>图片</td>
    <td>或者外部链接</td>
    <td>操作</td>
  </tr>

<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goods_gallery']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
 <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['one']->value['img_discription'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['one']->value['goods_id'];?>
</td>
    <td> <img src="../<?php echo $_smarty_tpl->tpl_vars['one']->value['img_position'];?>
" width="30" height="30">                                  </td>
    <td><?php echo $_smarty_tpl->tpl_vars['one']->value['out_href'];?>
</td>
    <td>
         <a href="goods_gallery.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">修改</a>
         <a href="goods_gallery.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">删除</a>  
    </td>
<?php } ?> 
  </tr>
</table>
 <?php echo $_smarty_tpl->tpl_vars['html']->value;?>

 


<br>
<br>
<br>

<!--
<table>
<tr>
<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goods_gallery2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
 <td>  <img src="../<?php echo $_smarty_tpl->tpl_vars['one']->value['img_position'];?>
" width="30" height="30" > </td>
<?php } ?> 
         <td>     
         <a href="goods_gallery.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['goods_id'];?>
">编辑</a>
         <a href="goods_gallery.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['goods']['id'];?>
">删除</a>  
        </td>
           
</tr>
</table>
 <?php echo $_smarty_tpl->tpl_vars['html2']->value;?>

 -->
 
 
</body>
</html><?php }} ?>