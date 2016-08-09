<?php

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
	# 시작 => 신고_사유__불러오기
	#########################################################

		#######################################################
		# 시작 => 상수__변수__배열
		#######################################################

		//=====================================================
		// 신고_사유__건수
		$reason_t = 0;


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
		$sql			= "SELECT COUNT(*) FROM `".$piree_table['report_reason']."`";
		$reason_t = sql_efv($sql);

		#######################################################
		# 끝 => 신고_사유__가져오기
		#######################################################



		#######################################################
		# 시작 => 신고_사유__불러오기
		#######################################################
		IF ($reason_t > 0)
		{

			//===================================================
			// 신고_사유__불러오기
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
	# 시작 => 선택된__신고__불러오기
	#########################################################

	//=======================================================
	// 시작 => 신고_번호__있으면
	IF ($report_n > 0)
	{

		#######################################################
		# 시작 => 상수__변수__배열
		#######################################################

		//=====================================================
		// 선택된__신고__보기_여부
		// 0 - 안봐
		// 1 - 보자
		$report_view = 0;


		//=====================================================
		// 선택된__신고__배열
		$report_row = array();


		//=====================================================
		// 선택된__신고의__DO_회원정보__배열
		$do_member = array();


		//=====================================================
		// 선택된__신고의__GET_회원정보__배열
		$get_member = array();

		#######################################################
		# 끝 => 상수__변수__배열
		#######################################################



		#######################################################
		# 시작 => 신고_ROW__변수
		#######################################################

		//=====================================================
		// 결과
		$report__resu_s = "";


		//=====================================================
		// 전달할_메세지
		$send_msg_s = "";


		//=====================================================
		// 비공개_메모
		$hidden_memo_s = "";

		#######################################################
		# 끝 => 신고_ROW__변수
		#######################################################



		#######################################################
		# 시작 => 선택된__신고__불러오기
		#######################################################

		//=====================================================
		// 선택된__신고__불러오기
		$sql				= "SELECT * FROM `".$piree_table['report_list']."` WHERE num=".$report_n;
		$report_row = sql_fetch($sql);


		//=====================================================
		// 시작 => 선택된__신고_번호__있으면
		IF ($report_row['num'] == $report_n)
		{

			#####################################################
			# 시작 => DO_회원정보__불러오기
			#####################################################

			//===================================================
			// 선택된__신고의__DO_회원정보__불러오기
			$sql			 = "SELECT * FROM `".$g5['member_table']."` WHERE mb_no=".$report_row["do_mem_mn"];
			$do_member = sql_fetch($sql);


			#####################################################
			# 끝 => DO_회원정보__불러오기
			#####################################################



			#####################################################
			# 시작 => GET_회원정보__불러오기
			#####################################################

			//===================================================
			// 선택된__신고의__GET_회원정보__불러오기
			$sql				= "SELECT * FROM `".$g5['member_table']."` WHERE mb_no=".$report_row["get_mem_mn"];
			//2016-07-20 m by Bryan Park
			$get_member = sql_fetch($sql);

			#####################################################
			# 끝 => GET_회원정보__불러오기
			#####################################################



			#####################################################
			# 시작 => 상수__변수__배열
			#####################################################

			//===================================================
			// 선택된__신고__보기_여부
			$report_view = 1;


			//===================================================
			// 시작 => 읽은_회원__운영자__유무
			IF (!$report_row["res_mem_mn"] && !$report_row["res_mem_id"] && !$report_row["res_mem_nick"])
			{

				###################################################
				# 시작 => 읽은_회원__운영자__없으면__나를_지정
				###################################################

				//=================================================
				// 읽은_회원__운영자
				$report__res_mem_mn	 = $member['mb_no'];
				$report__res_mem_id	 = $_SESSION["ss_mb_id"];
				$report__res_mem_nick = $member['mb_nick'];

			}
			ELSE
			{

				###################################################
				# 시작 => 읽은_회원__운영자__있으면
				###################################################

				//=================================================
				// 읽은_회원__운영자
				$report__res_mem_mn	 = $report_row["res_mem_mn"];
				$report__res_mem_id	 = $report_row["res_mem_id"];
				$report__res_mem_nick = $report_row["res_mem_nick"];

			}
			// 끝 => 읽은_회원__운영자__유무
			//===================================================


			//===================================================
			// DO_회원__운영자__회원
			$report__do_mem_s = get_sideview($do_member["mb_id"], $do_member["mb_nick"]);


			//===================================================
			// GET_회원__운영자__회원
			$report__get_mem_s = get_sideview($get_member["mb_id"], $get_member["mb_nick"]);


			//===================================================
			// 읽은_회원__운영자__회원
			$report__res_mem_s = get_sideview($report__res_mem_id, $report__res_mem_nick);


			//===================================================
			// 신고_사유_번호
			$report__reason_n = $report_row["reason_n"];


			//===================================================
			// 신고_사유
			$report__reason_s = $reason_arr[$report__reason_n];


			//===================================================
			// 신고_사유
			$report_title_old_s = stripslashes($report_row["title_s"]);


			//===================================================
			// 시작 => 메모__구분
			IF ($report_row["report_memo_s"])
			{
				// 메모
				$report__report_memo_s = stripslashes($report_row["report_memo_s"]);
			}
			ELSE
			{
				// 메모
				$report__report_memo_s = "";
			}
			// 끝 => 메모__구분
			//===================================================


			//===================================================
			// 시작 => 결과__있으면
			IF ($report_row["resu_s"])
			{

				//=================================================
				// 결과
				$report__resu_s = stripslashes($report_row["resu_s"]);


				//=================================================
				// 비공개_메모
				$hidden_memo_s = stripslashes($report_row["hidden_memo_s"]);


				//=================================================
				// 신고_대상자에게_전달할_메세지
				$send_msg_s = stripslashes($report_row["send_msg_s"]);

			}
			// 끝 => 결과__있으면
			//===================================================


			//===================================================
			// 신고_일시__포맷
			$report__regi_time_s = date("Y년 m월 d일 H시 i분 s초", $report_row["regi_time_n"]);


			//===================================================
			// 읽은_시간
			$read_time_n = $report_row["read_time_n"] > 0 ? $report_row["read_time_n"] : G5_SERVER_TIME;


			//===================================================
			// 읽은_일시__포맷
			$report__read_time_s = date("Y년 m월 d일 H시 i분 s초", $read_time_n);


			//===================================================
			// 시작 => 수정_일시__포맷__구분
			IF ($report_row["upda_time_n"] > 0)
			{
				// 수정_일시__포맷
				$report__upda_time_s = date("Y년 m월 d일 H시 i분 s초", $report_row["upda_time_n"]);
			}
			ELSE
			{
				// 수정_일시__없음
				$report__upda_time_s = "&nbsp;";
			}
			// 끝 => 수정_일시__포맷__구분
			//===================================================


			//===================================================
			// 링크__가져오기
			$report__link_s = get_report_row_url('admin_url', $report_row["prog_div_c"], $report_row["bo_table"], $report_row["arti_n"], $report_row["parent_n"], $report_row["get_mem_id"]);

			#####################################################
			# 끝 => 상수__변수__배열
			#####################################################



			#####################################################
			# 시작 => 레벨_변경__여부
			#####################################################

			//===================================================
			// 시작 => 결과__유무
			IF ($report__resu_s == "" || $report__resu_s == "판단 보류")
			{

				//=================================================
				// 레벨_변경__여부
				// 0 - 안해
				// 1 - 변경해
				$is_level_change = 1;


				//=================================================
				// 시작 => 관리자__이면
				IF (is_admin($row['get_mem_id']))
				{

					//===============================================
					// 레벨_변경__여부
					// 0 - 안해
					$is_level_change = 0;

				}
				// 끝 => 관리자__이면
				//=================================================


				//=================================================
				// 시작 => 레벨__0_1__이면
				IF ($get_member["mb_level"] < 2)
				{

					//===============================================
					// 레벨_변경__여부
					// 0 - 안해
					$is_level_change = 0;

				}
				// 끝 => 레벨__0_1__이면
				//=================================================

			}
			// 끝 => 결과__유무
			//===================================================

			#####################################################
			# 끝 => 레벨_변경__여부
			#####################################################



			#####################################################
			# 시작 => 신고__구분
			#####################################################

			//===================================================
			// 신고_대상_내용
			$report_cont_s = "";


			//===================================================
			// 시작 => 신고__구분
			SWITCH ($report_row["prog_div_c"])
			{

				###################################################
				# 시작 => 게시물
				###################################################
				CASE "article" :

					//===============================================
					// 신고_대상_구분
					$report__prog_s = "게시물";


					//===============================================
					// 게시판_테이블__전체이름
					$write_table = $g5['write_prefix'].$report_row["bo_table"];


					//===============================================
					// 게시물_ROW__가져오기
					$sql	 = "SELECT wr_id,wr_subject,wr_content FROM `".$write_table."` WHERE wr_id='".$report_row["arti_n"]."'";
					$atrow = sql_fetch($sql);


					//===============================================
					// 시작 => 게시물__있으면
					IF ($report_row["arti_n"] == $atrow["wr_id"])
					{

						//=============================================
						// 신고_대상_제목
						$report_title_new_s = stripslashes($atrow["wr_subject"]);


						//=============================================
						// 신고_대상_내용
						$report_cont_s = stripslashes($atrow["wr_content"]);


						//=============================================
						// 신고_대상_링크
						$report_link_s = G5_DOMAIN."/bbs/board.php?bo_table=".$report_row["bo_table"]."&wr_id=".$report_row["arti_n"];

					}
					// 끝 => 게시물__있으면
					//===============================================

				BREAK;
				###################################################
				# 끝 => 게시물
				###################################################



				###################################################
				# 시작 => 댓글
				###################################################
				CASE "comment" :

					//===============================================
					// 신고_대상_구분
					$report__prog_s = "댓글";


					//===============================================
					// 게시판_테이블__전체이름
					$write_table = $g5['write_prefix'].$report_row["bo_table"];


					//===============================================
					// 댓글_ROW__가져오기
					$sql	 = "SELECT wr_id,wr_parent,wr_content FROM `".$write_table."` WHERE wr_id='".$report_row["arti_n"]."'";
					$atrow = sql_fetch($sql);


					//===============================================
					// 시작 => 댓글__있으면
					IF ($report_row["arti_n"] == $atrow["wr_id"])
					{

						//=============================================
						// 신고_대상_제목
						$report_title_new_s = stripslashes($atrow["wr_content"]);


						//=============================================
						// 신고_대상_링크
						$report_link_s = G5_DOMAIN."/bbs/board.php?bo_table=".$report_row["bo_table"]."&wr_id=".$atrow["wr_parent"];

					}
					// 끝 => 댓글__있으면
					//===============================================

				BREAK;
				###################################################
				# 끝 => 댓글
				###################################################



				###################################################
				# 시작 => 회원
				###################################################
				CASE "member" :

					//===============================================
					// 신고_대상_구분
					$report__prog_s = "회원";


					//===============================================
					// 시작 => 게시물__있으면
					IF ($report_row["arti_n"]	== $get_member["mb_no"])
					{

						//=============================================
						// 신고_대상_제목
						$report_title_new_s	= "레벨 ".$get_member["mb_level"]." || ";
						$report_title_new_s .= "가입일시 ".$get_member["mb_datetime"];


						//=============================================
						// 신고_대상_링크
						$report_link_s = G5_ADMIN_URL."/member_form.php?mb_id=admin".$get_member["mb_id"];

					}
					// 끝 => 게시물__있으면
					//===============================================

				BREAK;
				###################################################
				# 끝 => 회원
				###################################################

			}
			// 끝 => 신고__구분
			//===================================================

			#####################################################
			# 끝 => 신고__구분
			#####################################################

		}
		// 끝 => 선택된__신고_번호__있으면
		//=====================================================

		#######################################################
		# 끝 => 선택된__신고__불러오기
		#######################################################

	}
	// 끝 => 신고_번호__있으면
	//=======================================================

	#########################################################
	# 끝 => 선택된__신고__불러오기
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

	#########################################################
	# 시작 => 신고_목록
	#########################################################

		#######################################################
		# 시작 => 상수__변수__배열
		#######################################################

		//=====================================================
		// 신고_목록__건수
		$report_active_s__new = "접수";


		//=====================================================
		// 신고_목록__배열
		$report_list_arr = array();

		#######################################################
		# 끝 => 상수__변수__배열
		#######################################################


		#######################################################
		#시작 => 2016-07-11 신고목록 가져오기 by Bryan Park
		#######################################################

		// 2016-07-11 [bid -> 게시판id , bno -> 게시판 테이블 내에서 게시물 id] by Bryan Park
		$bid = ($_GET['bid'])?$_GET['bid']:"";
		$bno = ($_GET['bno'])?$_GET['bno']:"";
		//2016-07-08 by Bryan Park  -> 페이징을 위한 sql.
		$sql_common = " FROM ".$piree_table['report_list']." ";

		//============== 2016-07-25 by Bryan Park =============
		//$sql_common에 subquery 추가 -> 블라인드 먹은 신고에 대해서만 
		$menu = ($_GET['menu'])?$_GET['menu']:"";
		
		###########################################################
		# 해야할 것
		# 1. 블라인드, 게시물 신고, 댓글 신고, 그외 전체 등을 구분한다.
		# 2. 블라인드일 경우에는 $sql_common에 subquery를 넣어야한다.
		# 
		###########################################################
		
		//2016-07-25 블라인드 게시물 내역 보기일때 sql문. by Bryan Park
		$sql_common_menu='';
		switch($menu) {
			case 'blinded':
				$sql_common_menu		.=	"FROM ( SELECT *, COUNT(*) as cnt ";
				$sql_common_menu		.=	"	FROM `".$piree_table['report_list']."`" ;
				//mattr == unprocessed 일때 아래의 where 절을 추가.
				if($use_where){
				$sql_common_menu		.=	"	WHERE active_s='".$report_active_s__new."'";
				}
				$sql_common_menu		.=	"	GROUP BY bo_table, arti_n ";
				$sql_common_menu		.=	") AS report_group ";
				$sql_common_menu_search	= "WHERE report_group.cnt >= 3 ";
				break;
			case '':
				break;

			default:
		}
			$sql_common = $sql_common_menu;


		$sql_search = " where (1) ";
		if ($stx || ($bid&&$bno) ) {//2016-07-08 by Bryan Park  -> 검색기준, 검색어 입력. // 2016-07-11 게시판+게시물no로 모아보기 추가 by Bryan Park
			$sql_search .= " and ( ";
			switch ($sfl) {// 2016-07-11 검색 기준에 따른 검색어 적용 switch by Bryan Park
				case 'do_mem_id' : //신고한 사용자 id
					$sql_search .= " ({$sfl} = '{$stx}') ";
					break;
				case 'do_mem_nick' : //신고한 사용자 닉네임
					$sql_search .= " ({$sfl} = '{$stx}') ";
					break;
				case 'get_mem_id' : // 신고 당한 게시물 작성한 사용자id
					$sql_search .= " ({$sfl} = '{$stx}') ";
					break;
				case 'get_mem_nick' : // 신고 당한 게시물 작성한 사용자id
					$sql_search .= " ({$sfl} = '{$stx}') ";
					break;
				case 'title_s' : //신고 당한 게시물 제목
					$sql_search .= " ({$sfl} like '%{$stx}%') ";
					break;
				case 'title_s' : //신고 당한 게시물 제목
					$sql_search .= " ({$sfl} like '%{$stx}%') ";
					break;
				case 'bo_table' : //신고 당한 게시물이 속한 게시판
					$sql_search .= " ({$sfl} = '{$stx}') ";
					break;
				case 'arti_n' : //신고 당한 게시물의 게시물 번호. bo_table과 함께 사용
					$sql_search .= " ({$sfl} = '{$stx}') ";
					break;
				default :
					if($sfl!=''&&$sfl&&$stx!=''&&$stx ) $sql_search .= " ({$sfl} like '{$stx}%') ";
					// 2016-07-11 보드명+게시물id서치때문에 인자없는 like문 출력되는것 방지. by Bryan Park
					break;
			}
			if($bid&&$bno) {// 2016-07-11 보드명+게시물id로 모아보기 by Bryan Park
				$bid_bno_search = " (`bo_table` = '{$bid}' AND `arti_n` = '{$bno}') ";
				$sql_search .= $bid_bno_search;
			}
			$sql_search .= " ) ";
		}
		if (!$sst) {//2016-07-08 by Bryan Park -> 정렬 기준, 정렬 순서.
			$sst = "regi_time_n";
			$sod = "desc";
		}
		$sql_order = " order by {$sst} {$sod} ";
		
		// 2016-07-11 신고목록 가져오는 쿼리문 by Bryan Park
		$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";//2016-07-08 by Bryan Park - 이 쿼리로 페이지 수를 구한다.
		$total_count = sql_efv($sql);

		$rows = $config['cf_page_rows'];
		$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
		if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
		$from_record = ($page - 1) * $rows; // 시작 열을 구함
		// 리스트_URL
		$qstr .= "&bid={$bid}&bno={$bno}&menu={$menu}";
		$page_url_s = "{$_SERVER['SCRIPT_NAME']}?$qstr";

		#######################################################
		#끝 => 2016-07-11 신고목록 가져오기 by Bryan Park
		#######################################################

		#######################################################
		# 시작 => 신고_목록__불러오기
		#######################################################
		IF ($total_count > 0)
		{
			
			// 신고_목록__불러오기 -> //2016-07-11 by Bryan Park  -기존에 LIMIT 설정이 되어있지 않았음.
			$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";//2016-07-08 by Bryan Park  해당 페이지 최종 출력 쿼리.
			$result = sql_query ($sql);

		}
		#######################################################
		# 끝 => 신고_목록__불러오기
		#######################################################

	#########################################################
	# 끝 => 신고_목록
	#########################################################


	#########################################################
	# 시작 => 신고_내용__보기
	#########################################################

	//=======================================================
	// 시작 => 선택된__신고__보기
	IF ($report_view > 0)
	{
?>
<section>
		<h2>신고하기 정보 보기</h2>
		<div style="margin:0 20px 0 20px; border:3px solid #cfcfcf; padding:15px;">

			<div class="tbl_head01">

				<table>
				<caption>신고하기 정보 보기</caption>
				<thead>
				<tr>
					<th scope="col">회원구분</th>
					<th scope="col">회원번호</th>
					<th scope="col">닉네임</th>
					<th scope="col">아이디</th>
					<th scope="col">이름</th>
					<th scope="col">성별</th>
					<th scope="col">포인트</th>
					<th scope="col">레벨</th>
					<th scope="col">가입일</th>
					<th scope="col">블라인드</th>
					<th scope="col">신고 받은</th>
					<th scope="col">신고 한</th>
					<th scope="col">허위 신고</th>
				</tr>
				</thead>
				<tbody>

				<tr>
						<td>신고한 회원 (DO)</th>
						<td class="td_grid"><?php echo $do_member["mb_no"]; ?></td>
						<td align="center"><?php echo $report__do_mem_s; ?></td>
						<td align="center"><?php echo $do_member["mb_id"]; ?></td>
						<td align="center"><?php echo $do_member["mb_name"]; ?></td>
						<td class="td_send"><?php echo $do_member["mb_sex"]; ?></td>
						<td align="center"><?php echo $do_member["mb_point"]; ?> 점</td>
						<td class="td_grid"><?php echo $do_member["mb_level"]; ?></td>
						<td class="td_category"><?php echo $do_member["mb_datetime"]; ?></td>
						<td class="td_grid"><?php echo $do_member['mb_pi_blind_t']; ?></td>
						<td class="td_grid"><?php echo $do_member["mb_pi_report_get_t"]; ?></td>
						<td class="td_grid"><?php echo $do_member["mb_pi_report_do_t"]; ?></td>
						<td class="td_grid"><?php echo $do_member["mb_pi_report_rash_do_t"]; ?></td>
				</tr>

				<tr>
						<td>신고 받은 회원 (GET)</td>
						<td class="td_grid"><?php echo $get_member["mb_no"]; ?></td>
						<td align="center"><?php echo $report__get_mem_s; ?></td>
						<td align="center"><?php echo $get_member["mb_id"]; ?></td>
						<td align="center"><?php echo $get_member["mb_name"]; ?></td>
						<td class="td_send"><?php echo $get_member["mb_sex"]; ?></td>
						<td align="center"><?php echo $get_member["mb_point"]; ?> 점</td>
						<td class="td_grid"><?php echo $get_member["mb_level"]; ?></td>
						<td class="td_category"><?php echo $get_member["mb_datetime"]; ?></td>
						<td class="td_grid"><?php echo $get_member['mb_pi_blind_t']; ?></td>
						<td class="td_grid"><?php echo $get_member["mb_pi_report_get_t"]; ?></td>
						<td class="td_grid"><?php echo $get_member["mb_pi_report_do_t"]; ?></td>
						<td class="td_grid"><?php echo $get_member["mb_pi_report_rash_do_t"]; ?></td>
				</tr>

				</tbody>
				</table>

			</div>


			<div class="cl_bo space_10px"></div>
			<div class="cl_bo space_10px"></div>


			<div class="tbl_frm01">

				<table>
				<caption>신고 내용 보기</caption>

				<tbody>

				<tr>
						<th scope="col">처리한 운영자</th>
						<td>
							<?php echo $report__res_mem_s; ?>
							[ <?php echo $report__res_mem_id; ?> /
							<?php echo $report__res_mem_mn; ?> 번 회원 ]
							&nbsp; &nbsp; &nbsp; &nbsp;
							<?php echo $report__read_time_s; ?>
						</td>
				</tr>

				<tr>
						<th scope="col">신고 대상 자료</th>
						<td>
							<div class="report_box">
								<div class="float_left_600"><span class="font_777">구분</span>	<strong><?php echo $report__prog_s; ?>
								<a href="<?php echo $report__link_s; ?>" target="_blank">
								[<?php // 2016-07-11 게시판+게시물no 링크 추가 및 검색 반영. by Bryan Park
								$board_name_kor = sql_efv("SELECT bo_subject FROM g5_board WHERE `bo_table` = '{$report_row[bo_table]}'");
								echo $board_name_kor." no.".$atrow['wr_id']; // 2016-07-11 한글 보드명 by Bryan Park
								?>]
								</a></strong>
								</div>
								<br />

								<div class="float_left_600"><span class="font_777">신고시 제목</span>	<strong><a href="<?php echo $report__link_s; ?>" target="_blank"><?php echo $report_title_old_s; ?></a></strong></div>
								<br />

								<div class="float_left_600"><span class="font_777">현재 제목</span>	<strong><a href="<?php echo $report_link_s; ?>" target="_blank"><?php echo $report_title_new_s; ?></a></strong></div>
								<br />

								<div class="float_left_600"><?php echo $report_cont_s; ?></div>
								<br />
							</div>
						</td>
				</tr>
				<tr>
					<?php
					#######################################################
					#// 2016-07-11 현재 보고 있는 게시물에 중복 신고된 다른 건수 보기. by Bryan Park
					#######################################################
					//===================================================
					// 2016-07-12 동일 게시물에 대한 다른 신고 내역 리스트 출력 준비  by Bryan Park
					$sql_or_search = "WHERE ";
					$sql_or_search .= "("; 
					$sql_or_search .= " (`bo_table` = '{$report_row[bo_table]}' AND `arti_n` = '{$report_row[arti_n]}') ";//현재 보고있는 게시물과 같은 table & 같은 no.
						$sql_or_c_search = $sql_or_search; // 2016-07-13 by Bryan Park - 추가-> 카테고리별 전체 신고 카운트
					$sql_or_search .= " AND (`num` <> '{$report_row[num]}' ) "; //현재 신고 건과 동일한 건은 제외.
					$sql_or_search .= " AND (`res_mem_mn` = '0' ) "; // 미처리된 신고건만 [`res_mem_mn` 처리한 관리자의 회원 no -> 0일때는 미처리된 신고건이라는 뜻.]
					$sql_or_search .= ")";
					$sql_other_reports = "SELECT * {$sql_common} {$sql_or_search} ";
						$sql_or_c_search .= ")";// 2016-07-13 by Bryan Park - 추가-> 카테고리별 전체 신고 카운트
					//===================================================
					// 2016-07-12 sql_num_rows($result_other_reports)가 true이면 1개 이상의 미처리된 신고 건수가 있음. by Bryan Park
					$result_other_reports = sql_query($sql_other_reports); 

					//  2016-07-12 카테고리별 건수 숫자로 표시. by Bryan Park
					$sql_other_report_count = "SELECT count(*) as full_cnt, count(reason_n) as rep_count, reason_n {$sql_common} {$sql_or_c_search} group by reason_n ";
					$result_other_report_count = sql_query($sql_other_report_count);// 2016-07-13 by Bryan Park - 추가-> 카테고리별 전체 신고 카운트
					?>
						<th scope="col">동일 게시물에 대한<br>미처리 신고 내역</th>
						<td>
							<div class="report_box" style="width:100%">
							<table>
							<tbody>
							<tr><th>신고받은<br>횟수</th><td>
							<?php
							//============== 2016-07-14 by Bryan Park =============
							//시작 => 신고받은 횟수 출력
								
								//============== 2016-07-14 by Bryan Park =============
								// 변수 설정
								$report_count_n_reason_str = ""; //사유와 신고 수 표기하는 str
								$report_count_total = 0; //총 신고수 저장하는 int

								

								//============== 2016-07-14 by Bryan Park =============
								// 반복문으로 query결과 fetch받아서 총합산에 각 사유별 신고 횟수 더하고, 각 사유와 사유별 신고 횟수를 스트링에 이어붙임.
								while($row_or_c = sql_fetch_array($result_other_report_count)){
									$report_count_total += $row_or_c['rep_count'];//2016-07-14 총합산에 포함 by Bryan Park
									$report_count_n_reason_str .= $reason_arr[$row_or_c['reason_n']]."(".$row_or_c['rep_count']."), "; //2016-07-14 사유(횟수) 스트링 이어붙임. by Bryan Park
								}


								//============== 2016-07-14 by Bryan Park =============
								//최종적으로 총 신고수와 이어붙인 사유와 사유별 신고수 스트링을 출력.
								echo "[".$report_count_total."회] ".$report_count_n_reason_str;

								
							
							//끝 => 신고받은 횟수 출력
							//============== 2016-07-14 by Bryan Park =============
							?>
							</td></tr>
							
							
							<tr><th>이 게시물에<br>미처리된<br>신고 목록</th><td>
							<?php
							//============== 2016-07-14 by Bryan Park =============
							//시작 =>  동일 게시물에 대한 미처리 내역 출력.

								while($row_or = sql_fetch_array($result_other_reports)){
									$reason = $reason_arr[$row_or['reason_n']]; // 2016-07-12 $reason_arr => 사유 0~n 까지의 스트링이 담긴 배열. by Bryan Park
									echo "<a style='color:red;'href='./pi__report.list.php?report_n=".$row_or['num']."'>".
										$row_or['num'].".[".$reason."]".$row_or['report_memo_s']." - ".$row_or['title_s'].
										"</a>"."<br>";
									// 2016-07-12 $row_or => array('num' = > PK, 'report_memo_s => 신고시 작성된 메모 , 'title_s' => 게시물 제목 by Bryan Park
								}
							//끝 => 동일 게시물에 대한 미처리 내역 출력.
							//============== 2016-07-14 by Bryan Park =============
							?>
							</td></tr>
							<tbody>
							</table>
							</div>
						</td>
				</tr>

				<tr>
						<th scope="col">신고 사유</th>
						<td><?php echo $report__reason_s; ?></td>
				</tr>

				<tr>
						<th scope="col">신고 메모</th>
						<td><?php echo $report__report_memo_s; ?></td>
				</tr>

				<tr>
						<th scope="col">상태</th>
						<td><?php echo $report_row["active_s"]; ?></td>
				</tr>

<?php

		//=====================================================
		// 시작 => 결과__없거나__판단_보류__이면
		IF ($report__resu_s == "" || $report__resu_s == "판단 보류")
		{
?>
				<tr>
						<th scope="col">조치</th>
						<td>

							<form id="report_result_input" name="report_result_input" action="pi__report.list.update.php" method="post" onsubmit="return input__report_result(this);">
							<input type="hidden" name="report_n" value="<?php echo $report_n ?>">

							<div class="report_box">

								<div class="float_left_20"><input type="radio" name="result_s" value="회원 탈퇴" onclick="action__result_s(this.form);"></div>
								<div class="float_left_120">회원 탈퇴</div>
								<br />

<?php

							//===========================================
							// 시작 => 레벨_변경__하기_이면
							IF ($is_level_change == 1)
							{
?>
								<div class="float_left_20"><input type="radio" name="result_s" value="회원레벨 강등" onclick="action__result_s(this.form);"></div>
								<div class="float_left_120">회원레벨 강등</div>
								<div class="float_left_460">
									<select id="level_n" name="level_n">
<?php

									//=======================================
									// 시작 => 레벨__돌려라__반복문
									FOR ($i=1; $i<$get_member["mb_level"]; $i++)
									{
?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
									}
									// 끝 => 레벨__돌려라__반복문
									//=======================================

?>
									</select> 으로 강등
								</div>
								<br />

<?php
							}
							// 끝 => 레벨_변경__하기_이면
							//===========================================

?>

								<div class="float_left_20"><input type="radio" name="result_s" value="무분별한 신고" onclick="action__result_s(this.form);"></div>
								<div class="float_left_120">무분별한 신고</div>
								<div class="float_left_460">(이 자료 신고한 회원은 무분별한 신고 조치 합니다.)</div>
								<br />

<?php

							//===========================================
							// 시작 => 신고_대상_구분__회원_아니면__에러
							IF ($prog_div_c != "article" || $prog_div_c != "comment")
							{
?>
								<div class="float_left_20"><input type="radio" name="result_s" value="게시물 삭제" onclick="action__result_s(this.form);"></div>
								<div class="float_left_120">게시물 삭제</div>
								<div class="float_left_460">(게시물, 댓글의 경우 삭제 처리)</div>
								<br />

<?php
							}
							// 끝 => 신고_대상_구분__회원_아니면__에러
							//===========================================

?>

								<div class="float_left_20"><input type="radio" name="result_s" value="판단 보류" onclick="action__result_s(this.form);"></div>
								<div class="float_left_120">판단 보류</div>
								<div class="float_left_460">(나중에 조치합니다. 차후에 조치 수정 가능.)</div>
								<br />

								<div class="float_left_20"><input type="radio" name="result_s" value="블라인드 해제" onclick="action__result_s(this.form);"></div>
								<div class="float_left_120">블라인드 해제</div>
								<div class="float_left_460">(블라인드를 해제합니다.)</div>
								<br />

								<div class="float_left_600">⊙ 한번 조치하시면 수정할수 없습니다. ("판단 보류"는 차후 수정 가능) 신중히 결정해 주세요.</div>
								<br />
								<div class="float_left_600">⊙ "무분별한 신고", "블라인드 해제" 선택하시면 이 자료는 더이상 신고할수 없습니다.</div>
								<br /><br />

<?php

							//===========================================
							// 시작 => 신고_구분__게시물_댓글__이면
							IF ($report_row["prog_div_c"] == "article" || $report_row["prog_div_c"] == "comment")
							{
?>
								<div class="float_left_20"><input type="checkbox" name="del_arti_n" id="del_arti_n" value="1" onClick=" if (this.checked == true) { alert('게시물을 삭제하면 복구할수 없습니다.\n\n신중히 판단하여 주세요.'); } "></div>
								<div class="float_left_120">게시물 삭제</div>
								<br /><br />

<?php
							}
							// 끝 => 신고_구분__게시물_댓글__이면
							//===========================================

?>

								<div class="float_left_600"><strong>신고 대상자에게 전달할 메세지 (쪽지로 메세지 알림)</strong></div>
								<br />

								<div class="float_left_600"><textarea name="send_msg_s" style="width:590px; height:70px;"><?php echo $send_msg_s; ?></textarea></div>
								<br /><br /><br />

								<div class="float_left_600"><strong>비공개 메모</strong></div>
								<br />

								<div class="float_left_600"><textarea name="hidden_memo_s" style="width:590px; height:70px;"><?php echo $hidden_memo_s; ?></textarea></div>
								<br />

								<div class="float_left_600">비공개 메모는 운영자만 볼수 있습니다.</div>
								<br /><br /><br />

								<div class="float_left_600">
									<div class="btn_confirm">
										<input type="submit" class="btn_submit" value=" 조치 실행하기 ">
									</div>						
								</div>
							</div>

							</form>

						</td>
				</tr>
<?php
		}
		// 끝 => 결과__없거나__판단_보류__이면
		//=====================================================


		//=====================================================
		// 시작 => 결과__있으면
		IF ($report__resu_s)
		{
?>
				<tr>
						<th scope="col">결과</th>
						<td><span class="str_bold_ff0000"><?php echo $report__resu_s; ?></span></td>
				</tr>

				<tr>
						<th scope="col">전달할 메세지</th>
						<td><?php echo $send_msg_s; ?></td>
				</tr>

				<tr>
						<th scope="col">비공개 메모</th>
						<td><?php echo $hidden_memo_s; ?></td>
				</tr>

<?php
		}
		// 끝 => 결과__있으면
		//=====================================================

?>

				<tr>
						<th scope="col">아이피</th>
						<td><?php echo $report_row["do_ip_s"]; ?></td>
				</tr>

				<tr>
						<th scope="col">신고 일시</th>
						<td><?php echo $report__regi_time_s; ?></td>
				</tr>

				<tr>
						<th scope="col">수정 일시</th>
						<td><?php echo $report__upda_time_s; ?></td>
				</tr>

				</tbody>
				</table>

			</div>


			<div class="cl_bo space_10px"></div>


			<div class="btn_confirm">

				<!--<input type="button" class="btn_cancel" value=" 설정 정보 수정하기 " onClick="PageUrl('./pi__config.form.php')">//2016-07-14 주석처리 by Bryan Park-->
				<input type="button" class="btn_cancel" value=" 신고 사유 관리하기 " onClick="PageUrl('./pi__reason.list.php')">
				<!--<input type="button" class="btn_cancel" value=" 신고 접수 관리하기 " onClick="PageUrl('./pi__report.list.php')">//2016-07-14 주석처리 by Bryan Park-->
			</div>

		</div>

</section>


<br />
<br />
<br />
<br />


<?php
	}
	// 끝 => 선택된__신고__보기
	//=======================================================

	#########################################################
	# 끝 => 신고_내용__보기
	#########################################################

?>


<section>
		<h2>신고 목록 ( 확인후 조치해 주세요 )</h2>
		<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">
			<label for="sfl" class="sound_only">검색대상</label>
			<input type="hidden" class="menu_value" name="menu" id="menu" value="<?=$menu?>">
			<select name="sfl" id="sfl">
				<option value="get_mem_id"<?php echo get_selected($_GET['sfl'], "get_mem_id"); ?>>회원아이디</option>
				<option value="bo_table"<?php echo get_selected($_GET['sfl'], "bo_table"); ?>>게시판명(영문)</option>
				<option value="arti_n"<?php echo get_selected($_GET['sfl'], "arti_n"); ?>>게시물 no(wr_no)</option>
				<option value="res_mem_mn"<?php echo get_selected($_GET['sfl'], "res_mem_mn"); ?>>처리 여부(처리는 1 미처리는 0 입력)</option>
				<option value="title_s"<?php echo get_selected($_GET['sfl'], "bl_active"); ?>>게시물 제목</option>
			</select>
			<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
			<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
			<input type="submit" class="btn_submit" value="검색">
			<?php if($sfl||$bid||$bno) {?>
			<input type="button" class="btn_submit" value="검색 지우기" onClick="PageUrl('./pi__report.list.php?')">
			<?}?>
		</form>

		<div class="tbl_head01 tbl_wrap">
				<table>
				<caption>신고 목록</caption>
				<thead>
				<tr>
					<th scope="col">번호</th>
					<th scope="col">신고한 회원</th>
					<th scope="col">신고 받은 회원</th>
					<th scope="col">신고구분</th>
					<th scope="col">신고사유 / 메모</th>
					<th scope="col">상태 / 결과</th>
					<th scope="col">게시물 작성일자</th><?php // 2016-07-13 게시물 작성일자 표기 추가 by Bryan Park?>
					<th scope="col">신고날짜</th>					
				</tr>
				</thead>
				<tbody>

<?php


		//=====================================================
		// 시작 => 신고_목록__유무
		IF ($total_count > 0)
		{

			#####################################################
			# 시작 => 신고_목록__있으면
			#####################################################

			//===================================================
			// 시작 => 반복문
			FOR ($i=0; $row=sql_fetch_array($result); $i++)
			{

				// 화살표_아이콘
				$in_arrow_s = "";

				// 스타일
				$in_style_s = "";


				//=================================================
				// DO_회원
				$in_do_mem_s = get_sideview($row['do_mem_id'], $row["do_mem_nick"]);


				//=================================================
				// GET_회원
				$in_get_mem_s = get_sideview($row['get_mem_id'], $row["get_mem_nick"]);


				//=================================================
				// 신고_사유__번호
				$reason_n = $row["reason_n"];


				//=================================================
				// 신고_사유__제목
				$reason_s = $reason_arr[$reason_n];


				//=================================================
				// 신고_사유__제목
				$title_s = stripslashes($row["title_s"]);


				//=================================================
				// 신고_구분
				$report_prog_arr = get__report_div($row["prog_div_c"], $row['bo_table']);


				//=================================================
				// 링크__가져오기
				$arti_link_s = get_report_row_url('admin_url', $row["prog_div_c"], $row['bo_table'], $row["arti_n"], $row["parent_n"], $row["get_mem_id"]);


				//=================================================
				// 신고일시
				$regi_time_s = date("y.m.d H:i:s", $row["regi_time_n"]);


				//=================================================
				// 내부링크
				$in_link_s = "pi__report.list.php?report_n=".$row['num'];


				//=================================================
				// 시작 => 스타일
				IF ($report_n == $row['num'])
				{

					// 화살표_아이콘
					$in_arrow_s = "☞ ";

					// 스타일
					$in_style_s = " style=\"color:#0000ff; font-weight:bold;\"";

				}
				// 끝 => 스타일
				//=================================================

?>
				<tr>
					<td><?php echo $row['num'] ?></td>
					<td><?php echo $in_do_mem_s ?></td>
					<td><?php echo $in_get_mem_s ?></td>
					<td>
						<a href="<?php echo $arti_link_s ?>" target="_blank"><?php //echo $report_prog_arr["prog_s"] ?></a>
						<!--<br />-->
						<?php // 2016-07-11 게시판+게시물no 링크 추가 및 검색 반영. by Bryan Park
							$board_name_kor = sql_efv("SELECT bo_subject FROM g5_board WHERE `bo_table` = '{$row[bo_table]}'");
							echo $board_name_kor; // 2016-07-11 한글 보드명 by Bryan Park
							echo " [".$row["arti_n"]."]"; //2016-07-14 해당 게시물 번호 by Bryan Park
						?>
						<br />
						-><a href="?bid=<?=$row['bo_table']?>&bno=<?=$row['arti_n']?>">
							
							<strong><?php echo "신고 정렬"; ?></strong>
						</a>
					</td>
					<td>
						<span class="font_777">사유</span> <a href="<?php echo $in_link_s ?>"<?php echo $in_style_s ?>><?php echo $in_arrow_s ?><?php echo $reason_s ?></a>
<?php

					//===============================================
					// 시작 => 메모__있으면
					IF ($row["report_memo_s"])
					{
						// 메모
						$in_report_memo_s = stripslashes($row["report_memo_s"]);
?>
						<br />
						<span class="font_777">메모</span> <a href="<?php echo $in_link_s ?>"<?php echo $in_style_s ?>><?php echo $in_arrow_s ?><?php echo $in_report_memo_s ?></a>
<?php

					}
					// 끝 => 메모__있으면
					//===============================================

?>
						<br /><?php //2016-07-13 by Bryan Park -> 수정 내역 -> 모두 다 게시물이 아닌 해당 신고 내역으로 이동하게 변경. 기존엔 echo $arti_link_s였음.?>
						<span class="font_777">제목</span> <a href="<?php echo $in_link_s ?>"<?php echo $in_style_s ?>><?php echo $in_arrow_s ?><?php echo $title_s ?></a>
					</td>
					<td><span class="font_777">상태</span> <?php echo $row["active_s"] ?>
<?php

					//===============================================
					// 시작 => 결과__있으면
					IF ($row['resu_s'])
					{
						// 결과
						$in_resu_s = stripslashes($row['resu_s']);
?>
						<br />
						<span class="font_777">결과</span> <span class="str_bold_ff0000"><?php echo $in_resu_s ?></span>
<?php
					}
					// 끝 => 결과__있으면
					//===============================================

?>
					</td>
					<td>
					<?php //2016-07-13 게시물 작성일자 추가. by Bryan Park
					if($row["prog_div_c"] == "article" || $row["prog_div_c"] == "comment"){
						$sql_article_regi_time  = "SELECT wr_datetime, wr_last FROM `".$g5["write_prefix"].$row["bo_table"]."`";
						$sql_article_regi_time .= " WHERE `wr_id` =".$row["arti_n"]."";
						$article_regi_time = sql_fetch($sql_article_regi_time); // 해당 게시판의 해당 게시물의 등록시간, 수정시간을 가져옴.
						
						//일단 작성일을 가져오게 설정함. 그리고 형식을 $regi_time_s와 동일하게 맞춤 by Bryan Park.
						$arti_regi_time_echo = date("y.m.d H:i:s", strtotime($article_regi_time['wr_datetime']));
						
						echo $arti_regi_time_echo;


					}	
					?>
					</td>
					<td><?php echo $regi_time_s ?></td>
				</tr>

<?php
			}
			// 끝 => 반복문
			//===================================================

			#####################################################
			# 끝 => 신고_목록__있으면
			#####################################################

		}
		ELSE
		{

			#####################################################
			# 시작 => 신고_목록__없으면
			#####################################################

?>
				<tr>
					<td colspan="7" align="center"><strong>접수된 신고가 없습니다.</strong></td>
				</tr>

<?php

			#####################################################
			# 끝 => 신고_목록__없으면
			#####################################################

		}
		// 끝 => 신고_목록__유무
		//=====================================================

?>

				</tbody>
				</table>
		</div>


		<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $page_url_s);?>


		<div class="btn_confirm">
			<?php if($sfl||$stx||$bid||$bno){?><input type="button" class="btn_cancel" value=" 검색 지우기 " onClick="PageUrl('./pi__report.list.php')"> <?}?>
			<input type="button" class="btn_cancel" value=" 메인으로 " onClick="PageUrl('./')"> 
			<!--<input type="button" class="btn_cancel" value=" 설정 정보 수정하기 " onClick="PageUrl('./pi__config.form.php')">--><!--//2016-07-14 주석처리 by Bryan Park-->
		</div>

</section>


<script>

function choice__result_s(gform)
{

		//=====================================================
		// 조치__방법
		resu_s = "";


		//=====================================================
		// 시작 => 조치_선택__구분
		for (var i=0; i<gform.elements.length; i++)
		{

			// 시작 => 이름이__result_s__이면
			if (gform.elements[i].name == "result_s")
			{

				// 시작 => 체크__했으면
				if (gform.elements[i].checked == true)
				{

					//===============================================
					// 조치__방법
					resu_s = gform.elements[i].value;


					//===============================================
					// 시작 => 조치__구분
					switch (gform.elements[i].value)
					{

						//=============================================
						// 시작 => 회원레벨_강등
						case "회원레벨 강등" :

							//===========================================
							// 시작 => 레벨_선택__확인
							if (gform.level_n.options[gform.level_n.selectedIndex].value == "")
							{
								gform.level_n.focus();
								return false;
							}
							// 끝 => 레벨_선택__확인
							//===========================================

						break;
						// 끝 => 회원레벨_강등
						//=============================================

					}
					// 끝=> 조치__구분
					//===============================================

				}
				// 끝 => 체크__했으면

			}
			// 끝 => 이름이__result_s__이면

		}
		// 끝 => 반복문
		//=====================================================


		//=====================================================
		// 통과
		return resu_s;

}




function action__result_s(gform)
{

		//=====================================================
		// 조치__방법
		resu_s = choice__result_s(gform);


		//=====================================================
		// 시작 => 조치__방법__없으면
		if (resu_s == "")
		{
			alert ("어떻게 조치할지 선택해 주세요.");
			return false;
		}
		// 끝 => 조치__방법__없으면
		//=====================================================


		//=====================================================
		// 시작 => 조치__구분
		switch (resu_s)
		{

			//###################################################
			// 시작 => 회원레벨_강등
			case "회원레벨 강등" :

				//=================================================
				// 레벨_선택__활성화
				document.getElementById("level_n").disabled = false;


				//=================================================
				// 레벨_선택__활성화
				document.getElementById("del_arti_n").disabled = false;

			break;
			// 끝 => 회원레벨_강등
			//###################################################


			//###################################################
			// 시작 => 회원_강퇴
			case "회원 탈퇴" :

				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("level_n").disabled = true;


				//=================================================
				// 레벨_선택__활성화
				document.getElementById("del_arti_n").disabled = false;

			break;
			// 끝 => 회원_강퇴
			//###################################################


			//###################################################
			// 시작 => 판단_보류
			case "판단 보류" :

				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("level_n").disabled = true;


				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("del_arti_n").disabled = true;

			break;
			// 끝 => 판단_보류
			//###################################################


			//###################################################
			// 시작 => 무분별한_신고
			case "무분별한 신고" :

				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("level_n").disabled = true;


				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("del_arti_n").disabled = true;

			break;
			// 끝 => 무분별한_신고
			//###################################################


			//###################################################
			// 시작 => 조치없이_완료
			case "블라인드 해제" :

				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("level_n").disabled = true;


				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("del_arti_n").disabled = true;

			break;
			// 끝 => 조치없이_완료
			//###################################################


			//###################################################
			// 시작 => 게시물_삭제
			case "게시물 삭제" :

				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("level_n").disabled = true;


				//=================================================
				// 레벨_선택__비활성화
				document.getElementById("del_arti_n").disabled = false;
				document.getElementById("del_arti_n").checked = true;

			break;
			// 끝 => 게시물_삭제
			//###################################################

		}
		// 끝=> 조치__구분
		//=====================================================


		//=====================================================
		// 시작 => 조치__방법__없으면
		if (resu_s == "")
		{
			alert ("어떻게 조치할지 선택해 주세요.");
			return false;
		}
		// 끝 => 조치__방법__없으면
		//=====================================================

}




function input__report_result(gform)
{

		//=====================================================
		// 조치__방법
		resu_s = choice__result_s(gform);


		//=====================================================
		// 시작 => 조치__방법__없으면
		if (resu_s == "")
		{
			alert ("어떻게 조치할지 선택해 주세요.");
			return false;
		}
		// 끝 => 조치__방법__없으면
		//=====================================================


		//=====================================================
		// 통과
		return true;

}

</script>


<?php

	//=======================================================
	// ADMIN_TAIL__첨부
	include_once("../admin.tail.php");

?>