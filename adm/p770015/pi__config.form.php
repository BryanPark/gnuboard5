<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 12월 26일 금요일 오전 02시 54분 - 날씨 추버 추버

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 피리 게시글에 투표 PLUS G5 > 설정하기
===========================================================


*/


	#########################################################
	# 시작 => 선_처리__메뉴_지정__관리자_확인
	#########################################################

	//=======================================================
	// 메뉴_번호__지정____피리_게시글에_투표
	$sub_menu = "770015";


	//=======================================================
	// 기본처리_파일__첨부
	include_once('./_common.php');


	//=======================================================
	// 시작 => 운영자__아니면
	IF (!$is_admin)
	{
		alert ("권한이 없습니다", G5_DOMAIN."/");
		EXIT;
	}
	// 끝 => 운영자__아니면
	//=======================================================


	//=======================================================
	// 관리자_확인
	auth_check($auth[$sub_menu], "w");

	#########################################################
	# 끝 => 선_처리
	#########################################################



	#########################################################
	# 시작 => 최고_회원_레벨__수정하기
	#########################################################

	//=======================================================
	// 최고_회원_레벨__수정하는_파일__첨부
	include_once(PIREE_ADMIN_PIREE_PATH.'/pi__member_max_level.inc.php');

	#########################################################
	# 끝 => 최고_회원_레벨__수정하기
	#########################################################



	#########################################################
	# 시작 => 설정__정보__기본값
	#########################################################

	//=======================================================
	// PC__스킨
	$ARTI_VOTE_skin_pc_c = "piree_basic";


	//=======================================================
	// 모바일__스킨
	$ARTI_VOTE_skin_mobile_c = "piree_basic";


	//=======================================================
	// 등록된_투표_항목_수
	$ARTI_VOTE_vote_item_t = 10;


	//=======================================================
	// 등록된_투표_항목_수 added by BryanPark
	$ARTI_VOTE_vote_category_list_s = "";
	// 분류에 & 나 = 는 사용이 불가하므로 2바이트로 바꾼다.
	$src_char = array('&', '=');
	$dst_char = array('＆', '〓');
	$ARTI_VOTE_vote_category_list_s = str_replace($src_char, $dst_char, $ARTI_VOTE_vote_category_list_s);

	//=======================================================
	// 투표_등록__회원_레벨
	$ARTI_VOTE_vote_regi_level_n = 2;


	//=======================================================
	// 이미지_투표
	$ARTI_VOTE_vote_image_ok_n = 1;


	//=======================================================
	// 투표_등록시__차감_포인트
	$ARTI_VOTE_vote_regi_point_n = 0;


	//=======================================================
	// 투표_기간__기본값
	$ARTI_VOTE_vote_day_default_t = 10;

	#########################################################
	# 끝 => 설정__정보__기본값
	#########################################################



	#########################################################
	# 시작 => 피리_게시글에_투표__설정_정보_파일__첨부
	#########################################################

	//=======================================================
	// 기본_설정_첨부__여부
	// 0 - 안해
	// 1 - 하자
	$is_get__piree_config = 1;


	//=======================================================
	// 피리_게시글에_투표__설정_정보__가져오기
	$is_get__article_vote = 1;


	//=======================================================
	// 설정_화면__여부
	$is_piree_program_config = 1;


	//=======================================================
	// PIREE_ARTICLE_VOTE__설정_정보_파일__첨부
	// $sub_menu == 770015
	include_once( get__sam_file($sub_menu, '') );

	#########################################################
	# 끝 => 피리_게시글에_투표__설정_정보_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 마무리__페이지_ECHO_관련
	#########################################################

	//=======================================================
	// 타이틀
	$g5['title'] = "피리 게시글에 투표 PLUS G5";


	//=======================================================
	// HEAD_첨부
	include_once("../admin.head.php");

	#########################################################
	# 끝 => 마무리__페이지_ECHO_관련
	#########################################################


?>

<section>
		<h2>피리 게시글에 투표 설정하기</h2>

		<form name="article_vote_config_form" id="article_vote_config_form" action="./pi__config.update.php" method="post" onsubmit="return submit_piree_article_vote(this);">

		<div class="tbl_frm01 tbl_wrap">
				<table>
				<col class="td_left_200" />
				<col>
				<tbody>

				<tr>
					<th scope="row"><label for="skin_pc_label">PC 스킨<strong class="sound_only">선택입력</strong></label></th>
					<td>
						<select name="skin_pc_c" id="skin_pc_label" required >
<?php

						//=============================================
						// PC__스킨_목록__가져오기
						$skins = get_skin_dir(PIREE_SKIN_PC_DIR, $ARTI_VOTE_prog_p);


						//=============================================
						// 시작 => 반복문
						FOR ($i=0; $i<count($skins); $i++)
						{
							// 선택_여부
							$selected = $ARTI_VOTE_skin_pc_c == $skins[$i] ? " selected" : "";
?>
							<option value="<?php echo $skins[$i]; ?>"<?php echo $selected ?>><?php echo $skins[$i]; ?></option>
<?php
						}
						// 끝 => 반복문
						//=============================================

?>
						</select>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="skin_mobile_label">모바일 스킨<strong class="sound_only">선택입력</strong></label></th>
					<td>
						<select name="skin_mobile_c" id="skin_mobile_label" required >
<?php

						//=============================================
						// 모바일__스킨_목록__가져오기
						$skins = get_skin_dir(PIREE_SKIN_MOBILE_DIR, $ARTI_VOTE_prog_p);


						//=============================================
						// 시작 => 반복문
						FOR ($i=0; $i<count($skins); $i++)
						{
							// 선택_여부
							$selected = $ARTI_VOTE_skin_mobile_c == $skins[$i] ? " selected" : "";
?>
							<option value="<?php echo $skins[$i]; ?>"<?php echo $selected ?>><?php echo $skins[$i]; ?></option>
<?php
						}
						// 끝 => 반복문
						//=============================================

?>
						</select>
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="vote_item_t">최대 투표 항목 수<strong class="sound_only">필수입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="vote_item_t" id="vote_item_t" value="<?php echo $ARTI_VOTE_vote_item_t; ?>" class="frm_input" size="10"> <strong>개</strong>
						<br />
						투표 항목을 몇개까지 만들수 있는지 입력해 주세요.
						<br />
						0을 입력하면 "게시글에 투표"를 사용하지 않습니다.
						<br />
						20이하로 입력해 주세요. 20을 초과 입력하면 기본값 "10"을 저장합니다.
						<br />
						예) 10 , 15 , 20
					</td>
				</tr>
				
				<tr><!--by Bryan Park 카테고리 설정메뉴 추가, 기존 설정 불러오기까지.-->
					<th scope="row"><label for="vote_category_t">투표 카테고리 설정<strong class="sound_only">필수입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="vote_category_t" id="vote_category_t" value="<?php echo $ARTI_VOTE_vote_category_list_s?>" class="frm_input" size="40">
						<br />
						분류와 분류 사이는 | 로 구분하세요. (예: 질문|답변) 
						<br />
						첫자로 #은 입력하지 마세요. (예: #질문|#답변 [X])
						<br />
						분류 당 최대 20byte씩 가능합니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="vote_regi_level_n">투표 등록 회원 레벨<strong class="sound_only">필수입력</strong></label></th>
					<td style="line-height:2.4em;">
						<?php echo get_member_level_select('vote_regi_level_n', 1, $config['mem_max_level_n'], $ARTI_VOTE_vote_regi_level_n) ?> <strong>이상 회원은 투표를 등록할수 있습니다.</strong>
						<br />
						게시글에 투표를 등록 할수 있는 회원 레벨을 숫자를 입력해 주세요.
						<br />
						입력하신 숫자 레벨 이상인 회원이 투표를 등록할수 있습니다.
						<br />
						입력하지 않으면 모든 회원이 투표를 등록할수 있습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="vote_image_ok_n">이미지 투표<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="checkbox" name="vote_image_ok_n" id="vote_image_ok_n" value="1"<?php	IF ($ARTI_VOTE_vote_image_ok_n == 1) { echo " checked"; }	?>> <strong>투표 항목에 이미지를 등록하여 "이미지 투표" 할수 있습니다.</strong>
						<br />
						이미지를 보고 투표할수 있게 하시려면 체크 하세요.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="vote_regi_point_n">투표 등록시 차감 포인트<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="vote_regi_point_n" id="vote_regi_point_n" value="<?php echo $ARTI_VOTE_vote_regi_point_n; ?>" class="frm_input" size="10"> <strong>점</strong>
						<br />
						투표를 등록할 경우 차감할 포인트 점수를 양수로 입력해 주세요.
						<br />
						입력하지 않으면 포인트를 차감 하지 않습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="vote_day_default_t">투표 기간 기본값<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="vote_day_default_t" id="vote_day_default_t" value="<?php echo $ARTI_VOTE_vote_day_default_t; ?>" class="frm_input" size="10"> <strong>일</strong>
						<br />
						투표를 몇일간 할지 기본값을 숫자로만 입력해 주세요.
						<br />
						투표 등록하는 사람이 기간을 길게 또는 짧게 변경할수 있습니다.
						<br />
						입력하지 않으면 "10" 일이 저장됩니다.
					</td>
				</tr>

				</tbody>
				</table>
		</div>


		<br />


		<div class="btn_confirm">
			<input type="submit" id="submit_btn" class="btn_submit" value=" 저 장 합 니 다 ">
			<input type="button" id="cancel_btn" class="btn_cancel" value=" 취소하기 " onClick="PageUrl('./index.php')">
		</div>

		</form>

</section>


<script>

	function submit_piree_article_vote(gform)
	{

			//===================================================
			// 버튼_비활성화
			document.getElementById("submit_btn").disabled = "disabled";


			//===================================================
			// SUBMIT
			return true;

	}

</script>


<?php

	//=======================================================
	// ADMIN_TAIL__첨부
	include_once('../admin.tail.php');

?>