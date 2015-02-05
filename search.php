<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,
														maximum-scale=1.0,
														user-scalable=no">
	<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link href="includes/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<title>查询结果-英语词典</title>
</head>
<body>
	<div class="container">
	<h1>查询结果-英语词典</h1>
	<p class="lead">一个轻量级的PHP词典</p>
	<form id="form1" name="form1" role="form" class="form-inline" method="post" action="search.php">
			<div class="form-group">
  				<input class="form-control input-lg" name="inword" id="inword" size="30%" type="text">
  			</div>
  			<button class="btn btn-default input-lg" type="submit"><i class="fa icon-search"></i></button>
		</form>
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
	echo "<p class='text-danger'>请输入内容再重新查询！</p>";
}
else {
	if (is_chinese($inword)) {//判断是否中文
		$db_select="SELECT * FROM word WHERE WordChinese LIKE '%".$inword."%'";
		$get_result=mysqli_query($con,$db_select);
		$result_nums=mysqli_num_rows($get_result);
		if (empty($result_nums)) {
			echo "<p class='text-warning'>对不起，词典里找不到这个词！</p>";
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
				echo "<p class='text-info'>对不起，词典里找不到这个词！</p>";
			}
		}
	}
//输出结果
if (!empty($result_nums)) {
	echo "<p class='text-muted'>共找到".$result_nums."个结果</p>";
	echo "<br>";
	echo "<ol>";
	if (is_chinese($inword)) {
		for($i=0;$i<$result_nums;$i++){
		$result_row=mysqli_fetch_row($get_result);
		echo "<strong><a href='content.php?id=".$result_row[0]."'><li>";
		echo "".$result_row[3]."";
		echo "</strong>";
		echo "	".$result_row[1]."";
		echo "<br>";
		echo "</li></a>";
		}
	}
	else {
	for($i=0;$i<$result_nums;$i++){
		$result_row=mysqli_fetch_row($get_result);
		echo "<strong><a href='content.php?id=".$result_row[0]."'><li>";
		echo "".$result_row[1]."";
		echo "</strong>";
		echo " 	".$result_row[2]."";
		echo "	".$result_row[3]."";
		echo "<br>";
		echo "</li></a>";
		}
	}
	echo "</ol>";
}
}
 ?>
 	</div>
 </body>
 </html>