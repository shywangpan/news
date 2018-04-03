<meta charset=utf-8>
<?php
/*
 * 产品分类管理  
 * goods_classify.php
 * goods_classify_list.html  
 * goods_classify_add.html
 * goods_classify  cname pid  hierarchy
 * 
 */
require_once('../includes.inc.php');
//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';
if ($act == 'list') 
{
    $page = $_GET['page'] ? $_GET['page'] : 1;
	$sql = "select * from goods_classify where 1 order by id asc ";
	$Db_Page = new Db_Page($sql , 20 , $page , "goods_classify.php?act=list");
    $showhtml=$Db_Page->show(1);
    $rs = find($Db_Page->_Rst , 0);
	if ($rs)
	{
	    foreach($rs as $key=>$val)
     	{
			$rs[$key]['cname'] = get_tag($val['hierarchy']).$rs[$key]['cname'];
		}
	}
	$smarty->assign('list',$rs);
    $smarty->assign('showhtml',$showhtml);
	$smarty->display('admin/goods_classify_list.html');
	
}elseif ($act == 'add')
{   
	$option=get_all_option();
	$smarty->assign('option',$option);
	$id = getGet('id');
	if ($id > 0) 
	{
		$smarty->assign('id',$id);
		$rs =DB::GetTableRow('goods_classify', array('id'=>$id));
		$smarty->assign('cname',$rs['cname']);
	}
	if (isPost())
	{   
  		$cname=getPost('cname');
  		$pid=intval(getPost('pid'));
  		$hierarchy = 1;
  		if ($pid > 0)
  		{
  			$prs = DB::GetTableRow('goods_classify' , array('id' => $pid));
			$hierarchy = $prs['hierarchy']+1;
  		}
  		if ($cname == '')
		{
			alertgo('产品明不能为空','goods_classify.php');
		}
		if ($id > 0)
		{ 
			$update=DB::Update('goods_classify' , $id , array('cname' => $cname,'pid' => $pid , 'hierarchy' => $hierarchy) , 'id');
			if ($update)
			{
				alertgo('修改成功','goods_classify.php');
			}
		}else{
			$insert=DB::Insert('goods_classify' , array('cname' => $cname,'pid' => $pid , 'hierarchy' => $hierarchy));
			if ($insert)
			{
				alertgo('添加产品成功','goods_classify.php');
			}
		}
	}
	$smarty->display('admin/goods_classify_add.html');
}elseif ($act == 'delete')
{
	$id =intval(getGet('id'));
	if ($id>0)
	{
			$delete = DB::Delete('goods_classify',array('id' => $id));
			if ($delete)
			{
				alertgo('产品删除成功','goods_classify.php');   
			}
    	           
	}

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
function get_tag($hierarchy)
{
	$html='';
	for($i=1; $i< $hierarchy; $i++)
	{
		$html.= ' - ';
	}
	return $html;
}
function get_all_option(){
	$rs=DB::GetQueryResult('select * from goods_classify where 1 order by id asc',false);
	$rs=find($rs,0);
	$html='';
	foreach($rs as $k=>$v){
	     $rs[$k]['cname']=get_tag($v['hierarchy']).$rs[$k]['cname'];
         $html.="<option value={$v['id']}>{$rs[$k]['cname']}</option>";  
	}
	return $html;	
}

















