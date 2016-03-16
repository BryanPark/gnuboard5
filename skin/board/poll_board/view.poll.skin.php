<?php
//view.poll.skin.php
if (!defined('_GNUBOARD_'))	 exit;
	$sql= " select * from g5_poll_board where bo_table = '$bo_table' and wr_id = '$wr_id'";
	$result = sql_query($sql);
	$row = sql_fetch_array($result);
	$po_subject = $row['po_subject'];
	$po_poll1 = $row['po_poll1'];
	$po_poll2 = $row['po_poll2'];
	$po_poll3 = $row['po_poll3'];

	echo "\n보드명:".$bo_table;
	echo "\n글번호:".$wr_id;
	echo "\n서브젝트:". $po_subject;
	echo "\n투표 항목1:" . $po_poll1;
	echo "\n투표 항목2:" . $po_poll2;
	echo "\n투표 항목3:" . $po_poll3;
	echo "\n투표 파일1:" . $bo_table . $wr_id . $po_poll_n;

?>