<?php /* Smarty version Smarty 3.1.0, created on 2018-03-16 20:41:05
         compiled from "D:/WWW/qy/templates\admin\goods_classify_add.html" */ ?>
<?php /*%%SmartyHeaderCode:67935aabbb61e7e420-47353138%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36bf1eeded0cfb9ea00eef48e3ce7386866445d3' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\goods_classify_add.html',
      1 => 1489976778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67935aabbb61e7e420-47353138',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'cname' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_5aabbb6203dd6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aabbb6203dd6')) {function content_5aabbb6203dd6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="goods_classify.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">  
      <div class="form-group">
        <div class="label">
          <label>分类名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="cname" value="<?php echo $_smarty_tpl->tpl_vars['cname']->value;?>
" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>

        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <select name='pid' class="input w50">
              <option value="0">顶级分类</option>
              <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

            
            </select>
            <div class="tips"></div>
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