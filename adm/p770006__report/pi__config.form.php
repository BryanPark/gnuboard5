<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 03월 07일 금요일 오전 06시 28분, 날씨 꽃샘추위 위세가 좀 쎄다, 쌀쌀하다

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 관리자 > 피리 신고하기 PLUS G5 > 설정 정보 수정 폼
===========================================================


*/


	#########################################################
	# 시작 => 선_처리__메뉴_지정__관리자_확인
	#########################################################

	//=======================================================
	// 메뉴_번호__지정____신고하기
	$sub_menu = "770006";


	//=======================================================
	// 기본처리_파일__첨부
	include_once('./_common.php');


	//=======================================================
	// 시작 => 회원_아니면
	IF (!$is_member)
	{
		// 경고창
		alert('회원만 이용하실 수 있습니다.', G5_URL);
	}
	// 끝 => 회원_아니면
	//=======================================================


	//=======================================================
	// 관리자_확인
	auth_check($auth[$sub_menu], 'r');

	#########################################################
	# 끝 => 선_처리
	#########################################################



	#########################################################
	# 시작 => 신고하기__설정_정보_파일__첨부
	#########################################################

	//=======================================================
	// 기본_설정_첨부__여부
	// 0 - 안해
	// 1 - 하자
	$is_get__piree_config = 1;


	//=======================================================
	// 신고하기__설정_정보__가져오기
	$is_get__report = 1;


	//=======================================================
	// 설정_화면__여부
	$is_piree_program_config = 1;


	//=======================================================
	// 신고하기__설정_정보_파일__경로
	$piree_dir_path = PIREE_CONFIG_PATH ."/p__".$sub_menu."/pi__config.php";


	//=======================================================
	// 신고하기__설정_정보_파일__경로
	include_once($piree_dir_path);

	#########################################################
	# 끝 => 신고하기__설정_정보_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 스킨
	#########################################################

	//=======================================================
	// PC_스킨
	$skin_pc_c = $report_config['skin_pc_c'];


	//=======================================================
	// 모바일_스킨
	$skin_mobile_c = $report_config['skin_mobile_c'];

	#########################################################
	# 끝 => 스킨
	#########################################################



	#########################################################
	# 시작 => 상수__변수__배열__기타
	#########################################################

	//=======================================================
	// 블라인드__처리할__신고_건수
	$blind_do_t = $report_config["blind_do_t"];


	//=======================================================
	// 신고_가능한__레벨
	$report_do_level_n = $report_config["report_do_level_n"];


	//=======================================================
	// 신고_면제_할__레벨
	$exemption_level_n = $report_config["exemption_level_n"];


	//=======================================================
	// 신고_면제_할__가입일수
	$exemption_day_n = $report_config["exemption_day_n"];


	//=======================================================
	// 신고_한__회원의_포인트
	$report_do_point_n = $report_config["report_do_point_n"];


	//=======================================================
	// 신고_당한__회원의_포인트
	$report_get_point_n = $report_config["report_get_point_n"];


	//=======================================================
	// 무분별한__신고시_신고_한__회원의_포인트
	$report_rash_point_n = $report_config["report_rash_point_n"];


	//=======================================================
	// 무분별한_신고시__신고_권한__제한
	$report_rash_auth_n = $report_config["report_rash_auth_n"];

	#########################################################
	# 끝 => 상수__변수__배열__기타
	#########################################################



	#########################################################
	# 시작 => 마무리__페이지_ECHO_관련
	#########################################################

	//=======================================================
	// 타이틀
	$g5['title'] = "피리 신고하기 PLUS G5";


	//=======================================================
	// HEAD_첨부
	include_once("../admin.head.php");

	#########################################################
	# 끝 => 마무리__페이지_ECHO_관련
	#########################################################


?>

<section>
		<h2>신고하기 정보 수정하기</h2>

		<form name="level_list" id="level_list" action="./pi__config.update.php" onsubmit="return submit__level_helper(this);" method="post">

		<div class="tbl_frm01 tbl_wrap">
				<table>
				<tbody>

				<tr>
					<th scope="row"><label for="skin_pc_label">PC 스킨<strong class="sound_only">선택입력</strong></label></th>
					<td>
						<select id="skin_pc_label" name="skin_pc_c">
<?php

						//=============================================
						// PC__스킨_목록__가져오기
						$skins = get_skin_dir($report_config['prog_dir'], PIREE_SKIN_PC_PATH);


						//=============================================
						// 시작 => 반복문
						FOR ($i=0; $i<count($skins); $i++)
						{
							// 선택_여부
							$selected = $skin_pc_c == $skins[$i] ? " selected" : "";
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
						<select id="skin_mobile_label" name="skin_mobile_c">
<?php

						//=============================================
						// 모바일__스킨_목록__가져오기
						$skins = get_skin_dir($report_config['prog_dir'], PIREE_SKIN_MOBILE_PATH);


						//=============================================
						// 시작 => 반복문
						FOR ($i=0; $i<count($skins); $i++)
						{
							// 선택_여부
							$selected = $skin_mobile_c == $skins[$i] ? " selected" : "";
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
					<th scope="row"><label for="blind_do_t_label">블라인드 처리할 신고 건수<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="blind_do_t" value="<?php echo $blind_do_t; ?>" id="blind_do_t_label" class="frm_input" size="10">
						<br />
						입력한 회수만큼 신고 받으면 ( 게시글, 댓글 )을 블라인트 처리 합니다.
						<br />
						미입력시 신고받아도 블라인드 처리하지 않습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="report_do_level_n_label">신고 가능한 레벨<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="report_do_level_n" value="<?php echo $report_do_level_n; ?>" id="report_do_level_n_label" class="frm_input" size="10">
						<br />
						입력하신 레벨 이상 회원은 "신고하기" 할수 있습니다.
						<br />
						미입력시 모든 회원이 "신고하기" 할수 있습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="exemption_level_n_label">신고 면제 할 레벨<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="exemption_level_n" value="<?php echo $exemption_level_n; ?>" id="exemption_level_n_label" class="frm_input" size="10">
						<br />
						입력하신 레벨 이상인 회원을 대상으로 "신고하기" 할수 없습니다. ( 신고 대상 면제하는 특권 )
						<br />
						예) "5"를 입력하면 회원레벨 5 이상 회원은 신고할수 없습니다.
						<br />
						미입력시 모든 회원이 "신고 대상" 이 됩니다. 최고관리자를 제외한 모든 회원을 신고하기 할수 있습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="exemption_day_n_label">신고 면제 할 가입일수<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="exemption_day_n" value="<?php echo $exemption_day_n; ?>" id="exemption_day_n_label" class="frm_input" size="10">
						<br />
						"가입후 입력한 날짜수" 만큼 지난 회원을 대상으로 "신고하기" 할수 없습니다. ( 신고 대상 면제하는 특권 )
						<br />
						예) "100"을 입력하면 가입후 100일 지난 회원을 신고할수 없습니다.
						<br />
						미입력시 모든 회원이 "신고 대상" 이 됩니다. 최고관리자를 제외한 모든 회원을 신고하기 할수 있습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="report_do_point_n_label">신고 한 회원의 포인트<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="report_do_point_n" value="<?php echo $report_do_point_n; ?>" id="report_do_point_n_label" class="frm_input" size="10"> 점
						<br />
						신고할때 신고한 회원의 포인트 ( 지급, 차감을 선택할수 있음 ), 입력 않하시면 포인트 변동 없음
						<br />
						예) 1점 지급 하시려면 "1" 을 입력 , 1점 차감 하시려면 "-1"을 입력
						<br />
						미입력시 신고 한 회원의 포인트를 지급, 차감하지 않습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="report_get_point_n_label">신고 당한(받은) 회원의 포인트<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="report_get_point_n" value="<?php echo $report_get_point_n; ?>" id="report_get_point_n_label" class="frm_input" size="10"> 점
						<br />
						신고 당한(받은) 회원의 포인트 ( 지급, 차감을 선택할수 있음 ), 입력 않하시면 포인트 변동 없음
						<br />
						예) 1점 지급 하시려면 "1" 을 입력 , 1점 차감 하시려면 "-1"을 입력
						<br />
						미입력시 신고 당한(받은) 회원의 포인트를 지급, 차감하지 않습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="report_rash_point_n_label">무분별한 신고시 신고 한 회원의 포인트<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="report_rash_point_n" value="<?php echo $report_rash_point_n; ?>" id="report_rash_point_n_label" class="frm_input" size="10"> 점
						<br />
						무분별한 신고시 신고한 회원의 포인트 ( 지급, 차감을 선택할수 있음 ), 입력 않하시면 포인트 변동 없음
						<br />
						예) 1점 지급 하시려면 "1" 을 입력 , 1점 차감 하시려면 "-1"을 입력
						<br />
						미입력시 무분별한 신고시 신고 한 회원의 포인트를 지급, 차감하지 않습니다.
					</td>
				</tr>

				<tr>
					<th scope="row"><label for="report_rash_auth_n_label">무분별한 신고시 신고 권한 제한<strong class="sound_only">선택입력</strong></label></th>
					<td style="line-height:2.4em;">
						<input type="text" name="report_rash_auth_n" value="<?php echo $report_rash_auth_n; ?>" id="report_rash_auth_n_label" class="frm_input" size="10">
						<br />
						입력한 회수만큼 무분별한 신고를 하면 신고할수 있는 권한을 회수함
						<br />
						예) "2"를 입력하면 허위신고 2회시 다음에 "신고하기" 할수 없습니다.
						<br />
						미입력시 무분별한 신고를 해도 신고 권한을 제한하지 않습니다.
					</td>
				</tr>

				</tbody>
				</table>
		</div>


		<br />


		<div class="btn_confirm">
			<input type="submit" class="btn_submit" value=" 수 정 합 니 다 ">
			<input type="button" class="btn_cancel" value=" 취소하기 " onClick="PageUrl('./index.php')">
		</div>

		</form>

</section>


<script>

function submit__level_helper(gform)
{

		//

		return true;

}
</script>


<?php

	//=======================================================
	// ADMIN_TAIL__첨부
	include_once('../admin.tail.php');

?>