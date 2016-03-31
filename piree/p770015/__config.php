<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 12월 26일 금요일 오전 02시 53분 - 날씨 추버 추버

	업데이트 날짜 : 2015년 12월 31일 목요일 오후 16시 12분 - 날씨 푹해(?)

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 피리 게시글에 투표 PLUS G5 > CONFIG 화일
===========================================================


*/


		#######################################################
		# 시작 => 접근__유효__확인
		#######################################################

		//=====================================================
		// 개별_페이지__접근_불가
		IF ( !defined('_GNUBOARD_') )									EXIT;

		#######################################################
		# 끝 => 접근__유효__확인
		#######################################################



###########################################################
# 시작 => 기본_설정_첨부__하기
###########################################################


		//=====================================================
		// 시작 => 기본_설정_첨부__하기
		IF ($is_get__piree_config == 1)
		{

				//=================================================
				// 설정_정보_파일__첨부
				include_once( get__sam_file(PIREE_PROG_PLUS_MENU_N, '') );

		}
		// 끝 => 기본_설정_첨부__하기
		//=====================================================


###########################################################
# 끝 => 기본_설정_첨부__하기
###########################################################








###########################################################
# 시작 => 설정
###########################################################


		#######################################################
		# 시작 => 프로그램__정보
		#######################################################

		//=====================================================
		// 프로그램_번호
		$g_program_n = 770015;


		//=====================================================
		// 프로그램_코드
		$g_program_c = "PIREE Article Vote PLUS G5";


		//=====================================================
		// 프로그램_이름
		$g_program_s = "피리 게시글에 투표 PLUS G5";


		//=====================================================
		// 버젼
		$g_program_version_s = "0.1";


		//=====================================================
		// 유료_유료__여부
		$is_paid = 0;


		//=====================================================
		// 프로그램_메모
		$prog_memo_s = "( 유료 ) 그누보드 G5용 \"마이페이지\"입니다.";

		#######################################################
		# 끝 => 프로그램__정보
		#######################################################



		#######################################################
		# 시작 => 기본_상수
		#######################################################

		//=====================================================
		// AJAX__댓글__프로그램_번호
		define('PIREE_ARTICLE_VOTE_GNU_PROG_N',	'770015');


		//=====================================================
		// AJAX__댓글
		define('PIREE_ARTICLE_VOTE_DIR',	'p'.PIREE_ARTICLE_VOTE_GNU_PROG_N);
		define('PIREE_ARTICLE_VOTE_URL',	PIREE_URL.'/'.PIREE_ARTICLE_VOTE_DIR);
		define('PIREE_ARTICLE_VOTE_PATH',	PIREE_PATH.'/'.PIREE_ARTICLE_VOTE_DIR);


		//=====================================================
		// 이미지__글번호_폴더_번호__나누는_숫자
		define('ARTICLE_VOTE_IMAGE_FOLDER_DIV_N',	'50000');

		#######################################################
		# 끝 => 기본_상수
		#######################################################


###########################################################
# 끝 => 설정
###########################################################








###########################################################
# 시작 => 테이블__이름
###########################################################


		//=====================================================
		// 게시글에_투표_목록__테이블
		$piree_table['vote_list'] = G5_TABLE_PREFIX.'_piree_'. $g_program_n .'_vote_list';


		//=====================================================
		// 게시글에_투표_결과__테이블
		$piree_table['vote_result'] = G5_TABLE_PREFIX.'_piree_'. $g_program_n .'_vote_result';


###########################################################
# 끝 => 테이블__이름
###########################################################








###########################################################
# 시작 => 기타__설정
###########################################################


		//=====================================================
		//


###########################################################
# 끝 => 기타__설정
###########################################################








###########################################################
# 시작 => 함수
###########################################################


		#######################################################
		# 시작 => 투표_등록_가능__여부
		#######################################################
		function get__is_possible_vote($mb_level, $vote_regi_level_n, $avl_level_n, $avl_end_time_n)
		{

			//===================================================
			// 전역변수
			global $is_member;


			//===================================================
			// 투표_가능__여부
			// 0 - 불가
			// 1 - 가능
			$is_possible_vote = 0;


			//===================================================
			// 시작 => 회원__이면
			IF ($is_member)
			{

					//===============================================
					// 시작 => 프로그램_설정____투표_레벨__만족하면
					IF ($mb_level >= $vote_regi_level_n)
					{

							//===========================================
							// 시작 => 투표_별____투표_레벨__만족하면
							IF ($mb_level >= $avl_level_n)
							{

									//=======================================
									// 시작 => 투표_날짜__안지났으면
									IF ($avl_end_time_n > G5_SERVER_TIME)
									{

											//===================================
											// 투표_가능__여부
											// 1 - 가능
											$is_possible_vote = 1;


									}
									// 끝 => 투표_날짜__안지났으면
									//=======================================

							}
							// 끝 => 투표_별____투표_레벨__만족하면
							//===========================================

					}
					// 끝 => 프로그램_설정____투표_레벨__만족하면
					//===============================================

			}
			// 끝 => 회원__이면
			//===================================================


			//===================================================
			// 넘겨주기
			return $is_possible_vote;

		}
		#######################################################
		# 끝 => 투표_등록_가능__여부
		#######################################################



		#######################################################
		# 시작 => 이미지_폴더_배열_가져오기
		#######################################################
		function get_vote_image_dir($bo_table, $wr_id)
		{

				//=================================================
				// 이미지_디렉토리_배열
				$image_dir_arr = array();


				//=================================================
				// 시작 => 필수_정보__다__있으면
				IF ($bo_table && $wr_id > 0)
				{

						//=============================================
						// 투표_디렉토리_이름
						$vote_dir_name = "vote";


						//=============================================
						// 디렉토리_분할
						$vote_dir_div_s = ceil($wr_id/ARTICLE_VOTE_IMAGE_FOLDER_DIV_N);


						//=============================================
						// 투표_디렉토리__경로
						$image_dir_arr[0] = $vote_dir_name;
						$image_dir_arr[1] = $bo_table;
						$image_dir_arr[2] = $vote_dir_div_s;
						$image_dir_arr[3] = $wr_id;

				}
				// 끝 => 필수_정보__다__있으면
				//=================================================


				//=================================================
				// 이미지_디렉토리_배열__넘겨주기
				return $image_dir_arr;

		}
		#######################################################
		# 끝 => 이미지_폴더_배열_가져오기
		#######################################################



		#######################################################
		# 시작 => 이미지__폴더_이름_정보__가져오기
		#######################################################
		function get_vote_image_info($bo_table, $wr_id)
		{

				//=================================================
				// 이미지_정보_배열
				$vote_image_info_arr['dir']  = "";
				$vote_image_info_arr['url']  = "";
				$vote_image_info_arr['path'] = "";


				//=================================================
				// 시작 => 필수_정보__다__있으면
				IF ($bo_table && $wr_id > 0)
				{

						//=============================================
						// 이미지_폴더_배열_가져오기
						$image_dir_arr = get_vote_image_dir($bo_table, $wr_id);


						//=============================================
						// 투표_이미지__디렉토리
						$vote_image_info_arr['dir'] = $image_dir_arr[0] .'/'. $image_dir_arr[1] .'/'. $image_dir_arr[2] .'/'. $image_dir_arr[3];


						//=============================================
						// 투표_이미지__URL
						$vote_image_info_arr['url'] = G5_DATA_URL .'/'. $vote_image_info_arr['dir'];


						//=============================================
						// 투표_이미지__PATH
						$vote_image_info_arr['path'] = G5_DATA_PATH .'/'. $vote_image_info_arr['dir'];

				}
				// 끝 => 필수_정보__다__있으면
				//=================================================


				//=================================================
				// 이미지_정보_배열
				return $vote_image_info_arr;

		}
		#######################################################
		# 끝 => 이미지__폴더_이름_정보__가져오기
		#######################################################



		#######################################################
		# 시작 => 디렉토리_알아내기____유무_확인하기
		#######################################################
		function get_vote_dir($bo_table, $wr_id)
		{

				//=================================================
				// 디렉토리_이름
				$vote_image_path_s = "";


				//=================================================
				// 시작 => 필수_정보__다__있으면
				IF ($bo_table && $wr_id > 0)
				{

						//=============================================
						// 이미지_폴더_배열_가져오기
						$image_dir_arr = get_vote_image_dir($bo_table, $wr_id);


						//=============================================
						// 투표_디렉토리__경로
						$vote_image_path_1 = G5_DATA_PATH .'/'. $image_dir_arr[0];
						$vote_image_path_2 = $vote_image_path_1 .'/'. $image_dir_arr[1];
						$vote_image_path_3 = $vote_image_path_2 .'/'. $image_dir_arr[2];
						$vote_image_path_s = $vote_image_path_3 .'/'. $image_dir_arr[3];


						//=============================================
						// 시작 => 디렉토리__없으면
						IF (!file_exists($vote_image_path_1))
						{
								//=========================================
								// 디렉토리__만들기
								// 퍼미션__변경
								mkdir($vote_image_path_1, G5_DIR_PERMISSION);
								chmod($vote_image_path_1, G5_DIR_PERMISSION);
						}
						// 끝 => 디렉토리__없으면
						//=============================================


						//=============================================
						// 시작 => 디렉토리__없으면
						IF (!file_exists($vote_image_path_2))
						{
								//=========================================
								// 디렉토리__만들기
								// 퍼미션__변경
								mkdir($vote_image_path_2, G5_DIR_PERMISSION);
								chmod($vote_image_path_2, G5_DIR_PERMISSION);
						}
						// 끝 => 디렉토리__없으면
						//=============================================


						//=============================================
						// 시작 => 디렉토리__없으면
						IF (!file_exists($vote_image_path_3))
						{
								//=========================================
								// 디렉토리__만들기
								// 퍼미션__변경
								mkdir($vote_image_path_3, G5_DIR_PERMISSION);
								chmod($vote_image_path_3, G5_DIR_PERMISSION);
						}
						// 끝 => 디렉토리__없으면
						//=============================================


						//=============================================
						// 시작 => 디렉토리__없으면
						IF (!file_exists($vote_image_path_s))
						{
								//=========================================
								// 디렉토리__만들기
								// 퍼미션__변경
								mkdir($vote_image_path_s, G5_DIR_PERMISSION);
								chmod($vote_image_path_s, G5_DIR_PERMISSION);
						}
						// 끝 => 디렉토리__없으면
						//=============================================

				}
				// 끝 => 필수_정보__다__있으면
				//=================================================


				//=================================================
				// 디렉토리_이름__넘겨주기
				return $vote_image_path_s;

		}
		#######################################################
		# 끝 => 디렉토리_알아내기____유무_확인하기
		#######################################################


###########################################################
# 끝 => 함수
###########################################################








###########################################################
# 시작 => 피리_게시글에_투표__설정_정보__가져오기
###########################################################


		#######################################################
		# 시작 => 피리_프로그램_정보__가져오는__함수
		#######################################################
		function get__prog_info__770015($prog_n)
		{

					//===============================================
					// 전역_변수
					global $piree, $is_piree_program_config;


					//===============================================
					// 넘겨줄__배열_변수
					$prog_info = array();


					//===============================================
					// 시작 => 피리_프로그램_번호__있으면
					IF ($prog_n > 0)
					{

							//===========================================
							// 피리_프로그램_정보__가져오기
							$sql = "SELECT * FROM `". $piree['program_sam'] ."` WHERE `pgs_prog_n` = '". $prog_n ."'";
							$row = sql_fetch($sql, false);


							//===========================================
							// 시작 => 칼럼__없으면
							IF (!isset($row['pgs_prog_n']))
							{

									//=======================================
									// 전역변수
									global $is_admin;


									//=======================================
									// 시작 => 운영자_일반회원__여부
									IF ($is_admin)
									{

											#####################################
											# 시작 => 운영자__이면

											//===================================
											// 시작 => 설정_화면__아니면
											IF ($is_piree_program_config != 1)
											{

													// 이동할__페이지
													$move_url = G5_ADMIN_URL.'/p'.PIREE_PROG_PLUS_MENU_N.'/';

													// 에러_알림
													alert ("프로그램이 설치되지 않았거나 DB정보가 없습니다. A - 770015", $move_url);

											}
											// 끝 => 설정_화면__아니면
											//===================================

									}
									ELSE
									{

											#####################################
											# 시작 => 일반회원__이면

											// 에러_알림
											alert ("프로그램이 설치되지 않았거나 DB정보가 없습니다. B - 770015", G5_URL);

									}
									// 끝 => 운영자_일반회원__여부
									//=======================================

							}
							// 끝 => 칼럼__없으면
							//===========================================


							//===========================================
							// 시작 => 피리_프로그램_번호__맞으면
							IF ($prog_n == $row['pgs_prog_n'])
							{

									//=======================================
									// 피리_프로그램_정보__배열
									$prog_info = $row;

							}
							// 끝 => 피리_프로그램_번호__맞으면
							//===========================================

					}
					// 끝 => 피리_프로그램_번호__있으면
					//===============================================


					//===============================================
					// 피리_프로그램_정보
					return $prog_info;

		}
		#######################################################
		# 끝 => 피리_프로그램_정보__가져오는__함수
		#######################################################



		#######################################################
		# 시작 => 피리_게시글에_투표__설정_정보__가져오는__함수
		#######################################################
		function get__article_vote_PLUS_config()
		{

					//===============================================
					// 전역_변수
					global $g_program_n, $piree, $is_get__piree_config;


					//===============================================
					// 프로그램_정보
					$prog_conf = array();


					//===============================================
					// 시작 => 피리_프로그램__테이블__유무
					IF (isset($piree['program_sam']) && $is_get__piree_config == 1)
					{

							//===========================================
							// 피리_프로그램_정보__가져오기
							$prog_conf = get__prog_info($g_program_n);

					}
					ELSE
					{

							//===========================================
							// 피리_프로그램_정보__가져오기
							$prog_conf = get__prog_info__770015($g_program_n);

					}
					// 끝 => 피리_프로그램__테이블__유무
					//===============================================


					//===============================================
					// 프로그램_번호
					$prog_conf['g_program_n'] = $g_program_n;


					//===============================================
					// 피리_게시글에_투표___설정
					// 넘겨줄_변수
					return $prog_conf;

		}
		#######################################################
		# 끝 => 피리_게시글에_투표__설정_정보__가져오는__함수
		#######################################################



		#######################################################
		# 시작 => 피리_게시글에_투표__ROW_정보__가져오기
		#######################################################
		function get__article_vote_row_info($bo_table, $wr_id)
		{

				//=================================================
				// 넘겨줄_투표_정보
				$row = "";


				//=================================================
				// 시작 => 게시판_테이블__게시글_번호__있으면
				IF ($bo_table && $wr_id > 0)
				{

						//=============================================
						// 전역_변수
						global $g_program_n, $piree_table;


						//=============================================
						// 피리_게시글에_투표__정보__가져오기
						$sql = "SELECT * FROM `".$piree_table['vote_list']."` WHERE avl_bo_table='".$bo_table."' AND avl_wr_id='".$wr_id."'";
						$row = sql_fetch($sql);

				}
				// 끝 => 게시판_테이블__게시글_번호__있으면
				//=================================================


				//=================================================
				// 투표_정보__넘겨주기
				return $row;

		}
		#######################################################
		# 끝 => 피리_게시글에_투표__ROW_정보__가져오기
		#######################################################



		#######################################################
		# 시작 => 피리_게시글에_투표____설정_정보__가져오기
		#######################################################

		//=====================================================
		// 피리_게시글에_투표___사용여부
		// 0 - 안함
		// 1 - 사용함
		$ARTI_VOTE_is_use = 0;


		//=====================================================
		// 시작 => 피리_게시글에_투표__설정_정보__가져오기__이면
		IF ($is_get__article_vote == 1)
		{

				###################################################
				# 시작 => 프로그램__상수__변수
				###################################################

				//=================================================
				// 피리_게시글에_투표__정보__가져오기
				$prog_conf = get__article_vote_PLUS_config();


				//=================================================
				// 프로그램__디렉토리
				$ARTI_VOTE_prog_dir = "p".$g_program_n;


				//=================================================
				// 프로그램__URL_경로
				$ARTI_VOTE_prog_u = PIREE_URL ."/". $ARTI_VOTE_prog_dir;
				$ARTI_VOTE_prog_p = PIREE_PATH ."/". $ARTI_VOTE_prog_dir;


				//=================================================
				// 프로그램__PC_스킨_경로
				$ARTI_VOTE_SKIN_PC_c = $prog_conf['pgs_skin_pc_c'];
				$ARTI_VOTE_SKIN_PC_u = $ARTI_VOTE_prog_u ."/". PIREE_SKIN_PC_DIR ."/". $ARTI_VOTE_SKIN_PC_c;
				$ARTI_VOTE_SKIN_PC_p = $ARTI_VOTE_prog_p ."/". PIREE_SKIN_PC_DIR ."/". $ARTI_VOTE_SKIN_PC_c;


				//=================================================
				// 프로그램__MOBILE_스킨_경로
				$ARTI_VOTE_SKIN_MO_c = $prog_conf['pgs_skin_mo_c'];
				$ARTI_VOTE_SKIN_MO_u = $ARTI_VOTE_prog_u ."/". PIREE_SKIN_MOBILE_DIR ."/". $ARTI_VOTE_SKIN_MO_c;
				$ARTI_VOTE_SKIN_MO_p = $ARTI_VOTE_prog_p ."/". PIREE_SKIN_MOBILE_DIR ."/". $ARTI_VOTE_SKIN_MO_c;

				###################################################
				# 끝 => 프로그램__상수__변수
				###################################################



				###################################################
				# 시작 => 프로그램_번호__있으면
				###################################################
				IF ($g_program_n == $prog_conf['pgs_prog_n'])
				{

						###############################################
						# 시작 => 프로그램__기본_정보
						###############################################

						//=============================================
						// 피리_게시글에_투표___사용여부
						// 1 - 사용함
						$ARTI_VOTE_is_use = 1;


						//=============================================
						// 프로그램_번호
						$ARTI_VOTE_prog_n = $prog_conf['pgs_prog_n'];


						//=============================================
						// 피리_회원_아이디
						$ARTI_VOTE_piree_mb_id = $prog_conf['pgs_piree_mb_id'];

						###############################################
						# 끝 => 프로그램__기본_정보
						###############################################



						###############################################
						# 시작 => 설정_값
						###############################################

						//=============================================
						// 등록된_투표_항목_수
						$ARTI_VOTE_vote_item_t = $prog_conf['pgs_cf_1_n'];

						//=============================================
						// By BryanPArk 등록된 카테고리들
						$ARTI_VOTE_vote_category_list_s  = $prog_conf['pgs_cf_1_txt'];


						//=============================================
						// 투표_등록__회원_레벨
						$ARTI_VOTE_vote_regi_level_n = $prog_conf['pgs_cf_2_n'];


						//=============================================
						// 이미지_투표
						$ARTI_VOTE_vote_image_ok_n = $prog_conf['pgs_cf_3_n'];


						//=============================================
						// 투표_등록시__차감_포인트
						$ARTI_VOTE_vote_regi_point_n = $prog_conf['pgs_cf_4_n'];


						//=============================================
						// 투표_기간__기본값
						$ARTI_VOTE_vote_day_default_t = $prog_conf['pgs_cf_5_n'];

						###############################################
						# 끝 => 설정_값
						###############################################

				}
				###################################################
				# 끝 => 프로그램_번호__있으면
				###################################################

		}
		// 끝 => 피리_게시글에_투표__설정_정보__가져오기__이면
		//=====================================================


		//=====================================================
		// 시작 => 피리_게시글에_투표__ROW_정보__가져오기
		IF ($is_get__article_info == 1)
		{

				//=================================================
				// 피리_게시글에_투표__정보__가져오기
				$vote_row = get__article_vote_row_info($bo_table, $wr_id);

		}
		// 끝 => 피리_게시글에_투표__ROW_정보__가져오기
		//=====================================================

		#######################################################
		# 끝 => 피리_게시글에_투표____설정_정보__가져오기
		#######################################################


###########################################################
# 끝 => 피리_게시글에_투표__설정_정보__가져오기
###########################################################


?>