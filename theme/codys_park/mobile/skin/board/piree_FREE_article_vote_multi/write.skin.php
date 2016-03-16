<?php

/*
===========================================================

	프로젝트 이름 : Piree Web Program

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2016년 01월 12일 화요일 오전 02시 19분 - 날씨 한파가 왔다

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 게시판 > 스킨 > 피리 게시글에 투표, 복수 질문 > 
===========================================================


*/


	#########################################################
	# 시작 => 접근__유효__확인
	#########################################################

	//=======================================================
	// 개별_페이지__접근_불가
	IF (!defined('_GNUBOARD_'))										EXIT;

	#########################################################
	# 끝 => 접근__유효__확인
	#########################################################



	#########################################################
	# 시작 => 피리_게시글에_투표__복수_질문__설정_정보_화일__첨부
	#########################################################

	//*******************************************************
	//** DEV_SOSS
	//*******************************************************

	//*******************************************************
	//** PWP__760034__ARTICLE_VOTE
	//*******************************************************

	//=======================================================
	// 피리_메뉴__번호
	$piree_menu_n = 760034;


	//=======================================================
	// 기본_설정_첨부__여부
	// 0 - 안해
	$is_get__piree_config = 0;


	//=======================================================
	// 피리_게시글에_투표__복수_질문__설정_정보__가져오기
	$is_get__article_vote = 1;


	//=======================================================
	// 피리_게시글에_투표__복수_질문__설정_정보_화일__경로
	include_once( get__sam_file($piree_menu_n, '') );

	#########################################################
	# 끝 => 피리_게시글에_투표__복수_질문__설정_정보_화일__첨부
	#########################################################



	#########################################################
	# 시작 => 보여주기__관련
	#########################################################

	//=======================================================
	// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
	add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

	#########################################################
	# 끝 => 보여주기__관련
	#########################################################


?>


<section id="bo_w">
		<h2 id="container_title"><?php echo $g5['title'] ?></h2>

		<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
		<input type="hidden" name="w" value="<?php echo $w ?>">
		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
		<input type="hidden" name="sca" value="<?php echo $sca ?>">
		<input type="hidden" name="sfl" value="<?php echo $sfl ?>">
		<input type="hidden" name="stx" value="<?php echo $stx ?>">
		<input type="hidden" name="spt" value="<?php echo $spt ?>">
		<input type="hidden" name="sst" value="<?php echo $sst ?>">
		<input type="hidden" name="sod" value="<?php echo $sod ?>">
		<input type="hidden" name="page" value="<?php echo $page ?>">
		<?php
		$option = '';
		$option_hidden = '';
		if ($is_notice || $is_html || $is_secret || $is_mail) {
				$option = '';
				if ($is_notice) {
						$option .= PHP_EOL.'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'.PHP_EOL.'<label for="notice">공지</label>';
				}

				if ($is_html) {
						if ($is_dhtml_editor) {
								$option_hidden .= '<input type="hidden" value="html1" name="html">';
						} else {
								$option .= PHP_EOL.'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'.PHP_EOL.'<label for="html">html</label>';
						}
				}

				if ($is_secret) {
						if ($is_admin || $is_secret==1) {
								$option .= PHP_EOL.'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'.PHP_EOL.'<label for="secret">비밀글</label>';
						} else {
								$option_hidden .= '<input type="hidden" name="secret" value="secret">';
						}
				}

				if ($is_mail) {
						$option .= PHP_EOL.'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'.PHP_EOL.'<label for="mail">답변메일받기</label>';
				}
		}

		echo $option_hidden;
		?>
		<div class="tbl_frm01 tbl_wrap">
				<table>
				<caption><?php echo $g5['title'] ?></caption>
				<tbody>
				<?php if ($is_name) { ?>
				<tr>
						<th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
						<td><input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input required" maxlength="20"></td>
				</tr>
				<?php } ?>

				<?php if ($is_password) { ?>
				<tr>
						<th scope="row"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
						<td><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input <?php echo $password_required ?>" maxlength="20"></td>
				</tr>
				<?php } ?>

				<?php if ($is_email) { ?>
				<tr>
						<th scope="row"><label for="wr_email">이메일</label></th>
						<td><input type="email" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email" maxlength="100"></td>
				</tr>
				<?php } ?>

				<?php if ($is_homepage) { ?>
				<tr>
						<th scope="row"><label for="wr_homepage">홈페이지</label></th>
						<td><input type="url" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input"></td>
				</tr>
				<?php } ?>

				<?php if ($option) { ?>
				<tr>
						<th scope="row">옵션</th>
						<td><?php echo $option ?></td>
				</tr>
				<?php } ?>

				<?php if ($is_category) { ?>
				<tr>
						<th scope="row"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
						<td>
								<select class="required" id="ca_name" name="ca_name" required>
										<option value="">선택하세요</option>
										<?php echo $category_option ?>
								</select>
						</td>
				</tr>
				<?php } ?>

				<tr>
						<th scope="row"><label for="wr_subject">제목<strong class="sound_only">필수</strong></label></th>
						<td><input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input required"></td>
				</tr>

				<tr>
						<th scope="row"><label for="wr_content">내용<strong class="sound_only">필수</strong></label></th>
						<td class="wr_content">
								<?php if($write_min || $write_max) { ?>
								<!-- 최소/최대 글자 수 사용 시 -->
								<p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
								<?php } ?>
								<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
								<?php if($write_min || $write_max) { ?>
								<!-- 최소/최대 글자 수 사용 시 -->
								<div id="char_count_wrap"><span id="char_count"></span>글자</div>
								<?php } ?>
						</td>
				</tr>

				<?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
				<tr>
						<th scope="row"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
						<td><input type="url" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input wr_link"></td>
				</tr>
				<?php } ?>

				<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
				<tr>
						<th scope="row">파일 #<?php echo $i+1 ?></th>
						<td>
								<input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> :	용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
								<?php if ($is_file_content) { ?>
								<input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input">
								<?php } ?>
								<?php if($w == 'u' && $file[$i]['file']) { ?>
								<input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i; ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')'; ?> 파일 삭제</label>
								<?php } ?>
						</td>
				</tr>
				<?php } ?>

				<?php if ($is_guest) { //자동등록방지 ?>
				<tr>
						<th scope="row">자동등록방지</th>
						<td>
								<?php echo $captcha_html ?>
						</td>
				</tr>
				<?php } ?>

				</tbody>
				</table>
		</div>


<?php

	//*******************************************************
	//** DEV_SOSS
	//*******************************************************

	//*******************************************************
	//** PWP__760034__ARTICLE_VOTE
	//*******************************************************

	//=======================================================
	// 시작 => 글쓰기__이면
	IF ( !$w || $w == 'r' )
	{

?>

			<div class="btn_confirm">
					<input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
					<a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
			</div>
<?php

			//===================================================
			// 시작 => 프로그램_정보__있으면
			// 시작 => 게시판_설정__게시글에_투표__사용하면
			IF ( $ARTI_VOTE_prog_u && $ARTI_VOTE_prog_p && $board['bo_arti_vote_multi_use_n'] == 1 )
			{

					//===============================================
					// PC__투표_입력창__열기
					include_once( $ARTI_VOTE_SKIN_MO_p .'/vote_write_form.skin.php' );

			}
			// 끝 => 프로그램_정보__있으면
			// 끝 => 게시판_설정__게시글에_투표__사용하면
			//===================================================

	}
	// 끝 => 글쓰기__이면
	//=======================================================

?>

		<div class="btn_confirm">
				<input type="submit" value="작성완료" id="btn_submit" class="btn_submit" accesskey="s">
				<a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel">취소</a>
		</div>
		</form>
</section>

<script>
<?php if($write_min || $write_max) { ?>
// 글자수 제한
var char_min = parseInt(<?php echo $write_min; ?>); // 최소
var char_max = parseInt(<?php echo $write_max; ?>); // 최대
check_byte("wr_content", "char_count");

$(function() {
		$("#wr_content").on("keyup", function() {
				check_byte("wr_content", "char_count");
		});
});

<?php } ?>
function html_auto_br(obj)
{
		if (obj.checked) {
				result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
				if (result)
						obj.value = "html2";
				else
						obj.value = "html1";
		}
		else
				obj.value = "";
}

function fwrite_submit(f)
{
		<?php echo get_editor_js('wr_content', $is_dhtml_editor); ?>
		<?php echo chk_editor_js('wr_content', $is_dhtml_editor); ?>

		var subject = "";
		var content = "";
		$.ajax({
				url: g5_bbs_url+"/ajax.filter.php",
				type: "POST",
				data: {
						"subject": f.wr_subject.value,
						"content": f.wr_content.value
				},
				dataType: "json",
				async: false,
				cache: false,
				success: function(data, textStatus) {
						subject = data.subject;
						content = data.content;
				}
		});

		if (subject) {
				alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
				f.wr_subject.focus();
				return false;
		}

		if (content) {
				alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
				if (typeof(ed_wr_content) != "undefined")
						ed_wr_content.returnFalse();
				else
						f.wr_content.focus();
				return false;
		}

		if (document.getElementById("char_count")) {
				if (char_min > 0 || char_max > 0) {
						var cnt = parseInt(check_byte("wr_content", "char_count"));
						if (char_min > 0 && char_min > cnt) {
								alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
								return false;
						}
						else if (char_max > 0 && char_max < cnt) {
								alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
								return false;
						}
				}
		}

		<?php if ($is_guest) { echo chk_captcha_js(); } ?>

		document.getElementById("btn_submit").disabled = "disabled";

		return true;
}
</script>
