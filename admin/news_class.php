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
	$where = " ";
	$sql = "select * from news_classify where 1 $where order by id asc ";
	$Db_Page = new Db_Page($sql , 50 , $page , "news_class.php?act=list");
	$showhtml = $Db_Page->show(1);
	$rs = find($Db_Page->_Rst , 0);
	if($rs){
		foreach ($rs as $key => $val){
			$rs[$key]['cname'] = get_tag($val['hierarchy']).$rs[$key]['cname'];
		}
	}
	$smarty->assign('list',$rs);
	$smarty->assign('showhtml',$showhtml);
	$smarty->display('admin/news_class_list.html');	
}elseif($act == 'add'){
	$optinos = get_all_option();
	$smarty->assign('optinos' , $optinos);
 	//给修改赋值	
	$id = intval(getGet('id'));
	
	if($id > 0){
		$rs = DB::GetTableRow('news_classify' , array('id' => $id));
		$smarty->assign('rs',$rs);
		$smarty->assign('id',$id);
	}
//表单提交
	if(isPost()){
		$class_name = getPost('class_name');
		echo $pid = intval(getPost('pid'));
		$hierarchy = 1;
		if($pid > 0){
			$prs = DB::GetTableRow('news_classify' , array('id' => $pid));
			$hierarchy = $prs['hierarchy']+1;
		}
		if($class_name == ""){
			alertgo('请填写名称!', 'news_class.php?act=add');
		}
		if($id > 0){
			DB::Update('news_classify' , $id , array('cname' => $class_name,'pid' => $pid , 'hierarchy' => $hierarchy) , 'id');
		}else{
			DB::Insert('news_classify' , array('cname' => $class_name,'pid' => $pid , 'hierarchy' => $hierarchy));
		}
		alertgo('保存成功！' , 'news_class.php?act=list');
	}
	$smarty->display('admin/news_class_add.html');
	
}elseif($act == 'delete'){
	 $id = getGet('id');
	 if( $id > 0 ){
	 	DB::Delete('news_classify',array('id'=>$id));
	 	alertgo('删除成功！' , 'news_class.php?act=list');
	 }
	 
}
function get_all_option(){
	$rs = array();
	$rs = DB::GetQueryResult("select * from news_classify where 1 order by id asc" , false);
	$rs = find($rs , 0);
	if($rs){
		foreach ($rs as $val){
			$html .= " <option value='{$val['id']}'>".get_tag($val['hierarchy'])."{$val['id']}"."{$val['cname']}</option>";
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
?>