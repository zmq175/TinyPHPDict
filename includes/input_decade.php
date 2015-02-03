<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
function input_decade($str){
	if (empty($str)) {
		return;
	}
	if ($str=="") {
		return $str;
	}
	$str=str_replace("&amp;","&",$str);
	$str=str_replace("&gt;",">",$str);
	$str=str_replace("&lt;","<",$str);
	$str=str_replace("&nbsp;",chr(32),$str);
	$str=str_replace("&nbsp;",chr(9),$str);
	$str=str_replace("&",chr(34),$str);
	$str=str_replace("&#39;",chr(39),$str);
	$str=str_replace("<br />",chr(13),$str);
	$str=str_replace("''","'",$str);
	$str=str_replace("sel&#101;ct","select",$str);
	$str=str_replace("jo&#105;n","join",$str);
	$str=str_replace("un&#105;on","union",$str);
	$str=str_replace("wh&#101;re","where",$str);
	$str=str_replace("ins&#101;rt","insert",$str);
	$str=str_replace("del&#101;te","delete",$str);
	$str=str_replace("up&#100;ate","update",$str);
	$str=str_replace("lik&#101;","like",$str);
	$str=str_replace("dro&#112;","drop",$str);
	$str=str_replace("cr&#101;ate","create",$str);
	$str=str_replace("mod&#105;fy","modify",$str);
	$str=str_replace("ren&#097;me","rename",$str);
	$str=str_replace("alt&#101;r","alter",$str);
	$str=str_replace("ca&#115;","cast",$str);
	return $str;
}
?>