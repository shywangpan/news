<?php /* Smarty version Smarty 3.1.0, created on 2017-03-15 14:50:07
         compiled from "E:/WWW/qy/templates\admin\flink_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1004058c8e41f2e0313-99650858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '341d2752175534e28a99bc36bb5e3f22c08bfee5' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\flink_add.html',
      1 => 1489480164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1004058c8e41f2e0313-99650858',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'flink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58c8e41f32686',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c8e41f32686')) {function content_58c8e41f32686($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>

<h1><a href='index.php'>回到首页</a></h1>
 <h1> <a href="flink.php">链接列表</a></h1>
 <table>
 <form action="flink.php?act=add&id=<?php echo $_GET['id'];?>
"  method="post"  enctype="multipart/form-data" >
   
   <tr> <td>链接名字</td>  <td> <input type="text"   value="<?php echo $_smarty_tpl->tpl_vars['flink']->value['link_name'];?>
" name="link_name" id=''></td></tr>
   <tr> <td> 链接地址</td>  <td>   <input type="text"   value="<?php echo $_smarty_tpl->tpl_vars['flink']->value['link_href'];?>
" name="link_href" id=''></td></tr>
   <tr> <td>排序</td>  <td>   <input type="text"   value="<?php echo $_smarty_tpl->tpl_vars['flink']->value['order'];?>
" name="order" id=''></td></tr>
   <tr> <td>上传图片</td>  <td><input type="file" name="logo" value="" id="" onChange=""></td></tr>
   <tr> <td>	<input type="submit"   value="上传" id="sub"></td></tr>
   
   
   
   
   
  

 
   
    
 
 </form>
</table>
</body>
</html><?php }} ?>