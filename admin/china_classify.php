<meta charset=utf-8>
<?php
/*
 * china.php
 * china_classify
 * pid
 * cname
 * hierarchy
 * 
 * 
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

if ($act == 'list')
{
	$rs=DB::GetQueryResult('select * from china_classify where 1 order by id asc',false);
	$rs=find($rs,0);
	foreach($rs as $key=>$val){
		$rs[$key]['cname']=get_tag($val['hierarchy']).$rs[$key]['cname'];
	}
	$smarty->assign('list',$rs);
	$smarty->display('admin/china_classify_list.html');	
}

elseif($act == 'add')
{
 	$id=getGet('id');	
 	$option=get_all_option();
 	$smarty->assign('option',$option);
 
	 if ($id > 0)
 	{
 	$cname=db::GetTableRow('china_classify', array('id'=>$id));
    $smarty->assign('cname',$cname['cname']);
 	}
 	
 	if (isPost())
 	{
 		$pid=getPost('pid');
 		$hierarchy=1;
 		$cname=getPost('cname');
 		if ($pid>0)
 		{
 			$rs=DB::GetTableRow('china_classify',array('id'=>$pid));
 			$hierarchy=$rs['hierarchy']+1;
 		}
 		
 		if ($id > 0)
 		{
 		DB::Update('china_classify',$id,array('pid'=>$pid,'cname'=>$cname,'hierarchy'=>$hierarchy),'id');
 		}else{
 		DB::Insert('china_classify', array('pid'=>$pid,'cname'=>$cname,'hierarchy'=>$hierarchy));
 		}
 	}
 	
 	
 	
 	
 
 
 
	$smarty->display('admin/china_classify_add.html');	
}
elseif($act == 'delete')
{
}


function get_all_option(){
	$rs = array();
	$rs = DB::GetQueryResult("select * from china_classify where 1 order by id asc" , false);
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

