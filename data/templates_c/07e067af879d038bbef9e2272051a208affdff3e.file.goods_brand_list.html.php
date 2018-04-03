<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:22
         compiled from "E:/WWW/qy/templates\admin\goods_brand_list.html" */ ?>
<?php /*%%SmartyHeaderCode:163758cf9012a3af52-31463565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07e067af879d038bbef9e2272051a208affdff3e' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\goods_brand_list.html',
      1 => 1489973876,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163758cf9012a3af52-31463565',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'one' => 0,
    'showhtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf9012aea4f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf9012aea4f')) {function content_58cf9012aea4f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
       
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <!--<th width="10%">排序</th>-->
        <th>图片id</th>
        <th>图片名称</th>
        <th>图片</th>
        <th width="310">操作</th>
          
          
     <!--   <th>分类名称</th>-->
       <!-- <th width="10%">更新时间</th>-->
  <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>    
      </tr>
      <volist name="list" id="vo">
        <tr>
      
          <td><?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['one']->value['brand_name'];?>
</td>
           <td width="10%"><img src="<?php echo $_smarty_tpl->tpl_vars['one']->value['brand_pic'];?>
" alt="" width="70" height="50" /></td>
           
          <td><div class="button-group"> <a class="button border-main" href="goods_brand.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="goods_brand.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
" ><span class="icon-trash-o"></span> 删除</a> </div></td>
      <?php } ?>
        </tr>

      <tr>
        <td colspan="8"><div class="pagelist"> <?php echo $_smarty_tpl->tpl_vars['showhtml']->value;?>
 </div></td>
      </tr>
    </table>
  </div>
</form>
<!--<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>-->
</body>
</html><?php }} ?>