<?php 
//加入查询记录
	$tempnum=20;//设置存储大小
	$recent_id=array();
	$recent_id[]=$wordid;
	if (isset($_COOKIE['recent_id'])) {
		$now_recent_id=str_replace("\\", "", $_COOKIE['recent_id']);
		$now=unserialize($now_recent_id);
		foreach ($now as $n => $w) {
			if (!in_array($w, $recent_id)) {
				$recent_id[]=$w;
			}
		}
		if (count($recent_id)<=$tempnum) {
			$recent=serialize($recent_id);
			setcookie("recent_id",$recent,time()+60*60*24*30);
		}
		else{
			array_pop($recent_id);
			$recent=serialize($recent_id);
			setcookie("recent_id",$recent,time()+60*60*24*30);
		}
	}
	else{
		$recent=serialize($recent_id);
		setcookie("recent_id",$recent,time()+60*60*24*30);
	}
 ?>