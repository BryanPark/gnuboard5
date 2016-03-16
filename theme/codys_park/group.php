<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/group.php');
    return;
}

if(!$is_admin && $group['gr_device'] == 'mobile')
    alert($group['gr_subject'].' 그룹은 모바일에서만 접근할 수 있습니다.');

$g5['title'] = $group['gr_subject'];
include_once(G5_THEME_PATH.'/head.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH. '/latest_group.lib.php');
?>


<!-- 메인화면 최신글 시작 -->
<?php
if(strcmp( $group['gr_id'], 'gallery') ){
//  최신글
$sql = " select bo_table, bo_subject, bo_1_subj
            from {$g5[board_table]}
            where gr_id = '{$gr_id}'
              and bo_list_level <= '{$member[mb_level]}'
              and bo_device <> 'mobile' ";
	if(!$is_admin)
		$sql .= " and bo_use_cert = '' ";
	$sql .= " order by bo_order ";
	$result = sql_query($sql);
	for ($i=0; $row=sql_fetch_array($result); $i++) {
		$lt_style = "";
		if ($i%2==1) $lt_style = "margin-left:5%";
		else $lt_style = "";
	?>
		<div style="float:left;width:45%;<?php echo "margin-left:5%" //echo $lt_style ?>">
		<?php
		// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
		// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
		if(strcmp($row['bo_1_subj'], 'meeting')){
			echo latest('theme/basic', $row['bo_table'], 5, 26);
		}
		else
		{
			$options = array(
            'thumb_width'    => 144, // 썸네일 width
            'thumb_height'   => 149,  // 썸네일 height
            'content_length' => 40   // 간단내용 길이
			);
			echo latest('theme/gallery', $row['bo_table'], 5, 26,1,$options);
			

		}
		?>
		</div>
	<?php
	}
}
else{ // 여분필드 bo_1이 talk -> 만남게시판인경우에만 사진 미리보기 포럼형식의 그룹적용
?>
<!-- 메인화면 최신글 끝 -->

<!-- 그룹별 최신글 포럼형식{ -->
<div style="float:left; width:100%;">
<?php 
	echo latest_group("theme/web_group2", $group['gr_id'], 4, 22); 
}
?>
</div>


<!-- 그룹별 최신글 포럼형식}-->




<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
