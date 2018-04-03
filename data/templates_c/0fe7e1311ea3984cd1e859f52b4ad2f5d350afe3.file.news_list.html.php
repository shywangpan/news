<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:25
         compiled from "E:/WWW/qy/templates\admin\news_list.html" */ ?>
<?php /*%%SmartyHeaderCode:918558cf9015c7c2d6-60018453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fe7e1311ea3984cd1e859f52b4ad2f5d350afe3' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\news_list.html',
      1 => 1489979286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '918558cf9015c7c2d6-60018453',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'news' => 0,
    'showhtml' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf9015ddbe2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf9015ddbe2')) {function content_58cf9015ddbe2($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!--</table>
<table border="1">
  <tr>
    <td>标题</td>
    <td>简介</td>
    <td>点击量</td>
    <td>添加时间</td>
    <td>显示隐藏</td>
    <td>图片</td>
    <td>操作</td>
 </tr> 
 
<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
$_loop = true;
?>
 <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['news']->value['info'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['news']->value['click'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['news']->value['add_time'];?>
</td>
    <td>
         <?php if ($_smarty_tpl->tpl_vars['news']->value['status']==1){?>
         显示
         <?php }else{ ?>
         隐藏
         <?php }?>
    </td>
    <td><a href=""><img src="../<?php echo $_smarty_tpl->tpl_vars['news']->value['logo'];?>
" alt="" width="30" height="30"></a></td>
    <td><a href="news.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
">删除</a> <a href="news.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
">修改</a>
        <br>
        <?php if ($_smarty_tpl->tpl_vars['news']->value['status']==1){?>     
        <a href="news.php?act=onoff&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
&status=2">隐藏</a>
        <?php }else{ ?>
        <a href="news.php?act=onoff&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
&status=1">显示</a>
        <?php }?>
        
    </td>
<?php } ?>
</tr>
</table>
<?php echo $_smarty_tpl->tpl_vars['showhtml']->value;?>

-->




<body>
<form action="news.php?act=list" method="get">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="news.php?act=add"> 添加内容</a> </li>
     
        <li>请选择新闻分类
          <select name="cid" class="input" onchange="changesearch()" style="width:200px; line-height:17px;; display:inline-block">
  
                <option value="0">请选择</option>
                   <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

          </select>
       
        </li>
       
        <li>
          <input type="text" placeholder="请输入搜索关键字" name="keyword"  class="input" style="width:250px; line-height:17px;display:inline-block" />
     <!--     <a href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</a></li>-->
           <input type="submit"  value="搜索" class="button border-main icon-search"></li>
           <a href="news.php" class="button border-main ">取消搜索</a>
          <input type=hidden name="hidden" value="hidden">
          
      </ul>
    </div>
 </form>
    
    
    
<!--    <form action="news.php?act=list" method="get">
  <tr>
    <td>
      <select name="cid" id="">
       <option value="0">请选择</option>
       <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

      </select>
   </td>
 
 
     <td>关键字:</td>
     <td><input type="text" name="keyword"></td>   
     <td><input type="submit"  value="搜索"></td>
     <td><a href="news.php">取消搜索</a></td>
     <input type=hidden name="hidden" value="hidden">
  </tr> 
</form>
    -->
    
    
    
    
    
    
    <table class="table table-hover text-center">
      <tr>
      <!--  <th width="100" style="text-align:left; padding-left:20px;">ID</th>-->
        <td>标题</td>
        <td>简介</td>
     
        <td>点击量</td>
        <td>显示隐藏</td>
        <td>图片</td>
         <td width="10%">添加时间</td>
         
        <td width="310">操作</td>
      </tr>
 
         

      
      
      <volist name="list" id="vo">
  
               
         
 <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value){
$_loop = true;
?>
 <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['news']->value['info'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['news']->value['click'];?>
</td>
  
    <td>
         <?php if ($_smarty_tpl->tpl_vars['news']->value['status']==1){?>
         显示
         <?php }else{ ?>
         隐藏
         <?php }?>
    </td>
     <td width="10%"><img src="../<?php echo $_smarty_tpl->tpl_vars['news']->value['logo'];?>
" alt="" width="70" height="50" /></td>
      <td><?php echo $_smarty_tpl->tpl_vars['news']->value['add_time'];?>
</td>
 
 
           <td>
            <div class="button-group"> 
              <a class="button border-main" href="news.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
"><span class="icon-edit"></span> 修改</a>
              <?php if ($_smarty_tpl->tpl_vars['news']->value['status']==1){?>   
                <a class="button border-main" href="news.php?act=onoff&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
&status=2"><span class="icon-edit"></span> 隐藏</a>
                 <?php }else{ ?>
                <a class="button border-main" href="news.php?act=onoff&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
&status=1"><span class="icon-edit"></span>显示 </a>
                <?php }?>
              <a class="button border-red" href="news.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
)" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> 
            </div>
            </td>
           
 
<?php } ?>

   
        
        
        
<!--   		 <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value="" />
           1</td>
          <td><input type="text" name="sort[1]" value="1" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;" /></td>
          <td width="10%"><img src="images/11.jpg" alt="" width="70" height="50" /></td>
          <td>这是一套MUI后台精美管理系统，感谢您的支持</td>
          <td><font color="#00CC99">首页</font></td>
          <td>产品分类</td>
          <td>2016-07-01</td>
          <td><div class="button-group"> <a class="button border-main" href="add.html"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
       -->
       
        </tr>
<!--      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
        <td colspan="7" style="text-align:left;padding-left:20px;"><a href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</a> <a href="javascript:void(0)" style="padding:5px 15px; margin:0 10px;" class="button border-blue icon-edit" onclick="sorts()"> 排序</a> 操作：
          <select name="ishome" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeishome(this)">
            <option value="">首页</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          <select name="isvouch" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)">
            <option value="">推荐</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          <select name="istop" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeistop(this)">
            <option value="">置顶</option>
            <option value="1">是</option>
            <option value="0">否</option>
          </select>
          &nbsp;&nbsp;&nbsp;
          
          移动到：
          <select name="movecid" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecate(this)">
            <option value="">请选择分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
            <option value="">产品分类</option>
          </select>
          <select name="copynum" style="padding:5px 15px; border:1px solid #ddd;" onchange="changecopy(this)">
            <option value="">请选择复制</option>
            <option value="5">复制5条</option>
            <option value="10">复制10条</option>
            <option value="15">复制15条</option>
            <option value="20">复制20条</option>
          </select></td>
      </tr>-->
      <tr>
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