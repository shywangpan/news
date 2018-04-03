<?php /* Smarty version Smarty 3.1.0, created on 2017-03-13 10:57:34
         compiled from "E:/WWW/qy/templates\admin\demo_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2662958c60a9eef36d7-38841508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eaa28c1a23f047c0e07f1502444f24c2e93c1a04' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\demo_list.html',
      1 => 1489040681,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2662958c60a9eef36d7-38841508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'goods' => 0,
    'one' => 0,
    'html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58c60a9f03304',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c60a9f03304')) {function content_58c60a9f03304($_smarty_tpl) {?>
<!doctype html>
<html lang="utf8">
<head>
</head>
<script language="javascript" src="../static/js/jquery-3.1.1.js">
</script>
<body>
	<h1><a href='index.php'>首页</a></h1>
    <h2><a href='demo.php?act=add'>添加测试</a></h2>
  
  
  <!--
  <table>
  <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
   <tr>
  <td><?php echo $_smarty_tpl->tpl_vars['one']->value['goods_id'];?>
<td><a href="demo.php?act=add&goods_id=<?php echo $_smarty_tpl->tpl_vars['one']->value['goods_id'];?>
">修改</a> 
  <tr>
  <?php } ?>
  
  </table>
  
  
  
  
  
 
  
  
  
  
  
  
  
  
  
  
  
 
<table border="1">
	<tr id="a10">   <td>  <a href="javascript:;"> a10 </a>  </td>  </tr>
	<?php echo $_smarty_tpl->tpl_vars['html']->value;?>

</table>

     -->
     
<form  action="demo.php?act=add" method="post"  enctype="multipart/form-data">  
     
			<input type ="file"  name="img[]"  id="file"><br>
            <input type ="file"  name="img[]"  id="file"><br>
            
            
            <input type ="file"  name="imgone"  id="file"><br>

            <input type="submit">
</form>  
    
</body>

<script> 
window.onload=function(){
	$('#a0').click(function(){
	
html='<tr><td>  <a href="">a10</a>  </td></tr>';
$("#a0").after(html);
})

	}


</script>

</html>

<?php }} ?>