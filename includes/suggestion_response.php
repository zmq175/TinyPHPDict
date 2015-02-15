<?php 
//引用
require 'sql_connect.php';
require 'is_chinese.php';
require 'input_decade.php';
//=============================================================
//=============================================================
//字符串处理
$inword=$_POST['queryString'];
$inword=input_decade($inword);
//进行搜索
if(empty($inword)){
	echo "<p class='text-danger'>请输入内容再重新查询！</p>";
}
else {
	if (is_chinese($inword)) {//判断是否中文
		$db_select="SELECT * FROM word WHERE WordChinese LIKE '%".$inword."%' LIMIT 10";
		$get_result=mysqli_query($con,$db_select);
		$result_nums=mysqli_num_rows($get_result);
	}
	else{
		$db_select="SELECT * FROM word WHERE WordEnglish LIKE '".$inword."%' LIMIT 10";
		$get_result=mysqli_query($con,$db_select);
		$result_nums=mysqli_num_rows($get_result);
		if (empty($result_nums)) {
			$db_select="SELECT * FROM word WHERE WordEnglish LIKE '".$inword."%' LIMIT 10";
			$get_result=mysqli_query($con,$db_select);
			$result_nums=mysqli_num_rows($get_result);
		}
	}
//输出结果
if (!empty($result_nums)) {
	if (is_chinese($inword)) {
		for($i=0;$i<$result_nums;$i++){
		$result_row=mysqli_fetch_row($get_result);
		echo "<a class='list-group-item' onclick='fill('".$result_row[3]."');' href='content.php?id=".$result_row[0]."'><strong>";
		echo "".$result_row[3]."";
		echo "</strong>";
		echo "</a>";
		}
	}
	else {
	for($i=0;$i<$result_nums;$i++){
		$result_row=mysqli_fetch_row($get_result);
		echo "<a class='list-group-item' onclick='fill('".$result_row[1]."');' href='content.php?id=".$result_row[0]."'><strong>";
		echo "".$result_row[1]."";
		echo "</strong>";
		echo "</a>";
		}
	}
}
}
 ?>