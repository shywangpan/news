<meta charset=utf8>
<?php
require_once('../includes.inc.php');

//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';
if ($act == 'list'){
	    $page = $_GET['page'] ? $_GET['page'] : 1;
	    $cid = getGet('cid');
	    $keyword = getGet('keyword');
	    $hidden = getGet('hidden');
	    $sql = "select * from news where 1";
	    $where = '';
        $tag = '';
	    if($hidden == 'hidden'){
	    	if ($cid >0){
	    		$where .= " and cid=$cid"; 
	    	    $tag .= "&cid=$cid"; 
	    	} 
	    	if($keyword != ''){
	    	    $where .= " and (title like '%$keyword%' or info like '%$keyword%')";
	    	    $tag .= "&keyword=$keyword";  
	    	} 	
	    }
	    $sql .= $where;
		//$rs = DB::GetQueryResult($sql,false);
		$Db_Page = new Db_Page($sql , 10 , $page , "news.php?act=list".$tag);
		$showhtml = $Db_Page->show(1);
		$rs = $Db_Page->_Rst;
	    $option = get_all_option('news_classify' , $selected = 0);
	    $smarty->assign('option' , $option);
		$smarty->assign('showhtml',$showhtml);
		$smarty->assign('list' , $rs);
		$smarty->display('admin/news_list.html');	
}elseif ($act == 'add'){
	$id = intval(getGet('id'));
	create_html_editor('editor', $input_value = '');
	$option = get_all_option('news_classify' , $selected = 0);
	$smarty->assign('option' , $option); 
	if ($id > 0){
		$rs = DB::GetTableRow('news', array('id' => $id));
		$smarty->assign('option' , get_all_option('news_classify' , $rs['cid']));
		$smarty->assign('news' , $rs);
		$editor = create_html_editor('editor', $rs['content']);
 	}
 	if (isPost()){
 		$array = array();
 		$array['cid'] = getPost('cid');
 		$array['title'] = getPost('title');
 		$array['info'] = getPost('info');
 		$array['content'] = getPost('editor');
 	 	$path = "../static/upload/".date('Y/m/d');
 	 	if (intval($array['cid']) == 0){
 	 		alertgo('请选择分类','news.php?act=add&id='.$id); 
 	 	}
 	 	if (($array['title']) == ''){
 	 		alertgo('新闻标题不能为空','news.php?act=add&id='.$id); 
 	 	}
 	 	if (($array['info']) == ''){
 	 		alertgo('新闻简介不能为空','news.php?act=add&id='.$id); 
 	 	}
 	 	if ($_FILES['logo']['size'] <=0 ){
 	 	    alertgo('图片不能为空','news.php?act=add&id='.$id);
 	 	}
 		if ($id > 0){	
 	 		if ($_FILES['logo']['size'] > 0){
 	 			@unlink('../'.$rs['logo']);
 	 			$fileupload = uplaod_filel($path, 'logo');
				$array['logo'] = $fileupload;
 	 		}
 			$rs=DB::Update('news' , $id ,$array , 'id');
 			alertgo('更新成功' , 'news.php?act=list');
 		}else{
 			$array['add_time'] = date('Y-m-d H:i:s ');
 			$array['status'] = 1;
 	    	$fileupload = uplaod_filel($path, 'logo');
			$array['logo'] = $fileupload;
 	    	DB::Insert('news', $array);
 	    	alertgo('添加成功' , 'news.php?act=list');
 		}		
 	}
	$smarty->display('admin/news_add.html');
}elseif ($act == 'delete'){
    $id = intval(getGet('id'));
    $rs = DB::GetTableRow('news', array('id' => $id));
	$file = '../'.$rs['logo'];
	@unlink($file);  
	$delete = DB::Delete('news' , array('id' => $id));
	alertgo('删除成功' , 'news.php?act=list');
}elseif ($act == 'onoff'){
	$status = getGet('status');
	$id = getGet('id');
	$rs = DB::Update('news', $id, array('status'=>$status), 'id');
	if($rs){
		redirect("news.php");
	}  
}
function create_html_editor($input_name, $input_value = '')
{
    global $smarty;
    $editor = new FCKeditor($input_name);
    $editor->BasePath   = '../includes/fckeditor/';
    $editor->ToolbarSet = 'Normal';
    $editor->Width      = '100%';
    $editor->Height     = '250';
    $editor->Value      = $input_value;
    $FCKeditor = $editor->CreateHtml();
    $smarty->assign('FCKeditor', $FCKeditor);
}
function get_all_option($table , $selected = 0){
	$rs = array();
	$rs = DB::GetQueryResult("select * from $table where 1 order by id asc" , false);
	$rs = find($rs , 0);
	if($rs){
		foreach ($rs as $val){
			$html .= " <option value='".$val['id']."' ".($val['id'] == $selected ? "selected='selected'" : "").">".get_tag($val['hierarchy'])."{$val['id']}"."{$val['cname']}</option>";
		}
	}
	return  $html;
}
function get_tag($hierarchy){
	$html = "";
	for ($i= 1 ; $i < $hierarchy ; $i++){
		$html .= " - ";
	}
	return $html;
}
function find($arr,$pid){
  static $list = array();
  foreach($arr as $k=>$v ){ //$v=array('id'=>2,'name'=>'商洛','pid'=>'1')
      if($v['pid'] == $pid){  //如果遍历到的数组的pid等于传进来的则保存该数组 
         $list[] = $v;
         find($arr,$v['id']);//$v['pid']=下一级的pid
      }
  }
  return $list;
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
