<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1);
IF (!defined('_GNUBOARD_')) exit; // 개별_페이지__접근_불가

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


// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>

<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">

		<!-- 게시판 카테고리 시작 { -->
		<?php if ($is_category) { ?>
		<nav id="bo_cate">
				<h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
				<ul id="bo_cate_ul">
						<?php echo $category_option ?>
				</ul>
		</nav>
		<?php } ?>
		<!-- } 게시판 카테고리 끝 -->

		<!-- 게시판 페이지 정보 및 버튼 시작 { -->
		<div class="bo_fx">
				<div id="bo_list_total">
						<span>Total <?php echo number_format($total_count) ?>건</span>
						<?php echo $page ?> 페이지
				</div>

				<?php if ($rss_href || $write_href) { ?>
				<ul class="btn_bo_user">
						<?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01">RSS</a></li><?php } ?>
						<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
						<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
				</ul>
				<?php } ?>
		</div>
		<!-- } 게시판 페이지 정보 및 버튼 끝 -->

		<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
		<input type="hidden" name="stx" value="<?php echo $stx ?>">
		<input type="hidden" name="spt" value="<?php echo $spt ?>">
		<input type="hidden" name="sca" value="<?php echo $sca ?>">
		<input type="hidden" name="page" value="<?php echo $page ?>">
		<input type="hidden" name="sw" value="">

		<div class="tbl_head01 tbl_wrap">
				<table>
				<caption><?php echo $board['bo_subject'] ?> 목록</caption>
				<thead>
				<tr>
						<th scope="col">번호</th>
						<?php if ($is_checkbox) { ?>
						<th scope="col">
								<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
								<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
						</th>
						<?php }?>
						<th scope="col">제목</th>
						<th scope="col">글쓴이</th>
						<th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
						<th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회</a></th>
						<?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
						<?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
				</tr>
				</thead>
				<tbody>

				<?php
				FOR ($i=0; $i<count($list); $i++) {
				 ?>
				<tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
						<td class="td_num">
						<?php
						if ($list[$i]['is_notice']) // 공지사항
								echo '<strong>공지</strong>';
						else if ($wr_id == $list[$i]['wr_id'])
								echo "<span class=\"bo_current\">열람중</span>";
						else
								echo trim($list[$i]['num']);
						 ?>
						</td>
						<?php if ($is_checkbox) { ?>
						<td class="td_chk">
								<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
								<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
						</td>
						<?php } ?>
						<!--Added by BryanPark td_subject가 제목을 받아서 출력하는 부분. 여기에 투표 내용도 추가-->
						<td class="td_subject">
							<?php
							##### 해당 게시물의 투표 제목, 항목 등 가져오기.
							$sql = " select * from {$piree_table['vote_list']} WHERE avl_bo_table='{$bo_table}' 
									AND avl_wr_id = '{$list[$i]['wr_id']}'";
							$vote_rows = sql_fetch($sql);


							if (!$vote_rows){//투표없는거는 게시물자체만 출력.?>
								<?php
								echo $list[$i]['icon_reply'];
								if ($is_category && $list[$i]['ca_name']) {
								?>
									<a href="<?php echo trim($list[$i]['ca_name_href']); ?>" class="bo_cate_link"><?php echo trim($list[$i]['ca_name']); ?></a>
								<?php } ?>

								<a href="<?php echo $list[$i]['href'] ?>">
										<?php echo $list[$i]['subject']?>
										<?php if ($list[$i]['comment_cnt']) { ?>
										<?php } ?>
										
									<?php //아이콘 새글, 파일첨부 등 출력.
									// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
									// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

									IF (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
									IF (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
									IF (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
									IF (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
									IF (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
									?>
								</a>
							<?}else{ //투표 게시물 제목과 정보 출력..?>

									<?php
									if ($is_category && $list[$i]['ca_name']) {
									?>
									<div class="category" style="float:left;vertical-align:center;">
										<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo trim($list[$i]['ca_name']); ?></a>
									</div>
									<?php }?>
									<div style="display:inline-block; float:left">
										<a href="<?php echo $list[$i]['href'] ?>">
											<?=trim($vote_rows['avl_title_s']);?>
											<br/>
											<img src="http://gboard.codys.co.kr/gnuboard5/theme/codys_vote_board/skin/board/piree_PLUS_article_vote/img/icon_clock.gif" alt="시간"><!--only works in vote_skin--> <b><?=date('Y-m-d',$vote_rows['avl_regi_time_n']);?>~<?=date('Y-m-d',$vote_rows['avl_end_time_n']);?></b>
										</a>
									</div>
									
								<?php
								/*
									//최대 20개까지 가능한 투표 보기 항목들중 있는 것들만 뿌려줌.
									for($x = 1 ; $x<=20; $x++){
										if($vote_rows['avl_poll_'.$x]){
											echo "<div class='vote_list_item'>".
											$vote_rows['avl_poll_'.$x].
											"</div>";
										}
									}
								*/
								?>
							<div class="comment_icon" style="float:left">
								<?} // 공통적으로 댓글 있을시에 댓글 아이콘 삽입.
								if ($list[$i]['comment_cnt']) {//댓글 아이콘 삽입.
									echo '<img src="http://gboard.codys.co.kr/gnuboard5/theme/codys_vote_board/skin/board/piree_PLUS_article_vote/img/icon_comments.gif" alt="댓글"><!--only works in vote_skin-->';
									echo $list[$i]['comment_cnt']; 
								}
								if($vote_rows) {
									echo '<img src="http://gboard.codys.co.kr/gnuboard5/theme/codys_vote_board/skin/board/piree_PLUS_article_vote/img/icon_vote.gif" alt="투표수"><!--only works in vote_skin-->';
									echo " <b>".$vote_rows['avl_vote_all_t']."</b>";
								}
								?>
							</div>
						</td>
						<td class="td_name sv_use"><?php echo $list[$i]['name'] ?></td>
						<td class="td_date"><?php echo $list[$i]['datetime2'] ?></td>
						<td class="td_num"><?php echo $list[$i]['wr_hit'] ?></td>
						<?php if ($is_good) { ?><td class="td_num"><?php echo $list[$i]['wr_good'] ?></td><?php } ?>
						<?php if ($is_nogood) { ?><td class="td_num"><?php echo $list[$i]['wr_nogood'] ?></td><?php } ?>
				</tr>
				<?php } ?>
				<?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</td></tr>'; } ?>
				</tbody>
				</table>
		</div>

		<?php if ($list_href || $is_checkbox || $write_href) { ?>
		<div class="bo_fx">
				<?php if ($is_checkbox) { ?>
				<ul class="btn_bo_adm">
						<li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
						<li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
						<li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
				</ul>
				<?php } ?>

				<?php if ($list_href || $write_href) { ?>
				<ul class="btn_bo_user">
						<?php if ($list_href) { ?><li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li><?php } ?>
						<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
				</ul>
				<?php } ?>
		</div>
		<?php } ?>
		</form>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;	?>

<!-- 게시판 검색 시작 { -->
<fieldset id="bo_sch">
		<legend>게시물 검색</legend>

		<form name="fsearch" method="get">
		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
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
<!-- } 게시판 검색 끝 -->

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
		var f = document.fboardlist;

		for (var i=0; i<f.length; i++) {
				if (f.elements[i].name == "chk_wr_id[]")
						f.elements[i].checked = sw;
		}
}

function fboardlist_submit(f) {
		var chk_count = 0;

		for (var i=0; i<f.length; i++) {
				if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
						chk_count++;
		}

		if (!chk_count) {
				alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
				return false;
		}

		if(document.pressed == "선택복사") {
				select_copy("copy");
				return;
		}

		if(document.pressed == "선택이동") {
				select_copy("move");
				return;
		}

		if(document.pressed == "선택삭제") {
				if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
						return false;

				f.removeAttribute("target");
				f.action = "./board_list_update.php";
		}

		return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
		var f = document.fboardlist;

		if (sw == "copy")
				str = "복사";
		else
				str = "이동";

		var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

		f.sw.value = sw;
		f.target = "move";
		f.action = "./move.php";
		f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
