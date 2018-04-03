<?php /* Smarty version Smarty 3.1.0, created on 2018-03-16 19:48:37
         compiled from "D:/WWW/qy/templates\admin\goods_classify_list.html" */ ?>
<?php /*%%SmartyHeaderCode:109875aabaf15d45862-22426143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c3b59dd8aabbe6bfabe8419f78100e100b91fd4' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\goods_classify_list.html',
      1 => 1489975699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109875aabaf15d45862-22426143',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showhtml' => 0,
    'list' => 0,
    'one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_5aabaf15e6a82',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aabaf15e6a82')) {function content_5aabaf15e6a82($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--<?php echo $_smarty_tpl->tpl_vars['showhtml']->value;?>
-->
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <button type="button" class="button border-yellow" onclick="window.location.href='goods_classify.php?act=add'"><span class="icon-plus-square-o"></span> 添加分类</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
     <!-- <th width="5%">ID</th>-->
      <th width="15%">分类名字</th>
     <!-- <th width="10%">排序</th>-->
      <th width="10%">操作</th>
    </tr>
    
    <?php  $_smarty_tpl->tpl_vars['one'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
$_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['one']->key => $_smarty_tpl->tpl_vars['one']->value){
$_loop = true;
?>
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['one']->value['cname'];?>
</td>
      <td><div class="button-group"> <a class="button border-main" href="goods_classify.php?act=add&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="goods_classify.php?act=delete&id=<?php echo $_smarty_tpl->tpl_vars['one']->value['id'];?>
" ><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr>


<?php } ?>
    
    

  </table>
</div>
<script type="text/javascript">
function del(id,mid){
	if(confirm("您确定要删除吗?")){			
		
	}
}
</script>
<div class="panel admin-panel margin-top">
  
   
  </div>
</div>
</body>
</html><?php }} ?>