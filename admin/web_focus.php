<?php
/*   web_focus
 *   title
 *   href
 *   pic_url
 *   sort_seq
 * 
 * 
 * 
 */
require_once('../includes.inc.php');
//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';

if ($act == 'list'){
	$rs = DB::GetQueryResult('select * from web_focus order by sort_seq desc',false);
    $smarty->assign('web_focus',$rs); 
	$smarty->display('admin/web_focus_list.html');
}elseif($act =='add'){
	$id = intval(getGet('id'));
	//修改
	if ($id > 0){
		$rs = DB::GetTableRow('web_focus', array('id'=>$id ));
		$smarty->assign('web_focus_row',$rs);
	}
	
	$path = '../static/upload/focus/'.date('Y/m/d');
	//提交
	if (isPost()){
		$web_focus=array();
		$web_focus['title'] =  getPost('title');
		$web_focus['pic_url'] =  getPost('pic_url');
		$web_focus['sort_seq'] = intval(getPost('sort_seq'));
		//提交表单验证
		if ($web_focus['title'] == ''){
			alertgo('图片标题不能为空','web_focus.php?act=add&id='.$id);
		}
		if($web_focus['pic_url'] == ''){
    		alertgo('图片地址不能为空','web_focus.php?act=add&id='.$id);
		}
		if( intval(trim($web_focus['sort_seq'])) == 0){
			alertgo('排序必须为数字','web_focus.php?act=add&id='.$id);
		}
		if($id ==  0){
			if ($_FILES['href']['size'] == ''){
		  	 	alertgo('请上传图片','web_focus.php?act=add&id='.$id);
			}
		}
		if(!check_url($web_focus['pic_url'])){
			alertgo('请输入合法的url','web_focus.php?act=add&id='.$id);
		}
		if($id > 0){
			if($_FILES['href']['size'] > 0){
				@unlink('../'.$rs['href']);
				$web_focus['href'] = uplaod_filel($path, 'href');;
			}
			DB::Update('web_focus' , $id , $web_focus , 'id');
		}else{
			$web_focus['href'] =  uplaod_filel($path, 'href');
			DB::Insert('web_focus', $web_focus);
		}
		alertgo('保存成功','web_focus.php?act=list');   
	}
	$smarty->display('admin/web_focus_add.html');
}elseif ($act == 'delete'){
	$id = intval(getGet('id'));
	$rs = DB::GetTableRow('web_focus', array('id'=>$id));
	@unlink("../".$rs['href']);
	DB::Delete('web_focus',array('id'=>$id));
	redirect('web_focus.php?act=list');
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















