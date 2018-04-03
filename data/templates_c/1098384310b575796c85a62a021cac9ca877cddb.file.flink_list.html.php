<?php /* Smarty version Smarty 3.1.0, created on 2017-03-15 14:58:27
         compiled from "E:/WWW/qy/templates\admin\flink_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1210958c8e613c75847-59979016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1098384310b575796c85a62a021cac9ca877cddb' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\flink_list.html',
      1 => 1489473621,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1210958c8e613c75847-59979016',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'one' => 0,
    'showhtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58c8e613cc758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c8e613cc758')) {function content_58c8e613cc758($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>

<h1><a href='index.php'>回到首页</a></h1>
<h1> <a href="flink.php?act=add">添加</a></h1>





 <table border="1">
      <tr>
         <td>链接名字</td>
         <td>链接地址</td>
        <td>排序</td>
         <td>logo图片</td>
         <td>操作</td>
      </tr>
<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
  <tr>
  <td><?php echo $_smarty_tpl->tpl_vars['one']->value['link_name'];?>
</td>
  <td> <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['one']->value['link_href'];?>
"><?php echo $_smarty_tpl->tpl_vars['one']->value['link_href'];?>
</a></td> 
  <td><?php echo $_smarty_tpl->tpl_vars['one']->value['order'];?>
</td>  
  <td><a  target="_blank"><img src="../<?php echo $_smarty_tpl->tpl_vars['one']->value['logo'];?>
"  alt="" width=50 height=50></a></td>     
  <td> <a href="flink.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">删除</a> <a href="flink.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">修改</a></td> 
<?php } ?>
</tr>

</table><?php echo $_smarty_tpl->tpl_vars['showhtml']->value;?>






</body>
</html><?php }} ?>