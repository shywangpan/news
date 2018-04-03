<?php /* Smarty version Smarty 3.1.0, created on 2018-03-16 19:45:06
         compiled from "D:/WWW/qy/templates\admin\login.html" */ ?>
<?php /*%%SmartyHeaderCode:272095aabae429517b2-37212269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63070de9a610fb71629a61c2ef96cfbf3dbfd5be' => 
    array (
      0 => 'D:/WWW/qy/templates\\admin\\login.html',
      1 => 1489645715,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272095aabae429517b2-37212269',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.0',
  'unifunc' => 'content_5aabae42a3fc6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aabae42a3fc6')) {function content_5aabae42a3fc6($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>  
    <link rel="stylesheet" href="../../qy/static/css/pintuer.css">
    <link rel="stylesheet" href="../../qy/static/css/admin.css">
    <script src="../../qy/static/js/jquery.js"></script>
    <script src="../../qy/static/js/pintuer.js"></script>  
</head>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">           
            </div>         
            <form action="login.php" method="post">
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="username" placeholder="登录账号" data-validate="required:请填看看写账号 />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="password" placeholder="登录密码" data-validate="required:请填写密码,password:密码长度为6-10位（不要有特殊）" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input input-big" name="code" placeholder="填写右侧的验证码" data-validate="required请填写右侧的验证码" />
                           <img src="images/passcode.jpg" alt="" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" onclick="this.src=this.src+'?'">  
                                                   
                        </div>
                    </div>
                </div>
                <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
            </div>
            </form>          
        </div>
    </div>
</div>

</body>
</html><?php }} ?>