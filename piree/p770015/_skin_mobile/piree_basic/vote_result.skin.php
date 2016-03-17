<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 12월 31일 수요일 오후 21시 37분 - 날씨 추버 추버~~ 무쟈게 추버~~

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 게시판 > 스킨 > 피리 게시글에 투표 > 투표 결과 보기
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
	// THUMBNAIL__라이브러리__파일_첨부
	include_once(G5_LIB_PATH.'/thumbnail.lib.php');

	#########################################################
	# 끝 => 라이브러리_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 이것저것
	#########################################################

	//=======================================================
	// 투표_가능__여부
	// 0 - 불가
	// 1 - 가능
	$is_possible_vote = get__is_possible_vote($member['mb_level'], $ARTI_VOTE_vote_regi_level_n, $avl_level_n, $avl_end_time_n);

	#########################################################
	# 끝 => 이것저것
	#########################################################



	#########################################################
	# 시작 => 보여주기
	#########################################################

	//=======================================================
	// 시작 => 투표_번호__있으면
	IF ($avl_n > 0)
	{

?>
			<section id="article_vote_out">

					<div class="vote_title">
							⊙ 투표 결과 보기 ⊙
					</div>

					<div class="vote_line">
							<div class="vote_res_subject">투표 제목</div>
							<div class="vote_res_cont"><?php echo $avl_title_s ?></div>
					</div>

					<div class="vote_line">
							<div class="vote_res_subject">투표 마감</div>
							<div class="vote_res_cont"><?php

									//=======================================
									// 투표_마감__날짜_시간
									echo (date("Y년 m월 d일 H시 i분", $avl_end_time_n));


							//===========================================
							// 시작 => 투표_마감__되었으면
							IF (G5_SERVER_TIME > $avl_end_time_n)
							{
									echo "<br />투표 마감 되었습니다.";
							}
							// 끝 => 투표_마감__되었으면
							//===========================================

							?></div>
					</div>

					<div class="vote_line">
							<div class="vote_res_subject">총 투표</div>
							<div class="vote_res_cont"><?php

							//===========================================
							// 시작 => 총_투표_수__참여_인원_수__비교
							IF ($avl_vote_mem_t == $avl_vote_all_t)
							{

									#########################################
									# 시작 => 총_투표_수__참여_인원_수__같다
									?><strong><?php echo number_format($avl_vote_all_t); ?></strong>표<?php

							}
							ELSE
							{

									#########################################
									# 시작 => 총_투표_수__참여_인원_수__다르다
									?><strong><?php echo number_format($avl_vote_mem_t); ?></strong>명이 <strong><?php echo number_format($avl_vote_all_t); ?></strong>표를 투표 했습니다.<?php

							}
							// 끝 => 총_투표_수__참여_인원_수__비교
							//===========================================

							?></div>
					</div>

					<div class="vote_line">
							<div class="vote_res_poll">

<?php

			//===================================================
			// 시작 => 반복문
			FOR ($i=1; $i<=$ARTI_VOTE_vote_item_t; $i++)
			{

					//===============================================
					// 시작 => 투표__항목_이미지__있으면
					IF ($avl_poll_arr[$i] || $avl_image_arr[$i])
					{

							//===========================================
							// 그래프_넓이
							$graph_width = $avl_per_arr[$i] > 0 ? (int)$avl_per_arr[$i] : 0;

?>
									<div class="vote_poll_top_line"></div>
<?php


							//===========================================
							// 시작 => 투표_항목__있으면
							IF ($avl_poll_arr[$i])
							{
?>
									<div class="vote_poll_check"><?php echo $i; ?>.</div>
									<div class="vote_poll_subject"><?php echo $avl_poll_arr[$i]; ?></div>
<?php
							}
							// 끝 => 투표_항목__있으면
							//===========================================


							//===========================================
							// 시작 => 이미지__있으면
							IF ($avl_image_arr[$i])
							{

									//=======================================
									// 이미지__폴더_이름_정보__가져오기
									$image_in_a = get_vote_image_info($bo_table, $wr_id);


									//=======================================
									// 이미지__URL
									$image_in_u = $image_in_a['url'].'/'.thumbnail($avl_image_arr[$i], $image_in_a['path'], $image_in_a['path'], 110, 110, false);

?>
									<div class="vote_poll_check"><?php IF (!$avl_poll_arr[$i]) { echo $i."."; } ELSE { echo "&nbsp;"; } ?></div>
									<div class="vote_poll_subject"><img src="<?php echo $image_in_u; ?>" border="0" align="absmiddle"></div>
<?php
							}
							// 끝 => 이미지__있으면
							//===========================================

?>
									<div class="vote_poll_result">
											<dl style="width:100%;">
													<dt><?php echo $avl_vote_arr[$i]; ?> 표
															<span style="color:#4455ff; float:right;"><?php echo $avl_per_arr[$i]; ?> %</span>
															<?php /* <span style="loart:right; width:80px;"><?php echo $avl_per_arr[$i]; ?> %</span> */ ?>
													</dt>

													<dt>
															<div class="vote_result_graph" style="position:relative; width:100%; height:10px; background:#dfdfdf;">
																	<span style="position:absolute; top:0; left:0; height:10px; background:#ff6868; font-size:0.1em; width:<?php echo $graph_width; ?>%"></span>
															</div>
													</dt>
											</dl>
									</div>

<?php
					}
					// 끝 => 투표__항목_이미지__있으면
					//===============================================

			}
			// 끝 => 반복문
			//===================================================

							?></div>
					</div>


					<div class="space_10px"></div>


<?php

			//===================================================
			// 시작 => 투표_가능__하면
			IF ($is_possible_vote == 1)
			{
?>
					<div class="btn_confirm" style="clear:both;">
							<a href="javascript:;" onClick="go__vote_view_page('<?php echo $bo_table; ?>', '<?php echo $wr_id; ?>', 'do_form');" class="btn_cancel">투표하기</a>
					</div>
<?php
			}
			// 끝 => 투표_가능__하면
			//===================================================

?>

			</section>

<?php

	}
	// 끝 => 투표_번호__있으면
	//=======================================================

	#########################################################
	# 끝 => 보여주기
	#########################################################


?>