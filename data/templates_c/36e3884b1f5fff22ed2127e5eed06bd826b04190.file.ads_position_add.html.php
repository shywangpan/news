<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:39
         compiled from "E:/WWW/qy/templates\admin\ads_position_add.html" */ ?>
<?php /*%%SmartyHeaderCode:1519058cf9023a974b9-05726135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36e3884b1f5fff22ed2127e5eed06bd826b04190' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\ads_position_add.html',
      1 => 1489988657,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1519058cf9023a974b9-05726135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'optinos' => 0,
    'rs' => 0,
    'ads_position' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf9023ae302',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf9023ae302')) {function content_58cf9023ae302($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
    <form method="post" class="form-x" action="ads_position.php?act=add&id=<?php echo $_GET['id'];?>
">  
      <div class="form-group">
        <div class="label">
          <label>广告位置名称：</label>
        </div>
        <div class="field">
          <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['ads_position']->value['pname'];?>
" name="pname" class="input w50"  data-validate="required:请输入广告位置名" />
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