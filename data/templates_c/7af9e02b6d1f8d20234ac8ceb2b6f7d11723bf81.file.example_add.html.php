<?php /* Smarty version Smarty 3.1.0, created on 2017-03-16 14:22:56
         compiled from "E:/WWW/qy/templates\admin\example_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1672858ca2f4033ca03-15794490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7af9e02b6d1f8d20234ac8ceb2b6f7d11723bf81' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\example_add.html',
      1 => 1489643214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1672858ca2f4033ca03-15794490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'seq' => 0,
    'example' => 0,
    'gallery_html' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58ca2f403d1e3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ca2f403d1e3')) {function content_58ca2f403d1e3($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<script language="javascript" src="../static/js/jquery-3.1.1.js">
</script>
<body>
<h1><a href='index.php' id='index'>首页</a></h1>
  <h3><a href="example.php?act=list">案例列表</a></h3>
<form action="example.php?act=add&id=<?php echo $_GET['id'];?>
" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['seq']->value;?>
" id="seq" name="seq">

<table >
   
  <tr><td>案例标题</td>   <td><input type="text" name="title"  value="<?php echo $_smarty_tpl->tpl_vars['example']->value['title'];?>
"></td></tr>
  <tr><td>案例费用</td><td><input type="text" name="price" value="<?php echo $_smarty_tpl->tpl_vars['example']->value['price'];?>
"></td></tr>
  <tr><td>logo</td><td><input type="file" name="logo"></td></tr>
  <tr><td>案例内容</td><td><textarea name="content" id="" cols="30" rows="10" ><?php echo $_smarty_tpl->tpl_vars['example']->value['content'];?>
</textarea></td></tr>
  <tr><td>设计方案</td><td><textarea name="plan" id="" cols="30" rows="10"  ><?php echo $_smarty_tpl->tpl_vars['example']->value['plan'];?>
</textarea></td></tr>
  
   

 
   <?php if ($_GET['id']>0){?>
  <?php echo $_smarty_tpl->tpl_vars['gallery_html']->value;?>

  <?php }else{ ?>
    <tr  class="class1">
    <td><a href="javascript:;" id="first1"><img src="../static/imgs/add.png"><a/></td>
    <td>图片描述:</td> <td><input type="text" name="gtitle[]" value=""></td>
    <td>图片</td><td><input type="file" name="href[]" value=""> </td>
     <td> <input type="hidden" id="imgid" name="imgid[]" value=""/></td>
    </tr>
  
   <?php }?>

   <tr><td><input type="submit" valu="保存"></td></tr>
  
 

   
   
</table>

</form>

</body>

<script>





$('#first1').click(function(){
	var seq = parseInt($("#seq").val()) + 1 ; //点击时候hidden本身的value+1
	$("#seq").val(seq);                       //把加1后的值再赋给自己 
	var html = '<tr class="class'+seq+'"> <td><a href="javascript:;" id="first" onclick="jian('+seq+')"><img src="../static/imgs/minus.png"><a/></td> <td>图片描述:</td> <td><input type="text" name="gtitle[]" value=""></td><td>图片</td><td><input type="file" name="href[]" value=""> </td><td> <input type="hidden" id="imgid" name="imgid[]" value=""/></td></tr>';
	$(".class1").after(html);                   //给tr1加字符串元素
	
})
function jian(seq , id){ // goods_gallery的id 
	$(".class"+seq).remove();
	var seq = parseInt($("#seq").val()) - 1;
	$("#seq").val(seq);
	if(id > 0){
		$.post('example.php?act=delimg&id='+id , null, function(rs){
			//alert(rs) $.post('请求url',{请求数据}, 回调函数,返回数据格式)
		},'text')
	}
}
</script>

</html><?php }} ?>