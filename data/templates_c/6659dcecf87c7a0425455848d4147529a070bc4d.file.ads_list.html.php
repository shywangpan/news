<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:41
         compiled from "E:/WWW/qy/templates\admin\ads_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1043658cf90256241d6-06362673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6659dcecf87c7a0425455848d4147529a070bc4d' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\ads_list.html',
      1 => 1489995429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1043658cf90256241d6-06362673',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'one' => 0,
    'adsvsadsp' => 0,
    'showhtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf902570c41',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf902570c41')) {function content_58cf902570c41($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--      <table border="1">
      <tr>
         <td>广告名称</td>
         <td>广告位置</td>
         <td>广告类型</td>
         <td>操作</td>
      </tr>
      
      <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
     <tr>
         <td><?php echo $_smarty_tpl->tpl_vars['one']->value['aname'];?>
</td>
         <td><?php echo $_smarty_tpl->tpl_vars['one']->value['pname'];?>
</td>
         <td><?php echo $_smarty_tpl->tpl_vars['one']->value['type'];?>
</td>
         <td><a href="ads.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['one']->value['type'];?>
&pid=<?php echo $_smarty_tpl->tpl_vars['one']->value['pid'];?>
">修改</a>   <a href="ads.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
">删除</a></td>
    <?php } ?>
      </tr>
     

</table>-->
<body>

  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
       
      </ul>
    </div>
 
    <table class="table table-hover text-center">
      <tr>
         <td>广告名称</td>
         <td>广告位置</td>
         <td>广告类型</td>
         <td>操作</td>
      </tr>
     <!-- <volist name="list" id="vo">-->
       <?php  $_smarty_tpl->tpl_vars['adsvsadsp'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['adsvsadsp']->key => $_smarty_tpl->tpl_vars['adsvsadsp']->value){
$_loop = true;
?> 
        <tr>
         <td><?php echo $_smarty_tpl->tpl_vars['adsvsadsp']->value['aname'];?>
</td>
         <td><?php echo $_smarty_tpl->tpl_vars['adsvsadsp']->value['pname'];?>
</td>
         <?php if ($_smarty_tpl->tpl_vars['adsvsadsp']->value['type']==1){?>
         <td>图片广告</td>
         <?php }elseif($_smarty_tpl->tpl_vars['adsvsadsp']->value['type']==2){?>
          <td>文字广告</td>
         <?php }else{ ?>
            <td>其他广告</td>
         <?php }?>
          <td><div class="button-group">
           <a class="button border-main" href="ads.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['adsvsadsp']->value['adsid'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['adsvsadsp']->value['type'];?>
&pid=<?php echo $_smarty_tpl->tpl_vars['adsvsadsp']->value['ads_pid'];?>
"><span class="icon-edit"></span> 修改</a>
           <a class="button border-red" href="ads.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['adsvsadsp']->value['adsid'];?>
" onclick="return del(1,1,1)" ><span class="icon-trash-o"></span> 删除</a> </div>
          </td>
        <?php } ?>  
        </tr>
      <tr>
        <td colspan="8"><div class="pagelist"> <?php echo $_smarty_tpl->tpl_vars['showhtml']->value;?>
 </div></td>
      </tr>
    </table>
  </div>

<script type="text/javascript">

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