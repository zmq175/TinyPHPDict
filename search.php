<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
//引用
require 'includes/sql_connect.php';
require 'includes/is_chinese.php';
require 'includes/input_decade.php';
//=============================================================
//字符串处理
$inword=$_POST['inword'];
$inword=input_decade($inword);
//进行搜索
if(empty($inword)){
	echo "请输入内容再重新查询！";
}
else {
	if (is_chinese($inword)) {//判断是否中文
		$db_select="SELECT * FROM word WHERE WordChinese LIKE '%".$inword."%'";
		$get_result=mysqli_query($con,$db_select);
		$result_nums=mysqli_num_rows($get_result);
		if (empty($result_nums)) {
			echo "对不起，词典里找不到这个词！";
		}
	}
	else{
		$db_select="SELECT * FROM word WHERE WordEnglish LIKE '".$inword."%' ";
		$get_result=mysqli_query($con,$db_select);
		$result_nums=mysqli_num_rows($get_result);
		if (empty($result_nums)) {
			$db_select="SELECT * FROM word WHERE WordEnglish LIKE '".$inword."%'";
			$get_result=mysqli_query($con,$db_select);
			$result_nums=mysqli_num_rows($get_result);
			if (empty($result_nums)) {
				echo "对不起，词典里找不到这个词！";
			}
		}
	}
//输出结果
if (!empty($result_nums)) {
	echo "共找到".$result_nums."个结果";
	echo "<br>";
	if (is_chinese($inword)) {
		for($i=0;$i<$result_nums;$i++){
		$result_row=mysqli_fetch_row($get_result);
		echo "<strong>".($i+1).".";
		echo "".$result_row[3]."";
		echo "</strong>";
		echo "	".$result_row[1]."";
		echo "<br>";
		}
	}
	else {
	for($i=0;$i<$result_nums;$i++){
		$result_row=mysqli_fetch_row($get_result);
		echo "<strong>".($i+1).".";
		echo "".$result_row[1]."";
		echo "</strong>";
		echo " 	".$result_row[2]."";
		echo "	".$result_row[3]."";
		echo "<br>";
		}
	}
}
}
 ?>