<?php /* Smarty version Smarty 3.1.0, created on 2017-03-23 18:56:28
         compiled from "D:/WWW/qy/templates\admin\news_class_add.html" */ ?>
<?php /*%%SmartyHeaderCode:2660258d3a9dc29b775-46984655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3be36e7619a81133b59c26be84433374219ad4c4' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\news_class_add.html',
      1 => 1489988002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2660258d3a9dc29b775-46984655',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'optinos' => 0,
    'rs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58d3a9dc3d7e3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d3a9dc3d7e3')) {function content_58d3a9dc3d7e3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--
    	<form action="news_class.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"  method="post">
        <select id="pid" name="pid">
        	<option value="0">顶级分类</option>
            <?php echo $_smarty_tpl->tpl_vars['optinos']->value;?>

        </select>
		<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['cname'];?>
" name="class_name" >
		<input type="submit" value="提交" name="sub">	
	    </form>-->
     	
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="news_class.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">  
      <div class="form-group">
        <div class="label">
          <label>分类名：</label>
        </div>
        <div class="field">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['cname'];?>
" name="class_name" class="input w50"  data-validate="required:请输入分类名" />
          <div class="tips"></div>
        </div>
      </div>
     
      
      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <select name="pid" class="input w50">
	<option value="0">顶级分类</option>
           <?php echo $_smarty_tpl->tpl_vars['optinos']->value;?>

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

</body></html>
<?php }} ?>