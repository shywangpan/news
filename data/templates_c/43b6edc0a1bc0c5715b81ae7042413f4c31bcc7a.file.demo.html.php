<?php /* Smarty version Smarty 3.1.0, created on 2017-02-20 13:16:00
         compiled from "D:/WWW/qy/templates\admin\demo.html" */ ?>
<?php /*%%SmartyHeaderCode:1251758aa7b904d2f89-48057494%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b6edc0a1bc0c5715b81ae7042413f4c31bcc7a' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\demo.html',
      1 => 1487567225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1251758aa7b904d2f89-48057494',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'option' => 0,
    'rs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58aa7b904fdf1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58aa7b904fdf1')) {function content_58aa7b904fdf1($_smarty_tpl) {?>
<!doctype html>
<html lang="utf8">
<head>
</head>
<body>
	
    
     	<form action="demo.php">
		<select name="" >
			<option value="0">顶级分类</option> 
			<?php echo $_smarty_tpl->tpl_vars['option']->value;?>

		</select>
       <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['cname'];?>
" name="class_name" >
        <input type="submit">
   </form>

    

    
</body>
</html>

<?php }} ?>