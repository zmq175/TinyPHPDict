<?php 
//引用
require 'sql_connect.php';
//=================================================
if (isset($_COOKIE['recent_id'])) {
	if (!empty($_COOKIE['recent_id'])) {
		$recent_id=unserialize($_COOKIE['recent_id']);
		echo "<div class='container'>";
		//echo "<div class='btn-group btn-group-lg'>";
		for ($i=0; $i <count($recent_id) ; $i++) { 
			//echo "<button type='button' class='btn btn-default' href='content.php?id=".$recent_id[$i]."'>";
			echo "<a href='content.php?id=".$recent_id[$i]."'>";
			echo "<div class='well col-lg-3'>";
			echo "<div class='text-center'><strong>";
			$db_select="SELECT * FROM word WHERE WordID='".$recent_id[$i]."'";
			$get_result=mysqli_query($con,$db_select);
			$result_row=mysqli_fetch_row($get_result);
			echo "".$result_row[1]."";
			echo "</strong></div>";
			echo "</div>";
			echo "</a>";
			//echo "</button>";
		}
		echo "</div>";
	}
}
 ?>