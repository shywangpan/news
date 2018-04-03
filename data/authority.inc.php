<?php
//serialize($str)
/**
 * 
 * 广告管理列表
 * @var string
 */
define('ADS_LIST', '2,1');
/**
 * 
 * 商品管理列表
 * @var string
 */
define('GOODS_DELETE', '0,2');

return   array(
	 array(
	 	'id' => 0,
	 	'nav' => '商品管理',
	 	'child' => array(
	 		array(
	 			'id' => 0,
	 			'nav' => '商品管理列表',
	 			'isnav' => 1,
	 			'link' => 'goods.php?act=list',
	 		),
	 		array(
	 			'id' => 1,
	 			'isnav' => 1,
	 			'nav' => '商品添加/修改',
	 			'link' => 'goods.php?act=add',
	 		),
	 		array(
	 			'id' => 2,
	 			'isnav' => 0,
	 			'nav' => '商品删除',
	 			'link' => 'goods.php?act=add',
	 		),
	 		array(
	 			'id' => 3,
	 			'isnav' => 1,
	 			'nav' => '商品分类管理',
	 			'link' => 'goods_classify.php',
	 		),
	 		array(
	 			'id' => 4,
	 			'isnav' => 1,
	 			'nav' => '商品分类添加/修改',
	 			'link' => 'goods_classify.php?act=add',
	 		),
	 		array(
	 			'id' => 5,
	 			'isnav' => 0,
	 			'nav' => '商品分类删除',
	 			'link' => 'goods_classify.php?act=delete',
	 		),
	 		array(
	 			'id' => 6,
	 			'isnav' => 1,
	 			'nav' => '商品品牌管理',
	 			'link' => 'goods_brand.php',
	 		),
	 		array(
	 			'id' => 7,
	 			'isnav' => 1,
	 			'nav' => '商品品牌添加/修改',
	 			'link' => 'goods_brand.php?act=add',
	 		),
	 		array(
	 			'id' => 8,
	 			'isnav' => 0,
	 			'nav' => '商品品牌删除',
	 			'link' => 'goods_brand.php?act=delete',
	 		),
	 	),
	 ),
	 array(
	 	'id' => 1,
	 	'nav' => '新闻管理',
	 	'child' => array(
		  array(
	 			'id' =>0,
	 			'isnav' => 1,
	 			'nav' => '新闻列表',
	 			'link' => 'news.php?act=list',
	 		),
	 		array(
	 			'id' => 1,
	 			'isnav' => 1,
	 			'nav' => '新闻添加/修改',
	 			'link' => 'news.php?act=add',
	 		),
	 		array(
	 			'id' => 2,
	 			'isnav' => 0,
	 			'nav' => '新闻删除',
	 			'link' => 'news.php?act=delete',
	 		),
	 		array(
	 			'id' =>3,
	 			'isnav' => 1,
	 			'nav' => '新闻分类列表',
	 			'link' => 'news_class.php?act=list',
	 		),
	 		array(
	 			'id' => 4,
	 			'isnav' => 1,
	 			'nav' => '新闻分类添加/修改',
	 			'link' => 'news_class.php?act=add',
	 		),
	 		array(
	 			'id' => 5,
	 			'isnav' => 0,
	 			'nav' => '新闻分类删除',
	 			'link' => 'news_class.php?act=delete',
	 		),
	      ),
	 ),
	 array(
	 	'id' => 2,
	 	'nav' => '广告管理',
	 	'child' => array(
	        array(
	 			'id' => 0,
	 			'isnav' => 1,
	 			'nav' => '广告位管理',
	 			'link' => 'ads_position.php?act=list',
	 		),
	 		array(
	 			'id' => 1,
	 			'isnav' => 1,
	 			'nav' => '广告位添加/修改',
	 			'link' => 'ads_position.php?act=add',
	 		),
	 		array(
	 			'id' => 2,
	 			'isnav' => 0,
	 			'nav' => '广告位删除',
	 			'link' => 'ads_position.php?act=delete',
	 		),
	 		array(
	 			'id' =>3,
	 			'isnav' => 1,
	 			'nav' => '广告列表',
	 			'link' => 'ads.php?act=list',
	 		),
	 		array(
	 			'id' => 4,
	 			'isnav' => 1,
	 			'nav' => '广告添加/修改',
	 			'link' => 'ads.php?act=add',
	 		),
	 		array(
	 			'id' => 5,
	 			'isnav' => 0,
	 			'nav' => '广告删除',
	 			'link' => 'ads.php?act=delete',
	 		),
	     ),
	 ),
	 array(
	 	'id' => 3,
	 	'nav' => '管理员管理',
	 	'child' => array(
	        array(
	 			'id' =>0,
	 			'isnav' => 1,
	 			'nav' => '管理员列表',
	 			'link' => 'admin.php?act=list',
	 		),
	 		array(
	 			'id' => 1,
	 			'isnav' => 0,
	 			'nav' => '管理员添加/修改',
	 			'link' => 'admin.php?act=add',
	 		),
	 		array(
	 			'id' => 2,
	 			'isnav' => 0,
	 			'nav' => '管理员删除',
	 			'link' => 'admin.php?act=delete',
	 		),  
	 		array(
	 			'id' => 3,
	 			'isnav' => 1,
	 			'nav' => '管理员用户组列表',
	 			'link' => 'admin_gourp.php?act=list',
	 		),
	 		array(
	 			'id' => 4,
	 			'isnav' =>0,
	 			'nav' => '管理员组添加/修改',
	 			'link' => 'admin_gourp.php?act=add',
	 		),
	 		array(
	 			'id' => 5,
	 			'isnav' => 0,
	 			'nav' => '管理员组删除',
	 			'link' => 'admin_gourp.php?act=delete',
	 		),  
	    ),
	 ),
	 array(
           'id' => 4,
           'nav' => '幻灯片管理',
           'child' => array(
	 						array(
	 			'id' =>0,
	 			'isnav' => 1,
	 			'nav' => '幻灯片列表',
	 			'link' => 'web_focus?act=list',
	 			            )	

                
           	)
  )
);


?>