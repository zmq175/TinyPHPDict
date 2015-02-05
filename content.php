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
	<title>单词解释-英语词典</title>
</head>
<body>
	<div class="container">
	<h1>单词解释-英语词典</h1>
	<p class="lead">一个轻量级的PHP词典</p>
	<form id="form1" name="form1" role="form" class="form-inline" method="post" action="search.php">
			<div class="form-group">
  				<input class="form-control input-lg" name="inword" id="inword" size="30%" type="text">
  			</div>
  			<button class="btn btn-default input-lg" type="submit"><i class="fa icon-search"></i></button>
	</form>
	</div>
	<hr>
	<div class="container">
	<?php 
	//引用
	require 'includes/sql_connect.php';
	//=============================================================
	if (isset($_GET['id'])) {
		$wordid=$_GET['id'];
		$db_select="SELECT * FROM word WHERE WordID='".$wordid."'";
		$get_result=mysqli_query($con,$db_select);
		$result_nums=mysqli_num_rows($get_result);
		for ($i=0; $i < $result_nums; $i++) { 
			$result_row=mysqli_fetch_row($get_result);
			echo "<div class='panel panel-primary'>";
			echo "<h1>";
			echo "<strong>".$result_row[1]."</strong>";
			echo "</h1>";
			echo "<hr>";
			echo "<div class='panel-body'>";
			echo "".$result_row[2]."";
			echo "<br>";
			echo "<p class='lead'>".$result_row[3]."</p>";
			echo "</div>";
			echo "</div>";
		}
		if ($result_nums<=0) {
			echo "<p class='text-danger'>您的请求不合法，请重新查询！</p>";
		}
	}
	elseif (!isset($_GET['id'])) {
		echo "<p class='text-danger'>您的请求不合法，请重新查询！</p>";
	}
	 ?>
 </div>
 </body>
 </html>