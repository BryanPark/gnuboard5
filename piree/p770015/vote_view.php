<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 12월 26일 금요일 오후 16시 36분 - 날씨 맑지만 쌀쌀하다

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 피리 게시글에 투표 PLUS G5 > 게시글 보기
===========================================================


*/


	#########################################################
	# 시작 => 상위_첨부_위치__INCLUDE__구분
	#########################################################

	//=======================================================
	// MODE_기본값
	$mode = "";


	//=======================================================
	// 시작 => 상위_첨부_위치__INCLUDE__구분
	IF (@$top_position_c == 'include')
	{

			#####################################################
			# 시작 => INCLUDE__이면

			//===================================================
			// 개별_페이지__접근_불가
			IF (!defined('_GNUBOARD_'))									EXIT;

	}
	ELSE
	{

			#####################################################
			# 시작 => QUERYSTRING__이면
			#####################################################

					#################################################
					# 시작 => QUERY_STRING
					#################################################

					//===============================================
					// QUERYSTRING
					@$mode = $_POST['mode'];


					//===============================================
					// 시작 => MODE__투표하기__여부
					IF (@$mode == "vote_do")
					{

							#############################################
							# 시작 => MODE__투표하기__이면

							//===========================================
							// QUERYSTRING__POST
							@$avl_n				= $_POST['avl_n'];
							@$bo_table		= $_POST['bo_table'];
							@$wr_id				= $_POST['wr_id'];
							@$atvt_vote		= $_POST['atvt_vote'];
							@$atvt_vote_n	= $_POST['atvt_vote_n'];

					}
					ELSE
					{

							#############################################
							# 시작 => MODE__투표하기__아니면

							//===========================================
							// QUERYSTRING__GET
							@$v_page		= $_GET['v_page'];
							@$avl_n			= $_GET['avl_n'];
							@$bo_table	= $_GET['bo_table'];
							@$wr_id			= $_GET['wr_id'];

					}
					// 끝 => MODE__투표하기__여부
					//===============================================

					#################################################
					# 끝 => QUERY_STRING
					#################################################



					#################################################
					# 시작 => 라이브러리__파일__첨부____선처리
					#################################################

					//===============================================
					// 라이브러리__첨부
					include_once('./_common.php');

					#################################################
					# 끝 => 라이브러리__파일__첨부____선처리
					#################################################

			#####################################################
			# 끝 => QUERYSTRING__이면
			#####################################################

	}
	// 끝 => 상위_첨부_위치__INCLUDE__구분
	//=======================================================

	#########################################################
	# 끝 => 상위_첨부_위치__INCLUDE__구분
	#########################################################



	#########################################################
	# 시작 => 피리_게시글에_투표__설정_정보_파일__첨부
	#########################################################

	//=======================================================
	// 피리_메뉴__번호
	$piree_menu_n = 770015;


	//=======================================================
	// 기본_설정_첨부__여부
	// 0 - 안해
	$is_get__piree_config = 0;


	//=======================================================
	// 피리_게시글에_투표__설정_정보__가져오기
	$is_get__article_vote = 1;


	//=======================================================
	// 피리_게시글에_투표__ROW_정보__가져오기
	$is_get__article_info = 1;


	//=======================================================
	// 피리_게시글에_투표__설정_정보_파일__경로
	include_once( get__sam_file($piree_menu_n, '') );

	#########################################################
	# 끝 => 피리_게시글에_투표__설정_정보_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 상수__변수__배열
	#########################################################

	//=======================================================
	// 투표_가능__여부
	// 0 - 불가
	// 1 - 가능
	$is_possible_vote = get__is_possible_vote($member['mb_level'], $ARTI_VOTE_vote_regi_level_n, $vote_row['avl_level_n'], $vote_row['avl_end_time_n']);

	#########################################################
	# 끝 => 상수__변수__배열
	#########################################################

	
	//하단 (600번째줄가량)에 있던 투표 DB에 접근하기 위한 상수목록.
	#####################################################
	# 시작 => 상수__변수__배열
	#####################################################

	//===================================================
	// 투표__번호 //900번째줄 가량에서 따옴.
	$avl_n = $vote_row['avl_n'];

	//===================================================
	// 기존_투표_기록__배열
	$old_vote_do_arr = array();


	//===================================================
	// 기존_투표_건수
	$my_vote_t = 0;


	//===================================================
	// 선택_투표_ROW__가져오는__쿼리문_조건절
	$sql_wh_s_1 = "`avr_avl_n`='".$avl_n."' AND `avr_bo_table`='".$bo_table."' AND `avr_wr_id`='".$wr_id."'";


	//===================================================
	// 선택_투표_ROW_의__내_투표__가져오는__쿼리문_조건절
	$sql_wh_s_2 = "`avr_mem_id`='".$member['mb_id']."' AND ".$sql_wh_s_1;

	#####################################################
	# 끝 => 상수__변수__배열 for DB
	#####################################################

	#########################################################
	# 시작 => 보는_화면__스킨_파일_이름__알아내기
	#########################################################
	IF ($vote_row['avl_n'] > 0)
	{
		/*
			//===================================================
			// 기존_투표_건수__알아내기 => 투표 했으면 결과보기로 아니면 투표하기로.
			$sql  = "SELECT COUNT(*) FROM `".$piree_table['vote_result']."` WHERE ".$sql_wh_s_2;
			$my_vote_t = sql_efv($sql);
			//===================================================
			// 시작 => 기존_투표_건수__있으면
			IF ($my_vote_t > 0)
			{
				$v_page = 'result';//하단 case문에서 result에 걸리게끔.=> vote_result.skin.php를 보여줌.
			}
			// 끝 => 기존_투표_건수__있으면
			//===================================================
*/
			//===================================================
			// 보는_화면__스킨_파일_이름
			// form   - 투표하기
			// result - 결과보기
			/*
			$vote_view_skin_file = "vote_result.skin.php";
			$vote_view_skin_file = "vote_do_form.skin.php";
			*/
			$vote_view_skin_file = "vote_result.skin.php";


			//===================================================
			// 시작 => 투표하기__여부
			IF ($mode == "vote_do")
			{

					#################################################
					# 시작 => 투표하기__이면
					#################################################

					//===============================================
					// 시작 => 투표__불가_하면
					IF ($is_possible_vote != 1)
					{
							echo "#ERROR:투표를 할수 없습니다.";
							EXIT;
					}
					// 끝 => 투표__불가_하면
					//===============================================


					//===============================================
					// 보는_화면__스킨_파일_이름
					// result - 결과보기
					$vote_view_skin_file = "vote_result.skin.php";

			}
			ELSE
			{

					#################################################
					# 시작 => 투표하기__아니면
					#################################################

					//===============================================
					// 시작 => 전달된__보는_페이지__구분
					SWITCH ($v_page)
					{

							#############################################
							# 시작 => 투표하기
							CASE 'do_form' :

									//=======================================
									// 보는_화면__스킨_파일_이름
									// form   - 투표하기
									$vote_view_skin_file = "vote_do_form.skin.php";

							BREAK;
							# 끝 => 투표하기
							#############################################


							#############################################
							# 시작 => 결과보기
							CASE 'result' :

									//=======================================
									// 보는_화면__스킨_파일_이름
									// result - 결과보기
									$vote_view_skin_file = "vote_result.skin.php";

							BREAK;
							# 끝 => 결과보기
							#############################################

					}
					// 끝 => 전달된__보는_페이지__구분
					//===============================================


					//===============================================
					// 시작 => 보는_화면__스킨_파일_이름__투표하기__이면
					IF ($vote_view_skin_file == "vote_do_form.skin.php")
					{

							//===========================================
							// 시작 => 투표__불가_하면
							IF ($is_possible_vote != 1)
							{

									//=======================================
									// 보는_화면__스킨_파일_이름
									// result - 결과보기
									$vote_view_skin_file = "vote_result.skin.php";

							}
							// 끝 => 투표__불가_하면
							//===========================================

					}
					// 끝 => 보는_화면__스킨_파일_이름__투표하기__이면
					//===============================================

			}
			// 끝 => 투표하기__여부
			//===================================================

	}
	#########################################################
	# 끝 => 보는_화면__스킨_파일_이름__알아내기
	#########################################################



	#########################################################
	# 시작 => 투표__하기
	#########################################################
	IF ($mode == "vote_do")
	{
			#####################################################
			# 시작 => 투표_정보__유무_확인하기
			#####################################################

			//===================================================
			// 시작 => 투표_ROW__없으면
			IF ($bo_table != $vote_row['avl_bo_table'] || $wr_id != $vote_row['avl_wr_id'])
			{
					echo "#ERROR:투표 정보가 없습니다.";
					EXIT;
			}
			// 끝 => 투표_ROW__없으면
			//===================================================

			#####################################################
			# 끝 => 투표_정보__유무_확인하기
			#####################################################



			#####################################################
			# 시작 => 투표_가능__검증하기
			#####################################################

			//===================================================
			// 시작 => 손님__이면
			IF (!$is_member)
			{
					echo "#ERROR:투표는 회원만 할수 있습니다.";
					EXIT;
			}
			// 끝 => 손님__이면
			//===================================================


			//===================================================
			// 시작 => 투표_번호__없면
			IF (!$vote_row['avl_n'] || $vote_row['avl_n'] == 0)
			{
					echo "#ERROR:투표 정보가 없습니다.";
					EXIT;
			}
			// 끝 => 투표_번호__없면
			//===================================================


			//===================================================
			// 시작 => 프로그램_설정____투표_레벨__미달하면
			IF ($ARTI_VOTE_vote_regi_level_n > $member['mb_level'])
			{
					echo "#ERROR:투표에 참여할 권한이 없습니다.\\n\\n게시글에 투표는 레벨 ".$ARTI_VOTE_vote_regi_level_n." 이상 할수 있습니다.";
					EXIT;
			}
			// 끝 => 프로그램_설정____투표_레벨__미달하면
			//===================================================


			//===================================================
			// 시작 => 투표_별____투표_레벨__미달하면
			IF ($vote_row["avl_level_n"] > $member['mb_level'])
			{
					echo "#ERROR:투표에 참여할 권한이 없습니다.\\n\\n이 투표는 레벨 ".$vote_row["avl_level_n"]." 이상 할수 있습니다.";
					EXIT;
			}
			// 끝 => 투표_별____투표_레벨__미달하면
			//===================================================


			//===================================================
			// 시작 => 투표_마감__지났으면
			IF (G5_SERVER_TIME > $vote_row['avl_end_time_n'])
			{
					echo "#ERROR:이 투표는 이미 마감되었습니다.";
					EXIT;
			}
			// 끝 => 투표_마감__지났으면
			//===================================================

			#####################################################
			# 끝 => 투표_가능__검증하기
			#####################################################



			#####################################################
			# 시작 => 단일투표__복수투표__구분__검증
			#####################################################

			//===================================================
			// 시작 => 단일투표__복수투표__구분
			IF (!$vote_row["avl_vote_do_t"] || $vote_row["avl_vote_do_t"] < 2)
			{

					#################################################
					# 시작 => 단일투표
					#################################################

					//===============================================
					// 시작 => 투표한_항목__없으면
					IF (!$atvt_vote_n || $atvt_vote_n == 0)
					{
							echo "#ERROR:선택한 투표항목이 없습니다. 투표 항목을 선택해 주세요.";
							EXIT;
					}
					// 끝 => 투표한_항목__없으면
					//===============================================


					//===============================================
					// 투표한_항목__배열_저장
					$atvt_vote[$atvt_vote_n] = $atvt_vote_n;

			}
			ELSE
			{

					#################################################
					# 시작 => 복수투표
					#################################################

					//===============================================
					// 시작 => 투표한_항목__없으면
					IF (!count($atvt_vote) || count($atvt_vote) == 0)
					{
							echo "#ERROR:선택한 투표항목이 없습니다. [ ".$vote_row["avl_vote_do_t"]." ]표 이내로 항목을 선택해 주세요.";
							EXIT;
					}
					// 끝 => 투표한_항목__없으면
					//===============================================

			}
			// 끝 => 단일투표__복수투표__구분
			//===================================================


			//===================================================
			// 시작 => 중복_투표__초과_했으면
			IF (count($atvt_vote) > $vote_row["avl_vote_do_t"])
			{
					echo "#ERROR:이 투표는 [ ".$vote_row["avl_vote_do_t"]." ]표 까지만 할수 있습니다.";
					EXIT;
			}
			// 끝 => 중복_투표__초과_했으면
			//===================================================

			#####################################################
			# 끝 => 단일투표__복수투표__구분__검증
			#####################################################


/* 투표 여부에 따라 다른 뷰 보여주는 기능 추가로 인해 상단에 배치함 BryanPark.
			#####################################################
			# 시작 => 상수__변수__배열
			#####################################################

			//===================================================
			// 기존_투표_기록__배열
			$old_vote_do_arr = array();


			//===================================================
			// 기존_투표_건수
			$my_vote_t = 0;


			//===================================================
			// 선택_투표_ROW__가져오는__쿼리문_조건절
			$sql_wh_s_1 = "`avr_avl_n`='".$avl_n."' AND `avr_bo_table`='".$bo_table."' AND `avr_wr_id`='".$wr_id."'";


			//===================================================
			// 선택_투표_ROW_의__내_투표__가져오는__쿼리문_조건절
			$sql_wh_s_2 = "`avr_mem_id`='".$member['mb_id']."' AND ".$sql_wh_s_1;

			#####################################################
			# 끝 => 상수__변수__배열
			#####################################################
*/


			#####################################################
			# 시작 => 재_투표__불가__하면
			#####################################################

			//===================================================
			// 기존_투표_건수__알아내기
			$sql  = "SELECT COUNT(*) FROM `".$piree_table['vote_result']."` WHERE ".$sql_wh_s_2;
			$my_vote_t = sql_efv($sql);


			//===================================================
			// 시작 => 기존_투표_건수__있으면
			IF ($my_vote_t > 0)
			{

					//===============================================
					// 시작 => 재_투표__가능_불가__구분
					IF ($vote_row['avl_re_vote_n'] == 1)
					{

							#############################################
							# 시작 => 재_투표__가능

							//===========================================
							// 기존_투표_목록__불러오기
							$sql = "SELECT avr_opinion_n FROM `".$piree_table['vote_result']."` ";
							$sql .= "WHERE ".$sql_wh_s_2;
							$result = sql_query ($sql);


							//===========================================
							// 시작 => 반복문
							WHILE ($row = sql_fetch_array($result))
							{

									//=======================================
									// 시작 => 투표_항목_번호__있으면
									IF ($row['avr_opinion_n'] > 0)
									{

											//===================================
											// 기존_투표_항목_번호
											$avr_opinion_in_n = $row['avr_opinion_n'];


											//===================================
											// 기존_투표_기록__배열_에__저장
											$old_vote_do_arr[$avr_opinion_in_n] = $row['avr_opinion_n'];

									}
									// 끝 => 투표_항목_번호__있으면
									//=======================================

							}
							// 끝 => 반복문
							//===========================================

					}
					ELSE
					{

							#############################################
							# 시작 => 재_투표__불가

							echo "#ERROR:이미 이 투표에 참여 하셨습니다.";
							EXIT;

					}
					// 끝 => 재_투표__가능_불가__구분
					//===============================================

			}
			// 끝 => 기존_투표_건수__있으면
			//===================================================

			#####################################################
			# 끝 => 재_투표__불가__하면
			#####################################################



			#####################################################
			# 시작 => 투표__기록하기
			#####################################################

			//===================================================
			// 시작 => 반복문
			FOR ($i=1; $i<=$ARTI_VOTE_vote_item_t; $i++)
			{

					//===============================================
					// 시작 => 투표__했으면
					IF ($atvt_vote[$i] > 0)
					{

							//===========================================
							// 시작 => 기존_투표_기록__있으면
							IF ($old_vote_do_arr[$i] > 0)
							{

									#########################################
									# 시작 => 기존_투표_기록__있으면__수정

									//=======================================
									// 수정하는__쿼리문
									$sql  = "UPDATE `".$piree_table['vote_result']."` SET ";
									$sql .= "`avr_opinion_n`		=	'".$i."', ";
									$sql .= "`avr_opinion_s`		=	'', ";
									$sql .= "`avr_ip_s`					=	'".$_SERVER['REMOTE_ADDR']."', ";
									$sql .= "`avr_regi_time_n`	=	'".G5_SERVER_TIME."' ";
									$sql .= "WHERE ".$sql_wh_s_2." AND `avr_opinion_n`='".$i."'";


									//=======================================
									// 동작_문자열
									$action_s = "수정";

							}
							ELSE
							{

									#########################################
									# 시작 => 기존_투표_기록__없으면__입력

									//=======================================
									// 입력하는__쿼리문
									$sql  = "INSERT INTO `".$piree_table['vote_result']."` SET ";
									$sql .= "`avr_avl_n`				=	'".$avl_n."', ";
									$sql .= "`avr_mem_id`				=	'".$member['mb_id']."', ";
									$sql .= "`avr_bo_table`			=	'".$bo_table."', ";
									$sql .= "`avr_wr_id`				=	'".$wr_id."', ";
									$sql .= "`avr_opinion_n`		=	'".$i."', ";
									$sql .= "`avr_opinion_s`		=	'', ";
									$sql .= "`avr_ip_s`					=	'".$_SERVER['REMOTE_ADDR']."', ";
									$sql .= "`avr_regi_time_n`	=	'".G5_SERVER_TIME."'";


									//=======================================
									// 동작_문자열
									$action_s = "입력";

							}
							// 끝 => 기존_투표_기록__있으면
							//===========================================


							//===========================================
							// 시작 => 쿼리_실행
							IF ( !sql_query ($sql) )
							{
									echo "#ERROR:투표 결과를 [ ".$action_s." ] 하지 못했습니다.";
									EXIT;
							}
							// 끝 => 쿼리_실행
							//===========================================

					}
					// 끝 => 투표__했으면
					//===============================================

			}
			// 끝 => 반복문
			//===================================================

			#####################################################
			# 끝 => 투표__기록하기
			#####################################################



			#####################################################
			# 시작 => 기존_투표_중__재_투표__안된_건수__파악하고__지우기
			#####################################################

			//===================================================
			// 기존_투표_중__재_투표__안된_건수__알아내기
			$sql  = "SELECT COUNT(*) FROM `".$piree_table['vote_result']."` WHERE ".$sql_wh_s_2." AND `avr_regi_time_n`<>'".G5_SERVER_TIME."'";
			$my_vote_t = sql_efv($sql);


			//===================================================
			// 시작 => 기존_투표_중__재_투표__안된_건수__있으면
			IF ($my_vote_t > 0)
			{

					//===============================================
					// 삭제하는__쿼리문
					$sql = "DELETE FROM `".$piree_table['vote_result']."` WHERE ".$sql_wh_s_2." AND `avr_regi_time_n`<>'".G5_SERVER_TIME."'";


					//===============================================
					// 시작 => 쿼리_실행
					IF ( !sql_query ($sql) )
					{
							echo "#ERROR:투표 정보를 새로고침 하지 못했습니다. TOD";
							EXIT;
					}
					// 끝 => 쿼리_실행
					//===============================================

			}
			// 끝 => 기존_투표_중__재_투표__안된_건수__있으면
			//===================================================

			#####################################################
			# 끝 => 기존_투표_중__재_투표__안된_건수__파악하고__지우기
			#####################################################



			#####################################################
			# 시작 => 전체_투표_수__알아내기
			#####################################################

			//===================================================
			// 전체__투표_참여_ROW_건수__알아내기
			$sql  = "SELECT COUNT(*) FROM `".$piree_table['vote_result']."` WHERE ".$sql_wh_s_1;
			$vote_all_t = sql_efv($sql);


			//===================================================
			// 전체__투표_참여_항목_건수__알아내기
			$sql  = "SELECT COUNT(DISTINCT avr_mem_id) FROM `".$piree_table['vote_result']."` WHERE ".$sql_wh_s_1;
			$vote_mem_t = sql_efv($sql);
			$vote_mem_t = (int)$vote_mem_t;

			#####################################################
			# 끝 => 전체_투표_수__알아내기
			#####################################################



			#####################################################
			# 시작 => 각_항목__수치_정보__가져오기
			#####################################################

			//===================================================
			// 투표_수__배열
			$vate_tot_arr = array();


			//===================================================
			// 백분율__배열
			$vate_per_arr = array();


			//===================================================
			// 저장_쿼리
			$sql_save_vote = "";


			//===================================================
			// 시작 => 반복문
			FOR ($i=1; $i<=$ARTI_VOTE_vote_item_t; $i++)
			{

					//===============================================
					// 득표수__기본값
					$vote_t = 0;


					//===============================================
					// 백분율
					$per_f = 0;


					//===============================================
					// 시작 => 투표__항목_이미지__있으면
					IF ($vote_row['avl_poll_'.$i] || $vote_row['avl_image_'.$i])
					{

							//===========================================
							// 득표수__알아내기
							$sql  = "SELECT COUNT(*) FROM `".$piree_table['vote_result']."` ";
							$sql .= "WHERE ".$sql_wh_s_1." AND `avr_opinion_n`='".$i."'";
							$vote_t = sql_efv($sql);


							//===========================================
							// 백분율
							// $per_n = ($vote_all_t/$vote_t)*100;
							$per_n = ($vote_t/$vote_all_t)*100;
							$per_f =  sprintf("%.2f",$per_n);;
							// $per_f = number_format($per_n);

					}
					// 끝 => 투표__항목_이미지__있으면
					//===============================================


					//===============================================
					// 저장_쿼리
					$sql_save_vote .= "`avl_vote_".$i."`	=	'".$vote_t."', ";
					$sql_save_vote .= "`avl_per_".$i."`		=	'".$per_f."', ";

			}
			// 끝 => 반복문
			//===================================================

			#####################################################
			# 끝 => 각_항목__수치_정보__가져오기
			#####################################################



			#####################################################
			# 시작 => 투표_참여_기록__새로고침_하기
			#####################################################

			//===================================================
			// 수정하는__쿼리문
			$sql  = "UPDATE `".$piree_table['vote_list']."` SET ";
			$sql .= $sql_save_vote;
			$sql .= "`avl_vote_all_t`	=	'".$vote_all_t."', ";
			$sql .= "`avl_vote_mem_t`	=	'".$vote_mem_t."' ";
			$sql .= "WHERE `avl_n`='".$avl_n."' AND `avl_bo_table`='".$bo_table."' AND `avl_wr_id`='".$wr_id."'";


			//===================================================
			// 시작 => 쿼리_실행
			IF ( !sql_query ($sql) )
			{
					echo "#ERROR:투표 정보를 새로고침 하지 못했습니다. RCU";
					EXIT;
			}
			// 끝 => 쿼리_실행
			//===================================================

			#####################################################
			# 끝 => 투표_참여_기록__새로고침_하기
			#####################################################



			#####################################################
			# 시작 => 투표_ROW__가져오기
			#####################################################

			//===================================================
			// 피리_게시글에_투표__정보__가져오기
			$vote_row = get__article_vote_row_info($bo_table, $wr_id);


			//===================================================
			// 시작 => 투표_ROW__없으면
			IF ($bo_table != $vote_row['avl_bo_table'] || $wr_id != $vote_row['avl_wr_id'])
			{
					echo "#ERROR:투표 정보가 없습니다.";
					EXIT;
			}
			// 끝 => 투표_ROW__없으면
			//===================================================

			#####################################################
			# 끝 => 투표_ROW__가져오기
			#####################################################

	}
	#########################################################
	# 끝 => MODE__투표하기__이면
	#########################################################



	#########################################################
	# 시작 => 결과__보기
	#########################################################

			#####################################################
			# 시작 => 투표_정보__배열
			#####################################################

			//===================================================
			// 투표__항목__배열
			$avl_poll_arr = array();


			//===================================================
			// 투표__이미지__배열
			$avl_image_arr = array();


			//===================================================
			// 시작 => 보는_화면__스킨_파일_이름__구분
			IF ($vote_view_skin_file == "vote_do_form.skin.php")
			{

					#################################################
					# 시작 => 보는_화면__스킨_파일_이름
					# form - 투표하기
					#################################################

			}
			ELSE
			{

					#################################################
					# 시작 => 보는_화면__스킨_파일_이름
					# result - 결과보기
					#################################################

					//===============================================
					// 투표__득표수__배열
					$avl_vote_arr = array();


					//===============================================
					// 투표__득표율__배열
					$avl_per_arr = array();


					//===============================================
					// 시작 => 반복문
					FOR ($i=1; $i<=$ARTI_VOTE_vote_item_t; $i++)
					{

							//===========================================
							// 투표__득표수
							$avl_vote_arr[$i] = $vote_row['avl_vote_'.$i];


							//===========================================
							// 투표__득표율__있으면
							$avl_per_arr[$i] = $vote_row['avl_per_'.$i];

					}
					// 끝 => 반복문
					//===============================================

			}
			// 끝 => 보는_화면__스킨_파일_이름__구분
			//===================================================

			#####################################################
			# 끝 => 투표_정보__배열
			#####################################################



			#####################################################
			# 시작 => 투표_정보__변수
			#####################################################

			//===================================================
			// 투표__번호
			$avl_n = $vote_row['avl_n'];


			//===================================================
			// 투표__등록인_아이디
			$avl_mem_id = $vote_row['avl_mem_id'];


			//===================================================
			// 투표__테이블_코드
			$avl_bo_table = $vote_row['avl_bo_table'];


			//===================================================
			// 투표__게시글_번호
			$avl_wr_id = $vote_row['avl_wr_id'];


			//===================================================
			// 제목
			$avl_title_s = stripslashes($vote_row['avl_title_s']);


			//===================================================
			// 투표__가능_레벨
			$avl_level_n = $vote_row['avl_level_n'];


			//===================================================
			// 투표_가능_수
			$avl_vote_do_t = $vote_row['avl_vote_do_t'];


			//===================================================
			// 재_투표_가능__여부
			$avl_re_vote_n = $vote_row['avl_re_vote_n'];


			//===================================================
			// 총_투표_표_수
			$avl_vote_all_t = $vote_row['avl_vote_all_t'];


			//===================================================
			// 총_투표_회원_수
			$avl_vote_mem_t = $vote_row['avl_vote_mem_t'];


			//===================================================
			// 투표_항목_수
			$avl_poll_t = $vote_row['avl_poll_t'];


			//===================================================
			// 투표_이미지_수
			$avl_image_t = $vote_row['avl_image_t'];


			//===================================================
			// 투표_마감__날짜_시간
			$avl_end_time_n = $vote_row['avl_end_time_n'];


			//===================================================
			// 시작 => 반복문
			FOR ($i=1; $i<=$ARTI_VOTE_vote_item_t; $i++)
			{

					//===============================================
					// 시작 => 투표__항목__있으면
					IF ($vote_row['avl_poll_'.$i])
					{

							//===========================================
							// 투표__항목
							$avl_poll_arr[$i] = stripslashes($vote_row['avl_poll_'.$i]);

					}
					// 끝 => 투표__항목__있으면
					//===============================================


					//===============================================
					// 시작 => 투표__이미지__있으면
					IF ($vote_row['avl_image_'.$i])
					{

							//===========================================
							// 투표__이미지
							$avl_image_arr[$i] = $vote_row['avl_image_'.$i];

					}
					// 끝 => 투표__이미지__있으면
					//===============================================

			}
			// 끝 => 반복문
			//===================================================

			#####################################################
			# 끝 => 투표_정보__변수
			#####################################################

	#########################################################
	# 끝 => 결과__보기
	#########################################################



	#########################################################
	# 시작 => 마무리__페이지_ECHO_관련
	#########################################################
	IF ($avl_n > 0)
	{

			//===================================================
			// 시작 => DEVIDE__구분
			IF (G5_IS_MOBILE == 1)
			{

					#################################################
					# 시작 => DEVIDE__모바일__이름

					//===============================================
					// 스킨__URL
					$skin_device_u = $ARTI_VOTE_SKIN_MO_u;


					//===============================================
					// 스킨__PATH
					$skin_path_s = $ARTI_VOTE_SKIN_MO_p .'/'. $vote_view_skin_file;

			}
			ELSE
			{

					#################################################
					# 시작 => DEVIDE__PC__이면

					//===============================================
					// 스킨__URL
					$skin_device_u = $ARTI_VOTE_SKIN_PC_u;


					//===============================================
					// 스킨__PATH
					$skin_path_s = $ARTI_VOTE_SKIN_PC_p .'/'. $vote_view_skin_file;

			}
			// 끝 => DEVIDE__구분
			//===================================================


			//===================================================
			// 게시글에_투표__등록__스타일
			add_stylesheet('<link rel="stylesheet" href="'.$skin_device_u.'/style.css">', 0);


			//===================================================
			// 레이어
			// <section id="vote_write_view">
?>

			<script>
					var vote_do_t = <?php echo $avl_vote_do_t; ?>;
					var Piree_Article_Vote_Url = "<?php echo PIREE_ARTICLE_VOTE_URL; ?>";
			</script>


			<script src="<?php echo $skin_device_u ?>/vote.js"></script>


			<section id="article_vote_view">
<?php

			//===================================================
			// 주_스킨_파일__첨부
			include_once($skin_path_s);


			//===================================================
			// 레이어
?>
			</section>
<?php

	}
	#########################################################
	# 끝 => 마무리__페이지_ECHO_관련
	#########################################################


?>