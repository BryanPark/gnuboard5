<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
//include_once("../lib/common.lib.php"); 
//view.poll.skin.php
if (!defined('_GNUBOARD_'))	 exit;
//add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
$sql= " select * from g5_poll_board where bo_table = '$bo_table' and wr_id = $wr_id";
//echo $sql;
$result = sql_query($sql);

$row = sql_fetch_array($result);
$po_subject = $row['po_subject'];

$po_poll[0] = $row['po_poll1'];
$po_poll[1] = $row['po_poll2'];
$po_poll[2] = $row['po_poll3'];
$po_poll[3] = $row['po_poll4'];
$po_poll[4] = $row['po_poll5'];
$po_poll[5] = $row['po_poll6'];
$po_poll[6] = $row['po_poll7'];
$po_poll[7] = $row['po_poll8'];
$po_poll[8] = $row['po_poll9'];
$po_cnt[0] = $row['po_cnt1'];
$po_cnt[1] = $row['po_cnt2'];
$po_cnt[2] = $row['po_cnt3'];
$po_cnt[3] = $row['po_cnt4'];
$po_cnt[4] = $row['po_cnt5'];
$po_cnt[5] = $row['po_cnt6'];
$po_cnt[6] = $row['po_cnt7'];
$po_cnt[7] = $row['po_cnt8'];
$po_cnt[8] = $row['po_cnt9'];

//$po_cnt_n = $row['po_'];

//echo "\n보드명:".$bo_table;
//echo "\n글번호:".$wr_id;
//echo "\n서브젝트:". $po_subject;
///echo "\n투표 항목2:" . $po_cnt2;
//echo "\n투표 항목3:" . $po_cnt3;
//echo "\n투표 파일1:" . $bo_table . $wr_id . $po_cnt_n

?>



<?
echo "view.skin.php 입니다."
//투표 공통 
//투표 제목
//주관식 객관식 선택
//투표 내용- 텍스트+사진
//투표 항목1~9
//투표 항목별 텍스트
//투표 항목별 파일업로드
//
//기타 의견 -> 또다른 comment 테이블에다가 저장.
//1~8까지만 항목 만들 수 있고, comment를 항상 9에다가 저장하게 할 수도
//주관식 투표 -> 찬반 토론이지만 추후에 만드는 것으로 합시다.
//
//투표 완료 버튼
//결과는 투표 한 사람은 출력되게끔
//투표가 있다면 투표 출력
	//echo "<div class='pobo_subject'>". $po_subject . "</div>";
		/*for($i = 0 ; $i < 9 ; $i++){
			echo "<div class='pobo_poll'>". $po_poll[$i] . "</div>" ;
			echo "<div class='pobo_cnt'>".$po_cnt[$i]."</div>";
		}*/
?>

