<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2015년 01월 04일 일요일 오전 01시 46분 - 날씨 추버 추버~~ 매우 추버~~

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 게시판 > 스킨 > 피리 게시글에 투표 > 투표 등록 폼
===========================================================


*/


	#########################################################
	# 시작 => 접근__유효__확인
	#########################################################

	//=======================================================
	// 개별_페이지__접근_불가
	IF ( !defined('_GNUBOARD_') )										EXIT;

	#########################################################
	# 끝 => 접근__유효__확인
	#########################################################



	#########################################################
	# 시작 => 라이브러리_파일__첨부
	#########################################################

	//=======================================================
	// 날짜_선택_라이브러리
	include_once(G5_PLUGIN_PATH.'/jquery-ui/datepicker.php');

	#########################################################
	# 끝 => 라이브러리_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 피리_게시글에_투표__설정_정보_파일__첨부
	#########################################################

	//*******************************************************
	//** DEV_SOSS
	//*******************************************************

	//*******************************************************
	//** PWP__770015__ARTICLE_VOTE
	//*******************************************************

	//=======================================================
	// 시작 => 프로그램_정보__없으면
	IF (!$ARTI_VOTE_prog_u || !$ARTI_VOTE_prog_p)
	{

			//===================================================
			// 피리_메뉴__번호
			$piree_menu_n = 770015;


			//===================================================
			// 기본_설정_첨부__여부
			// 0 - 안해
			$is_get__piree_config = 0;


			//===================================================
			// 피리_게시글에_투표__설정_정보__가져오기
			$is_get__article_vote = 1;


			//===================================================
			// 피리_게시글에_투표__설정_정보_파일__경로
			include_once( get__sam_file($piree_menu_n, '') );

	}
	// 끝 => 프로그램_정보__없으면
	//=======================================================

	#########################################################
	# 끝 => 피리_게시글에_투표__설정_정보_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 투표_항목__기본값
	#########################################################

	//=======================================================
	// 다중__투표
	$atvt_vote_do_t = 1;


	//=======================================================
	// 투표_마감__시간
	$atvt_end_date_H = date("H");


	//=======================================================
	// 투표_마감__분
	$atvt_end_date_i = date("i");

	#########################################################
	# 끝 => 투표_항목__기본값
	#########################################################



	#########################################################
	# 시작 => 투표_항목__DB__값
	#########################################################

	//=======================================================
	// 시작 => 투표_번호__있으면
	IF ($atvt['atvt_n'] > 0)
	{

			//===================================================
			// 다중__투표
			$atvt_vote_do_t = $atvt['atvt_vote_do_t'];

	}
	// 끝 => 투표_번호__있으면
	//=======================================================

	#########################################################
	# 끝 => 투표_항목__DB__값
	#########################################################



	#########################################################
	# 시작 => 보여주기__관련
	#########################################################

	//=======================================================
	// add_javascript('js 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
	add_javascript('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>', 75);
	add_javascript('<script src="//mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>', 76);
	add_javascript('<script src="'. $ARTI_VOTE_SKIN_PC_u .'/vote_write_form.js"></script>', 77);


	//=======================================================
	// 게시글에_투표__등록__스타일
	add_stylesheet('<link rel="stylesheet" href="//mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.css">', 75);
	add_stylesheet('<link rel="stylesheet" href="'.$ARTI_VOTE_SKIN_PC_u.'/style.css">', 76);

	#########################################################
	# 끝 => 보여주기__관련
	#########################################################



	#########################################################
	# 시작 => 보여주기
	#########################################################

	//=======================================================
	// 시작 => 등록된_투표_항목_수__있으면
	IF ($ARTI_VOTE_vote_item_t > 0)
	{

?>
			<div id="vote_write_form" style="margin-top:10px; display:none;">

					<div class="tbl_frm01 tbl_wrap">

							<table>
							<tbody>
							<tr>
									<td>
											<div class="line_h_2_4">
													<label class="font_999" for="atvt_title_s">투표 제목<strong class="sound_only">필수</strong></label><br />
													<input type="text" name="atvt_title_s" id="atvt_title_s" value="<?php echo $atvt_title_s ?>" class="frm_input" style="width:96%;" maxlength="255">
											</div>
									</td>
							</tr>

							<tr>
									<td>
											<div class="line_h_2_4">
													<label class="font_999" for="atvt_end_date_s">투표 마감<strong class="sound_only">필수</strong></label><br />
													<input type="text" name="atvt_end_date_s" id="atvt_end_date_s" value="<?php echo $atvt_end_date_s ?>" readonly class="frm_input" style="width:96%;" style="width:120px;"><br />
													<br />
													<?php echo_help ('입력칸을 클릭(터치) 하시면 "날짜", "시간"을 선택할수 있는 창이 뜹니다.'); ?>
													<br />
													<?php echo_help ('선택할수 있는 창이 뜨면 "날짜", "시간"을 선택하시면 됩니다.'); ?>
											</div>
									</td>
							</tr>

							<tr>
									<td>
											<div class="line_h_2_4">
													<label class="font_999" for="vote_do_level_n">투표 레벨<strong class="sound_only">필수</strong></label><br />
													<?php echo get_member_level_select_gnu5('vote_do_level_n', $ARTI_VOTE_vote_regi_level_n, $config['mem_max_level_n'], $ARTI_VOTE_vote_regi_level_n) ?>
													<br />
													<?php echo_help ('투표 참여할수 있는 회원 레벨 선택요망.'); ?>
											</div>
									</td>
							</tr>

							<tr>
									<td>
											<div class="line_h_2_4">
													<label class="font_999" for="vote_do_level_n">다중 투표<strong class="sound_only">필수</strong></label><br />
													<select name="atvt_vote_do_t" id="atvt_vote_do_t">
<?php

													//===============================
													// 시작 => 반복문
													FOR ($i=1; $i<10; $i++)
													{

															//===========================
															// SELECTED_여부
															$selected = $atvt_vote_do_t == $i ? " selected" : "";


															//===========================
															// 출력
															echo "<option value=\"".$i."\"".$selected.">".$i."</option>";

													}
													// 끝 => 반복문
													//===============================

?>
													</select>
													<br />
													<?php echo_help ('한번 투표할때 몇표까지 할수 있는지 입력.'); ?>
											</div>
									</td>
							</tr>

							<tr>
									<td>
											<div class="line_h_2_4">
													<label class="font_999" for="atvt_re_vote_n">재투표<strong class="sound_only">선택</strong></label><br />
													<input type="checkbox" name="atvt_re_vote_n" id="atvt_re_vote_n" value="1"> <label for="atvt_re_vote_n"> 재투표를 허용합니다.</label>
													<br />
													<?php echo_help ('투표를 하고 다시 투표하는것을 허용할 경우.'); ?>
											</div>
									</td>
							</tr>

<?php

					//===============================================
					// 시작 => 반복문
					FOR ($i=1; $i<=$ARTI_VOTE_vote_item_t; $i++)
					{

							//===========================================
							// 시작 => 1번째_2번째__이면
							IF ($i == 1 || $i == 2)
							{
									//=======================================
									// LABEL__필수_입력
									$sound_only = '<strong class="sound_only">필수</strong>';
							}
							// 끝 => 1번째_2번째__이면
							//===========================================


							//===========================================
							// 설목_항목
							$atvt_poll_s = get_text($po['atvt_poll_'.$i]);


							//===========================================
							// 화일_이름
							$atvt_image_s = get_text($po['atvt_image_'.$i]);

?>
							<tr>
									<td>
											<div class="line_h_2_4">
													<label class="font_999" for="atvt_poll_<?php echo $i ?>">항목 <?php echo $i ?><?php echo $sound_only ?></label><br />
													<input type="text" name="atvt_poll_<?php echo $i ?>" id="atvt_poll_<?php echo $i ?>" value="<?php echo $atvt_poll_s ?>" class="frm_input" style="width:96%;" maxlength="255">
<?php

											//===================================
											// 시작 => 이미지_투표__가능하면
											IF ($ARTI_VOTE_vote_image_ok_n == 1)
											{
?>
													<br />
													<input type="file" name="atvt_image_<?php echo $i ?>" id="atvt_image_<?php echo $i ?>" value="<?php echo $atvt_image_s ?>" class="frm_input" style="width:96%;" maxlength="255">
<?php
											}
											// 끝 => 이미지_투표__가능하면
											//===================================

?>
											</div>
								 </td>
							</tr>
<?php
					}
					// 끝 => 반복문
					//===============================================

?>

							</tbody>
							</table>

					</div>

</div>

<?php

	}
	// 끝 => 등록된_투표_항목_수__있으면
	//=======================================================

	#########################################################
	# 끝 => 보여주기
	#########################################################


?>