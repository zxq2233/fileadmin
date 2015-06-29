<?php
if($_FILES){
if($_FILES['zips']['type']!='application/octet-stream'){
echo "请上传.zip格式文件！";
}else{
move_uploaded_file($_FILES["zips"]["tmp_name"], "/bingfeng.zip");//请勿修改
echo "请访问 <br><font color=red>http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."?zip=bingfeng.zip</font><br/>解压安装！";
}
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;  minimum-scale=1.0; maximum-scale=2.0"/>
<link href="http://xinshi.qiniudn.com/XS_caihong.css" type="text/css" rel="stylesheet"/>
<title>网站程序一键安装工具</title>
</head>

<!--冰封网络版权所以-->
<body>
<body style="width:320px;">
<div class="w h Header">
<img id="lg" title="新势网络" src="http://xinshi.qiniudn.com/XStool.png">
</div>
<div class="w nav">
<a href="../">安装首页</a>
<div class="w h">
<center>
欢迎您使用网站程序一键安装工具 (^_^)
</center></div>
<?php

error_reporting(0);
header("Content-type: text/html; charset=utf-8");
	ignore_user_abort(true);
if(!class_exists('ZipArchive')) {
	die("调用ZipArchive类失败,你的空间不支持使用本程序 " );
	}
function zipExtract ($src, $dest)
    {
        $zip = new ZipArchive();
        if ($zip->open($src)===true)
        {
            $zip->extractTo($dest);
            $zip->close();
            return true;
        }
        return false;
      }

if (!isset($_GET['zip'])) {

echo '<div class="copy"><b>您的域名</b>：<font color=#228b22>',$_SERVER['SERVER_NAME'],'</div></font>';
echo '
</font>
<center>
	<div class="box"><b>本地安装：</b>
	<form method="post" action="" enctype="multipart/form-data">
	<input type="file" name="zips"/>
	<input type="submit" value="安装"/>
	</form>';
echo '<b>远程安装：</b>
	<form method="get" action="?">
	<input type="text" name="zip" value="http://"/>
	<input type="submit" value="安装"/>
	</form>';
echo '<b>在线安装：</b><br/>';
echo '<form method="get" action="?"><select name="zip"><option value="http://96001.vhost111.cloudvhost.net/archive.zip">爱特文件管理器最新版</option>


</select>
 <input type="submit" value="安装"><div class="w h Header">Copyright © chen Optimize view</div></div></form>';
$ymdz="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?zip=";
exit;
}

if($_GET['zip']=='http://96001.vhost111.cloudvhost.net/archive.zip'){echo "<center><a href='/f'>点击进入爱特文件管理器</a></center>";}
$RemoteFile = rawurldecode($_GET["zip"]);
$ZipFile = "Archive.zip";
$Dir = "./";
copy($RemoteFile,$ZipFile) or die("无法复制文件 <b>".$RemoteFile);
if (zipExtract($ZipFile,$Dir)) {
echo "<b>Hello！".basename($RemoteFile)."</b> 成功解压文件到当前目录,请访问你的域名进行安装!";
unlink($ZipFile);
	}
else {
echo "无法解压该文件 <b>".$ZipFile.".</b>";
if (file_exists($ZipFile)) {
unlink($ZipFile);
	}
}
?>
</div>
</body>
</html>
