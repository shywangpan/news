<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:20
         compiled from "E:/WWW/qy/templates\admin\goods_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1982758cf901056fd46-73138633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c47fc3a8f0f6779cb52989e9c2789bdc19a412a6' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\goods_add.html',
      1 => 1489739658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1982758cf901056fd46-73138633',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'goods' => 0,
    'option_goods_brand' => 0,
    'option_goods_classify' => 0,
    'FCKeditor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf901062833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf901062833')) {function content_58cf901062833($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
<form  class="form-x"  action="goods.php?act=add&id=<?php echo $_GET['id'];?>
" method="post" enctype="multipart/form-data" onSubmit="return check_sub();" >  
      <div class="form-group">
        <div class="label">
          <label>商品名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="goods_name"  value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_name'];?>
"  data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
      
 
            <div class="form-group">
          <div class="label">
            <label>商品品牌：</label>
          </div>
          <div class="field">
            <select name="brand_name" class="input w50">
              <option value="0">顶级分类</option>
               <?php echo $_smarty_tpl->tpl_vars['option_goods_brand']->value;?>

 
            </select>
            <div class="tips"></div>
          </div>
        </div>
        
        
                <div class="form-group">
          <div class="label">
            <label>商品分类：</label>
          </div>
          <div class="field">
            <select name="cname" class="input w50">
              <option value="0">顶级分类</option>
              <?php echo $_smarty_tpl->tpl_vars['option_goods_classify']->value;?>

 
            </select>
            <div class="tips"></div>
          </div>
        </div>
      
      
      
              <div class="form-group">
      
        </div>
 
      <div class="form-group">
        <div class="label">
          <label>上传商品图片：</label>
        </div>
        <div class="field">
        <input type="file" name="goods_pic" value="" id="goods_pic" onChange="changeSrc(this)">
          <div class="tips"></div>
        </div>
      </div>
   
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <!--
      
           
        <div class="label">
          <label>图片：</label>
        </div>
        <div class="field">
          <input type="text" id="url1" name="img" class="input tips" style="width:25%; float:left;"  value=""  data-toggle="hover" data-place="right" data-image="" />
          <input type="button" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
          <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div>     
      -->
     
      
      
      
      
      
      
      
      
      
      
      
        
        
        <div class="form-group">
      
        </div>
 
      <div class="form-group">
        <div class="label">
          <label>商品简介：</label>
        </div>
        <div class="field">
          <textarea class="input" name="goods_info" style=" height:90px;"><?php echo $_smarty_tpl->tpl_vars['goods']->value['goods_info'];?>
</textarea>
          <div class="tips"></div>
        </div>
      </div>
   
     
     

     
     
     
         
                  <div class="form-group">
        <div class="label">
          <label>本店价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="title" data-validate="member:只能为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
      
      
                  <div class="form-group">
        <div class="label">
          <label>市场价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['shop_price'];?>
" name="shop_price" data-validate="member:只能为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
      
      
                  <div class="form-group">
        <div class="label">
          <label>销量：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['sales'];?>
" name="sales" data-validate="member:只能为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
      
         <div class="form-group">
        <div class="label">
          <label>库存：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $_smarty_tpl->tpl_vars['goods']->value['count'];?>
" name= "count" data-validate="member:只能为数字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        
     
     
       <div class="form-group">
        <div class="label">
          <label>商品描述：</label>
        </div>
        <div class="field">
                         <div style="height:250px; border:0px solid #ddd;"><?php echo $_smarty_tpl->tpl_vars['FCKeditor']->value;?>
</div>
          <!--<textarea name="content" class="input" style="height:450px; border:1px solid #ddd;"> <?php echo $_smarty_tpl->tpl_vars['FCKeditor']->value;?>
</textarea>-->
          <div class="tips"></div>
        </div>
      </div>
      
     
     
     
     
     
     
     
     
     
     
     
     
      <div class="form-group">
        
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