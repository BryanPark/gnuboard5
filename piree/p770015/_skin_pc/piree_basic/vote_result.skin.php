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
			<div id="article_vote_out">


					<div class="tbl_frm01 tbl_wrap" style="line-height:1.6em;">

							<table>
									<col class="td_left_100">
									<col>
							<caption>⊙ <?php echo $avl_title_s ?> ⊙</caption>
							<tbody>

									<tr>
											<th scope="row">투표 마감</th>
											<td><?php

											//===================================
											// 투표_마감__날짜_시간
											echo (date("Y년 m월 d일 H시 i분까지", $avl_end_time_n));


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
											<th scope="row">총 투표</th>
											<td><?php

											//===================================
											// 시작 => 총_투표_수__참여_인원_수__비교
											IF ($avl_vote_mem_t == $avl_vote_all_t)
											{
													# 시작 => 총_투표_수__참여_인원_수__같다
													?><strong><?php echo number_format($avl_vote_all_t); ?></strong>표<?php
											}
											ELSE
											{
													# 시작 => 총_투표_수__참여_인원_수__다르다
													?><strong><?php echo number_format($avl_vote_mem_t); ?></strong>명이 <strong><?php echo number_format($avl_vote_all_t); ?></strong>표를 투표 했습니다.<?php
											}
											// 끝 => 총_투표_수__참여_인원_수__비교
											//===================================

											?></td>
									</tr>

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
													// 시작 => 투표__항목_이미지__있으면
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
																	$image_in_u = $image_in_a['url'].'/'.thumbnail($avl_image_arr[$i], $image_in_a['path'], $image_in_a['path'], 110, 110, true);
																	//echo $image_in_u;

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


															//===========================
															// 그래프_넓이
															$graph_width = $avl_per_arr[$i] > 0 ? (int)$avl_per_arr[$i] : 0;

?>
															<tr class="vote_item" id="vote_item_<?=$i?>">
																	<td><?php echo $i; ?>.</td>
																	<?php IF ($avl_image_t > 0) { ?><td><?php IF ($image_in_u) { ?><img src="<?php echo $image_in_u; ?>" border="0" align="absmiddle" width="110px"><?php } ?></td><?php } ?>
																	<td>
																			<dl style="width:380px; line-height:2.4em;">
																					<?php IF ($avl_poll_arr[$i]) { ?><dt><strong><?php echo $avl_poll_arr[$i]; ?></strong></dt><?php } ?>
																					<dt><?php echo $avl_vote_arr[$i]; ?> 표
																							<span style="color:#4455ff; float:right;"><?php echo $avl_per_arr[$i]; ?> %</span>
																							<?php /* <span style="loart:right; width:80px;"><?php echo $avl_per_arr[$i]; ?> %</span> */ ?>
																					</dt>
																			
																					<?php IF ($avl_vote_arr[$i] > 0) { ?>
																					<dt>
																							<div class="vote_result_graph" style="position:relative; width:380px; height:10px; background:#dfdfdf;">
																									<span style="position:absolute; top:0; left:0; height:10px; background:#ff6868; font-size:0.1em; width:<?php echo $graph_width; ?>%"></span>
																							</div>
																					</dt>
																					<?php } ?>
																			</dl>
																	</td>
															</tr>
<?php
													}
													// 끝 => 투표__항목_이미지__있으면
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


<?php

			//===================================================
			// 시작 => 투표_가능__하면
			//added by BryanPark
			## 맴버일 경우에는 $bo_table, $wr_id, $member 변수를 줘서 result에서 검색해서
			## 투표 여부를 확인하고 이미 투표한 사람인 경우 결과보기를 disable 함.
			## $is_possible_vote == 1 이다 => 투표 가능한 레벨의 회원. 즉 비회원 및 저레벨은 해당 X 
			#아래의 버튼을 $voted_or_not이 값이 있으면 ''로 하고
			#투표 안했으면 투표할수 있는거니까 클릭시 실행해야할 자바스크립트 관련 attr을 삽입시킨다.
			IF ($is_possible_vote == 1)
			{
				$voted_or_not = get__is_already_voted($member['mb_id'],$bo_table, $wr_id);
				$revotable = get__is_revotable($bo_table, $wr_id);
				IF(!$voted_or_not || $revotable){ // 투표 이미 하지 않았어야만 투표하기 버튼 출력.
?>
					<div class="btn_confirm">
						<a href="javascript:;" onClick='go__vote_view_page("<?=$bo_table?>","<?=$wr_id?>","do_form");' class="btn_cancel"  >투표하기</a>
					</div>
<?php
				}else{
?>
					<div class="btn_confirm">
						<a href="javascript:;" onClick='getElementById("err_msg").style.display="";' class="btn_cancel"  >투표하기</a>
						<b style="display:none; border: 1px solid cccccc;" id="err_msg">이미 투표하셨습니다</b>
					</div>
<?php
				}
			}
			// 끝 => 투표_가능__하면
			//===================================================

?>

			</div>

<?php

	}
	// 끝 => 투표_번호__있으면
	//=======================================================

	#########################################################
	# 끝 => 보여주기
	#########################################################


?>

<script>

		// vote_item 스타일 변화 클릭시, 마우스오버시.
		$("[id^=vote_item]").mouseenter(function(){
			$(this).addClass("emp");
		});
		$("[id^=vote_item]").mouseleave(function(){
			$(this).removeClass("emp");
		});
</script>