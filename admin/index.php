<?php
require_once('../includes.inc.php');
!isAdmin() and redirect('login.php');
$act = $_GET['act'] ? $_GET['act'] : 'list';
if($act == 'list'){
/*
	Array
(
    [0,0] => Array
        (
            [id] => 0
            [nav] => 商品管理列表
            [isnav] => 1
            [link] => goods.php?act=list
        )

    [0,1] => Array
        (
            [id] => 1
            [isnav] => 0
            [nav] => 商品添加/修改
            [link] => goods.php?act=add
        )

    [0,2] => Array
        (
            [id] => 2
            [isnav] => 0
            [nav] => 商品删除
            [link] => goods.php?act=add
        )

)
*/
/*	
if(!empty($prie)){
		$data = require_once('../data/authority.inc.php');
		foreach ($prie as $string){
			$val = explode(',', $string);
			if($data[$val[0]]['child'][$val[1]]['isnav'] == 1){
				$x=$data[$val[0]]['child'][$val[1]]['isnav'];
     			$nav[$data[$val[0]]['nav']][] = $data[$val[0]]['child'][$val[1]];
     			$nav[$data[0]['nav']] []= array()
     			//$nav['商品管理'][0]=array() 
     		    //$nav['商品管理'][1]=array() 
     			//$nav['商品管理'][2]=array() 
     			//$nav['商品管理'][3]=array() 
     			//$a[]=2;
     			 *$a[]=3;
     			 *$a=array('2','3') 
     			 * $nav=array('商品管理'=>array(
     			 *                        array(),
     			 *                        array(),
     			 *                        array()
     			 *  ))
     		   
			} 
			
			array('商品管理'=>array(
			                        array(),
			                        array(),
			                        array(),
			                        array()
			      )
			)
			$haystack[$string] = $data[$val[0]]['child'][$val[1]];
		}
	}
	
	Array
(
    [id] => 6
    [isnav] => 1
    [nav] => 商品品牌管理
    [link] => goods_brand.php
)

Array
(
    [id] => 0
    [isnav] => 1
    [nav] => 新闻列表
    [link] => news.php?act=list
)

Array
(
    [id] => 3
    [isnav] => 1
    [nav] => 新闻分类列表
    [link] => news_class.php?act=list
)
	
    $array['nav'] = $nav;
	$_SESSION['admin'] = $array;
*/	
	 if($_SESSION['admin']['nav']){
		foreach($_SESSION['admin']['nav'] as $key => $val){
			
			
			$html .= '<h2><span class="icon-pencil-square-o"></span>'.$key.'</h2><ul>';
			foreach($val as $child){
				$html .= '<li><a href="'.$child['link'].'" target="right"><span class="icon-caret-right"></span>'.$child['nav'].'</a></li>';
			} 
			$html .= "</ul>";
		}
	}
	       
	
	 
	 
	 $smarty->assign('html',$html);
	
	$smarty->display('admin/index.html');
}elseif($act == 'login_out'){
	
	$_SESSION['admin']=array();
	redirect('login.php');
}












/*

Ctrl+/ 单行注释
Ctrl+Shift+/ 块注释，为选择的PHP代码添加
	
*/
	

























?>