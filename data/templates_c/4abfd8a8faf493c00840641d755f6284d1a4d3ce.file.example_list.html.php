<?php /* Smarty version Smarty 3.1.0, created on 2017-03-16 13:48:14
         compiled from "E:/WWW/qy/templates\admin\example_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1820758ca271eaac9e6-37304081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4abfd8a8faf493c00840641d755f6284d1a4d3ce' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\example_list.html',
      1 => 1489562056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1820758ca271eaac9e6-37304081',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'example' => 0,
    'html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58ca271eb0144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ca271eb0144')) {function content_58ca271eb0144($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>

<h1><a href='index.php' id='index'>首页</a></h1>
  <h3><a href="example.php?act=add">添加案例</a></h3>

<table border="1">
  <tr><td>案例标题</td>  
 <td>案例费用</td>  
 <td>案例内容</td>    
<td>logo</td>      
<td>设计方案</td>
<td>操作</td>
</tr>    
  <?php  $_smarty_tpl->tpl_vars['example'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['example']->key => $_smarty_tpl->tpl_vars['example']->value){
$_loop = true;
?>
   <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['example']->value['title'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['example']->value['price'];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['example']->value['content'];?>
</td>
      <td>  <a href="../<?php echo $_smarty_tpl->tpl_vars['example']->value['logo'];?>
" target="_blank"> <img src="../<?php echo $_smarty_tpl->tpl_vars['example']->value['logo'];?>
" alt="" width="30" height="30"></a>            </td>
      <td><?php echo $_smarty_tpl->tpl_vars['example']->value['plan'];?>
</td>
  <td><a href= "example.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['example']->value['id'];?>
">修改</a><a href= "example.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['example']->value['id'];?>
">删除</a></td>
  <?php } ?>
  </tr> 


</table>
<?php echo $_smarty_tpl->tpl_vars['html']->value;?>

</body>
</html><?php }} ?>