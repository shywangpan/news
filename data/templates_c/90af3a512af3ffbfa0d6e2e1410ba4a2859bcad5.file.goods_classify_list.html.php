<?php /* Smarty version Smarty 3.1.0, created on 2017-03-20 16:17:20
         compiled from "E:/WWW/qy/templates\admin\goods_classify_list.html" */ ?>
<?php /*%%SmartyHeaderCode:221758cf9010f3b025-96955728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90af3a512af3ffbfa0d6e2e1410ba4a2859bcad5' => 
    array (
      0 => 'E:/WWW/qy/templates\\admin\\goods_classify_list.html',
      1 => 1489975699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '221758cf9010f3b025-96955728',
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
  'unifunc' => 'content_58cf9011052ed',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58cf9011052ed')) {function content_58cf9011052ed($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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