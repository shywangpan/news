<?php /* Smarty version Smarty 3.1.0, created on 2017-03-09 16:08:07
         compiled from "E:/WWW/qy/templates\admin\goods_demo_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2066458c10d67be6d00-89689884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa27defbbc07f248011668d2444664cf32976ee8' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\goods_demo_list.html',
      1 => 1489046864,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2066458c10d67be6d00-89689884',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'goods' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58c10d67c1d0f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c10d67c1d0f')) {function content_58c10d67c1d0f($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
	<h1><a href='index.php'>首页</a></h1>
    <h2><a href='goods_demo.php?act=add'>添加图片</a></h2>
    
    
    
    
    <table>
    <?php  $_smarty_tpl->tpl_vars['goods'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['goods']->key => $_smarty_tpl->tpl_vars['goods']->value){
$_loop = true;
?>
       <tr>
       <td><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_id'];?>
</td>
       </tr> 
    <?php } ?> 
    </table>
    
    
    

</body>
</html><?php }} ?>