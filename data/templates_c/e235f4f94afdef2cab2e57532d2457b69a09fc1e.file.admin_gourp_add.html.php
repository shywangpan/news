<?php /* Smarty version Smarty 3.1.0, created on 2018-03-16 19:43:10
         compiled from "D:/WWW/qy/templates\admin\admin_gourp_add.html" */ ?>
<?php /*%%SmartyHeaderCode:186735aabadce582543-70778938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e235f4f94afdef2cab2e57532d2457b69a09fc1e' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\admin_gourp_add.html',
      1 => 1489373701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186735aabadce582543-70778938',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'gname' => 0,
    'html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_5aabadce67614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aabadce67614')) {function content_5aabadce67614($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<h1><a href='index.php' id='index'>首页</a></h1>
<h3>  <a href=" admin_gourp.php?act=list">管理员组列表</a><br></h3>
</body>



<form action="admin_gourp.php?act=add&id=<?php echo $_GET['id'];?>
" method="post" enctype="multipart/form-data" >
   <tr>
    <td> 管理员名字 </td>
    <td><input type="text" name="gname" id="gid" value="<?php echo $_smarty_tpl->tpl_vars['gname']->value;?>
"></td> 
  </tr>
  </br></br>
   
    <?php echo $_smarty_tpl->tpl_vars['html']->value;?>

     
  <tr><td><input type="submit" value="提交"></td></tr>
  

</form>


</html><?php }} ?>