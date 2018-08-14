<?php 

function html_escape($var)
{
	if(is_array($var))
	{
		foreach ($var as $key => $value) {
			$var[$key] = html_escape($value);
		}
	}
	else
	{
		if(is_string($var))
			$var = htmlspecialchars($var);
	}
	return $var;
}

function readDirectory($path)
{
//打开目录
$handle = opendir($path);
while(($item=readdir($handle))!==false)
	{
		if ($item!="."&&$item!="..") 
		{
			if(is_file($path."/".$item))
			{
				$arr['file'][]=$item;
			}
			if(is_dir($path."/".$item))
			{
			 	$arr['dir'][]=$item;
			}
		}
	}
closedir($handle); 
return $arr;
}
function transByte($size) {
	$arr = array ("B", "KB", "MB", "GB", "TB", "EB" );
	$i = 0;
	while ( $size >= 1024 ) {
		$size /= 1024;
		$i ++;
	}
	return round ( $size, 2 ) . $arr [$i];
}
function dirSize($path){
	$sum=0;
	global $sum;
	$handle=opendir($path);
	while(($item=readdir($handle))!==false){
		if($item!="."&&$item!=".."){
			if(is_file($path."/".$item)){
				$sum+=filesize($path."/".$item);
			}
			if(is_dir($path."/".$item)){
				$func=__FUNCTION__;
				$func($path."/".$item);
			}
		}
		
	}
	closedir($handle);
	return $sum;
}
function downFile($filename){
	header("content-disposition:attachment;filename=".basename($filename));
	header("content-length:".filesize($filename));
	readfile($filename);
}
function createFolder($dirname){
	//检测文件夹名称的合法性
	if(checkFilename(basename($dirname))){
		//当前目录下是否存在同名文件夹名称
		if(!file_exists($dirname)){
			if(mkdir($dirname,0777,true)){
				$mes="文件夹创建成功";
			}else{
				$mes="文件夹创建失败";
			}
		}else{
			$mes="存在相同文件夹名称";
		}
	}else{
		$mes="非法文件夹名称";
	}
	return $mes;
}
function delFolder($path){
	$handle=opendir($path);
	while(($item=readdir($handle))!==false){
		if($item!="."&&$item!=".."){
			if(is_file($path."/".$item)){
				unlink($path."/".$item);
			}
			if(is_dir($path."/".$item)){
				$func=__FUNCTION__;
				$func($path."/".$item);
			}
		}
	}
	closedir($handle);
	rmdir($path);
}
