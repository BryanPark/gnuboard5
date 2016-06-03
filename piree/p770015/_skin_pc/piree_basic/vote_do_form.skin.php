<?php
/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 12월 30일 화요일 오전 01시 19분 - 날씨 추버 추버~~ 낮에는 안추웠는데 지금은 무쟈게 춥다

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 게시판 > 스킨 > 피리 게시글에 투표 > 투표 하기 폼
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
	# 시작 => 보여주기
	#########################################################

	//=======================================================
	// 시작 => 투표_번호__있으면
	IF ($avl_n > 0)
	{

?>
			<div id="article_vote_out">


					<form name="vote_do_form" id="vote_do_form" method="post" action="javascript:;" onsubmit="submit__article_vote_do(this); return false;" autocomplete="off">
					<input type="hidden" name="mode" value="vote_do">
					<input type="hidden" name="avl_n" value="<?php echo $avl_n; ?>">
					<input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>">
					<input type="hidden" name="wr_id" value="<?php echo $wr_id; ?>">

					<div class="tbl_frm01 tbl_wrap" style="line-height:1.6em;">

							<table>
									<col class="td_left_100">
									<col>
							<caption>⊙ 투표하기 ⊙</caption>
							<tbody>
									<tr>
											<th scope="row">투표 제목</th>
											<td><strong><?php echo $avl_title_s ?></strong></td>
									</tr>

									<tr>
											<th scope="row">투표 마감</th>
											<td><?php

											//===================================
											// 투표_마감__날짜_시간
											echo (date("Y년 m월 d일 H시 i분", $avl_end_time_n));


									//=======================================
									// 시작 => 투표_마감__되었으면
									IF (G5_SERVER_TIME > $avl_end_time_n)
									{

											echo " &nbsp; (투표 마감 되었습니다.)";
											
									}
									// 끝 => 투표_마감__되었으면
									//=======================================

											?></td>
									</tr>

									<tr>
											<th scope="row">참여 레벨</th>
											<td>레벨 <?php echo $avl_level_n ?> 이상 투표 가능</td>
									</tr>

<?php

							//===========================================
							// 시작 => 1인_투표수__다수_이면
							IF ($avl_vote_do_t > 1)
							{
?>
									<tr>
											<th scope="row">1인 투표수</th>
											<td><?php echo $avl_vote_do_t ?> 표까지 투표할수 있습니다.</td>
									</tr>

<?php
							}
							// 끝 => 1인_투표수__다수_이면
							//===========================================


							//===========================================
							// 시작 => 투표_가능__여부
							IF ($avl_re_vote_n == 1)
							{
?>
									<tr>
											<th scope="row">재투표</th>
											<td>재투표할수 있습니다.</td>
									</tr>

<?php
							}
							// 끝 => 투표_가능__여부
							//===========================================

?>

									<tr>
											<th scope="row">투표 항목</th>
											<td>

													<table>
															<col class="td_center_40">
															<?php IF ($avl_image_t > 0) { ?><col class="td_left_120"><?php } ?>
															<col>
															<tbody>
<?php

											//===================================
											// 시작 => 반복문
											FOR ($i=1; $i<=$ARTI_VOTE_vote_item_t; $i++)
											{

													//===============================
													// 시작 => 투표항목__또는__이미지__있으면
													IF ($avl_poll_arr[$i] || $avl_image_arr[$i])
													{

															//===========================
															// 시작 => 이미지__유무
															IF ($avl_image_arr[$i])
															{

																	#########################
																	# 시작 => 이미지__있으면

																	// 이미지__폴더_이름_정보__가져오기
																	$image_in_a = get_vote_image_info($bo_table, $wr_id);

																	// 이미지__URL
																	$image_in_u = $image_in_a['url'].'/'.thumbnail($avl_image_arr[$i], $image_in_a['path'], $image_in_a['path'], 110, 110, false);

															}
															ELSE
															{

																	#########################
																	# 시작 => 이미지__없음

																	// 이미지__URL
																	$image_in_u = "";

															}
															// 끝 => 이미지__유무
															//===========================

?>
															<tr class="vote_item">
																	<td>
																	<?php

																	//=======================
																	// 시작 => 중복투표__구분
																	IF ($avl_vote_do_t > 1)
																	{

																			#####################
																			# 시작 => 중복투표__가능
																			?><input type="checkbox" name="atvt_vote[<?php echo $i; ?>]" id="atvt_vote_<?php echo $i; ?>" value="<?php echo $i; ?>" onClick="check_vote_multi(this.form, this);"><?php
																	}
																	ELSE
																	{

																			#####################
																			# 시작 => 중복투표__불가
																			?><input type="radio" name="atvt_vote_n" id="atvt_vote_<?php echo $i; ?>" value="<?php echo $i; ?>"><?php

																	}
																	// 끝 => 중복투표__구분
																	//=======================

																	?></td>
																	<?php IF ($avl_image_t > 0) { ?><td><?php IF ($image_in_u) { ?><img src="<?php echo $image_in_u; ?>" border="0" width="110" height="110" align="absmiddle"><?php } ?></td><?php } ?>
																	<td><label for="atvt_vote_<?php echo $i; ?>"><?php echo $avl_poll_arr[$i]; ?></label></td>
															</tr>
<?php
													}
													// 끝 => 투표항목__또는__이미지__있으면
													//===============================

											}
											// 끝 => 반복문
											//===================================

?>
															</tbody>
													</table>

											</td>
									</tr>

							</tbody>
							</table>

					</div>


					<div class="btn_confirm">
							<input type="submit" value="투표하기" id="btn_submit" class="btn_submit">
							<a href="javascript:;" onClick="go__vote_view_page('<?php echo $bo_table; ?>', '<?php echo $wr_id; ?>', 'result');" class="btn_cancel">결과보기</a>
					</div>
					</form>


			</div>

<?php

	}
	// 끝 => 투표_번호__있으면
	//=======================================================

	#########################################################
	# 끝 => 보여주기
	#########################################################


?>