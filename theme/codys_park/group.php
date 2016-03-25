<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
error_reporting(E_ALL);
ini_set("display_errors", 1);

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
	include_once( get__sam_file($piree_menu_n, '') );

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
	#####################################################################
	#addedy by BryanPark - [끝] 투표 검색 옵션
	#####################################################################
?>


<!-- 메인화면 최신글 시작 -->
<?php
echo $group['gr_id']; echo $group['bo_1'];
if(strcmp( $group['gr_id'], 'community')===0 ){
//  최신글
echo "gr id == community 입니다.";
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
		if(strcmp($row['bo_1_subj'], 'meeting')==0){ 
			$options = array(
            'thumb_width'    => 144, // 썸네일 width
            'thumb_height'   => 149,  // 썸네일 height
            'content_length' => 40   // 간단내용 길이
			);
			echo latest('theme/gallery', $row['bo_table'], 5, 26,1,$options);
		}
		else
		{ 
			echo latest('theme/basic', $row['bo_table'], 5, 26);
		} 
		?>
		</div>
	<?php
	}
}//added by BryanPark 그룹 아이디가 투표 항목
else if(strcmp($group['gr_id'],'polls')===0){
	?>
	<style>
		/*게시판 투표 목록 */
		.vote_list {padding-left:10px; border:1px solid #e9e9e9; margin: 10px;}
		.vote_list.item{padding-left:10px; border-top:1px solid #e9e9e9;}
		.vote_list.item.title{padding:5px;}
	</style>
	<div class = "vote_list">
	<?
//[시작]투표게시판 모아보기 @TODO-> 하드코딩된 sql문 변수로 교체 추후에. -->
	//echo "polls 그룹입니다.";
	//검색옵션이 있을때에는 검색문으로.
	//$sql = "set @bo_table = concat(select avl_bo_table from g5__piree_770015_vote_list);"
	//$sql .= " ";
	
	$sql = " select distinct avl_bo_table from g5__piree_770015_vote_list";
	//echo "이야야아아아!!<br/>";
	$result= sql_query($sql); 

	//$rowss = sql_fetch_array($result_tables);
	//echo "왜안나옴".$rowss['avl_bo_table'];
	// 여기까지 하면 투표가 등록되있는 게시판id들을 뽑아올수 있다.
	//echo "으아아아:".$result_tables[1]."<br/>";
	$sql = "select * from (";
	$sql_ca_count = "select ca_name,count(*) as count from(";
	$sql_stx =""; // 검색어 있을시 검색문.
	if($stx!=''){
		$sql_stx .= " and INSTR(LOWER(avl_title_s), LOWER('$stx'))";
	}
	while($rowss = sql_fetch_array($result)){
		//print_r($rowss);
		$sql .=" select a.*,b.ca_name from `g5__piree_770015_vote_list`";
		$sql .=" as a left join";
		$sql .=" `g5_write_{$rowss['avl_bo_table']}` as b on (a.avl_wr_id= b.wr_id)";
		$sql .=" where ca_name is not null and ca_name !=''";
		$sql .= $sql_stx;
		$sql .=" union all ";

		$sql_ca_count .=" select a.*,b.ca_name from `g5__piree_770015_vote_list`";
		$sql_ca_count .=" as a left join";
		$sql_ca_count .=" `g5_write_{$rowss['avl_bo_table']}` as b on (a.avl_wr_id= b.wr_id)";
		$sql_ca_count .=" where ca_name is not null and ca_name !=''";
		$sql_ca_count .= $sql_stx;
		$sql_ca_count .=" union all ";
	}
	$sql = substr($sql, 0, -10 ); //맨마지막에 붙는 union all 삭제.
	$sql .= ")";
	$sql_ca_count = substr($sql_ca_count, 0, -10 );
	$sql_ca_count .=")";
	$sql_ca_count .=" as t group by ca_name order by ca_name, avl_n desc";
	//sql_ca_count -> 카테고리별로 게시물 몇개나 있는지.
	$sql .=" as t order by ca_name, avl_n desc";
	$sql2 = $sql;

	//echo $sql;
	//echo "<br/><br/>{$sql_ca_count}";

	//added by BryanPark.
	$result_ca_count = sql_query($sql_ca_count);
	$list_arr_vote = array();
	//print_r($list_arr_vote[1]);
	$result2 = sql_query($sql2);
	while($row_ca_count = sql_fetch_array($result_ca_count)){
		echo "<div><b>[{$row_ca_count['ca_name']}]</b></br>";
		
		for($i = 0 ; $i<$row_ca_count['count']; $i++){
			$row=sql_fetch_array($result2);
			?>
		<div class="vote_list item">
		<?
			echo "<div class vote_list item title>";
			echo "<a style='font-weight:bold' 
			href=
			'
			http://gboard.codys.co.kr/gnuboard5/bbs/board.php?
			bo_table={$row['avl_bo_table']}
			&wr_id={$row['avl_wr_id']}'
			>";
			echo "{$row['avl_title_s']}</a></div>";
			
			for($x = 1 ; $x<=20; $x++){
				if($row['avl_poll_'.$x]){
	 				////home/www/gboard.codys.co.kr/public_html/gnuboard5/data . /vote . /row['avl_bo_table']
					//아.. 폴더명이 왜 1이되는지 모르겠다... 
					//TODO 폴더명 동적으로 수정 -> 특히나 이름이 숫자로 된 폴더.
					echo "<div class='vote_list item polls'>";
					
					if($row['avl_image_'.$x]!=null){
						echo
						"<img style='width:20px; height:20px' 
						src='".G5_DATA_URL."/vote/".$row['avl_bo_table']."/1/".
						$row['avl_wr_id']."/".$row['avl_image_'.$x]."'"."
						</img>";
					}
					//@todo 검색된 스트링을 붉은색으로 바꿔야함
					//
					echo
					$row['avl_poll_'.$x].
					"</div>";
				}
			}
		?>
		</div>
		<?
		}
		echo "</div>";
	}
	//$result2 = sql_query($sql2);
	//print_r($result2);
	//echo G5_DATA_PATH; 
	for ($i=0; $row=sql_fetch_array($result2); $i++) {
		$list_arr_vote[] = $row;
		$lt_style = "";
		//if ($i%2==1) $lt_style = "margin-left:5%";
		//else $lt_style = "";
		?>
		<div class="vote_list item">
		<?
			echo "<div class vote_list item title>";
			echo "<a style='font-weight:bold' 
			href=
			'
			http://gboard.codys.co.kr/gnuboard5/bbs/board.php?
			bo_table={$row['avl_bo_table']}
			&wr_id={$row['avl_wr_id']}'
			>";
			echo "[{$row['ca_name']}]{$row['avl_title_s']}</a></div>";
			
			for($x = 1 ; $x<=20; $x++){
				if($row['avl_poll_'.$x]){
	 				////home/www/gboard.codys.co.kr/public_html/gnuboard5/data . /vote . /row['avl_bo_table']
					//아.. 폴더명이 왜 1이되는지 모르겠다... 
					//TODO 폴더명 동적으로 수정 -> 특히나 이름이 숫자로 된 폴더.
					echo "<div class='vote_list item polls'>";
					
					if($row['avl_image_'.$x]!=null){
						echo
						"<img style='width:20px; height:20px' 
						src='".G5_DATA_URL."/vote/".$row['avl_bo_table']."/1/".
						$row['avl_wr_id']."/".$row['avl_image_'.$x]."'"."
						</img>";
					}
					//@todo 검색된 스트링을 붉은색으로 바꿔야함
					//
					echo
					$row['avl_poll_'.$x].
					"</div>";
				}
			}
		?>
		</div>
		<?
	}
	?>
	</div>

	<!-- 게시판 검색 시작 { -->
	<fieldset id="bo_sch">
			<legend>투표 검색</legend>

			<form name="fsearch" method="get">
			<input type="hidden" name="gr_id" value="polls">
			<input type="hidden" name="sca" value="<?php echo $sca ?>">
			<input type="hidden" name="sop" value="and">
			<label for="sfl" class="sound_only">검색대상</label>
			<select name="sfl" id="sfl">
					<option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
					<option value="wr_content"<?php echo get_selected($sfl, 'wr_content'); ?>>내용</option>
					<option value="wr_subject||wr_content"<?php echo get_selected($sfl, 'wr_subject||wr_content'); ?>>제목+내용</option>
					<option value="mb_id,1"<?php echo get_selected($sfl, 'mb_id,1'); ?>>회원아이디</option>
					<option value="mb_id,0"<?php echo get_selected($sfl, 'mb_id,0'); ?>>회원아이디(코)</option>
					<option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>글쓴이</option>
					<option value="wr_name,0"<?php echo get_selected($sfl, 'wr_name,0'); ?>>글쓴이(코)</option>
			</select>
			<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
			<input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input required" size="15" maxlength="15">
			<input type="submit" value="검색" class="btn_submit">
			</form>
	</fieldset>
	<?
//[끝]투표게시판 모아보기-->
}
else{ 
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
