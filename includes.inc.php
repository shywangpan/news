<?php
session_start();
error_reporting(E_ALL^E_WARNING^E_NOTICE);
define("SITE_PATH"	,	str_ireplace('\\','/',dirname(__FILE__)));
define("DIR_CORE",SITE_PATH."/includes");
require_once(DIR_CORE.'/class/MySql.php');
require_once(DIR_CORE.'/class/PageView.php');
require_once(DIR_CORE.'/functions/common.php');
require_once(DIR_CORE.'/lib/Smarty.class.php');
require_once(DIR_CORE.'/class/FileUpload.class.php');
require_once(DIR_CORE.'/fckeditor/fckeditor.php');


$smarty=new Smarty();
$smarty->left_delimiter="{";
$smarty->right_delimiter="}";

$smarty->caching = false;
$smarty->force_compile=true;
$smarty->setTemplateDir(SITE_PATH.'/templates');
$smarty->setCompileDir(SITE_PATH.'/data/templates_c');


//$smarty->setTemplateDir='./templates/';
//$smarty->setCompiledir="./data/";
//$smarty->setCacheDir='';
//$smarty->setConfigDir=;


?>