<?php /* Smarty version Smarty 3.1.0, created on 2017-03-23 18:56:26
         compiled from "D:/WWW/qy/templates\admin\news_class_list.html" */ ?>
<?php /*%%SmartyHeaderCode:2471658d3a9da784e75-22087383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffb8c4ab588d7c8b24f909bec105d8f4fd477d09' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\news_class_list.html',
      1 => 1489987697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2471658d3a9da784e75-22087383',
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
  'unifunc' => 'content_58d3a9da8a9e3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58d3a9da8a9e3')) {function content_58d3a9da8a9e3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='news_class.php?act=add'"><span class="icon-plus-square-o"></span> 添加分类</button>
  </div>
  <table class="table table-hover text-center">
 
    <tr>
     
      <th width="15%">分类名称</th>
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
      <td><?php echo $_smarty_tpl->tpl_vars['one']->value['cname'];?>
</td>
    

      <td><div class="button-group"> <a class="button border-main" href="news_class.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="news_class.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
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