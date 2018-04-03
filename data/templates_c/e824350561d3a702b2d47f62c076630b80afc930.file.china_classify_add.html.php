<?php /* Smarty version Smarty 3.1.0, created on 2017-03-03 13:02:44
         compiled from "E:/WWW/qy/templates\admin\china_classify_add.html" */ ?>
<?php /*%%SmartyHeaderCode:615158b8f8f42d8348-84928533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e824350561d3a702b2d47f62c076630b80afc930' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\china_classify_add.html',
      1 => 1488184441,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '615158b8f8f42d8348-84928533',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'option' => 0,
    'cname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58b8f8f434661',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b8f8f434661')) {function content_58b8f8f434661($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>

 
 
 
 
 
 

 
 
 
   <form action="china_classify.php?act=add&id=" method=post>
   	       
   	         <select name="pid" >
   	         	<option value="0">顶级分类</option>
   	         	<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
  
   	         </select>
            <input type="text" name='cname' value=<?php echo $_smarty_tpl->tpl_vars['cname']->value;?>
>
          <input type="submit" value='提交'> 
             
          

   </form>





</body>
</html><?php }} ?>