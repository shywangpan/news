<?php
require_once('../includes.inc.php');

//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';

if($act =='list'){

	$rs = DB::GetQueryResult('select * from goods order by goods_id desc',false);
	$smarty->assign('list',$rs);
	
	
$smarty->display('admin/goods_demo_list.html');
}elseif($act == 'add'){
  
	
$smarty->display('admin/goods_demo_add.html');
}


