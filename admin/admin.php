<?php
require_once('../includes.inc.php');
//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}

$act = $_GET['act'] ? $_GET['act'] : 'list';
if($act == 'list'){
	$sql = "select a.*,g.* from admin_users a inner join admin_group  g on a.group_id = g.gid order by id asc";
	$rs = DB::GetQueryResult($sql,false);
	$smarty->assign('list',$rs);
  	$smarty->display('admin/admin_list.html');
}elseif($act == 'add'){
	$id = intval(getGet('id'));
		$option = get_all_option('admin_group');
    	$smarty->assign('option',$option); 
	
	if($id >0){
		$admin = DB::GetTableRow('admin_users', array('id'=>$id));	
	    $smarty->assign('admin',$admin);
	    $option = get_all_option('admin_group',$admin['group_id']);
        $smarty->assign('option',$option); 
	}

	
	if(isPost()){
		if($id == 1){
			alertgo('不能修改超级管理员','admin.php');  
		}
		$arr = array();
		$arr['status'] = 1;
		$arr['user_name'] = getPost('user_name');
		$arr['group_id'] = getPost('gname');
		$arr['pass_word1'] = md5(getPost('pass_word1'));
		$arr['pass_word2'] = md5(getPost('pass_word2'));
		//$a=preg_match_all("(?!^\\d+$)(?!^[a-zA-Z]+$)(?!^[_#@]+$).{8,}",  $arr['pass_word1'],  $arr2);
		//dump($a);exit;
		//is_psd(getPost('pass_word1'));
		if(trim($arr['user_name']) == ''){
			  alertgo('用户名不能为空','admin.php?act=add&id='.$id);
		}
		if($arr['group_id'] == 0){
			alertgo('请选择用户组','admin.php?act=add&id='.$id);
		}
		if(trim(getPost('pass_word1')) == '' || trim(getPost('pass_word2')) == ''){
			alertgo('密码不能为空','admin.php?act=add&id='.$id);
		}
		if($arr['pass_word1'] !== $arr['pass_word2']){
		alertgo('密码不相等','admin.php?act=add&id='.$id);
		}
		if($id > 0 ){
			if(getPost('pass_word1') == getPost('pass_word2')&&getPost('pass_word1')  == $admin['pass_word']){
				DB::Update('admin_users', $id, array('user_name' => $arr['user_name'],'group_id' => $arr['group_id']), 'id');
				redirect('admin.php');
			}
			DB::Update('admin_users', $id, array('user_name' => $arr['user_name'],'group_id' => $arr['group_id'],'pass_word' => $arr['pass_word1'],), 'id');
			redirect('admin.php');
		}else{
			//dump($arr);exit;
			DB::Insert('admin_users', array('user_name' => $arr['user_name'],'group_id' => $arr['group_id'],'pass_word' => $arr['pass_word1']));
			redirect('admin.php');
		
		}	
	}
	$smarty->display('admin/admin_add.html');
}elseif($act == 'delete'){
	    $id = intval(getGet('id'));
		if($id == 1){
			alertgo('不删除超级管理员','admin.php');  
		}
 		DB::Delete('admin_users', array('id'=>$id));
 		redirect('admin.php');
 		
//ajax请求
}elseif($act == 'status'){
	$id = intval(getGet('id'));
	$status = intval(getGet('status'));
	DB::Update('admin_users', $id, array('status'=>$status), 'id');
	   //redirect('admin/admin_list.html');
	

}

function get_all_option($table , $selected = 0){
	$rs = array();
	$rs = DB::GetQueryResult("select * from $table where 1 order by gid asc" , false);
	//$rs = find($rs , 0);
	if($rs){
		foreach ($rs as $val){
			$html .= " <option value='".$val['gid']."' ".($val['gid'] == $selected ? "selected='selected'" : "").">{$val['gname']}</option>";
		}
	}
	return  $html;
}
