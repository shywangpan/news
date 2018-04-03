<meta charset=utf8>
<?php
require_once('../includes.inc.php');
require_once('../data/authority.inc.php');

//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';

if ($act == 'list')
{
	admin_user_url_check(GOODS_LIST) and  alertgo("无权限操作" , 'index.php');
	$page = $_GET['page'] ? $_GET['page'] : 1;
	$classify_id = intval($_GET['classify_id']);
	$brand_id = intval($_GET['brand_id']);
	$keyword = trim($_GET['keyword']);
	
	$smarty->assign('option_goods_classify' , get_all_option('goods_classify' , $classify_id));
	$smarty->assign('option_goods_brand' , option_goods_brand($brand_id) );
	
	
	$sql = "select goods_id,goods_name,shop_price,market_price,is_shelves,count,goods_pic,add_time,sales from goods where 1 ";
	
	$where = '';
	$tag = '';
	if($classify_id > 0){
		$where .= " and classify_id = $classify_id ";
		$tag .= '&classify_id='.$classify_id;
	}
	if($brand_id > 0){
		$where .= " and brand_id = $brand_id";
		$tag .= '&brand_id='.$brand_id;
	}
	if($keyword != ""){
		$where .= " and (goods_name like '%$keyword%' or goods_info like '%$keyword%')";
		$tag .= '&keyword='.keyword;
	}
	$sql .= $where .' order by goods_id desc ';
	$Db_Page = new Db_Page($sql , 10 , $page , "goods.php?act=list".$tag);
    $showhtml = $Db_Page->show(1);
    $rs = $Db_Page->_Rst;
	$smarty->assign('showhtml',$showhtml);
	$smarty->assign('list',$rs);
	$smarty->display('admin/goods_list.html');
}
elseif ($act == 'add'){
	
	/*------------------------------------------------*/
	//--获取商品品牌形成select
	/*------------------------------------------------*/
	$id = intval(getGet('id'));

	create_html_editor('editor', $input_value = '');
	/*------------------------------------------------*/
	//--修改给模板赋值
	/*------------------------------------------------*/
	$seq = 1;	
	if( $id >0 ){
    	$rs = DB::GetTableRow('goods', array('goods_id'=>$id));
    	$smarty->assign('goods',$rs);  
    	create_html_editor('editor', $rs['description']);
    	//处理相册
    	$gallery = DB::GetQueryResult("select * from goods_gallery where goods_id=".$id , false);
    	$count = count($gallery);  //取得当前商品的照片集
    	
    	if($count > 0){
    		$seq = $count;       //把当前商品的照片数量分配给hidden
    		$gallery_html = '';
    		for ($i=0 ; $i < $count ; $i++){
    			$item = $gallery[$i];  //第i条row记录
    			$k = $i + 1;
    			/*
    			 * $item   //第i条row记录     
    			 * 
    			 * 
    			 * 
    			 * */
    			$gallery_html .= '
    			<tr id="tr1" class="clas'.$k.'">
    				<td>
    					<a href="javascript:;" '.($i > 0 ? ' id="jian" onclick="jian('.$k.','.$item['id'].')" ' : ' id="firsttr" ').'>
    						<img src="../static/imgs/'.($i == 0 ? 'add' : 'minus').'.png">
    					<a/>
    				</td>
    				<input type="hidden" id="imgid" name="imgid[]" value="'.$item['id'].'"/> 
    				<td>图片描述:</td>
    				<td><input type="text" name="img_discription[]" value="'.$item['img_discription'].'"></td>
    				<td>图片</td><td><input type="file" name="img_position[]" value=""><img src="../'.$item['img_position'].'" width="30" height="30"></td>
    				<td>或者外部链接</td> 
    				<td><input type="text" name="out_href[]" value="'.$item['out_href'].'"></td>
    			</tr>';
    		}
    	    //$imgid =  intval($_POST['imgid'][$i]);//当前分配过来的照片的id行
    		//dump($gallery_html);exit;
    		$smarty->assign('gallery_html',$gallery_html);  
    	}
	}
	//$string = '<a href="">';
	$smarty->assign('seq',$seq);  
	$smarty->assign('option_goods_classify' , get_all_option('goods_classify' , $rs['classify_id']));
	$smarty->assign('option_goods_brand' , option_goods_brand($rs['brand_id']) );
	
	if(isPost()){
	    $classify_id = intval(getPost('cname'));
	    $brand_id    = intval(getPost('brand_name'));
	    $goods_name  = getPost('goods_name');
	    $goods_info  = getPost('goods_info');
	    $shop_price  = intval(getPost('shop_price'));
	    $market_price= intval(getPost('market_price'));
	    $goods_pic   = $_FILES['goods_pic']['name'];
	    $sales       = getPost('sales'); //销量
	    $count       = getPost('count'); //库存
		$editor      = getPost('editor');
	    if ($classify_id == 0)
		{
			alertgo('分类不能为空','goods.php?act=add&id='.$id);
		}
		if ($brand_id == 0)
		{
			alertgo('品牌不能为空','goods.php?act=add&id='.$id);
		}
		if ($goods_name == '')
		{
			alertgo('商品名不能为空','goods.php?act=add&id='.$id);
		}
		if (!is_numeric($shop_price)){
		   alertgo('本店价格只能为数字','goods.php?act=add&id='.$id);
		}
	    if (!is_numeric($market_price)){
		   alertgo('市场价格只能为数字','goods.php?act=add&id='.$id);
		}
	    if (!is_numeric($count)){
	 		alertgo('库存为数字且大于100','goods.php?act=add&id='.$id);
		}
        if ($count < 100){
        	alertgo('库存要大于100','goods.php?act=add&id='.$id);
        }
        if($id == 0){	
			if ($_FILES['goods_pic']['size'] <= 0){
	  	        alertgo("请选择商品图片",'goods.php?act=add&id='.$id);   
	  	    }
        }
        //$data
		$data = array(
	  	    'classify_id' => $classify_id,
	  	    'brand_id' => $brand_id,
	  	    'goods_name' => $goods_name,
	  	    'goods_info' => $goods_info,
	  	    'shop_price' => $shop_price,
			'count' => $count,
	  	    'market_price' => $market_price,
	  	    'sales'=> $sales ,
	  	    'description'=>$editor 
  	    );
  	    $path = '../static/upload/'.date('Y/m/d');
  	    
  	    
  	    
  	    $seq = intval(getPost('seq'));
  	    if($id > 0){  //1.修改
  	    	//dump($_FILES['goods_pic']);
			if($_FILES['goods_pic']['size'] > 0){
				@unlink('../'.$rs['goods_pic']);
				$fileupload = uplaod_filel($path, 'goods_pic');
				$data['goods_pic'] = $fileupload;
			}
			if($seq > 0){ //2照片数量
				for ($i = 0 ; $i < $seq ; $i++){
				   	$arr = array();
					$arr['img_discription'] = $_POST['img_discription'][$i];
					$arr['out_href'] = $_POST['out_href'][$i];
					$arr['goods_id'] = $id;
					$imgid =  intval($_POST['imgid'][$i]);//当前分配过来的照片的id行
					if($_FILES['img_position']['size'][$i] > 0){
						 if($imgid > 0){
							 $img = DB::GetTableRow('goods_gallery', array('id' => $imgid));
							 @unlink('../'.$img['img_position']);
						 }
						 if(!is_dir($path)) makedir($path);
						 $fileupload = "";
						 $exname = strtolower(substr($_FILES['img_position']['name'][$i],(strrpos($_FILES['img_position']['name'][$i],'.')+1)));
						 $fileupload = $path.'/'.md5(time().round(20).$i).'.'.$exname;
						 move_uploaded_file($_FILES['img_position']['tmp_name'][$i], $fileupload);
						 $fileupload = str_ireplace('../', '', $fileupload);
						 $arr['img_position'] = $fileupload;
						
					}
					if($imgid > 0){ //如果有旧图片更新
						DB::Update('goods_gallery' , $imgid , $arr );
						//
					}
					//
					else if($fileupload != '' || ($arr['out_href'] != '')){
						DB::Insert('goods_gallery', $arr);
				    //如果有新上传图片		
					}
				}
			}
			//dump($data);exit();
			DB::Update('goods' , $id , $data , 'goods_id');
			$goods_id = $id;
		}else{//1.添加
			 $fileupload = uplaod_filel($path, 'goods_pic');
			 $data['goods_pic'] = $fileupload;
			 $data['is_shelves'] = 1;
			 $data['add_time'] = date('Y-m-d H:i:s');
			 DB::Insert('goods', $data);
			 $goods_id = DB::getInsertId();
			 
			 for ($i = 0 ; $i < $seq ; $i++){
				$arr = array();
				$arr['img_discription'] = $_POST['img_discription'][$i];
				$arr['out_href'] = $_POST['out_href'][$i];
				$arr['goods_id'] = $goods_id;
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
		}
		alertgo('保存商品成功','goods.php?act=list');
		
      
		
		
		
	   
	    
  	    /**
  	     * $condition=array(
	  	    'classify_id' => $classify_id,
	  	    'brand_id'=>$brand_id,
	  	    'goods_name'=>$goods_name,
	  	    'goods_info'=>$goods_info,
	  	    'shop_price'=> $shop_price,
	  	    'market_price'=>$market_price,
	  	    'goods_pic'=>$fileupload,
	  	    'sales'=> $sales ,
  	    	'add_time' => date('Y-m-d H:i:s'),
	  	    'count'=>$count,
  	        'is_shelves'=>1,
	  	    'description'=>$editor 
  	    );
  	     * Enter description here ...
  	     * @var unknown_type
  	     */
	    
  	    //$rs=DB::Insert('goods', $condition);  
  	    //if ($rs)
  	    //{
  	    	
  	    // }
  	    
	}
	$smarty->display('admin/goods_add.html');
}else if($act == 'online'){
	$page = $_GET['page'] ? intval($_GET['page']) : 1;
	$id = intval($_GET['id']);
	$is_shelves = $_GET['is_shelves'];
	DB::Update('goods' , $id , array('is_shelves' => $is_shelves) , 'goods_id');
	redirect('goods.php?act=list&page='.$page);
}elseif($act == 'delete'){
	!admin_user_url_check(GOODS_DELETE) and  alertgo("无权限操作" , 'index.php');
    $id = intval(getGet('id'));
    $rs = DB::GetTableRow('goods', array('goods_id' => $id));
	$file = '../'.$rs['goods_pic'];
	@unlink($file);  
	$delete = DB::Delete('goods' , array('goods_id' => $id));
	alertgo('删除成功' , 'goods.php');

}else if($act == 'delimg'){
	$gid = getGet('gid');
	//$name= $_POST['name'];
	//echo $name;
	$rs = DB::GetTableRow('goods_gallery', array('id'=>$gid));
	@unlink('../'.$rs['img_position']);
	DB::Delete('goods_gallery',array('id'=>$gid));
	//echo 1;exit();
}
elseif($act == 'update_goods_gallery'){
	$id = intval(getGet('id'));
    $rs = DB::GetQueryResult('select * from goods_gallery where goods_id='.$id ,false );
    $smarty->assign('list',$rs); 
    $smarty->display('admin/goods_gallery_update.html');
}elseif($act == 'delete_goods_gallery'){
	$goods_id = getGet('goods_id');
	$id = intval(getGet('id'));
    @unlink('../'.$rs['img_position']);
    $rs = DB::Delete('goods_gallery',array('id'=>$id));
    redirect('goods.php?act=update_goods_gallery&id='.$goods_id);
}
function option_goods_brand( $selected = 0 ){
	$rs = array();
	$rs =  DB::GetQueryResult("select * from goods_brand where 1 order by id asc" , false);
	if ($rs)
	{
		foreach ($rs as $val )
		{
			$html .= "<option value='".$val['id']."' ".($val['id'] == $selected ? "selected='selected'" : "").">".$val['brand_name']."</option>";
		}
		return $html;
	}
	return $html;
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

function uplaod_filel($path , $name){
	 if(!is_dir($path)) makedir($path);
	 $fileupload = "";
	 $exname = strtolower(substr($_FILES[$name]['name'],(strrpos($_FILES[$name]['name'],'.')+1)));
	 $fileupload = $path.'/'.md5(time().round(20)).'.'.$exname;
	 move_uploaded_file($_FILES[$name]['tmp_name'], $fileupload);
	 $fileupload = str_ireplace('../', '', $fileupload); //用空格替换掉../在$fileupload字符串里边
	 return $fileupload;		  
}
