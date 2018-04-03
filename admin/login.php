<?php 
require_once('../includes.inc.php');
/*用户登录*/

if(isPost()){
	$username = getPost("username");
	$password = getPost("password");
//1.帐号密码不能为空	
	if($username == "" || ($password == "")){
		alertgo("帐号或者密码不能为空!" ,'login.php');
	}
//2.取出帐号和密码
	$rs = DB::GetTableRow("admin_users" , array('user_name' => $username , 'pass_word' => md5($password)));
//3.取不出说明账号和密码错误	
	echo $rs['user_name'];
	if(!$rs){
		alertgo("帐号密码错误" ,'login.php');
	}
//4.取出的账号和密码的用户是否被禁用
	if($rs['status'] == 2){
		alertgo("帐号已经被禁用" ,'login.php');
	}
	//权限处理
	$group = DB::GetTableRow('admin_group', array('gid' => $rs['group_id'])); 
	$prie = unserialize($group['coutent']);
	$haystack = array();
	$nav = array();
	if(!empty($prie)){
		$data = require_once('../data/authority.inc.php');
		foreach ($prie as $string){
			$val = explode(',', $string);
			if($data[$val[0]]['child'][$val[1]]['isnav'] == 1){
				$x=$data[$val[0]]['child'][$val[1]]['isnav'];
     			$nav[$data[$val[0]]['nav']][] = $data[$val[0]]['child'][$val[1]];
     			//dump($data[$val[0]]['child'][$val[1]]);
			} 
			$haystack[$string] = $data[$val[0]]['child'][$val[1]];
		}
	}
	
	/* array(
	 		array(
				 	'id' => 0,
				 	'nav' => '商品管理',
				 	'child' => array(
				 		array(
				 			'id' => 0,
				 			'nav' => '商品管理列表',
				 			'isnav' => 1,
				 			'link' => 'goods.php?act=list',
				 		),
				 		array(
				 			'id' => 1,
				 			'isnav' => 0,
				 			'nav' => '商品添加/修改',
				 			'link' => 'goods.php?act=add',
				 		),
	 		*/
	
	
    //5.储sission
	$array = array();
	$array['time'] = date('Y-m-d H:i:s');
	$array['username'] = $username;
	$array['aid'] = $rs['id'];
	$array['gid'] = $rs['gid'];
	$array['gname'] = $rs['gname'];
	$array['haystack'] = $haystack;
	$array['nav'] = $nav;
	$_SESSION['admin'] = $array;
    alertgo("登录成功!" ,'index.php');
    
}

//$smarty->assign('user','wangpan1');

//$username=isset($_POST['username'])?$_POST['username']:"";
//DB::GetTableRow("admin_users" , array('user_name' => $username));
$smarty->display('admin/login.html');



 ?>










