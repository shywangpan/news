<meta charset=utf-8>
<?php
require_once('../includes.inc.php');
//判断session是否存在
if(!isAdmin()) {
//session不存在跳转到登录页面
	redirect('login.php');
}
$act = $_GET['act'] ? $_GET['act'] : 'list';

if($act=='list'){
   
	// $sql = "select * from goods order by goods_id desc";
	 //$rs = DB::GetQueryResult($sql, false);
	// $smarty->assign('goods',$rs); 
	
	
	
	
	
	
	
	
		$smarty->display('admin/demo_list.html');
	exit;
	
	
	
	
	
	
	
	$html='';
	for ($i=0; $i <9; $i++){
		$html .= '<tr id="a'.$i.'"><td><a href=""' .($i>0?'id="jian"':' id="first"').' >修改</a></td></tr>';
		dump($html);
    
	}
	

	$smarty->assign('html',$html);

}else if($act =='add'){
	
	
	
	dump($_FILES['img']);
	
	
	echo '<h1>w</h1>';
	dump($_FILES['imgone']);
	
	echo '<h1>w</h1>';
	
	
	dump($_POST['text']);
	
	
	
	
	
	
	
	
	
	
	
	
	
	exit;
	
	$goods_id = intval(getGet('goods_id'));
	if($goods_id >0){
		$sql = "SELECT * FROM `goods_gallery` WHERE goods_id =".$goods_id;
		$rs = DB::GetQueryResult($sql, false);
        $count = count($rs);
         echo $count; 
        if($count >0){
        	
        	 for($i=0; $i<$count; $i++){
        	 	$item = $rs[$i];
    			$k = $i + 1;
    			$html .= '
    			<tr id="first_add" class="clas'.$k.'">
    				<td>
    					<a href="javascript:;" '.($i > 0 ? ' id="jian" onclick="remove('.$k.','.$item['id'].')" ' : ' id="first_add" ').'>
    						<img src="../static/imgs/'.($i == 0 ? 'add' : 'minus').'.png">
    					<a/>
    				</td>
    				<td>图片</td><td><input type="file" name="img_position[]" value=""><img src="../'.$item['img_position'].'" width="30" height="30"></td>
    			</tr>';
        	 }
        	 
         $smarty->assign('html',$html);	
        }
        
		
		
	}
	
	
	$path = '../static/upload/'.date('Y/m/d');
	if(isPost()){
		$seq = intval(getPost('seq'));
		for ($i=0; $i<$seq; $i++){
			$arr = array();
			//$arr['img_position'] = $_POST['img_position'][$i];
		    if($_FILES['img_position']['size'][$i] > 0){
		    	if(!is_dir($path)) makedir($path);
					 $fileupload = "";
					 $exname = strtolower(substr($_FILES['img_position']['name'][$i],(strrpos($_FILES['img_position']['name'][$i],'.')+1)));
					 $fileupload = $path.'/'.md5(time().round(20).$i).'.'.$exname;
					 move_uploaded_file($_FILES['img_position']['tmp_name'][$i], $fileupload);
					 $fileupload = str_ireplace('../', '', $fileupload);
					 $arr['img_position'] = $fileupload;
					 DB::Insert('goods_gallery', $arr);
		    }
			
		}
		 
		
	}
	
 $smarty->display('admin/demo_add.html');	
	
}

/*在goods表点击修改的时候把goods表对应的相册上册调出来，并且可以动态修改相册表的值
 * 
 * */
	



































function get_all_option(){
	$rs = array();
	$rs = DB::GetQueryResult("select * from news_classify where 1 order by id asc" , false);
	$rs = find($rs , 0);
	if($rs){
		foreach ($rs as $val){
			$html .= " <option value='{$val['id']}'>".get_tag($val['hierarchy'])."{$val['cname']}</option>";
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










$row = DB::GetTableRow('admin_user','user');
$rs  = DB::GetTableRow('admin_group', array('gid' => $row['gid']) );//{0,1 1,2}
$priv = unserialize($rs['content']);
foreach( $priv as $v){
	   $h[$v] = $data[$v[0]]['child'][$v[1]];
}
$_SESSION['h'] = $h;
 


































?>