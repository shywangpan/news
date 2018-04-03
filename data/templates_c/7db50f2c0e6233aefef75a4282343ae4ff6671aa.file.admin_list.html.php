<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:18:53
         compiled from "E:/WWW/qy/templates\admin\admin_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2548858cf906db84e31-14810644%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7db50f2c0e6233aefef75a4282343ae4ff6671aa' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\admin_list.html',
      1 => 1489997723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2548858cf906db84e31-14810644',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf906dc6e01',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf906dc6e01')) {function content_58cf906dc6e01($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--      <table border="1">
      <tr>
         <td>管理员名称</td>
         <td>管理员状态</td>
        <td>管理员组</td>
         <td>操作</td>
      </tr>
      
      <?php  $_smarty_tpl->tpl_vars['admin'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->key => $_smarty_tpl->tpl_vars['admin']->value){
$_loop = true;
?>
     <tr>
         <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['user_name'];?>
</td>
         <td><a href=""  onclick="disab(<?php echo $_smarty_tpl->tpl_vars['admin']->value['status'];?>
,<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
)"> <?php if ($_smarty_tpl->tpl_vars['admin']->value['status']==1){?>禁用 <?php }else{ ?>激活<?php }?> </a></td>
         <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['gname'];?>
</td>
         <td><a href="admin.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
">修改</a>   <a href="admin.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
">删除</a></td>
    <?php } ?>
      </tr>
     

</table>-->
<body>

   <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="admin_gourp.php?act=add"> 添加管理员组</a> </li>
       
    
      
      

      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <td>管理员名称</td>
         <td>管理员状态</td>
        <td>管理员组</td>
         <td>操作</td>
       
      </tr>
 
      
      <volist name="list" id="vo">
       <?php  $_smarty_tpl->tpl_vars['admin'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->key => $_smarty_tpl->tpl_vars['admin']->value){
$_loop = true;
?>
     <tr>
         <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['user_name'];?>
</td>
         <td><a href=""  onclick="disab(<?php echo $_smarty_tpl->tpl_vars['admin']->value['status'];?>
,<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
)"> <?php if ($_smarty_tpl->tpl_vars['admin']->value['status']==1){?>禁用 <?php }else{ ?>激活<?php }?> </a></td>
         <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['gname'];?>
</td>
         <td><div class="button-group"> <a class="button border-main" href="admin.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="admin.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
    <?php } ?>
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td>
      </tr>
    </table>
  </div>

<script type="text/javascript">
 function disab(num,id){
	 var num = parseInt(num);
	 var id = parseInt(id);
	 if(id == 1 ){
		 alert('不能禁用后台管理员');
     	return false;
	 }
	 if(num == 1 ){
		  $.get("admin.php?act=status&status=2&id="+id,null,'text');
	 }else{
		  $.get("admin.php?act=status&status=1&id="+id,null,'text');
	 }
 }

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		return true;
		
	}else{
		return false; 
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

</script>
</body>
</html><?php }} ?>