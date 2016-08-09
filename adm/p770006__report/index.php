<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 03월 07일 금요일 오전 11시 00분, 날씨 꽃샘추위 위세가 좀 쎄다, 쌀쌀하다

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 관리자 > 신고하기 PLUS G5 > 처음
===========================================================


회원 신고 받은 회수
회원 신고한 회수
회원 무분별한 신고 회수


블라인드 처리할 신고 건수선택입력
게시글 - 블라인드 여부
댓글 - 블라인드 여부


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
	// 시작 => 회원_여부__확인
	IF ($is_guest || !$is_member)
	{
		alert ("회원만 이용하실 수 있습니다", G5_DOMAIN."/");
		EXIT;
	}
	// 끝 => 회원_여부__확인
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
	$is_get__piree_config = 0;


	//=======================================================
	// 신고하기__설정_정보__가져오기
	$is_get__report = 1;


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
	# 시작 => 신고하기__설정_정보
	#########################################################

	//=======================================================
	// 스킨
	$rept_cfg__skin_pc_c		 = $report_config['skin_pc_c'];
	$rept_cfg__skin_mobile_c = $report_config['skin_mobile_c'];


	//=======================================================
	// DBNAME_이름
	$rept_cfg__DB_NAME_s = $report_config["DB_NAME_s"];


	//=======================================================
	// 블라인드__처리할__신고_건수
	$rept_cfg__blind_do_t = number_format($report_config["blind_do_t"]);


	//=======================================================
	// 신고_가능한__레벨
	$rept_cfg__report_do_level_n = number_format($report_config["report_do_level_n"]);


	//=======================================================
	// 신고_면제_할__레벨
	$rept_cfg__exemption_level_n = number_format($report_config["exemption_level_n"]);


	//=======================================================
	// 신고_면제_할__가입일수
	$rept_cfg__exemption_day_n = number_format($report_config["exemption_day_n"]);


	//=======================================================
	// 신고_한__회원의_포인트
	$rept_cfg__report_do_point_n = number_format($report_config["report_do_point_n"]);


	//=======================================================
	// 신고_당한__회원의_포인트
	$rept_cfg__report_get_point_n = number_format($report_config["report_get_point_n"]);


	//=======================================================
	// 무분별한__신고시_신고_한__회원의_포인트
	$rept_cfg__report_rash_point_n = number_format($report_config["report_rash_point_n"]);


	//=======================================================
	// 무분별한_신고시__신고_권한__제한
	$rept_cfg__report_rash_auth_n = number_format($report_config["report_rash_auth_n"]);

	#########################################################
	# 끝 => 신고하기__설정_정보
	#########################################################



	#########################################################
	# 시작 => 신고_사유__불러오기
	#########################################################

		#######################################################
		# 시작 => 상수__변수__배열
		#######################################################

		//=====================================================
		// 신고_사유__건수
		$reason_tot = 0;


		//=====================================================
		// 신고_사유__배열
		$reason_arr = array();

		#######################################################
		# 끝 => 상수__변수__배열
		#######################################################



		#######################################################
		# 시작 => 신고_사유__가져오기
		#######################################################

		//=====================================================
		// 신고_사유__가져오는__쿼리문
		$sql = "SELECT COUNT(*) FROM `".$piree_table['report_reason']."`";
		$reason_tot = sql_efv($sql);

		#######################################################
		# 끝 => 신고_사유__가져오기
		#######################################################



		#######################################################
		# 시작 => 신고_사유__불러오기
		#######################################################
		IF ($reason_tot > 0)
		{

			//===================================================
			// 신고하기__설정_정보__불러오기
			$sql		= "SELECT num,subject_s ";
			$sql	 .= "FROM `".$piree_table['report_reason']."` ORDER BY order_n ASC";
			$result = sql_query ($sql);


			//===================================================
			// 시작 => 반복문
			FOR ($i=0; $row=sql_fetch_array($result); $i++)
			{

				//=================================================
				// 신고_사유__번호
				$reason_n = $row['num'];


				//=================================================
				// 신고_사유__배열
				$reason_arr[$reason_n] = stripslashes($row["subject_s"]);

			}
			// 끝 => 반복문
			//===================================================

		}
		#######################################################
		# 끝 => 신고_사유__불러오기
		#######################################################

	#########################################################
	# 끝 => 신고_사유__불러오기
	#########################################################
	



	



	#########################################################
	# 시작 => 화면_ECHO
	#########################################################

	//=======================================================
	// 타이틀
	$g5['title'] = "신고하기 PLUS G5";


	//=======================================================
	// HEAD__첨부
	include_once("../admin.head.php");


	//=======================================================
	// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
	add_stylesheet('<link rel="stylesheet" href="'.G5_ADMIN_URL.'/p770006__report/style.css">', 0);

	#########################################################
	# 끝 => 화면_ECHO
	#########################################################
	

	###########################################################
	# 시작 => 버튼 활성화 비활성화 색상 설정//2016-07-19  by Bryan Park
	###########################################################
		
		###########################################################
		# 시작 => 필요 변수
		###########################################################
		//============== 2016-07-15 by Bryan Park =============
		//하단에 보여줄 메뉴 페이지 설정. 기본은 untreated.
		$menu_type = (isset($_GET['menu']))?$_GET['menu']:"untreated";
		
		//============== 2016-07-19 by Bryan Park =============
		//메뉴 타입에 따른 버튼 활성화 지정.

		###########################################################
		# 끝 => 필요 변수
		###########################################################

		###########################################################
		# 시작 => 함수
		###########################################################
		//참고 php함수는 하단에 정의, 구현해도 상단에서 사용가능하다. 
		//if절로 묶어두거나 다른 함수안에 정의되지 않는 이상.

		//============== 2016-07-19 by Bryan Park =============
		//$parameter(주로 $_GET)와 $target이 일치하면 true, 그렇지 않으면 false 반환.
		function is_active_option($parameter, $target) {
			if($parameter == $target)
				return true;
			else
				return false;
		}
		
		//============== 2016-07-19 by Bryan Park =============
		//$target값이 $parameter와 일치하면 옵션[0], 그렇지 않으면 옵션[1]을 반환.
		function set_btn_active($parameter, $target, $options=array(" active","")) {
			//2016-07-19 에러 방지. 값이 둘중 하나라도 없으면 기본값으로. by Bryan Park
			IF( !( isset($options[0])&&isset($options[1]) ) ) $options=array("_active","");

			return (is_active_option($parameter, $target))?$options[0]:$options[1];
		}
		###########################################################
		# 끝 => 함수
		###########################################################


	###########################################################
	# 끝 => 버튼 활성화 비활성화 색상 설정//2016-07-19  by Bryan Park
	###########################################################



?>

<section>
		<h2>신고하기 설정 정보</h2>

		<div class="tbl_head01 tbl_wrap">
				<table>
				<caption>피리 신고하기 PLUS G5</caption>
				<thead>
				<tr>
					<th scope="col">PC 스킨</th>
					<th scope="col">모바일 스킨</th>
					<th scope="col">블라인드 기준</th>
					<th scope="col">신고 가능 레벨</th>
					<th scope="col">신고 면제 레벨</th>
					<th scope="col">신고 면제 가입일</th>
					<th scope="col">신고 한 포인트</th>
					<th scope="col">신고 당한 포인트</th>
					<th scope="col">무분별 신고 포인트</th>
					<th scope="col">무분별한 신고 제한</th>
				</tr>
				</thead>
				<tbody>

				<tr>
						<td align="center"><strong><?php echo $rept_cfg__skin_pc_c ?></strong></td>
						<td align="center"><strong><?php echo $rept_cfg__skin_mobile_c ?></strong></td>
						<td align="right"><strong><?php echo $rept_cfg__blind_do_t ?></strong>건 이상</td>
						<td align="right"><strong><?php echo $rept_cfg__report_do_level_n ?></strong></td>
						<td align="right"><strong><?php echo $rept_cfg__exemption_level_n ?></strong></td>
						<td align="right"><strong><?php echo $rept_cfg__exemption_day_n ?></strong></td>
						<td align="right"><strong><?php echo $rept_cfg__report_do_point_n ?></strong></td>
						<td align="right"><strong><?php echo $rept_cfg__report_get_point_n ?></strong></td>
						<td align="right"><strong><?php echo $rept_cfg__report_rash_point_n ?></strong></td>
						<td align="right"><strong><?php echo $rept_cfg__report_rash_auth_n ?></strong></td>
				</tr>

				</tbody>
				</table>
		</div>


		<div class="btn_confirm">
			<input type="button" class="btn_cancel" value=" 차단 회원 목록 " onClick="PageUrl('./pi__reported.user.list.php')">
			<div class="btn_confirm" style = "float:right"><!--//2016-07-14 설정 버튼 우측으로 빼기 by Bryan Park-->
				<input type="button" class="btn_cancel" value=" 설정 정보 수정하기 " onClick="PageUrl('./pi__config.form.php')">
				<input type="button" class="btn_cancel" value=" 신고 사유 관리하기 " onClick="PageUrl('./pi__reason.list.php')">
			</div>
		</div>
		

</section>


<br />
<br />

		<div class="btn_confirm tab_menu">
			<input type="button" class="btn_cancel <?=set_btn_active($menu_type, "untreated")?>" value=" 전체 미처리 신고 내역 " onClick="PageUrl('./?menu=untreated')">
			<input type="button" class="btn_cancel <?=set_btn_active($menu_type, "blinded")?>" value=" 블라인드 신고 내역 " onClick="PageUrl('./?menu=blinded')">
			<!--<input type="button" class="btn_cancel" value=" 게시물 신고 내역 " onClick="PageUrl('./pi__report.list.php')">-->
			<input type="button" class="btn_cancel <?=set_btn_active($menu_type, "article")?>" value=" 게시물 신고 내역 " onClick="PageUrl('./?menu=article')">
			<input type="button" class="btn_cancel <?=set_btn_active($menu_type, "comment")?>" value=" 댓글 신고 내역 " onClick="PageUrl('./?menu=comment')">
			<!--<input type="button" class="btn_cancel" value=" 설정 정보 수정하기 " onClick="PageUrl('./pi__config.form.php')"> //2016-07-14 주석처리 by Bryan Park-->
		</div>
<?php 
		
//menu_type에 대한 유효성 검사.
if($menu_type == "untreated"||$menu_type=="blinded"||$menu_type=="comment"||$menu_type="article"){
	//include_once("./pi__report.list.".$menu_type.".php");
	include_once("./pi__report.list.included.php");
}

//echo "index.php - line 472 :".$total_page."-total_page , ".$page."-page";
?>


</section>




<?php

	//=======================================================
	// ADMIN_TAIL__첨부
	include_once("../admin.tail.php");

?>