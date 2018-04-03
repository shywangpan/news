<?php /* Smarty version Smarty 3.1.0, created on 2018-03-16 19:43:32
         compiled from "D:/WWW/qy/templates\admin\admin_gourp_list.html" */ ?>
<?php /*%%SmartyHeaderCode:111565aabade404b532-37347025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d834323f47680c4e96d7574b36ba2669afdb87' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\admin_gourp_list.html',
      1 => 1489130413,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111565aabade404b532-37347025',
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
  'unifunc' => 'content_5aabade4146e3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aabade4146e3')) {function content_5aabade4146e3($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h1><a href='index.php' id='index'>首页</a></h1>
<h3>  <a href=" admin_gourp.php?act=add">管理员组添加</a><br></h3>
 <table>
     <tr>
        <td>管理员名称</td>
        <td>内容</td>
        <td>操作</td>

    </tr> 
   <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?> 
   
     <tr>
         <td><?php echo $_smarty_tpl->tpl_vars['one']->value['gname'];?>
</td>

         <td></td>
         <td><a href="admin_gourp.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['gid'];?>
">修改</a><a href="admin_gourp.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['gid'];?>
">删除</a></td>
     </tr>

<?php } ?>
</table>
 <?php echo $_smarty_tpl->tpl_vars['showhtml']->value;?>


</body>
</html><?php }} ?>