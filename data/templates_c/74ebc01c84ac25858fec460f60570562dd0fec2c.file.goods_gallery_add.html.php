<?php /* Smarty version Smarty 3.1.0, created on 2017-03-09 10:09:51
         compiled from "E:/WWW/qy/templates\admin\goods_gallery_add.html" */ ?>
<?php /*%%SmartyHeaderCode:3060758c0b96faf1656-60597580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74ebc01c84ac25858fec460f60570562dd0fec2c' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\goods_gallery_add.html',
      1 => 1488780426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3060758c0b96faf1656-60597580',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58c0b96fb833e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c0b96fb833e')) {function content_58c0b96fb833e($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<script language="javascript" src="../static/js/jquery-3.1.1.js">
</script>

<style>
table,tr,td{margin:0;
   padding:0;
   border:0px solid #ccc
}
</style>

<body>
<h1><a href='index.php'>回到首页</a></h1>
 <h1> <a href="goods_gallery.php?act=list">商品图片列表</a></h1>
 
 <form action="goods_gallery.php?act=add&id=<?php echo $_GET['id'];?>
" enctype="multipart/form-data" method="post">
 <input type="hidden" value="1" id="seq" name="seq">
 <table border="1">
  <tr id="tr1" class="clas1">
    <td><a href="javascript:;" id="firsttr"><img src="../static/imgs/add.png"><a/></td>
    <td>图片描述:</td> <td><input type="text" name="img_discription[]" value=""></td>
    <td>图片</td><td><input type="file" name="img_position[]" value=""> </td>
    <td>或者外部链接</td>  <td><input type="text" name="out_href[]" value=""></td>
  </tr>
   
   
   <tr><td><input type="submit" id="sub" name="sub" value="保存"> </td></tr>
</table>

</form>

</body>
<script>
$('#firsttr').click(function(){
	var seq = parseInt($("#seq").val()) + 1 ; //点击时候hidden本身的value+1
	$("#seq").val(seq);                       //把加1后的值再赋给自己 
	
	var html = '<tr id="tr1" class="clas'+seq+'"><td><a href="javascript:;" id="jian" onclick="jian('+seq+')"><img src="../static/imgs/minus.png"><a/></td><td>图片描述:</td> <td><input type="text" name="img_discription[]" value=""></td><td>图片</td><td><input type="file" name="img_position[]" value=""> </td><td>或者外部链接</td>  <td><input type="text" name="out_href[]" value=""></td></tr>';

	$("#tr1").after(html);                   //给tr1加字符串元素
	
})
function jian(seq){
	$(".clas"+seq).remove();
	var seq = parseInt($("#seq").val()) - 1;
	$("#seq").val(seq);	
}
</script>

</html><?php }} ?>