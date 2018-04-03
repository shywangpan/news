<?php
require_once('../includes.inc.php');
//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}

$act = $_GET['act'] ? $_GET['act'] : 'list';
if($act == 'list'){
	
	$page = $_GET['page'] ? $_GET['page'] : 1;
	$sql = "select * from flink order by id desc ";
	$Db_Page = new Db_Page($sql , 10 , $page , "flink.php?act=list");
    $showhtml = $Db_Page->show(1);
    $rs = $Db_Page->_Rst;
	$smarty->assign('showhtml',$showhtml);
	$smarty->assign('list',$rs);
	$smarty->display('admin/flink_list.html');
}elseif($act == 'add'){
	$id = intval(getGet('id'));
	if( $id > 0 ){
		$rs = DB::GetTableRow('flink', array('id'=>$id));
		$smarty->assign('flink',$rs);
	}
	$path = '../static/upload/flink/';
	if(isPost()){
		$arr = array();
		$arr['link_name'] = trim(getPost('link_name'));
		$arr['link_href'] = trim(getPost('link_href'));
		$arr['order'] = intval(getPost('order'));
		if($arr['link_name'] == ''){
			alertgo('名字不能为空', 'flink.php?act=add&id='.$id); 
		}
		if($arr['link_href'] == ''){
			alertgo('链接不能为空', 'flink.php?act=add&id='.$id); 
		}
		if($arr['order'] == 0){
			alertgo('排序必须为数字', 'flink.php?act=add&id='.$id); 
		}
		if( $id == 0){
			if($_FILES['logo']['size'] <= 0){
		    	alertgo('请上传图片', 'flink.php?act=add&id='.$id); 
			}
		}
		if($id > 0){
			if($_FILES['logo']['size'] > 0){
				@unlink('../static/upload/flink/'.$rs['logo']);
				$arr['logo'] = uplaod_file($path, 'logo');
			}
			DB::Update('flink', $id, $arr, 'id');	
		    redirect('flink.php');
		}else{
		    $arr['logo'] = uplaod_file($path, 'logo');
		    DB::Insert('flink', $arr);
		    redirect('flink.php');
		}
	}
	$smarty->display('admin/flink_add.html');
}elseif($act == 'delete'){
	$id = intval(getGet('id'));
	if($id > 0){
		$rs = DB::GetTableRow('flink', array('id'=>$id));
		@unlink('../'.$rs['logo']);
	}
	DB::Delete('flink',array('id'=>$id));
	redirect('flink.php');
	

}