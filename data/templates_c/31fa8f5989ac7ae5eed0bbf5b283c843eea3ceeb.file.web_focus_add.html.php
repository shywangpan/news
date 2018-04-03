<?php /* Smarty version Smarty 3.1.0, created on 2017-03-03 16:14:12
         compiled from "E:/WWW/qy/templates\admin\web_focus_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1148658b925d4ccf966-68637913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31fa8f5989ac7ae5eed0bbf5b283c843eea3ceeb' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\web_focus_add.html',
      1 => 1488526595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1148658b925d4ccf966-68637913',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_focus_row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58b925d4d1b99',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b925d4d1b99')) {function content_58b925d4d1b99($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台管理-幻灯片添加/修改</title>
</head>
<body>
<h1><a href='index.php' id='index'>首页</a></h1>
<h3><a href="web_focus.php?act=list">图片列表</a></h3>

<table>
      
      <form action="web_focus.php?act=add&id=<?php echo $_GET['id'];?>
" method="post" enctype="multipart/form-data">
          <tr><td>图片名字:</td> <td><input type="text" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['web_focus_row']->value['title'];?>
"></td>  </tr> 
          <tr> <td>图片地址:</td><td><input type="file" name="href" id="href" value="<?php echo $_smarty_tpl->tpl_vars['web_focus_row']->value['href'];?>
">  <img src="../<?php echo $_smarty_tpl->tpl_vars['web_focus_row']->value['href'];?>
 " width="30" height="30" alt=""></td></tr>
          <tr><td>跳转地址:</td><td><input type="text" name="pic_url" id="pic_url" value="<?php echo $_smarty_tpl->tpl_vars['web_focus_row']->value['pic_url'];?>
"></td></tr>
          <tr><td>排序:</td>  <td><input type="text" name="sort_seq" id="sort_seq" value="<?php echo $_smarty_tpl->tpl_vars['web_focus_row']->value['sort_seq'];?>
"></td></tr>
          <tr><td><input type="submit"></td></tr>
     </form>
</table>


</body>
</html><?php }} ?>