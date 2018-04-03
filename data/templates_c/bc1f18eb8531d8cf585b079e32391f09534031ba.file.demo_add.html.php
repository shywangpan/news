<?php /* Smarty version Smarty 3.1.0, created on 2017-03-09 09:58:55
         compiled from "E:/WWW/qy/templates\admin\demo_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1039958c0b6df5ef1e4-64149193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc1f18eb8531d8cf585b079e32391f09534031ba' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\demo_add.html',
      1 => 1488960213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1039958c0b6df5ef1e4-64149193',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58c0b6df6379e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c0b6df6379e')) {function content_58c0b6df6379e($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<script language="javascript" src="../static/js/jquery-3.1.1.js">
</script>
<body>

	<a href='index.php'>首页</a>
     <h2><a href='demo.php?act=list'>显示测试</a></h2>
    
  

  <table border="1">
	 
	<form action="demo.php?act=add&goods_id=<?php echo $_GET['goods_id'];?>
" method="post" enctype="multipart/form-data">
	    <input type="hidden" name='seq' id='seq' value='1'>	
    	<?php if ($_GET['goods_id']>0){?>
   
         <?php echo $_smarty_tpl->tpl_vars['html']->value;?>

        <?php }else{ ?>
        <tr id="first_add">
			<td><a href="javascript:;">添加测试:<input type="file" name="img_position[]" ></a></td>
		</tr>
		<?php }?>
        <tr>
			<td><input type="submit" ></td>
		</tr>
	

	</form>

</table>

  
  

 
</body>

<script>
    
   
	$('#first_add').click(function(){
		
	    var seq = parseInt($('#seq').val()) + 1;
		 var html = '<tr class="class'+seq+'"><td><a href="javascript:;" onclick=remove('+seq+');></a>减去:<input type="file" name="img_position[]" ></td></tr>';
		$('#seq').val(seq); 
		$('#first_add').after(html)
	})
	function remove(seq,id){
		$('.class'+seq).remove();
		var seq = parseInt($('#seq').val()) - 1
	    $('#seq').val(seq); 
	}
	
	

</script>
</html>
<?php }} ?>