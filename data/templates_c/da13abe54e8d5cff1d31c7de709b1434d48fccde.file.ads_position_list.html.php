<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:38
         compiled from "E:/WWW/qy/templates\admin\ads_position_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2946458cf9022d83fc0-03219069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da13abe54e8d5cff1d31c7de709b1434d48fccde' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\ads_position_list.html',
      1 => 1489988425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2946458cf9022d83fc0-03219069',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'one' => 0,
    'showhtml' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_58cf9022dd5e4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf9022dd5e4')) {function content_58cf9022dd5e4($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='ads_position.php?act=add'"><span class="icon-plus-square-o"></span> 添加广告位置</button>
  </div>
  <table class="table table-hover text-center">
 
    <tr>
     
      <th width="15%">广告位置列表</th>
      <th width="10%">操作</th>
    </tr>
    <tr>
       <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
      <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['one']->value['pname'];?>
</td>
    

      <td><div class="button-group"> <a class="button border-main" href="ads_position.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="ads_position.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
" onclick="return del(1,2)"><span class="icon-trash-o"></span> 删除</a> </div></td>
          <?php } ?>
    </tr>
    
    <!-- <?php echo $_smarty_tpl->tpl_vars['showhtml']->value;?>
-->
    
    
  </table>
</div>
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){			
		return true;
	}else{
		return false;
		}
}
</script>

    
  </div>
</div>
</body>
</html><?php }} ?>