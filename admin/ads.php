<meta charset=utf-8>
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
$array = array( 1 => '图片', 2 => '文字' , 3 => '其他');
if($act=='list'){
	/*!admin_user_url_check(ADS_LIST) and  alertgo("无权限操作" , 'index.php');*/
	$page = $_GET['page'] ? $_GET['page'] : 1;
	$sql = "select a.id as adsid,p.id as ads_pid,a.*,p.pname from ads a inner join ads_position p on  p.id=a.pid ";
	//$rs = DB::GetQueryResult($sql,false);
	$Db_Page = new Db_Page($sql, 5 ,$page, 'ads.php?act=list');
	$rs = $Db_Page->_Rst;
	$showhtml = $Db_Page->show(1);
	$smarty->assign('showhtml', $showhtml);
	$smarty->assign('list', $rs);
	$smarty->display('admin/ads_list.html');
}else if ( $act == 'add'){
    $id = intval(getGet('id'));
    $pid= intval(getGet('pid'));
    $get_all_option_p = get_all_option_p('ads_position',$pid);
    $smarty->assign('get_all_option_p',$get_all_option_p);
    if ($id >0 ){
       $rs = DB::GetTableRow('ads',array('id'=>$id));
       $types = getOpotion($rs['type']);  
       $smarty->assign('ads',$rs); 	
    }else{
    	$types = getOpotion();
    }
    $smarty->assign('types',$types);
    if (isPost()){
    	$id = intval(getGet('id'));
    	$ads = array();
    	$ads['aname'] = getPost('aname');
    	$ads['type'] = intval(getPost('type'));
    	$ads['pid'] = getPost('pid');
    	$ads['href'] = getPost('href');//广告链接到的地址
    	//$_FILES['pic']上传图片的地址
    	//$ads['text'] = getPost('text')//上传图片
    	$path = '../static/upload/'.date('Y/m/d');
    	if($ads['pid'] == 0){
    		alertgo('请选择广告位置','ads.php?act=add&id='.$id);
    	} 
    	if( $id > 0){
    		if($ads['type'] == 1){
    			if($_FILES['pic']['size'] > 0){
    				@unlink('../'.$rs['pic']);
					$fileupload = uplaod_filel($path, 'pic');
					$ads['pic'] = $fileupload;
    			}
    			DB::Update('ads',$id,$ads,'id');
    		}elseif ($ads['type'] ==2){
    			$ads['text'] = getPost('text');
    			DB::Update('ads',$id,$ads,'id');
    		}else{
    			 #
    		}
    		alertgo('保存成功','ads.php?act=list');
    		
    		//DB::Update('ads_position', $id, array('pname'=>$pname),'id');
    	}else{
    		if($ads['type'] == 1){
    			$fileupload = uplaod_filel($path, 'pic');
				$ads['pic'] = $fileupload;
				DB::Insert('ads', $ads);
    		}elseif($ads['type'] == 2) {
    			$ads['text'] = getPost('text');
    			DB::Insert('ads', $ads);
    		}
    	alertgo('保存成功','ads.php?act=list');
    	}
    	
    }
    $smarty->display('admin/ads_add.html');  
}else if( $act == 'delete'){
	$id = intval(getGet('id'));
	$rs = DB::Delete('ads',array('id'=>$id));
    if($rs){
    	 alertgo('删除成功','ads.php?act=list');
    } 
}

function  getOpotion($selected = 0){
	global $array;
	$html = "";
	foreach ($array as $key => $val){
		$html .= " <option value='".$key."' ".($key == $selected ? "selected='selected'" : "").">".$val."</option>";
	}
	return $html;
}






function get_all_option($table , $selected = 0){
	$rs = array();
	$rs = DB::GetQueryResult("select * from $table where 1 order by id asc" , false);
	if($rs){
		foreach ($rs as $val){
			$html .= " <option value='".$val['id']."' ".($val['id'] == $selected ? "selected='selected'" : "").">".getTYpe2($val['id'])."</option>";
		}
	}
	return  $html;
}


function get_all_option_p($table , $selected = 0){
	$rs = array();
	$rs = DB::GetQueryResult("select * from $table where 1 order by id asc" , false);
	if($rs){
		foreach ($rs as $val){
			$html .= " <option value='".$val['id']."' ".($val['id'] == $selected ? "selected='selected'" : "").">".$val['pname']."</option>";
		}
	}
	return  $html;
}

function uplaod_filel($path , $name){
	 if(!is_dir($path)) makedir($path);
	 $fileupload = "";
	 $exname = strtolower(substr($_FILES[$name]['name'],(strrpos($_FILES[$name]['name'],'.')+1)));
	 $fileupload = $path.'/'.md5(time().round(20)).'.'.$exname;
	 move_uploaded_file($_FILES[$name]['tmp_name'], $fileupload);
	 $fileupload = str_ireplace('../', '', $fileupload); //用空格替换掉../在$fileupload字符串里边
	 return $fileupload;		  
}





























?>