<?php /* Smarty version Smarty 3.1.0, created on 2017-03-03 15:36:37
         compiled from "E:/WWW/qy/templates\admin\web_focus_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2946958b91d0559fd35-03927344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '446737618ca549622d76a55cb089c7fed1ae7ddf' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\web_focus_list.html',
      1 => 1488526211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2946958b91d0559fd35-03927344',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_focus' => 0,
    'one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58b91d05607af',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b91d05607af')) {function content_58b91d05607af($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h1><a href='index.php' id='index'>首页</a></h1>
<h3><a href="web_focus.php?act=add">添加图片轮播</a></h3>
<table>
  <tr>
   <td>图片名字</td> 
   <td>图片地址</td>
   <td>跳转地址</td>
    <td>排序</td> 
    <td>操作</td>
  </tr>  


<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['web_focus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>

     <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['one']->value['title'];?>
</td> 
   <td><img src="../<?php echo $_smarty_tpl->tpl_vars['one']->value['href'];?>
 " width="30" height="30" alt=""></td>
   <td><a href="<?php echo $_smarty_tpl->tpl_vars['one']->value['pic_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['one']->value['pic_url'];?>
</a> </td>
    <td><?php echo $_smarty_tpl->tpl_vars['one']->value['sort_seq'];?>
</td> 
    <td><a href="web_focus.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">修改</a>
<a href="web_focus.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">删除</a></td>
<?php } ?>
</tr>
</table>



</body>
</html><?php }} ?>