<?php
/*
 * people_classify
 * hierarchy
 * pid
 * cname
 * people_classify.php
 * people_classify_list.html
 * people_classify_add.html
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
	$smarty->assign('id',100);
	$smarty->display('people_classify_list.html');
}


