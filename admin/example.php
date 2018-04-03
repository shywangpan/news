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
	$sql = "select * from example order by id desc ";
	$Db_Page = new Db_Page($sql , 10 , $page , "example.php?act=list");
    $showhtml = $Db_Page->show(1);
    $rs = $Db_Page->_Rst;
	$smarty->assign('html',$showhtml);
	$smarty->assign('list',$rs);
	$smarty->display('admin/example_list.html');

  
}elseif($act == 'add'){
	$id = intval(getGet('id'));
	$seq = 1;
	if( $id > 0 ){
		$rs = DB::GetTableRow('example', array('id'=>$id));
		$smarty->assign('example',$rs);
		//处理相册
    	$gallery = DB::GetQueryResult("select * from example_gallery where example_id=".$id , false);
    	$count = count($gallery); 
    	if($count > 0){
    		$seq = $count;       //把当前商品的照片数量分配给hidden
    		$gallery_html = '';
    		for ($i = 0 ; $i < $count ; $i++){
    			$item = $gallery[$i];  //第i条row记录
    			$k = $i + 1;
    			$gallery_html .= '<tr id="tr1" class="class'.$k.'"><td><a href="javascript:;" '.($i > 0 ? ' onclick="jian('.$k.','.$item['id'].')" ' : ' id="first1" ').'><img src="../static/imgs/'.($i == 0 ? 'add' : 'minus').'.png"><a/>
    				</td><input type="hidden" id="imgid" name="imgid[]" value="'.$item['id'].'"/> <td>图片标题:</td><td><input type="text" name="gtitle[]" value="'.$item['gtitle'].'"></td>
    				<td>图片</td><td><input type="file" name="href[]" value=""><img src="../'.$item['href'].'" width="30" height="30"></td></tr>';
    		}
    	    //$imgid =  intval($_POST['imgid'][$i]);//当前分配过来的照片的id行
    	}
    	$smarty->assign('gallery_html', $gallery_html);
	}
	$smarty->assign('seq', $seq);
	$path = '../static/upload/example/';
	if(isPost()){
		$arr = array();
		$arr['title'] = trim(getPost('title'));
		$arr['price'] = intval(getPost('price'));
		$arr['content'] = trim(getPost('content'));  
		$arr['plan'] = trim(getPost('plan'));  
		$seq = intval(getPost('seq'));	
		if($id > 0){
			if($_FILES['logo']['size'] > 0){
				@unlink('../static/upload/example/'.$rs['logo']);
				$arr['logo'] = uplaod_file($path, 'logo');
			}
		    if($seq > 0){ //2照片数量
				for ($i = 0 ; $i < $seq; $i++){
				   	$arrg = array();
					$arrg['gtitle'] = $_POST['gtitle'][$i];
					$arrg['example_id'] = $id;
					$imgid =  intval($_POST['imgid'][$i]);//当前分配过来的照片的id行
					if($_FILES['href']['size'][$i] > 0){ //浏览了新图片
						 if($imgid > 0){//旧图片存在
							 $img = DB::GetTableRow('example_gallery', array('id' => $imgid));
							 @unlink('../'.$img['href']);
						 }
						 if(!is_dir($path)) makedir($path);
						 $fileupload = "";
						 $exname = strtolower(substr($_FILES['href']['name'][$i],(strrpos($_FILES['href']['name'][$i],'.')+1)));
						 $fileupload = $path.'/'.md5(time().round(20).$i).'.'.$exname;
						 move_uploaded_file($_FILES['href']['tmp_name'][$i], $fileupload);
						 $fileupload = str_ireplace('../', '', $fileupload);
						 $arrg['href'] = $fileupload;
					}
					
					//
					if($imgid > 0){ //如果有旧图片更新:
						DB::Update('example_gallery' , $imgid , $arrg );
					}
					//
					else if($fileupload != ''){
						DB::Insert('example_gallery', $arrg);		
					}
			  }
		   }
		    DB::Update('example', $id, $arr, 'id');	
		    redirect('example.php');
		}else{
		    $arr['logo'] = uplaod_file($path, 'logo');
		    DB::Insert('example', $arr);
		    $example_id = DB::getInsertId();
			for ($i = 0 ; $i < $seq ; $i++){
				$arr = array();
				$arr['gtitle'] = $_POST['gtitle'][$i];
				$arr['example_id'] = $example_id;
				if($_FILES['href']['size'][$i] > 0){
					 if(!is_dir($path)) makedir($path);
					 $fileupload = "";
					 $exname = strtolower(substr($_FILES['href']['name'][$i],(strrpos($_FILES['href']['name'][$i],'.')+1)));
					 $fileupload = $path.md5(time().round(20).$i).'.'.$exname;
					 move_uploaded_file($_FILES['href']['tmp_name'][$i], $fileupload);
					 $fileupload = str_ireplace('../', '', $fileupload);
					 $arr['href'] = $fileupload;
					 DB::Insert('example_gallery', $arr);
					 redirect('example.php');
				}
            }
		} 
	}	
	$smarty->display('admin/example_add.html');
}elseif($act == 'delete'){
	$id = intval(getGet('id'));
	if($id > 0){
		$rs = DB::GetTableRow('example', array('id'=>$id));
		@unlink('../'.$rs['logo']);
	}
	DB::Delete('example',array('id'=>$id));
	redirect('example.php');

}elseif($act == 'delimg'){
	$id = getGet('id');
	$rs = DB::GetTableRow('example_gallery', array('id'=>$id ));
    @unlink('../'.$rs['href']);
    DB::Delete('example_gallery',array('id'=>$id ));
}
