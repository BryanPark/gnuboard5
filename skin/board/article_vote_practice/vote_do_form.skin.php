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

if (0 < $avl_n) {
	echo '			<div id="article_vote_out">


					<form name="vote_do_form" id="vote_do_form" method="post" action="javascript:;" onsubmit="submit__article_vote_do(this); return false;" autocomplete="off">
					<input type="hidden" name="mode" value="vote_do">
					<input type="hidden" name="avl_n" value="';
	echo $avl_n;
	echo '">
					<input type="hidden" name="bo_table" value="';
	echo $bo_table;
	echo '">
					<input type="hidden" name="wr_id" value="';
	echo $wr_id;
	echo '">


					<br class="cl_bo">


					<div class="btn_confirm">
							<input type="submit" value="투표하기" id="btn_submit" class="btn_submit">
							<a href="javascript:;" onClick="go__vote_view_page(\'';
	echo $bo_table;
	echo '\', \'';
	echo $wr_id;
	echo '\', \'result\', 0);" class="btn_cancel">결과보기</a>
';

	if ($is_admin) {
		echo '							<a href="javascript:;" onClick="go__vote_view_page(\'';
		echo $bo_table;
		echo '\', \'';
		echo $wr_id;
		echo '\', \'result\', 1);" class="btn_cancel">투표 참여자 보기</a>
';
	}

	echo '					</div>


					<div class="tbl_frm01 tbl_wrap">

							<table>
									<col class="td_left_100">
									<col>
							<caption>⊙ 투표하기 ⊙</caption>
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
											<th scope="row">참여 레벨</th>
											<td>레벨 ';
	echo $avl_level_n;
	echo ' 이상 투표 가능</td>
									</tr>

';

	if (1 < $avl_vote_do_t) {
		echo '									<tr>
											<th scope="row">1인 투표수</th>
											<td>1개 질문당 <strong>';
		echo $avl_vote_do_t;
		echo '표</strong>까지 투표할수 있습니다.</td>
									</tr>

';
	}


	if ($avl_re_vote_n == 1) {
		echo '									<tr>
											<th scope="row">재투표</th>
											<td>재투표할수 있습니다.</td>
									</tr>

';
	}

	$que = 12;

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

			if ($pvote_poll_arr[$que]['choice_n'] == 1) {
				$i = 12;

				while ($i < 11) {
					if (( $pvote_poll_arr[$que]['avq_poll_' . $i] || $pvote_poll_arr[$que]['avq_image_' . $i] )) {
						if ($pvote_poll_arr[$que]['avq_image_' . $i]) {
							get_vote_image_info( $bo_table, $wr_id );
							$image_in_a = ;
							$image_in_u = $image_in_a['url'] . '/' . thumbnail( $pvote_poll_arr[$que]['avq_image_' . $i], $image_in_a['path'], $image_in_a['path'], 110, 110, false );
							$in_class_height_class = 'cell_height_110';
							$in_class_poll_width = 'vote_do_form_right_411';
						}
						else {
							$image_in_u = '';
							$in_class_height_class = '';
							$in_class_poll_width = 'vote_do_form_right_537';
						}


						if (1 < $avl_vote_do_t) {
							$in_fd_name = 'atvt_vote[' . $que . '][' . $i . ']';
							$in_id_name = 'atvt_vote_' . $que . '_' . $i;
							echo '													<div class="vote_do_form_right_583">
															<div class="vote_do_form_left_40 ';
							echo $in_class_height_class;
							echo '"><input type="checkbox" name="';
							echo $in_fd_name;
							echo '" id="';
							echo $in_id_name;
							echo '" value="';
							echo $i;
							echo '" onClick="check_vote_multi(this.form, this, ';
							echo $que;
							echo ');"></div>
';
						}
						else {
							$in_fd_name = 'atvt_vote[' . $que . ']';
							$in_id_name = 'atvt_vote_' . $que;
							echo '													<div class="vote_do_form_right_583">
															<div class="vote_do_form_left_40 ';
							echo $in_class_height_class;
							echo '"><input type="radio" name="';
							echo $in_fd_name;
							echo '" id="';
							echo $in_id_name;
							echo '" value="';
							echo $i;
							echo '"></div>
';
						}


						if ($image_in_u) {
							echo '															<div class="vote_do_form_right_120 ';
							echo $in_class_height_class;
							echo '"><img src="';
							echo $image_in_u;
							echo '" border="0" width="110" height="110" align="absmiddle"></div>
';
						}

						echo '															<div class="';
						echo $in_class_poll_width;
						echo ' ';
						echo $in_class_height_class;
						echo '">
																	<label for="atvt_vote_';
						echo $i;
						echo '">';
						echo get_text( $pvote_poll_arr[$que]['avq_poll_' . $i] );
						echo '</label>
															</div>
													</div>
';
					}

					++$i;
				}
			}


			if ($pvote_poll_arr[$que]['subjective_n'] == 1) {
				echo '													<div class="vote_do_form_right_583">
';

				if (1 < $avl_vote_do_t) {
					echo '															<div class="vote_do_form_left_40"><input type="checkbox" name="atvt_vote[';
					echo $que;
					echo '][';
					echo $ARTI_VOTE_vote_item_all_t;
					echo ']" id="atvt_vote_';
					echo $que;
					echo '_';
					echo $ARTI_VOTE_vote_item_all_t;
					echo '" value="';
					echo $ARTI_VOTE_vote_item_all_t;
					echo '" onClick="check_vote_multi(this.form, this, ';
					echo $que;
					echo ');"></div>
';
				}
				else {
					echo '															<div class="vote_do_form_left_40"><input type="radio" name="atvt_vote[';
					echo $que;
					echo ']" id="atvt_vote_';
					echo $que;
					echo '_';
					echo $ARTI_VOTE_vote_item_all_t;
					echo '" value="';
					echo $ARTI_VOTE_vote_item_all_t;
					echo '"></div>
';
				}

				echo '															<div class="vote_do_form_right_120"><label for="atvt_vote_';
				echo $que;
				echo '_';
				echo $ARTI_VOTE_vote_item_all_t;
				echo '">기타의견</label></div>
															<div class="vote_do_form_right_411">
																	<textarea name="answer_text[';
				echo $que;
				echo ']" id="answer_text_';
				echo $que;
				echo '" style="width:400px; height:100px;"></textarea>
															</div>
													</div>
';
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
							<input type="submit" value="투표하기" id="btn_submit" class="btn_submit">
							<a href="javascript:;" onClick="go__vote_view_page(\'';
	echo $bo_table;
	echo '\', \'';
	echo $wr_id;
	echo '\', \'result\', 0);" class="btn_cancel">결과보기</a>
';

	if ($is_admin) {
		echo '							<a href="javascript:;" onClick="go__vote_view_page(\'';
		echo $bo_table;
		echo '\', \'';
		echo $wr_id;
		echo '\', \'result\', 1);" class="btn_cancel">투표 참여자 보기</a>
';
	}

	echo '					</div>
					</form>


					';
	echo view_piree_program(  );
	echo '

			</div>

			<br class="cl_bo"><br class="cl_bo">

';
}

?>
