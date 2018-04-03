<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php 
require_once('../includes.inc.php');
$data = require_once('../data/authority.inc.php');
$html = '<table id="list-table" cellspacing="1"><tbody>';
$act = $_GET['act']?$_GET['act']:'list';
if($act == 'list'){
	 $page = $_GET['page'] ? $_GET['page'] : 1;
	 $sql = "select * from admin_group";
	 $Db_Page = new Db_Page($sql , 10, $page , "admin_group?act=list");
	 $showhtml = $Db_Page->show(1);
	 $smarty->assign('showhtml',$showhtml);
	 $rs= $Db_Page->_Rst;
     
	 
     $smarty->assign('showhtml',$showhtml);
	 $smarty->assign('list',$rs);
	$smarty->display('admin/admin_gourp_list.html');
}elseif($act=='add'){
	$id = intval($_GET['id']);
	if($id > 0){
		$rs = db::GetTableRow('admin_group', array('gid' => $id));
		$haystack = unserialize($rs['coutent']);
		$smarty->assign('gname',$rs['gname']);
	}
	//从php文件中拿出数据
	foreach ($data as $val){
		$html .= '<tr><td class="first-cell" width="18%" valign="top">'.$val['nav'].'</td>';
		$html .= '<td>';//外层循环一次
		foreach ($val['child'] as $child){
			//里层循环child次
			$html .= '<div style="width:200px;float:left;"><label for="goods_manage">';
			$needle = $val['id'].','.$child['id'];
			$html .= '<input name="action_code[]" value="'.$needle.'" onclick="" class="checkbox" type="checkbox" '.(in_array($needle, $haystack) ? "checked" : "").'> '.$child['nav'];
			$html .= '</label></div>';
		}
		$html .= '</td>';
		$html .= '</tr>';	
	}
	//提交到数据库
	if(isPost()){
		$admin_group['gname'] = $_POST['gname'];
		$admin_group['coutent'] = serialize($_POST['action_code']);
		if($id > 0){
        	DB::Update('admin_group', $id, 	$admin_group, 'gid' );			
		}else{
			DB::Insert('admin_group', $admin_group);
		}
		redirect('admin_gourp.php?act=list');
	}
	
	$smarty->assign('html',$html);
	$smarty->display('admin/admin_gourp_add.html');
}elseif($act =='delete'){
	$id = intval(getGet('id'));
	DB::Delete('admin_group',array('gid'=>$id)); 
	redirect('admin_gourp.php?act=list');
	
}
//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}

?>

