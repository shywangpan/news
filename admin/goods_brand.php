<?php
/**
 * 
 */
require_once('../includes.inc.php');
//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';
/*------------------------------------------------------ */
//-- 显示图片
/*------------------------------------------------------ */
if($act=='list'){
     $rs=array();
     $page = $_GET['page'] ? $_GET['page'] : 1;
	 $sql = "select * from goods_brand order by id desc";
	 $Db_Page = new Db_Page($sql , 10, $page , "goods_brand.php?act=list");
	 $showhtml = $Db_Page->show(1);
	 $smarty->assign('showhtml',$showhtml);
	 $rs= $Db_Page->_Rst;
     foreach($rs as $key=>$val){
     	$rs[$key]['brand_pic'] = '../'.$rs[$key]['brand_pic']; 
     }
     $smarty->assign('showhtml',$showhtml);
	 $smarty->assign('list',$rs);
	 $smarty->display('admin/goods_brand_list.html');    
/*------------------------------------------------------ */
//-- 添加修改图片     
/*------------------------------------------------------ */  
}elseif($act=='add'){
     $id = intval(getGet('id'));
     if($id > 0){
     	$smarty->assign('id',$id);
        $list_one = DB::GetTableRow('goods_brand', array('id'=>$id));
	   	$smarty->assign('list_one',$list_one);
     }
     if(isPost()){
  	    $id = intval(getGet('id'));
  	    $brand_name = getPost('brand_name');
  	    $path = '../static/upload/'.date('Y/m/d');
  	    if( $id > 0 ){
  	    	$data = array();
  	    	$data['brand_name']	= $brand_name;
	  	    if ($_FILES['brand_logo']['size'] > 0){
			    @unlink("../".$list_one['brand_pic']);
		      	$data['brand_pic'] = uplaod_file($path, 'brand_logo'); 
		  	}
  	    	$rs=DB::Update('goods_brand', $id , $data , 'id');
			if($rs){
			  	alertgo("更新成功","goods_brand.php");
			}
	     }else{
  	      	/*if ($_FILES['brand_logo']['size'] > 0){
	      		$fileupload = uplaod_file($path, 'brand_logo');
	      		//echo $_FILES['brand_logo']['name']; //2.png
		  		$rs = DB::Insert('goods_brand', array('brand_name'=>$brand_name,'brand_pic'=>$fileupload));
  	        	if($rs){
  	        		 alertgo("插入成功","goods_brand.php");
  	       	    }
  	        }*/				  	        	
				  	 if(!is_dir($path)) makedir($path);
					 $fileupload = "";
					//echo $_FILES['brand_logo']['name'];
					 // 3_P_1241422082816.jpg   
					// echo '<br>';
					// echo strrpos($_FILES['brand_logo']['name'],'.');
				     //17  查找字符串 点第一次出现的位置
				    //  echo  '<br>';
					 $exname= substr($_FILES['brand_logo']['name'],17+1);
		            // echo$exname;  //jpg 
					// echo '<br>';
					 $fileupload = $path.'/'.md5(time().round(20)).'.'.$exname;
					// echo $fileupload ;
					 //../static/upload/2017/03/09/12091b3e95d79e7bac3f814bed695fe7.jpg
                   //  echo '<br>';
                    // echo  $_FILES['brand_logo']['tmp_name']; //C:\Windows\temp\php963F.tmp
					// echo '<br>';
					// echo move_uploaded_file($_FILES['brand_logo']['tmp_name'], $fileupload);
					// echo $fileupload;
					 //exit;
					 $exname = strtolower(substr($_FILES['brand_logo']['name'],(strrpos($_FILES['brand_logo']['name'],'.')+1)));
					 $fileupload = $path.'/'.md5(time().round(20)).'.'.$exname;
					 move_uploaded_file($_FILES['brand_logo']['tmp_name'], $fileupload);
					// move_uploaded_file(C:\Windows\temp\php3C.tmp,../static/upload/2017/03/09/12091b3e95d79e7bac3f814bed695fe7.jpg)
					// $fileupload =../static/upload/2017/03/09/12091b3e95d79e7bac3f814bed695fe7.jpg
					 $fileupload = str_ireplace('../', '', $fileupload); //用空格替换掉../在$fileupload字符串里边
                    // $fileupload =static/upload/2017/03/09/12091b3e95d79e7bac3f814bed695fe7.jpg
                    DB::Insert('goods_brand', array('brand_name'=> $brand_name,'brand_pic'=>$fileupload ));
					 redirect('goods_brand.php?act=list');
    
  	        
	   }
   }
	$smarty->display('admin/goods_brand_add.html');	
/*------------------------------------------------------ */
//-- 删除图片
/*------------------------------------------------------ */	
}elseif($act == 'delete'){
	$id = intval(getGet('id'));
	$row = DB::GetTableRow('goods_brand', array('id'=>$id)); 
	$file = '../'.$row['brand_pic'];
	@unlink($file);  
	$delete=DB::Delete('goods_brand',array('id'=>$id));
	alertgo('删除成功','goods_brand.php');
    //redirect("goods_brand.php");跳转
}
/**
 * 
 * 上传图片
 * @param 路径目录 $path
 * @param 名字 $name
//$name=inputname;
 function uplaod_file($path , $name){
	 if(!is_dir($path)) makedir($path);
	 $fileupload = "";
	 $exname = strtolower(substr($_FILES[$name]['name'],(strrpos($_FILES[$name]['name'],'.')+1)));
	 $fileupload = $path.'/'.md5(time().round(20)).'.'.$exname;
	 move_uploaded_file($_FILES[$name]['tmp_name'], $fileupload);
	 $fileupload = str_ireplace('../', '', $fileupload); //用空格替换掉../在$fileupload字符串里边
	 return $fileupload;		  
}
 */

/*1. strpos 查找.的位置
 *2. substr 从.开始截取得到jpg
 *3. $f=$path.X.jpg 生成路径+找到的后缀jpg
 *4. move_upload_file(tmp,$f); 上传
 *5. str_ireplace 替换
 *6.生成路径
 * */

/*
$_FILES['inputname']['name'] 客户端文件的原名称。2.png
$_FILES['inputname']['type'] 文件的 MIME 类型，需要浏览器提供该信息的支持，例如"image/gif"。
$_FILES['inputname']['size'] 已上传文件的大小，单位为字节。
$_FILES['inputname']['tmp_name'] 文件被上传后在服务端储存的临时文件名，一般是系统默认。可以在php.ini的upload_tmp_dir 指定，但 用 putenv() 函数设置是不起作用的。
$_FILES['inputname']['error'] 和该文件上传相关的错误代码。['error'] 是在 PHP 4.2.0 版本中增加的。下面是它的说明：(它们在PHP3.0以后成了常量) 
*/
?>
