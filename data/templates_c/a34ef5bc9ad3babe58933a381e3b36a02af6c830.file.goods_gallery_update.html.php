<?php /* Smarty version Smarty 3.1.0, created on 2017-03-07 15:06:47
         compiled from "E:/WWW/qy/templates\admin\goods_gallery_update.html" */ ?>
<?php /*%%SmartyHeaderCode:2809058be5c07a9ea90-11837249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a34ef5bc9ad3babe58933a381e3b36a02af6c830' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\goods_gallery_update.html',
      1 => 1488856412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2809058be5c07a9ea90-11837249',
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
  'unifunc' => 'content_58be5c07adc3c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58be5c07adc3c')) {function content_58be5c07adc3c($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<table>
<tr>
<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
 <td> <a href="goods.php?act=delete_goods_gallery&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
&goods_id=<?php echo $_smarty_tpl->tpl_vars['one']->value['goods_id'];?>
"><img src="../static/imgs/minus.png"></a> <img src="../<?php echo $_smarty_tpl->tpl_vars['one']->value['img_position'];?>
" width="30" height="30" > <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['one']->value['img_discription'];?>
"</td>
<?php } ?> 
       
           
</tr>
</table>

</body>
</html><?php }} ?>