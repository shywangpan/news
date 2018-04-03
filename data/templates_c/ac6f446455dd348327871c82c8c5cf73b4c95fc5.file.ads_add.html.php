<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:42
         compiled from "E:/WWW/qy/templates\admin\ads_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1405058cf902611d538-77020978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac6f446455dd348327871c82c8c5cf73b4c95fc5' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\ads_add.html',
      1 => 1489985165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1405058cf902611d538-77020978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ads' => 0,
    'types' => 0,
    'get_all_option_p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf90261bcf7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf90261bcf7')) {function content_58cf90261bcf7($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!--<table>
    
 <form action="ads.php?act=add&id=<?php echo $_GET['id'];?>
" method="post" enctype="multipart/form-data">
    <tr> <td>广告名称</td> <td><input type="text" name="aname" id="aname" value=<?php echo $_smarty_tpl->tpl_vars['ads']->value['aname'];?>
></td></tr>
    
    <tr><td>媒介类型</td>
        <td><select name="type" id="type" onChange="changes(this.value)">
                   <option value="">请选择</option>
                    <?php echo $_smarty_tpl->tpl_vars['types']->value;?>

           
            </select>
        
        </td>
    </tr>
        <tr><td>广告位置</td>
        <td><select name="pid" id="pid">
                  	<option value="">请选择</option>
                    <?php echo $_smarty_tpl->tpl_vars['get_all_option_p']->value;?>

           
            </select>
        </td>
       </tr>
       
    <tr><td>广告链接到的地址</td><td><input type="text" name="href" id="href" value="<?php echo $_smarty_tpl->tpl_vars['ads']->value['href'];?>
"></td></tr>
   
     
    <tr id="picId" style="display:none"> <td>上传图片</td> <td><input type="file" name='pic'></td></tr>
   
    <tr id="textId" style="display:none"> <td>广告内容</td> <td> <textarea name="text" id="" cols="30" rows="10" ><?php echo $_smarty_tpl->tpl_vars['ads']->value['text'];?>
</textarea></td></tr>
  
    <tr><td><input type="submit" value="确定"></td></tr>
    
</form>

-->
<body>


<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form  class="form-x" action="ads.php?act=add&id=<?php echo $_GET['id'];?>
" method="post" enctype="multipart/form-data">  
    
    
      <div class="form-group">
        <div class="label">
          <label>广告名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50"   name="aname" value="<?php echo $_smarty_tpl->tpl_vars['ads']->value['aname'];?>
" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      
              <div class="form-group">
          <div class="label">
            <label>媒介类型：</label>
          </div>
          <div class="field">
            <select name="type" class="input w50" onChange="changes(this.value)">
                    <option value="">请选择</option>
                    <?php echo $_smarty_tpl->tpl_vars['types']->value;?>

            </select>
            <div class="tips"></div>
          </div>
        </div>
        
        
        <div class="form-group">
          <div class="label">
            <label>广告位置：</label>
          </div>
          <div class="field">
            <select name="pid" class="input w50">
                	<option value="">请选择</option>
                      <?php echo $_smarty_tpl->tpl_vars['get_all_option_p']->value;?>

            </select>
            <div class="tips"></div>
          </div>
        </div>
        
      
      <div class="form-group">
        <div class="label">
          <label>广告链接到的地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value=""  name="href" id="href" value="<?php echo $_smarty_tpl->tpl_vars['ads']->value['href'];?>
" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      
         <div class="form-group" id="picId" ><!--style="display:none"-->
        <div class="label">
          <label>上传广告图：</label>
        </div>
        <div class="field">
          <input type="file" class="input w50" value=""  name='pic'   style="width:25%; float:left;border:0px solid #ccc;"  />
           <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div>
      
           <div class="form-group"  id="textId" ><!--style="display:none"-->
        <div class="label">
          <label>广告内容：</label>
        </div>
        <div class="field">
          <!--<input type="text" class="input w50" value=""  name="href"  value="<?php echo $_smarty_tpl->tpl_vars['ads']->value['href'];?>
" data-validate="required:请输入标题" />-->
          <textarea name="text" id="" cols="30" rows="10"  class="input w50" ><?php echo $_smarty_tpl->tpl_vars['ads']->value['text'];?>
</textarea>
          <div class="tips"></div>
        </div>
      </div>
      

      
       
  
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <input class="button bg-main icon-check-square-o" type="submit" value ="提交查询"/> 
        </div>
      </div>
    </form>
  </div>
</div>

</body>
<script>
function changes(id){
	if(id == ""){
		return false;	
	}
	var picId = $("#picId");	
	var textId = $("#textId");
	id = parseInt(id);

	if(id == 1){
		picId.show();
		textId.hide();	
	}else if(id > 1){
		picId.hide();
		textId.show();	
	}
}


</script>
</html><?php }} ?>