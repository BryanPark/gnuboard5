<?php
/**
 *
 * @ This file is created by DeZend.Org
 * @ DeZend (PHP5 Decoder for ionCube Encoder)
 *
 * @	Version			:	1.1.7.0
 * @	Author			:	TuhanTS
 * @	Release on		:	25.02.2013
 * @	Official site	:	http://DeZend.Org
 *
 */

if (!defined( '_GNUBOARD_' )) {
	exit(  );
}

include_once( G5_LIB_PATH . '/thumbnail.lib.php' );

if (0 < $avl_image_t) {
	$cell_image_width_class = 'vote_do_form_right_120';
	$cell_graph_width_class = 'vote_do_form_right_411';
	$graph_width_out = 423;
}
else {
	$cell_image_width_class = 'vote_do_form_right_20';
	$cell_graph_width_class = 'vote_do_form_right_511';
	$graph_width_out = 493;
}


if (0 < $avl_n) {
	echo '			<div id="article_vote_out">


					<br class="cl_bo">


					<div class="btn_confirm">
';

	if ($is_possible_vote == 1) {
		echo '							<a href="javascript:;" onClick="go__vote_view_page(\'';
		echo $bo_table;
		echo '\', \'';
		echo $wr_id;
		echo '\', \'do_form\', 0);" class="btn_cancel">투표하기</a>
';
	}


	if (( $view_person != 1 && $is_admin )) {
		echo '							<a href="javascript:;" onClick="go__vote_view_page(\'';
		echo $bo_table;
		echo '\', \'';
		echo $wr_id;
		echo '\', \'result\', 1);" class="btn_cancel">투표 참여자 보기</a>
';
	}
	else {
		echo '							<a href="javascript:;" onClick="go__vote_view_page(\'';
		echo $bo_table;
		echo '\', \'';
		echo $wr_id;
		echo '\', \'result\', 0);" class="btn_cancel">결과보기</a>
';
	}

	echo '					</div>


					<div class="tbl_frm01 tbl_wrap">

							<table>
									<col class="td_left_100">
									<col>
							<caption>⊙ 투표 결과 보기 ';

	if ($view_person == 1) {
		echo '- 투표 참여자 보기';
	}

	echo '⊙</caption>
							<tbody>
									<tr>
											<th scope="row">투표 제목</th>
											<td><strong>';
	echo $avl_title_s;
	echo '</strong></td>
									</tr>

									<tr>
											<th scope="row">투표 마감</th>
											<td>';
	echo date( 'Y년 m월 d일 H시 i분', $avl_end_time_n );

	if ($avl_end_time_n < G5_SERVER_TIME) {
		echo ' &nbsp; (투표 마감 되었습니다.)';
	}

	echo '</td>
									</tr>

									<tr>
											<th scope="row">총 투표</th>
											<td>';

	if ($avl_vote_mem_t == $avl_vote_all_t) {
		echo '<strong>';
		echo number_format( $avl_vote_all_t );
		echo '</strong>표';
	}
	else {
		echo '<strong>';
		echo number_format( $avl_vote_mem_t );
		echo '</strong>명이 <strong>';
		echo number_format( $avl_vote_all_t );
		echo '</strong>표를 투표 했습니다.';
	}

	echo '</td>
									</tr>

';
	$que = 14;

	while ($que < 11) {
		if ($pvote_poll_arr[$que]['que_s']) {
			echo '									<tr>
											<th scope="row">투표 #';
			echo $que;
			echo '</th>
											<td>

													<div class="vote_do_form_right_title cell_height_36">
															<strong>';
			echo get_text( $pvote_poll_arr[$que]['que_s'] );
			echo '</strong>
													</div>

';
			$i = 14;

			while ($i <= $ARTI_VOTE_vote_item_all_t) {
				$in_key = $que . '_' . $i;

				if ($pvote_poll_arr[$que]['choice_n'] == 1) {
					if (( $pvote_poll_arr[$que]['avq_poll_' . $i] || $pvote_poll_arr[$que]['avq_image_' . $i] )) {
						if ($pvote_poll_arr[$que]['avq_image_' . $i]) {
							get_vote_image_info( $bo_table, $wr_id );
							$image_in_a = ;
							$image_in_u = $image_in_a['url'] . '/' . thumbnail( $pvote_poll_arr[$que]['avq_image_' . $i], $image_in_a['path'], $image_in_a['path'], 110, 110, false );
						}
						else {
							$image_in_u = '';
						}

						$graph_width_in = (0 < $pvote_poll_arr[$que]['avq_per_' . $i] ? (int)$pvote_poll_arr[$que]['avq_per_' . $i] : 0);
						echo '													<div class="vote_do_form_right_583">
															<div class="vote_do_form_left_40">';
						echo $i;
						echo '.</div>
';

						if ($image_in_u) {
							echo '															<div class="';
							echo $cell_image_width_class;
							echo '"><img src="';
							echo $image_in_u;
							echo '" border="0" width="110" height="110" align="absmiddle"></div>
';
						}
						else {
							echo '															<div class="';
							echo $cell_image_width_class;
							echo '">&nbsp;</div>
';
						}

						echo '															<div class="';
						echo $cell_graph_width_class;
						echo ' cell_height_auto">

																	';

						if ($pvote_poll_arr[$que]['avq_poll_' . $i]) {
							echo '<div class="cl_bo"><strong>';
							echo get_text( $pvote_poll_arr[$que]['avq_poll_' . $i] );
							echo '</strong></div>';
						}

						echo '																	<div class="cl_bo">';
						echo $pvote_poll_arr[$que]['avq_vote_' . $i];
						echo ' 표
																			<span style="color:#4455ff; float:right;">';
						echo $pvote_poll_arr[$que]['avq_per_' . $i];
						echo ' %</span>
																			';
						echo '																	</div>

																	';

						if (0 < $pvote_poll_arr[$que]['avq_vote_' . $i]) {
							echo '																	<div class="cl_bo">
																			<div class="vote_graph_out" style="width:';
							echo $graph_width_out;
							echo 'px;">
																					<span class="vote_graph_blue" style="width:';
							echo $graph_width_in;
							echo '%;"></span>
																			</div>
																	</div>
																	';
						}

						echo '
';

						if (0 < count( $vote_person_arr[$in_key] )) {
							echo '																	<!-- 시작 => 투표_참여자_명단 -->
																	<div class="vote_peoson_out">
';
							each( $vote_person_arr[$in_key] )[1];
							$val_i = ;
							[0];
							$key_i = ;

							if () {
								explode( '{EX}', $val_i )[1];
								$in_mb_nick = ;
								[0];
								$in_mb_id = ;
								echo '																			<div class="vote_peoson_member">';
								echo $in_mb_nick;
								echo ' <span class="font_999">(';
								echo $in_mb_id;
								echo ')</span></div>
																			<div class="vote_peoson_comment">&nbsp;</div>
';
							}

							echo '																	</div>
																	<!-- 끝 => 투표_참여자_명단 -->
';
						}

						echo '
															</div>
													</div>

';
					}
				}


				if ($pvote_poll_arr[$que]['subjective_n'] == 1) {
					if (( $i == $ARTI_VOTE_vote_item_all_t && $pvote_poll_arr[$que]['subjective_n'] == 1 )) {
						$graph_width_in = (0 < $pvote_poll_arr[$que]['avq_per_' . $i] ? (int)$pvote_poll_arr[$que]['avq_per_' . $i] : 0);
						echo '													<div class="vote_do_form_right_583">
															<div class="vote_do_form_left_40 cell_height_72"></div>
															<div class="';
						echo $cell_image_width_class;
						echo '">';

						if (0 < $avl_image_t) {
							echo '<span class="font_777">기타의견</span>';
						}
						else {
							echo '&nbsp;';
						}

						echo '</div>
															<div class="';
						echo $cell_graph_width_class;
						echo '">

																	<div class="cl_bo"><strong>주관식, 기타의견 입니다.</strong></div>
																	<div class="cl_bo">';
						echo $pvote_poll_arr[$que]['avq_vote_' . $i];
						echo ' 표
																			<span style="color:#4455ff; float:right;">';
						echo $pvote_poll_arr[$que]['avq_per_' . $i];
						echo ' %</span>
																			';
						echo '																	</div>

																	';

						if (0 < $pvote_poll_arr[$que]['avq_vote_' . $i]) {
							echo '																	<div class="cl_bo">
																			<div class="vote_graph_out" style="width:';
							echo $graph_width_out;
							echo 'px;">
																					<span class="vote_graph_blue" style="width:';
							echo $graph_width_in;
							echo '%;"></span>
																			</div>
																	</div>
																	';
						}

						echo '
';

						if (0 < count( $vote_person_arr[$in_key] )) {
							echo '																	<!-- 시작 => 투표_참여자_명단 -->
																	<div class="vote_peoson_out">
';
							each( $vote_person_arr[$in_key] )[1];
							$val_i = ;
							[0];
							$key_i = ;

							if () {
								explode( '{EX}', $val_i )[2];
								$in_comment = ;
								[1];
								$in_mb_nick = ;
								[0];
								$in_mb_id = ;
								echo '																			<div class="vote_peoson_member">';
								echo $in_mb_nick;
								echo ' <span class="font_999">(';
								echo $in_mb_id;
								echo ')</span></div>
																			<div class="vote_peoson_comment"><span class="font_555">';
								echo get_text( $in_comment );
								echo '</span></div>
';
							}

							echo '																	</div>
																	<!-- 끝 => 투표_참여자_명단 -->
';
						}

						echo '
															</div>
													</div>

';
					}
				}

				++$i;
			}

			echo '
													<br class="cl_bo"><br class="cl_bo">

											</td>
									</tr>
';
		}

		++$que;
	}

	echo '
							</tbody>
							</table>

					</div>


					<div class="btn_confirm">
';

	if ($is_possible_vote == 1) {
		echo '							<a href="javascript:;" onClick="go__vote_view_page(\'';
		echo $bo_table;
		echo '\', \'';
		echo $wr_id;
		echo '\', \'do_form\', 0);" class="btn_cancel">투표하기</a>
';
	}


	if (( $view_person != 1 && $is_admin )) {
		echo '							<a href="javascript:;" onClick="go__vote_view_page(\'';
		echo $bo_table;
		echo '\', \'';
		echo $wr_id;
		echo '\', \'result\', 1);" class="btn_cancel">투표 참여자 보기</a>
';
	}
	else {
		echo '							<a href="javascript:;" onClick="go__vote_view_page(\'';
		echo $bo_table;
		echo '\', \'';
		echo $wr_id;
		echo '\', \'result\', 0);" class="btn_cancel">결과보기</a>
';
	}

	echo '					</div>


					';
	echo view_piree_program(  );
	echo '

			</div>

';
}

?>
