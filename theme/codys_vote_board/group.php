<?php
if (!defined('_GNUBOARD_')) {
	exit;
}
// 개별 페이지 접근 불가
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

if (G5_IS_MOBILE) {
	include_once G5_THEME_MOBILE_PATH . '/group.php';
	return;
}

if (!$is_admin && $group['gr_device'] == 'mobile') {
	alert($group['gr_subject'] . ' 그룹은 모바일에서만 접근할 수 있습니다.');
}

$g5['title'] = $group['gr_subject'];
include_once G5_THEME_PATH . '/head.php';
//latest function을 사용하기 위해 필요한 lib
include_once G5_LIB_PATH . '/latest.lib.php';
include_once G5_LIB_PATH . '/latest_group.lib.php';
include_once G5_THEME_LIB_PATH .'/latest_polls.lib.php';
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/group.css">', 0);
#####################################################################
#added by BryanPark
#시작 =>  이 게시판에 해당하는 vote_row들을 받아서 vote_rows에 fetch
#####################################################################
// 피리_게시글에_투표__ROW_정보__가져오기 added by BryanPark
// 이걸 넣어야지 아래의 get__sam_file함수에서 $vote_row를 sql fetch를 통해 설정함.
$is_get__article_info = 1;
$is_get__piree_config = 1;
$is_get__article_vote = 1;
//=======================================================
// 피리_게시글에_투표__설정_정보_파일__경로
// 피리_메뉴__번호
$piree_menu_n = 770015;
include_once get__sam_file($piree_menu_n, '');

#####################################################################
#끝 => 이 게시판에 해당하는 vote_row들을 받아서 vote_rows에 fetch
#####################################################################

#####################################################################
#addedy by BryanPark - [시작] 투표 검색 옵션
#####################################################################
$sca = $_GET['sca'];
$sop = $_GET['sop'];
$sfl = $_GET['sfl'];
$stx = $_GET['stx'];

$search_options = array(
						'sca' => $_GET['sca'],
						'sop' => $_GET['sop'],
						'sfl' => $_GET['sfl'],
						'stx' => $_GET['stx']
						);
#####################################################################
#addedy by BryanPark - [끝] 투표 검색 옵션
#####################################################################

#################################
#BryanPark
# 그룹 최신글 구조
# $group['gr_id'] 를 보고 분류에 따라서 다른 종류의 스킨으로
# 그룹 뷰를 뿌려줍니다.
# 1. gr_id == 'community'일때
#     여분 필드 'bo_1'=='meeting 이면
#         latest(갤러리스킨 , 해당게시판테이블, 썸네일옵션어레이)
#     그 외에는
#         latest(기본스킨 , 해당게시판테이블)
# 2. gr_id == 'polls'일때
#     현재는 하드코딩된 상태 -> latest_polls function으로 빼는 형식으로.
#
?>

<!-- 메인화면 최신글 시작 -->
<?php
###########################################################
# Added By Brian Park
# 1. 만약 (그룹id가 'community'일때)
# 2. 게시판 id와 제목, 여분필드를 가져오는 쿼리문을 정의하고
# 3. 반복문(for)을 통해 latest(각게시판테이블네임)을 실행해서
#       (div class=group community 는 theme/{theme_name}/css/default.css)
# 4.    여분필드 bo_1_subj 가 'meeting'이면 [갤러리 스킨]으로
# 5.    그 외에는 [기본 스킨]으로
# 6.     최신 게시물(latest function)을 뿌려준다.
############################################################
if (strcmp($group['gr_id'], 'community') === 0) {
	//sql문 지정 -> 해당 board_table에서 테이블 id, 제목, 여분필드를 가져온다.
	$sql = " select bo_table, bo_subject, bo_1_subj
				from {$g5[board_table]}
				where gr_id = '{$gr_id}'
				  and bo_list_level <= '{$member[mb_level]}'
				  and bo_device <> 'mobile' ";
	if (!$is_admin) {
		$sql .= " and bo_use_cert = '' ";
	}
	$sql .= " order by bo_order ";
	$result = sql_query($sql);
	for ($i = 0; $row = sql_fetch_array($result); $i++) {
		?>
		<div class='group community'><?php
			if (strcmp($row['bo_1_subj'], 'meeting') == 0) {
				$options = array(
					'thumb_width' => 124, // 썸네일 width
					'thumb_height' => 124, // 썸네일 height
					'content_length' => 15, // 간단내용 길이
				);
				echo latest('theme/gallery', $row['bo_table'], 4, 15, 2, $options);
				// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
				// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			} else {
				echo latest('theme/basic', $row['bo_table'], 5, 26);
			}
		?>
		</div><?php
	}
	########################################################################
	# Added by BryanPark
	# 1. 만약 그룹 아이디가 'polls'라면
	# 2. get_poll_sql -> sql문을 받고.
	# 3. 해당하는 
	#
} else if (strcmp($group['gr_id'], 'polls') === 0) {
//added by BryanPark 그룹 아이디가 투표일때 -> 전체 투표 게시물들을 뿌려줌
	?>
	<div class = "vote_list"><?php
	//added by BryanPark.
	latest_poll_group(20,5,5,$search_options,$ARTI_VOTE_vote_category_list_s);
	?>
	<fieldset id="bo_sch">
		<legend>투표 검색</legend>

		<form name="fsearch" method="get">
		<input type="hidden" name="gr_id" value="polls">
		<input type="hidden" name="sca" value="<?php echo $sca; ?>">
		<input type="hidden" name="sop" value="and">
		<label for="sfl" class="sound_only">검색대상</label>
		<select name="sfl" id="sfl">
				<option value="avl_title_s" <?php echo get_selected($sfl, 'avl_title_s', true); ?>>제목</option>
				<option value="avl_title_s||avl_poll_x" <?php echo get_selected($sfl, 'avl_title_s||avl_poll_x'); ?>>제목+내용</option>
		</select>
		<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
		<input type="text" name="stx" value="<?php echo stripslashes($stx); ?>" required id="stx" class="frm_input required" size="15" maxlength="15">
		<input type="submit" value="검색" class="btn_submit">
		</form>
	</fieldset>
<?php
} else {// 그룹별 최신글 포럼형식 
?>
<div style="float:left; width:100%;"><?php
echo latest_group("theme/web_group2", $group['gr_id'], 4, 22);
}//<!-- 그룹별 최신글 포럼형식}-->
?>
</div><?php

include_once G5_THEME_PATH . '/tail.php';
//실행시간 측정함수.
function get_time() {
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}
?>


