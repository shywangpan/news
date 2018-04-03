<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:26
         compiled from "E:/WWW/qy/templates\admin\news_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1018358cf90168355d9-40560537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ad55de71da05998e24e975e12f30fbef5269921' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\news_add.html',
      1 => 1489986959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1018358cf90168355d9-40560537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'news' => 0,
    'option' => 0,
    'FCKeditor' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf90168bbaa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf90168bbaa')) {function content_58cf90168bbaa($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<!--<table>
  <form action="news.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
" method="post"  enctype="multipart/form-data" onSubmit=" return check_sub();">
    <tr>
        <td>
          <select name="cid" id="cid">
              <option value="0">请选择新闻分类</option>  
              <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

          </select>
      </td>
    </tr>
    <tr>
        <td>新闻标题:</td>
        <td><input type="text" name="title" id="title" value="<?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
"></td>
    </tr>
    <tr>
        <td>新闻简介:</td>
        <td><textarea name="info" id="info" cols="20" rows="6" ><?php echo $_smarty_tpl->tpl_vars['news']->value['info'];?>
</textarea>  </td>  
   </tr>  
        <tr>
        <td>新闻logo:</td>
        <td><input type="file" name="logo" id="logo" onChange="changeSrc(this)"> </td> 
    </tr> 
     <tr>
        <td>新闻内容:</td>
        <td><?php echo $_smarty_tpl->tpl_vars['FCKeditor']->value;?>
</td>
    </tr>
    <tr>
       <td><input type="submit" value="保存"></td>
    </tr>
  </form>
</table> -->


<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form action="news.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
" method="post"  enctype="multipart/form-data" class="form-x" >  
    
    
    <div class="form-group">
          <div class="label">
            <label>请选择新闻分类：</label>
          </div>
          <div class="field">
            <select name="cid" class="input w50">
            <option value="0">请选择新闻分类</option>  
               <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

            </select>
            
            <div class="tips"></div>
          </div>
        </div>
    
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="title"  value="<?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      
            <div class="form-group">
        <div class="label">
          <label>新闻logo：</label>
        </div>
        <div class="field">
          <input type="file" name="logo"  class="input tips" style="width:25%; float:left; border:0px solid #ccc"  />
          
          <div class="tipss">图片尺寸：500*500</div>
        </div>
      </div> 
      
       <div class="form-group">
        <div class="label">
          <label>新闻简介：</label>
        </div>
        <div class="field">
          <textarea class="input" name="info" style=" height:90px;"><?php echo $_smarty_tpl->tpl_vars['news']->value['info'];?>
</textarea>
          <div class="tips"></div>
        </div>
      </div>
      
      
       <div class="form-group">
        <div class="label">
          <label>新闻内容：</label>
        </div>
        <div class="field">
        <?php echo $_smarty_tpl->tpl_vars['FCKeditor']->value;?>

         
          <div class="tips"></div>
        </div>
      </div>
     
       
     
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
        <!--<input type="submit" class="button bg-main icon-check-square-o" />-->
             <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
         
        </div>
      </div>
    </form>
  </div>
</div>

</body></html><?php }} ?>