<?php
require_once('../includes.inc.php');

//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';
if ($act == 'list'){
	//商品相册列表
	$page = $_GET['page']?$_GET['page']:1;
	$Db_Page = new Db_Page('select * from goods_gallery ' , 10 , $page , 'goods_gallery.php?act=list');
	$html = $Db_Page->Show(1);
	$rs = $Db_Page->_Rst;
	$smarty->assign('html' , $html);
	$smarty->assign('goods_gallery',$rs);
	//编辑商品相册
	/*
	$goods_id=1000;
	$Db_Page = new Db_Page('select * from goods_gallery where goods_id=1000' , 10 , $page , 'goods_gallery.php?act=list');
	$html2 = $Db_Page->Show(1);
	$rs2 = $Db_Page->_Rst;
	$smarty->assign('html2' , $html2);
	$smarty->assign('goods_gallery2',$rs2);
	*/
	$smarty->display('admin/goods_gallery_list.html');
}elseif($act ==  'add'){
	$id = intval(getGet('id'));
	$id = 1000;
	if ($id > 0){
		$rs = DB::GetTableRow('goods_gallery' , array('id'=>$id));
		$smarty->assign('goods_gallery',$rs);
	}
	$path = "../static/upload/".date('Y/m/d').'/'.$id; //
	if (isPost()){
		
		$seq = intval(getPost('seq'));
		for ($i = 0 ; $i < $seq ; $i++){
			$arr = array();
			$arr['img_discription'] = $_POST['img_discription'][$i];
			$arr['out_href'] = $_POST['out_href'][$i];
			$arr['goods_id'] = $id;
			if($_FILES['img_position']['size'][$i] > 0){
				 if(!is_dir($path)) makedir($path);
				 $fileupload = "";
				 $exname = strtolower(substr($_FILES['img_position']['name'][$i],(strrpos($_FILES['img_position']['name'][$i],'.')+1)));
				 $fileupload = $path.'/'.md5(time().round(20).$i).'.'.$exname;
				 move_uploaded_file($_FILES['img_position']['tmp_name'][$i], $fileupload);
				 $fileupload = str_ireplace('../', '', $fileupload);
				 $arr['img_position'] = $fileupload;
				 $arr['out_href'] = '';
				 DB::Insert('goods_gallery', $arr);
			}
			
		}
		redirect('goods_gallery.php?act=list');	
		dump($_POST);dump($_FILES);exit();
	    $goods_gallery = array();
	    $goods_gallery['goods_id'] = getPost('goods_id');
	    $goods_gallery['img_discription'] = getPost('img_discription');
	    $goods_gallery['out_href'] = getPost('out_href');
        //img_position
        if ($id > 0){
           if ($_FILES['img_position']['size'] > 0){
          	 @unlink('../'.$rs['img_position']); 
          	 $fileupload = uplaod_file($path, 'img_position');
           	 $goods_gallery['img_position'] =  $fileupload;
           }
           DB::Update('goods_gallery',$id,$goods_gallery,'id'); 
           redirect('goods_gallery.php?act=list');	
        }else{
           $fileupload = uplaod_file($path, 'img_position');
           $goods_gallery['img_position'] =  $fileupload;	
           DB::Insert('goods_gallery', $goods_gallery);
           redirect('goods_gallery.php?act=list');
        }	           
	}
	$smarty->display('admin/goods_gallery_add.html');
}elseif($act == 'delete'){
	$id = intval(getGet('id'));
	$rs = DB::GetTableRow('goods_gallery', array('id'=>$id));
	@unlink('../'.$rs['img_position']);
	DB::Delete('goods_gallery',array('id'=>$id));
	redirect('goods_gallery.php?act=list');	
}