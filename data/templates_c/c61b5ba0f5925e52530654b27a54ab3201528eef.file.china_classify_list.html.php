<?php /* Smarty version Smarty 3.1.0, created on 2017-03-13 10:46:48
         compiled from "E:/WWW/qy/templates\admin\china_classify_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2162958c6081813fae7-76028749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c61b5ba0f5925e52530654b27a54ab3201528eef' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\china_classify_list.html',
      1 => 1488182826,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2162958c6081813fae7-76028749',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58c608181b87d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c608181b87d')) {function content_58c608181b87d($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>

<h1><a href='china_classify.php?act=add'>添加中国分类</a></h1>
<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['one']->value['cname'];?>
 <a href="china_classify.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">删除</a><a href="china_classify.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">修改</a><br>
<?php } ?>




</body>
</html><?php }} ?>