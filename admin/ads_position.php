<?php
/*
 * 
 * pname
 * 
 * 
 * 
 * 
 * */
require_once('../includes.inc.php');
//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';

if($act=='list'){
	$rs = DB::GetQueryResult('select * from ads_position where 1 order by id asc',false);
	$smarty->assign('list', $rs);
	$smarty->display('admin/ads_position_list.html');
}else if ( $act == 'add'){
    $id = intval(getGet('id'));
    if ($id >0 ){
      $rs = DB::GetTableRow('ads_position',array('id'=>$id));
      $smarty->assign('ads_position',$rs); 	
    }
    if (isPost()){
    	$pname = getPost('pname');
    	if( $id > 0){
    		DB::Update('ads_position', $id, array('pname'=>$pname),'id');
    	}else{
    		DB::Insert('ads_position', array('pname'=>$pname));
    	}
    	alertgo('保存成功','ads_position.php?act=list');
    }
    $smarty->display('admin/ads_position_add.html');  
}else if( $act == 'delete'){
	$id = intval(getGet('id'));
	$rs = DB::Delete('ads_position',array('id'=>$id));
    if($rs){
    	 alertgo('删除成功','ads_position.php?act=list');
    } 
}

	


































?>