<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
add_javascript('<script src="'.G5_THEME_JS_URL.'/tabslide.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/tabslide.css">', 0);
add_javascript('<script src="'.G5_THEME_JS_URL.'/hammer.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/jquery.hammer.js"></script>', 10);
?>

<!-- 메인화면 최신글 시작 -->
<?php
//  최신글
$sql = " select bo_table
            from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
            where a.bo_device <> 'pc' ";
if(!$is_admin)
    $sql .= " and a.bo_use_cert = '' ";
$sql .= " order by b.gr_order, a.bo_order ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 스킨은 입력하지 않을 경우 관리자 > 환경설정의 최신글 스킨경로를 기본 스킨으로 합니다.

    // 사용방법
    // latest(스킨, 게시판아이디, 출력라인, 글자수);
    //echo latest('theme/basic', $row['bo_table'], 5, 25);
}
?>

<div class = "tabslide_container" id = "tabslide_container">
		<ul class="tabs">
			<li rel="tab1" class="active">자유게시판</li>
			<li rel="tab2">커뮤니티2</li>
			<li rel="tab3">커뮤니티3</li>
			<li rel="tab4">갤러리1</li>
			<!--<li rel="tab5"></li>-->
		</ul>
	</div>
	<div class="tab_container">
		<div id="tab1" class="tab_content mobile" style="float:left;<?php echo $lt_style ?>">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board', 5, 25);
			?>
		</div>
		<div id="tab2" class="tab_content mobile" style="float:left;<?php echo $lt_style ?>">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board2', 5, 25);
			?>
		</div>
		<div id="tab3" class="tab_content mobile" style="float:left;<?php echo $lt_style ?>">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board3', 5, 25);
			?>
		</div>
		<div id="tab4" class="tab_content mobile" style="float:left;<?php echo $lt_style ?>">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			$options = array(
            'thumb_width'    => 176, // 썸네일 width
            'thumb_height'   => 149,  // 썸네일 height
            'content_length' => 40   // 간단내용 길이
			);
			echo latest('theme/gallery', 'gallery1', 4, 25, 2 , $options);
			?>
		</div>
	</div>
</div>



<!-- 메인화면 최신글 끝 -->

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>