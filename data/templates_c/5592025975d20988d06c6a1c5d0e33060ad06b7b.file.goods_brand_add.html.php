<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:23
         compiled from "E:/WWW/qy/templates\admin\goods_brand_add.html" */ ?>
<?php /*%%SmartyHeaderCode:3069958cf9013445196-85107487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5592025975d20988d06c6a1c5d0e33060ad06b7b' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\goods_brand_add.html',
      1 => 1489974979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3069958cf9013445196-85107487',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'list_one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf901349a0f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf901349a0f')) {function content_58cf901349a0f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="goods_brand.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  enctype="multipart/form-data">  
      
      
      <div class="form-group">
        <div class="label">
          <label>名字：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $_smarty_tpl->tpl_vars['list_one']->value['brand_name'];?>
" name="brand_name" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      
      
        <div class="form-group">
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
        
            <?php if ($_smarty_tpl->tpl_vars['list_one']->value['brand_pic']){?>
   <A href="../<?php echo $_smarty_tpl->tpl_vars['list_one']->value['brand_pic'];?>
"  target="_blank"> <img src="../<?php echo $_smarty_tpl->tpl_vars['list_one']->value['brand_pic'];?>
" width="100" height="80"  class="input w50" style="width:50px;height:50px" ></A><br>
    <?php }?>
    
         <!-- <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />-->
          <div class="tips"></div>
        </div>
      </div>
     
     
      <div class="form-group">
        <div class="label">
          <label>上传图片：</label>
        </div>
        <div class="field">
       <!--   <input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""  data-toggle="hover" data-place="right" data-image="" />
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">-->
          
           <input type="file" name="brand_logo" value="" id="brand_logo" onChange="changeSrc(this)"  style="width:25%; float:left;" >
          <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div>     

     
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html><?php }} ?>