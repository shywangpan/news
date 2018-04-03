<?php
function check_url($url){
    if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$url)){
		 return false;
    }
 	 return true;
}
/**
 * 字符串截取,可截取汉字
 *
 * @param string $_String
 * @param int $_Length
 * @param int $_Start
 * @param string $dot
 * @param string $_Encode
 * @return string
 */
function cutstr($_String, $_Length, $_Start=0,$dot='...', $_Encode='utf-8')
{
	$_P['utf-8']  = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|"
	."\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
	$_P['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$_P['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$_P['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";

	$_Le = $_Length*2-1;
	$_v  = 0;

	preg_match_all($_P[$_Encode], $_String, $_A);
	$_L = count($_A[0]);
	if($_L<$_Length) { return $_String; }

	for($i=$_Start; $i<$_L; $i++)
	{
		if($_v>=$_Le) return $_R.$dot;
		$_v += ord($_A[0][$i])>129 ? 2 : 1;
		$_R .= $_A[0][$i];
	}
	return $_R;
}
/**
 * 判断是否为管理员
 *
 * @return boolen
 */
function isAdmin(){
	if($_SESSION['admin']['aid']){
		return true;
	}else {
		return false;
	}
}
/**
 * 得到后台 url
 *
 * @param  $url
 * @return string
 */
function urlAdmin($url){
	return '../../admin/'.$url;
}
/**
 * 得到完整url
 *
 * @param  $url
 * @return string
 */
function url($url){
	return '../../'.$url;
}
/**
 * 重定向浏览器到指定的 URL
 *
 * @param string $url 要重定向的 url
 * @param int $delay 等待多少秒以后跳转
 * @param bool $js 指示是否返回用于跳转的 JavaScript 代码
 * @ram bool $jsWrapped 指示返回 JavaScript 代码时是否使用 <script> 标签进行包装
 * @param bool $return 指示是否返回生成的 JavaScript 代码
*/
function redirect($url, $delay = 0, $js = false, $jsWrapped = true, $return = false) {
	$delay = ( int ) $delay;
	if (! $js) {
		if (headers_sent () || $delay > 0) {
			echo <<<EOT
    <html>
    <head>
    <meta http-equiv="refresh" content="{$delay};URL={$url}" />
    </head>
    </html>
EOT;
			exit ();
	} else {
		header ( "Location: {$url}" );
		exit ();
	  }
	}

	$out = '';
	if ($jsWrapped) {
		$out .= '<script language="JavaScript" type="text/javascript">';
	}
	if ($delay > 0) {
		$out .= "window.setTimeout(function () { document.location='{$url}'; }, {$delay});";
	} else {
		$out .= "document.location='{$url}';";
	}
	if ($jsWrapped) {
		$out .= '</script>';
	}

	if ($return) {
		return $out;
	}

	echo $out;
	exit ();
}

/**
 * 跳转到某个页面,并提示.
 *
 * @param String $msg
 * @param String $url
 * @return String 返回一个javascript 代码。
 */
function alertgo($msg, $url = '', $js = '', $js_run = false) {
	$script = '';
	if (!headers_sent ()) {
		header("Content-type: text/html; charset=utf-8"); 
	}
	$script .= "<script language='javascript'>" . chr ( 13 );
	if (trim ( $msg ) != "") {
		$script .= "alert('" . $msg . "');" . chr ( 13 );
	}
	if (trim ( $url ) != "") {
		$script .= "location.href='" . $url . "'" . chr ( 13 );
	}
	$script .= "</" . "script>" . chr ( 13 );
	if ($js_run) {
		$script = $js . chr ( 13 ) . $script;
	}
	print $script;
	exit ();
}
/*
* safe_file_put_contents() 一次性完成打开文件，写入内容，关闭文件三项工作，
* 并且确保写入时不会造成并发冲突
*
* @param string $filename
* @param string $content
* @param int $flag
*
* @return boolean
*/
function safe_file_put_contents($filename, & $content) {
	$fp = fopen ( $filename, 'wb' );
	if ($fp) {
		flock ( $fp, LOCK_EX );
		fwrite ( $fp, $content );
		flock ( $fp, LOCK_UN );
		fclose ( $fp );
		return true;
	} else {
		return false;
	}
}
/**
 * 得到 POST 
 *
 * @param  $key
 * @return string
 */
function getPost($key){
	return trim($_POST[$key]);
}
/**
 * 得到表名称全部
 *
 * @param  $name
 * @return 表名称
 */
function T($name){
	return "88hao_".$name;
}
/**
 * 得到 $_GET
 *
 * @param  $key
 * @return string
 */
function getGet($key){
	return trim($_GET[$key]);
}
/*
* safe_file_get_contents() 用共享锁模式打开文件并读取内容，
* 可以避免在并发写入造成的读取不完整问题
*
* @param string $filename
*
* @return mixed
*/
function safe_file_get_contents($filename) {
	$fp = fopen ( $filename, 'rb' );
	if ($fp) {
		flock ( $fp, LOCK_SH );
		clearstatcache ();
		$filesize = filesize ( $filename );
		if ($filesize > 0) {
			$data = fread ( $fp, $filesize );
		} else {
			$data = false;
		}
		flock ( $fp, LOCK_UN );
		fclose ( $fp );
		return $data;
	} else {
		return false;
	}
}

/**
 * 转换 HTML 特殊字符
 *
 * @param string $text
 *
 * @return string
 */
function h($text) {
	return htmlspecialchars ( $text );
}

/**
 * 解码js  escape 编码过的字符
 *
 * @param string $str
 * @return string
 */
function js_unescape($str) {
	$ret = '';
	$len = strlen ( $str );
	for($i = 0; $i < $len; $i ++) {
		if ($str [$i] == '%' && $str [$i + 1] == 'u') {
			$val = hexdec ( substr ( $str, $i + 2, 4 ) );
			if ($val < 0x7f)
				$ret .= chr ( $val );
			else if ($val < 0x800)
				$ret .= chr ( 0xc0 | ($val >> 6) ) . chr ( 0x80 | ($val & 0x3f) );
			else
				$ret .= chr ( 0xe0 | ($val >> 12) ) . chr ( 0x80 | (($val >> 6) & 0x3f) ) . chr ( 0x80 | ($val & 0x3f) );
			$i += 5;
		} else if ($str [$i] == '%') {
			$ret .= urldecode ( substr ( $str, $i, 3 ) );
			$i += 2;
		} else
			$ret .= $str [$i];
	}
	return $ret;
}
/**
 * 加密解密
 * 加密 gmvc_uc_authcode($string,'ENCODE')
 *
 * @param unknown_type $string
 * @param unknown_type $operation
 * @param unknown_type $key
 * @param unknown_type $expiry
 * @return unknown
 */
function gmvc_uc_authcode($string, $operation = 'DECODE', $key = '!Q@W#E$Rfdcfgt%$#', $expiry = 0) {

	$ckey_length = 4;
	$key = md5 ( $key ? $key : UC_KEY );
	$keya = md5 ( substr ( $key, 0, 16 ) );
	$keyb = md5 ( substr ( $key, 16, 16 ) );
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr ( $string, 0, $ckey_length ) : substr ( md5 ( microtime () ), - $ckey_length )) : '';

	$cryptkey = $keya . md5 ( $keya . $keyc );
	$key_length = strlen ( $cryptkey );

	$string = $operation == 'DECODE' ? base64_decode ( substr ( $string, $ckey_length ) ) : sprintf ( '%010d', $expiry ? $expiry + time () : 0 ) . substr ( md5 ( $string . $keyb ), 0, 16 ) . $string;
	$string_length = strlen ( $string );

	$result = '';
	$box = range ( 0, 255 );

	$rndkey = array ();
	for($i = 0; $i <= 255; $i ++) {
		$rndkey [$i] = ord ( $cryptkey [$i % $key_length] );
	}

	for($j = $i = 0; $i < 256; $i ++) {
		$j = ($j + $box [$i] + $rndkey [$i]) % 256;
		$tmp = $box [$i];
		$box [$i] = $box [$j];
		$box [$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i ++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box [$a]) % 256;
		$tmp = $box [$a];
		$box [$a] = $box [$j];
		$box [$j] = $tmp;
		$result .= chr ( ord ( $string [$i] ) ^ ($box [($box [$a] + $box [$j]) % 256]) );
	}

	if ($operation == 'DECODE') {
		if ((substr ( $result, 0, 10 ) == 0 || substr ( $result, 0, 10 ) - time () > 0) && substr ( $result, 10, 16 ) == substr ( md5 ( substr ( $result, 26 ) . $keyb ), 0, 16 )) {
			return substr ( $result, 26 );
		} else {
			return '';
		}
	} else {
		return $keyc . str_replace ( '=', '', base64_encode ( $result ) );
	}

}

/**
* 功能:录入网址自动识别是否有 http://
* @example :
* $site="www.google.com";
* echo get_site($site)//输出结果为http://www.google.com
* $site="http://www.google.com";
* echo get_site($site)//输出结果为http://www.google.com
* @author : Tao ShaoBo
*/
function get_site($site){
	$site && !preg_match('/^http([s]?):\/\//i',$site) && $site = 'http://'.$site;
	return $site;
}

//php生成随机数
function randomkeys($length) {
	$key = '';
	$pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ'; //字符池
	for($i = 0; $i < $length; $i ++) {
		$key .= $pattern {mt_rand ( 0, strlen ( $pattern ) - 1 )};
	}
	return str_shuffle ( $key );
}

/**
 * 返回当前时间格式:20100831015710
 *
 */
function get_date_key() {
	return date ( 'YmdHis' );
}
function admin_user_url_check($key){
	if(!empty($_SESSION['admin']['haystack'][$key])){
		return true;
	}else{
		return false;
	}
}
/**
 * 自动登陆
 */
function auto_login() {
	if (isset ( $_SESSION ['GMVC_USERDATA'] ) && ! empty ( $_SESSION ['GMVC_USERDATA'] )) {
		return false;
	}
	$a_cookie = @$_COOKIE ['autocontent'];
	$a_cookie = @gmvc_uc_authcode ( $a_cookie );
	$a_cookie = @unserialize ( $a_cookie );
	
	if (isset ( $a_cookie ['autoLogin'] ) && $a_cookie ['autoLogin'] == 1) {
		$_SESSION ['GMVC_USERDATA'] = $a_cookie;
		//redirect ('index');
	}
}



/**
 * 获取等比例缩放图片宽高
 *
 * @param int $maxwidth   显示宽度范围
 * @param int $maxheight  显示高度范围
 * @param int $imgpath    图片路径
 * @return array
 */
function get_fiximg_size($maxwidth, $maxheight, $imgpath) {
	if (is_file ( $imgpath )) {
		$size = @getimagesize ( $imgpath );
		$width = $size [0];
		$height = $size [1];
		
		if ($width > $maxwidth || $height > $maxheight) {
			$w = $width / $maxwidth;
			$h = $height / $maxheight;
			if ($w > $h) { //宽比高大
				$width = $maxwidth;
				//新的高度
				$height = intval ( $height / $w );
			} else {
				$height = $maxheight;
				$width = intval ( $width / $h );
			}
		} else {
			$width = $width;
			$height = $height;
		}
		return array ('W' => $width, 'H' => $height );
	} else {
		return false;
	}
}
/**
 * 获取等比例缩放、拉伸图片宽高
 *
 * @param int $maxwidth   显示宽度范围
 * @param int $maxheight  显示高度范围
 * @param int $imgpath    图片路径
 * @return array
 */
function reget_fiximg_size($maxwidth, $maxheight, $imgpath) {
	if (is_file ( $imgpath )) {
		$size = @getimagesize ( $imgpath );
		$width = $size [0];
		$height = $size [1];
		
		if ($width > $maxwidth || $height > $maxheight) {
			$w = $width / $maxwidth;
			$h = $height / $maxheight;
			if ($w > $h) { //宽比高大
				$width = $maxwidth;
				//新的高度
				$height = intval ( $height / $w );
			} else {
				$height = $maxheight;
				$width = intval ( $width / $h );
			}
		} else {
			$w = $width / $maxwidth;
			$h = $height / $maxheight;
			if ($w > $h) { //宽比高大
				$width = $maxwidth;
				//新的高度
				$height = intval ( $height / $w );
			} else {
				$height = $maxheight;
				$width = intval ( $width / $h );
			}
		}
		return array ('W' => $width, 'H' => $height );
	} else {
		return false;
	}
}

/**
 * ubb解码
 * @param unknown_type $content
 */
function ubb2html($content)
{
  $tmpstr = '';
  $tcontent = $content;
  if (!empty($tcontent))
  {
    $tcontent = str_replace('&', '&amp;', $tcontent);
    $tcontent = str_replace('>', '&gt;', $tcontent);
    $tcontent = str_replace('<', '&lt;', $tcontent);
    $tcontent = str_replace('"', '&quot;', $tcontent);
    $tcontent = preg_replace("/\[br\]/is", "<br />", $tcontent);
    //******************************************************************
    $tRegexAry = array();
    $tRegexAry[0] = array("\[p\]([^\[]*?)\[\/p\]", "\\1<br />");
    $tRegexAry[1] = array("\[b\]([^\[]*?)\[\/b\]", "<b>\\1</b>");
    $tRegexAry[2] = array("\[i\]([^\[]*?)\[\/i\]", "<i>\\1</i>");
    $tRegexAry[3] = array("\[u\]([^\[]*?)\[\/u\]", "<u>\\1</u>");
    $tRegexAry[4] = array("\[ol\]([^\[]*?)\[\/ol\]", "<ol>\\1</ol>");
    $tRegexAry[5] = array("\[ul\]([^\[]*?)\[\/ul\]", "<ul>\\1</ul>");
    $tRegexAry[6] = array("\[li\]([^\[]*?)\[\/li\]", "<li>\\1</li>");
    $tRegexAry[7] = array("\[code\]([^\[]*?)\[\/code\]", "<div class=\"ubb_code\">\\1</div>");
    $tRegexAry[8] = array("\[quote\]([^\[]*?)\[\/quote\]", "<div class=\"ubb_quote\">\\1</div>");
    $tRegexAry[9] = array("\[color=([^\]]*)\]([^\[]*?)\[\/color\]", "<font style=\"color: \\1\">\\2</font>");
    $tRegexAry[10] = array("\[hilitecolor=([^\]]*)\]([^\[]*?)\[\/hilitecolor\]", "<font style=\"background-color: \\1

\">\\2</font>");
    $tRegexAry[11] = array("\[align=([^\]]*)\]([^\[]*?)\[\/align\]", "<div style=\"text-align: \\1\">\\2</div>");
    $tRegexAry[12] = array("\[url=([^\]]*)\]([^\[]*?)\[\/url\]", "<a href=\"\\1\">\\2</a>");
    $tRegexAry[13] = array("\[img\]([^\[]*?)\[\/img\]", "<a href=\"\\1\" target=\"_blank\"><img src=\"\\1\" /></a>");
    //******************************************************************
    $tState = true;
    while($tState)
    {
      $tState = false;
      for ($ti = 0; $ti < count($tRegexAry); $ti ++)
      {
        $tnRegexString = "/" . $tRegexAry[$ti][0] . "/is";
        if (preg_match($tnRegexString, $tcontent))
        {
          $tState = true;
          $tcontent = preg_replace($tnRegexString, $tRegexAry[$ti][1], $tcontent);
        }
      }
    }
    //******************************************************************
    $tmpstr = $tcontent;
  }
  return $tmpstr;
}

/**
 * 二维数据排序方法（冒泡方式）
 * 本函数仅限于对二维数组中的数字字段进行排序
 * 
 * @param array 需要排序的array $a
 * @param string 需要排序的字段 $sort
 * @param string 排序方式 默认为升序 $d=d为降 $d
 * @return array
 * @author  TAO ShaoBo
 */
function array2sort($a,$sort,$d='') {
    $num=count($a);
    if(!$d){
        for($i=0;$i<$num;$i++){
            for($j=0;$j<$num-1;$j++){
                if($a[$j][$sort] > $a[$j+1][$sort]){
                    foreach ($a[$j] as $key=>$temp){
                        $t=$a[$j+1][$key];
                        $a[$j+1][$key]=$a[$j][$key];
                        $a[$j][$key]=$t;
                    }
                }
            }
        }
    }
    else{
        for($i=0;$i<$num;$i++){
            for($j=0;$j<$num-1;$j++){
                if($a[$j][$sort] < $a[$j+1][$sort]){
                    foreach ($a[$j] as $key=>$temp){
                        $t=$a[$j+1][$key];
                        $a[$j+1][$key]=$a[$j][$key];
                        $a[$j][$key]=$t;
                    }
                }
            }
        }
    }
    return $a;
}

function dump($vars, $label = '', $return = false) {
	echo '<meta charset="UTF-8">';
	if (ini_get ( 'html_errors' )) {
		$content = "<pre>\n";
		if ($label != '') {
			$content .= "<strong>{$label} :</strong>\n";
		}
		$content .= htmlspecialchars ( print_r ( $vars, true ) );
		$content .= "\n</pre>\n";
	} else {
		$content = $label . " :\n" . print_r ( $vars, true );
	}
	if ($return) {
		return $content;
	}
	echo $content;
	return null;
}

/**
 * 是否是一个GET请求
 *
 * @param void
 * @return bool
 */
function isGet(){
	if ($_SERVER['REQUEST_METHOD'] != 'GET'){
		return false;
	}
	return true;
}

/**
 * 是否是一个POST请求
 *
 * @param void
 * @return bool
 */
function isPost(){
	if ($_SERVER['REQUEST_METHOD'] != 'POST'){
		return false;
	}
	return true;
}

/**
 * 用户是否登陆
 * @return  boolean true(已经登陆) 
 */
function islogin(){
	$i_suid = isset($_SESSION['GMVC_USERDATA']['HYID']) ? $_SESSION['GMVC_USERDATA']['HYID'] : '';
	if ($i_suid !=''){
		return true;
	}
	return false;
}
/**
 * 获取企业用户身份
 */
function getEIdentity($uid){
	$rs = DB::GetTableRow('userbase',array('HYID'=>$uid));
	return $rs['CLASS'];
}


/*
* 年/月/日 字符串
*/
function datedir(){
	$arr=explode ('-',date('Y-m-d'));
	$path=$arr[0].'/'.$arr[1].'/'.$arr[2];
	return $path;
}
/*
* 功能：连续建目录
* $dir 目录字符串
*/
function makedir( $dir, $mode = 0777 ) {
	if( ! $dir ) return 0;
	$dir = str_replace( "\\", "/", $dir );
	$mdir = "";
	foreach( explode( "/", $dir ) as $val ) {
		$mdir .= $val."/";
		if( $val == ".." || $val == "." ) continue;

		if( ! file_exists( $mdir ) ) {
			if(!@mkdir( $mdir, $mode )){
				//    echo "创建目录 [".$mdir."]失败.";
				exit;
			}
		}
	}
	return true;
}

/**
 * html 内容里的img 过滤为文本
 *
 * @param string $str
 * @return string
 */
function strip_image_tags($str){
	$str = preg_replace("#<img\s+.*?src\s*=\s*[\"'](.+?)[\"'].*?\>#", "\\1", $str);
	$str = preg_replace("#<img\s+.*?src\s*=\s*(.+?).*?\>#", "\\1", $str);
	return $str;
}
/**
 * html 内容里的链接,过率为文本
 *
 * @param string $str
 * @return string
 */
function strip_link_tags($str){
	$str = preg_replace("#<a\s+.*?href\s*=\s*[\"'](.+?)[\"'].*?\>#", "\\1", $str);
	$str = preg_replace("#<a\s+.*?href\s*=\s*(.+?).*?\>#", "\\1", $str);
	$str = str_replace("</a>",'',$str);
	return $str;
}
/**
 * 判断当前导航是否选中
 *
 * @param string $name
 */
function current_url($name){
	$rurl = $_SERVER['REQUEST_URI'];
	if (strpos(' '.$rurl,$name)) {
		return true;
	}
	return false;
}
/**
 * 
 * 上传图片
 * @param 路径目录 $path
 * @param 名字 $name
 */
function uplaod_file($path , $name){
	 if(!is_dir($path)) makedir($path);
	 $fileupload = "";
	 $exname = strtolower(substr($_FILES[$name]['name'],(strrpos($_FILES[$name]['name'],'.')+1)));
	 $fileupload = $path.'/'.md5(time().round(20)).'.'.$exname;
	 move_uploaded_file($_FILES[$name]['tmp_name'], $fileupload);
	 $fileupload = str_ireplace('../', '', $fileupload);
	 return $fileupload;		  
}
/**
 * 格式化微博,替换表情/@用户/话题
 * 
 * @param string  $content 待格式化的内容
 * @param boolean $url     是否替换URL
 * @return string
 * @todo  表情/@用户/话题
 */
function format($content,$url=false){
	if($url){
		$content = preg_replace('/((?:https?|mailto).*?)(\s|　|&nbsp;|<br|\'|\"|$)/', '<a href="\1" target="_blank">\1</a>\2', $content);
	}
//	$content = preg_replace_callback("/\[(.+?)\]/is",replaceEmot,$content);
//	$content = preg_replace_callback("/#(.+?)#/is",themeformat,$content);
//	$content = preg_replace_callback("/@([\w\\x80-\\xff-]+?)([\s|:]|$)/is",getUserId,$content);
    return $content;
}

/**
 * 处理Json函数.
 * 如果没有找到 json 函数,则调用系统的 JSON.PHP 来模拟处理.
 */

if (! function_exists ( 'json_encode' )) {

	/**
	 * 将变量转换为 JSON 字符串
	 *
	 * @param mixed $value
	 *
	 * @return string
	 */
	function json_encode($value) {
		$json = new Services_JSON ( SERVICES_JSON_LOOSE_TYPE );
		return $json->encode ( $value );
	}
}
if (! function_exists ( 'json_decode' )) {
	/**
	 * 将 JSON 字符串转换为变量
	 *
	 * @param string $jsonString
	 *
	 * @return mixed
	*/
	function json_decode($jsonString) {
		$json = new Services_JSON ( SERVICES_JSON_LOOSE_TYPE );
		return $json->decode ( $jsonString );
	}
}

function sendMail($content, $recevemail, $subject, $fromname = '管理员') {
    require(DIR_HELP.'/mail/class.phpmailer.php');
    try {
        $mail = new PHPMailer(true);
        $mail -> IsSMTP(); // telling the class to use SMTP
        $mail -> IsHTML(true);
        $mail -> CharSet = 'utf-8';
        $mail -> Host = 'mail.163.com';
        $mail -> Port = 25;
        $mail -> SMTPSecure = 'pop';
        $mail -> SMTPAuth = true; // enable SMTP authentication
        $mail -> Username = 'te2341414@163.com'; //系统发信 mail
        $mail -> Password = '136290189'; //系统发信mail 密码
        $mail -> FromName = $fromname; //发件人姓名
        //发件人邮箱
        $mail -> SetFrom($mail -> Username, $mail -> Username);
        $mail -> Subject = $subject;
        $mail -> MsgHTML($content);
        $mail -> AddMutieAddress($recevemail);
        $boolean = $mail -> Send();
        if ($boolean) {
            return '2';
        } else {
            return '3';
        }
    } catch (phpmailerException $e) {
        echo $e -> errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo $e -> getMessage(); //Boring error messages from anything else!
    }
}
/**
 * 引入模板
 *
 * @param 当前控制器      $param
 * @param 前台还是后天模板 $position
 * @param Tao ShaoBo
 * @return $file
 */
function template($param , $position = '')
{
	$position = $position == '' ? 'index' : $position;
	$templates = new templates();
	$Re = $templates->template($position , implode('_' , $param));
	if($Re === false)
	{
		alertgo('模板文件不存在！');
	}
	return $Re;
}
/**
 * 加载类
 *
 * @param 类名 $filename
 * @return require
 */
function load_class($filename)
{
	$filepath = DIR_CORE.'/'.$filename.'.class.php';
	if(file_exists($filepath))
	{
		require_once $filepath;
		return new $filename();
	}
	else 
	{
		alertgo($filepath.' 文件不存在！');
	}
}
/**
 * 加载方法
 *
 * @param 文件名 $filename
 */
function load_function($filename)
{
	$filepath = DIR_CORE.'/functions/'.$filename.'.func.php';
	if(file_exists($filepath))
	{
		require_once $filepath;
	}
	else 
	{
		alertgo($filepath.' 文件不存在！');
	}
}
/**
 * 判断文件格式
 *
 * @param 文件格式名 $ext
 * @return string
 */
function _mime_types($ext = '')
{
	 $mimes = array(
      'hqx'   =>  'application/mac-binhex40',
      'cpt'   =>  'application/mac-compactpro',
      'doc'   =>  'application/msword',
      'bin'   =>  'application/macbinary',
      'dms'   =>  'application/octet-stream',
      'lha'   =>  'application/octet-stream',
      'lzh'   =>  'application/octet-stream',
      'exe'   =>  'application/octet-stream',
      'class' =>  'application/octet-stream',
      'psd'   =>  'application/octet-stream',
      'so'    =>  'application/octet-stream',
      'sea'   =>  'application/octet-stream',
      'dll'   =>  'application/octet-stream',
      'oda'   =>  'application/oda',
      'pdf'   =>  'application/pdf',
      'ai'    =>  'application/postscript',
      'eps'   =>  'application/postscript',
      'ps'    =>  'application/postscript',
      'smi'   =>  'application/smil',
      'smil'  =>  'application/smil',
      'mif'   =>  'application/vnd.mif',
      'xls'   =>  'application/vnd.ms-excel',
      'ppt'   =>  'application/vnd.ms-powerpoint',
      'wbxml' =>  'application/vnd.wap.wbxml',
      'wmlc'  =>  'application/vnd.wap.wmlc',
      'dcr'   =>  'application/x-director',
      'dir'   =>  'application/x-director',
      'dxr'   =>  'application/x-director',
      'dvi'   =>  'application/x-dvi',
      'gtar'  =>  'application/x-gtar',
      'php'   =>  'application/x-httpd-php',
      'php4'  =>  'application/x-httpd-php',
      'php3'  =>  'application/x-httpd-php',
      'phtml' =>  'application/x-httpd-php',
      'phps'  =>  'application/x-httpd-php-source',
      'js'    =>  'application/x-javascript',
      'swf'   =>  'application/x-shockwave-flash',
      'sit'   =>  'application/x-stuffit',
      'tar'   =>  'application/x-tar',
      'tgz'   =>  'application/x-tar',
      'xhtml' =>  'application/xhtml+xml',
      'xht'   =>  'application/xhtml+xml',
      'zip'   =>  'application/zip',
      'mid'   =>  'audio/midi',
      'midi'  =>  'audio/midi',
      'mpga'  =>  'audio/mpeg',
      'mp2'   =>  'audio/mpeg',
      'mp3'   =>  'audio/mpeg',
      'aif'   =>  'audio/x-aiff',
      'aiff'  =>  'audio/x-aiff',
      'aifc'  =>  'audio/x-aiff',
      'ram'   =>  'audio/x-pn-realaudio',
      'rm'    =>  'audio/x-pn-realaudio',
      'rpm'   =>  'audio/x-pn-realaudio-plugin',
      'ra'    =>  'audio/x-realaudio',
      'rv'    =>  'video/vnd.rn-realvideo',
      'wav'   =>  'audio/x-wav',
      'bmp'   =>  'image/bmp',
      'gif'   =>  'image/gif',
      'jpeg'  =>  'image/jpeg',
      'jpg'   =>  'image/jpeg',
      'jpe'   =>  'image/jpeg',
      'png'   =>  'image/png',
      'tiff'  =>  'image/tiff',
      'tif'   =>  'image/tiff',
      'css'   =>  'text/css',
      'html'  =>  'text/html',
      'htm'   =>  'text/html',
      'shtml' =>  'text/html',
      'txt'   =>  'text/plain',
      'text'  =>  'text/plain',
      'log'   =>  'text/plain',
      'rtx'   =>  'text/richtext',
      'rtf'   =>  'text/rtf',
      'xml'   =>  'text/xml',
      'xsl'   =>  'text/xml',
      'mpeg'  =>  'video/mpeg',
      'mpg'   =>  'video/mpeg',
      'mpe'   =>  'video/mpeg',
      'qt'    =>  'video/quicktime',
      'mov'   =>  'video/quicktime',
      'avi'   =>  'video/x-msvideo',
      'movie' =>  'video/x-sgi-movie',
      'doc'   =>  'application/msword',
      'word'  =>  'application/msword',
      'xl'    =>  'application/excel',
      'eml'   =>  'message/rfc822'
    );
    return  ($rs = array_search($ext , $mimes)) ? $rs : false;
}
