<?php /* Smarty version Smarty 3.1.0, created on 2018-03-16 19:48:20
         compiled from "D:/WWW/qy/templates\admin\goods_list.html" */ ?>
<?php /*%%SmartyHeaderCode:50335aabaf04a0d5e3-70060729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '385e287d7e15b8f5266f536af454f86c112a4e4c' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\goods_list.html',
      1 => 1489740252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50335aabaf04a0d5e3-70060729',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'option_goods_brand' => 0,
    'option_goods_classify' => 0,
    'list' => 0,
    'one' => 0,
    'showhtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_5aabaf04dd244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aabaf04dd244')) {function content_5aabaf04dd244($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<form method="get" action="goods.php?act=list&id=<?php echo $_GET['id'];?>
" id="listform" enctype="multipart/form-data">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 商品列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="goods.php?act=add"> 添加内容</a> </li>
        <li></li>
        <li>
     
          <li>
            <select name="brand_id" class="input" style="width:200px; line-height:17px;" onChange="changesearch()">
              <option value="">请选择商品品牌</option>
               <?php echo $_smarty_tpl->tpl_vars['option_goods_brand']->value;?>

            </select>
          </li>  
        </li>
        <if condition="$iscid eq 1">
          <li>
            <select name="classify_id" class="input" style="width:200px; line-height:17px;" onChange="changesearch()">
              <option value="">请选择分类</option>
              <?php echo $_smarty_tpl->tpl_vars['option_goods_classify']->value;?>

            </select>
          </li>
        </if>
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
           <td><input type="submit" class="button border-main icon-search" value="搜索" name="search" id="search">
         
     
      </ul>
    </div>
</form>    
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">商品ID</th>
        
        <th>图片</th>
        <th>商品名称</th>
        <th>本店价格</th>  
        <th>市场价格</th>
         <th>上架下架</th>
        <th>销量</th>
        <th>库存</th> 

       
        <th width="10%">上架时间</th>

 
       

        <th width="310">操作</th>

      </tr>
    


<?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
 <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" /><?php echo $_smarty_tpl->tpl_vars['one']->value['goods_id'];?>
</td>
       
          <td width="10%"><img src="../<?php echo $_smarty_tpl->tpl_vars['one']->value['goods_pic'];?>
" alt="" width="70" height="50" /></td>
          <td><?php echo $_smarty_tpl->tpl_vars['one']->value['goods_name'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['one']->value['shop_price'];?>
</td>  
          <td><?php echo $_smarty_tpl->tpl_vars['one']->value['market_price'];?>
</td> 
        <td><?php if ($_smarty_tpl->tpl_vars['one']->value['is_shelves']==1){?>上架<?php }else{ ?>下架<?php }?></td> 
        <td><?php echo $_smarty_tpl->tpl_vars['one']->value['sales'];?>
</td> 
        <td><?php echo $_smarty_tpl->tpl_vars['one']->value['count'];?>
</td>
         <td><?php echo $_smarty_tpl->tpl_vars['one']->value['add_time'];?>
</td>
          <td><div class="button-group"> <a class="button border-main" href="goods.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['goods_id'];?>
"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="
          goods.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['goods_id'];?>
" onClick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
<?php } ?>

</tr>


  
        </tr>
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        
      </tr>
      <tr>
      <!-- <td colspan="8"><div class="pagelist"> <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a> </div></td> -->
         
          <td colspan="8"><div class="pagelist"> <?php echo $_smarty_tpl->tpl_vars['showhtml']->value;?>
 </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		return true;
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