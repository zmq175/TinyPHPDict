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
	<script type="text/javascript">
	function lookup(inword){
		if (inword.length==0) {
			//hide suggestionList
			$('#suggestions').hide();
		}
		else{
			$.post("includes/suggestion_response.php",{queryString:""+inword+""},function (data){
			if (data.length>0) {
				$('#suggestions').show();
				$('#autoSuggestionsList').html(data);
			}
			})
		}
	}
	function fill(thisValue){
	$('#inword').val(thisValue);
	$('#suggestions').hide();
	}
	</script>
	<link href="includes/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<title>单词解释-英语词典</title>
</head>
<body>
	<div class="container">
	<h1><a href="index.html">英语词典</a></h1>
	<p class="lead">一个轻量级的PHP词典</p>
	<form id="form1" name="form1" role="form" class="form-inline" method="post" action="search.php">
		<div class="form-group">
  				<input class="form-control input-lg" name="inword" id="inword" onkeyup="lookup(this.value);" size="30%" type="text" autocomplete="off">
  				<button class="btn btn-default input-lg" type="submit"><i class="fa fa-search"></i></button>
  				<div id="suggestions" style="display: none;position:absolute;" class="col-lg-2">
					<div id="autoSuggestionsList">
					</div>
				</div>
  		</div>
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
	require 'includes/add_to_history.php';
	 ?>
 </div>
 </body>
 </html>