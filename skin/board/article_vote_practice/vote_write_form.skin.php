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

include_once( G5_PLUGIN_PATH . '/jquery-ui/datepicker.php' );

/*if (( !$ARTI_VOTE_prog_u || !$ARTI_VOTE_prog_p )) {
	$piree_menu_n = 760046;
	$is_get__piree_config = 12;
	$is_get__article_vote = 13;
	include_once( get__sam_file( $piree_menu_n, '' ) );
}*/
$ARTI_VOTE_SKIN_PC_u = G5_SKIN_URL."/board/article_vote_practice";
$ARTI_VOTE_vote_item_t = 5;
$ARTI_VOTE_vote_image_ok_n = 1;
$ARTI_VOTE_vote_regi_level_n=2;
$ARTI_VOTE_vote_end_minute_term_n=10;

$atvt = array(
	'atvt_n' => 5,
	'atvt_vote_do_t' =>  5

	);
$atvt_title_s = "투표제목입니다.";
$atvt_end_date_s ="2016-05-15";
$atvt_re_vote_n = 1;



function echo_help($help_s = '') {
	global $g5;

	$str = '<span class=\'font_green\'>' . str_replace( '
', '<br />', $help_s ) . '</span>';
	echo $str;
}
function get_member_level_select__piree($name, $start_id = 0, $end_id = 10, $selected = '', $event = '', $disabled = '') {
	global $g5;

	$str = '<select id="' . $name . '" name="' . $name . '"';

	if ($event) {
		$str .= ' ' . $event;
	}


	if ($disabled) {
		$str .= ' ' . $disabled;
	}

	$str .= '>';
	//$i = $name;
	$i = 0;
	while ($i <= $end_id) {
		$str .= '<option value="' . $i . '"';

		if ($i == $selected) {
			$str .= ' selected="selected"';
		}

		$str .= ( '>' ) . $i . '</option>';
		++$i;
	}

	$str .= '</select>';
	return $str;
}



$atvt_vote_do_t = 13;
//date( 'H' );
$atvt_end_date_H = date( 'H' );
//date( 'i' );
$atvt_end_date_i = date( 'i' );

if (0 < $atvt['atvt_n']) {
	//$atvt['atvt_vote_do_t'];
	$atvt_vote_do_t = $atvt['atvt_vote_do_t'];
}

add_javascript( '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>', 75 );
add_javascript( '<script src="//mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>', 76 );
add_javascript( '<script src="' . $ARTI_VOTE_SKIN_PC_u . '/vote_write_form.js"></script>', 77 );
add_stylesheet( '<link rel="stylesheet" href="//mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.css">', 75 );
add_stylesheet( '<link rel="stylesheet" href="' . $ARTI_VOTE_SKIN_PC_u . '/style.css">', 76 );

if (0 < $ARTI_VOTE_vote_item_t) {
	$div_height_s = ($ARTI_VOTE_vote_image_ok_n == 1 ? 'cell_height_72' : 'cell_height_36');
	echo '			<script>
					$(function(){
							// 날짜_선택
							$(\'#atvt_end_date_s\').appendDtpicker({ \'locale\':\'ko\', \'autodateOnStart\':false, \'minuteInterval\':';
	echo $ARTI_VOTE_vote_end_minute_term_n;
	echo ' });
					});
			</script>


			<br class="cl_bo"><br class="cl_bo">


			<div class="tbl_wrap">
					<input type="checkbox" name="wr_use_arti_vote_n" id="wr_use_arti_vote_n" value="1" >
					<label for="wr_use_arti_vote_n"><span class="str_3334dd_bold_11">"게시글에 투표"를 사용하시려면 체크해 주세요.</span><strong class="sound_only">선택</strong></label>
			</div>
			<br class="cl_bo">


			<div id="vote_write_form" class="tbl_frm01 tbl_wrap">
					<table>
					<tbody>
					<tr>
							<th scope="row"><label for="atvt_title_s">투표 제목<strong class="sound_only">필수</strong></label></th>
							<td><input type="text" name="atvt_title_s" id="atvt_title_s" value="';
	echo $atvt_title_s;
	echo '" class="frm_input" style="width:450px;" maxlength="255"></td>
					</tr>

					<tr>
							<th scope="row"><label for="atvt_end_date_s">투표 마감<strong class="sound_only">필수</strong></label></th>
							<td>
									<div class="line_h_2_4">
											<input type="text" name="atvt_end_date_s" id="atvt_end_date_s" value="';
	echo $atvt_end_date_s;
	echo '" class="frm_input" style="width:120px;">
											<br />
											';
	echo_help( '입력칸을 클릭(터치) 하시면 "날짜", "시간"을 선택할수 있는 창이 뜹니다.' );
	echo '											<br />
											';
	echo_help( '선택할수 있는 창이 뜨면 "날짜", "시간"을 선택하시면 됩니다.' );
	echo '									</div>
							</td>
					</tr>

					<tr>
							<th scope="row"><label for="vote_do_level_n">투표 레벨<strong class="sound_only">필수</strong></label></th>
							<td>
									<div class="line_h_2_8">
											';
											/*$config['mem_max_level_n']*/
	echo get_member_level_select__piree( 'vote_do_level_n', 2, 2, $ARTI_VOTE_vote_regi_level_n );
	echo '											<br />
											';
	echo_help( '투표에 참여할수 있는 회원 레벨을 선택해 주세요.' );
	echo '									</div>
							</td>
					</tr>

					<tr>
							<th scope="row">다중 투표</th>
							<td>
									<div class="line_h_2_8">
';
	$i = 1; //13

	while ($i < 11) {
		$checked = ($atvt_vote_do_t == $i ? ' checked' : '');
		echo '<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_' . $i . '" value="' . $i . '"' . $checked . '> <label for="atvt_vote_do_' . $i . '">' . $i . '표</label> &nbsp;';
		++$i;
	}

	echo '											<br />
											';
	echo_help( '한번 투표할때 몇표까지 선택할수 있는지 입력해 주세요.' );
	echo '									</div>
							</td>
					</tr>

					<tr>
							<th scope="row"><label for="atvt_re_vote_n">재투표<strong class="sound_only">선택</strong></label></th>
							<td>
									<div class="line_h_2_8">
											<input type="checkbox" name="atvt_re_vote_n" id="atvt_re_vote_n" value="1"';

	if ($atvt_re_vote_n == 1) {
		echo ' checked';
	}

	echo '> <label for="atvt_re_vote_n">
											재투표를 허용합니다.
											<br />
											';
	echo_help( '투표를 하고 나중에 다시 투표하는것을 허용합니다.' );
	echo '									</div>
							</td>
					</tr>

';
	//$que = 13;
	$que = 1;

	while ($que < 3) {
		echo '					<tr>
							<th scope="row">투표 #';
		echo $que;
		echo '</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#';
		echo $que;
		echo '.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_';
		echo $que;
		echo '" id="atvt_que_';
		echo $que;
		echo '" value="';
		//echo ${'atvt_que_' . $que};
		echo '" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_';
		echo $que;
		echo '" id="avl_choice_';
		echo $que;
		echo '" value="1"';

		//if (( !${'avl_choice_' . $que} || ${'avl_choice_' . $que} == 1 )) {
			echo ' checked="checked"';
		//}

		echo ' onclick="vote_type_check(this.form, ';
		echo $que;
		echo ');">
											<label for="avl_choice_';
		echo $que;
		echo '" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp;
											<input type="checkbox" name="avl_subjective_';
		echo $que;
		echo '" id="avl_subjective_';
		echo $que;
		echo '" value="1"';

		//if (( !${'avl_subjective_' . $que} || ${'avl_subjective_' . $que} == 1 )) {
			echo ' checked="checked"';
		//}

		echo ' onclick="vote_type_check(this.form, ';
		echo $que;
		echo ');">
											<label for="avl_subjective_';
		echo $que;
		echo '" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
';
		$i = 13;

		while ($i < 11) {
			$fd_name_tail = $que . '_' . $i;
			echo '									<div class="vote_write_form_left ';
			echo $div_height_s;
			echo '"><strong>#';
			echo $que;
			echo '.</strong> 항목 ';
			echo $i;
			echo '</div>
									<div class="vote_write_form_right ';
			echo $div_height_s;
			echo '">
											<input type="text" name="atvt_poll_';
			echo $fd_name_tail;
			echo '" id="atvt_poll_';
			echo $fd_name_tail;
			echo '" value="';
			echo ${'atvt_poll_' . $que . '_' . $i};
			echo '" class="frm_input vote_que_input_470" maxlength="255">
';

			if ($ARTI_VOTE_vote_image_ok_n == 1) {
				echo '											<br />
											<input type="file" name="atvt_image_';
				echo $fd_name_tail;
				echo '" id="atvt_image_';
				echo $fd_name_tail;
				echo '" value="';
				echo ${'atvt_image_' . $que . '_' . $i};
				echo '" class="frm_input vote_que_input_470">
';
			}

			echo '									</div>
';
			++$i;
		}

		echo '						 </td>
					</tr>
';
		++$que;
	}

	echo '					</tbody>
					</table>


					';
	//echo view_piree_program(  );
	echo '

			</div>

			<br class="cl_bo"><br class="cl_bo">

';
}

?>
