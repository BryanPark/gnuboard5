<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;


include_once(G5_THEME_PATH.'/head.php');
//add_javascript 함수 -> 맨 뒤의 숫자는 출력 순서 - 숫자가 작을수록 먼저 출력되는 것임.

}
add_javascript('<script src="'.G5_THEME_JS_URL.'/tabslide.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/tabslide.css">', 0);
add_javascript('<script src="'.G5_THEME_JS_URL.'/hammer.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/jquery.hammer.js"></script>', 10);
include_once(G5_THEME_PATH.'/head.php');
?>

<h2 class="sound_only">최신글</h2>
<!-- 최신글 시작 { -->
<!--
<?php
//  최신글
$sql = " select bo_table
            from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
            where a.bo_device <> 'mobile' ";
if(!$is_admin)
    $sql .= " and a.bo_use_cert = '' ";
$sql .= " order by b.gr_order, a.bo_order ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    if ($i%2==1) $lt_style = "margin-left:20px";
    else $lt_style = "";
?>
    <div style="float:left;<?php echo $lt_style ?>">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        //echo latest('theme/basic', $row['bo_table'], 5, 25);
        ?>
    </div>
<?php
}
?>-->
<!-- } 최신글 끝 
<script type="text/javascript" src="<?=G5_THEME_JS_URL?>/tabslide.js"></script>
<link rel="stylesheet" href="<?=G5_THEME_JS_URL?>/tabslide.css">
-->
<!--<img src = "/gnuboard5/data/file/gallery1/thumb-1025880956_Gp18l0hF_7593c493a1cf1c00f00754c8387e6e9d8ab873c4_174x124.jpg">-->

<div class = "tabslide_container" id="tabslide_container">
		<ul class="tabs">
			<li rel="tab1" class="active">자유게시판</li>
			<li rel="tab2">커뮤니티2</li>
			<li rel="tab3">커뮤니티3</li>
			<li rel="tab4">갤러리1</li>
			<!--<li rel="tab5"></li>-->
		</ul>
	</div>
	<div class="tab_container">
	
		<div id="tab1" class="tab_content" style="float:left;<?php echo $lt_style ?>">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board', 5, 25);
			?>
		</div>
		<div id="tab2" class="tab_content" style="float:left;<?php echo $lt_style ?>">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board2', 5, 25);
			?>
		</div>
		<div id="tab3" class="tab_content" style="float:left;<?php echo $lt_style ?>">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board3', 5, 25);
			?>
		</div>
		<div id="tab4" class="tab_content" style="float:left;<?php echo $lt_style ?>">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			$options = array(
            'thumb_width'    => 170, // 썸네일 width
            'thumb_height'   => 149,  // 썸네일 height
            'content_length' => 40   // 간단내용 길이
			);
			echo latest('theme/gallery', 'gallery1', 4, 25, 1, $options);
			?>
		</div>
	</div>
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>