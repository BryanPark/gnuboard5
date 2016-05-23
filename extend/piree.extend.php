<?php

/*
===========================================================

	프로젝트 이름 : 넷테스트 급수시험

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2015년 11월 25일 수요일 오후 19시 06분 - 날씨 흐리고 살짝 쌀쌀함

===========================================================
 피리 > 피리 가입인사 게시판 스킨 > 확장 > 피리
===========================================================


*/


		#######################################################
		# 시작 => 선처리
		#######################################################

		//=====================================================
		// 개별_페이지__접근_불가
		IF (!defined('_GNUBOARD_'))										EXIT;

		#######################################################
		# 끝 => 선처리
		#######################################################






###########################################################
# 시작 => 피리__SAM
###########################################################


		#######################################################
		# 시작 => PIREE__상수
		#######################################################

		//=====================================================
		// 피리__유료__프로그램_그룹_번호
		define('G_PLUS_PROG_N', '770');


		//=====================================================
		// 피리__일반_웹_유료_프로그램__그룹_대표_번호
		define('PIREE_PROG_PLUS_MENU_N', '770001');


		//=====================================================
		// 디렉토리
		define('PIREE_DIR',								'piree');
		define('PIREE_CONFIG_DIR',				'_config');
		define('PIREE_CSS_DIR',						'_css');
		define('PIREE_JS_DIR',						'_js');
		define('PIREE_LIB_DIR',						'_lib');
		define('PIREE_IMAGE_DIR',					'_image');
		define('PIREE_SKIN_PC_DIR',				'_skin_pc');
		define('PIREE_SKIN_MOBILE_DIR', 	'_skin_mobile');
		define('PIREE_IMAGE_UPLOAD_DIR',	'IMG_UP');


		//=====================================================
		// URL
		define('PIREE_URL',							G5_URL .'/'. PIREE_DIR);
		define('PIREE_CONFIG_URL',			PIREE_URL.'/'.PIREE_CONFIG_DIR);
		define('PIREE_CSS_URL',					PIREE_URL.'/'.PIREE_CSS_DIR);
		define('PIREE_JS_URL',					PIREE_URL.'/'.PIREE_JS_DIR);
		define('PIREE_LIB_URL',					PIREE_URL.'/'.PIREE_LIB_DIR);
		define('PIREE_IMAGE_URL',				PIREE_URL.'/'.PIREE_IMAGE_DIR);
		define('PIREE_SKIN_PC_URL',			PIREE_URL.'/'.PIREE_SKIN_PC_DIR);
		define('PIREE_SKIN_MOBILE_URL',	PIREE_URL.'/'.PIREE_SKIN_MOBILE_DIR);
		define('PIREE_UP_IMAGE_URL',		G5_DATA_URL.'/'.PIREE_IMAGE_UPLOAD_DIR);


		//=====================================================
		// PATH
		define('PIREE_PATH',							G5_PATH .'/'. PIREE_DIR);
		define('PIREE_CONFIG_PATH',				PIREE_PATH.'/'.PIREE_CONFIG_DIR);
		define('PIREE_CSS_PATH',					PIREE_PATH.'/'.PIREE_CSS_DIR);
		define('PIREE_JS_PATH',						PIREE_PATH.'/'.PIREE_JS_DIR);
		define('PIREE_LIB_PATH',					PIREE_PATH.'/'.PIREE_LIB_DIR);
		define('PIREE_IMAGE_PATH',				PIREE_PATH.'/'.PIREE_IMAGE_DIR);
		define('PIREE_SKIN_PC_PATH',			PIREE_PATH.'/'.PIREE_SKIN_PC_DIR);
		define('PIREE_SKIN_MOBILE_PATH',	PIREE_PATH.'/'.PIREE_SKIN_MOBILE_DIR);
		define('PIREE_UP_IMAGE_PATH',			G5_DATA_PATH.'/'.PIREE_IMAGE_UPLOAD_DIR);


		//=====================================================
		// 현재_URL
		define('PIREE_THIS_URL',			"http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
		define('PIREE_THIS_URL_ENC',	BASE64_ENCODE(PIREE_THIS_URL));

		#######################################################
		# 끝 => PIREE__상수
		#######################################################



		#######################################################
		# 시작 => 테이블__이름
		#######################################################


		//=====================================================
		// 피리_프로그램__테이블
		$piree['program_sam'] = G5_TABLE_PREFIX.'_piree__program_sam';


		//=====================================================
		// 피리_프로그램__테이블
		$piree['program_new'] = G5_TABLE_PREFIX.'_piree__program_new';


		#######################################################
		# 끝 => 테이블__이름
		#######################################################


###########################################################
# 끝 => 피리__SAM
###########################################################






###########################################################
# 시작 => 함수
###########################################################


		#######################################################
		# 시작 => 배열에서_정보__뽑아내기
		#######################################################
		function get__array_value($arrs, $fd_name, $var_val)
		{

				//=================================================
				// 넘겨줄_값
				$get__val = 0;


				//=================================================
				// 시작 => 배열이면
				IF (is_array($arrs))
				{

						//=============================================
						// 시작 => 조건_필드__있으면
						IF ($fd_name)
						{

								//=========================================
								// 시작 => 조건_값__있으면
								IF ($var_val)
								{

										//=====================================
										// 시작 => 배열_건수__있으면
										IF (count($arrs) > 0)
										{

												//=================================
												// 시작 => 원하는_정보__가져오는_방식
												SWITCH ($fd_name)
												{

														//=============================
														// 시작 => 번호_로__이름__알아내기
														CASE "num_name" :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 번호_가__같으면
																	IF ($var_val == $val['num'])				$get__val = $val["name"];
																}

														BREAK;
														// 끝 => 번호_로__이름__알아내기
														//=============================


														//=============================
														// 시작 => 번호_로__메모__알아내기
														CASE "num_memo" :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 번호_가__같으면
																	IF ($var_val == $val['num'])				$get__val = $val["memo"];
																}

														BREAK;
														// 끝 => 번호_로__메모__알아내기
														//=============================


														//=============================
														// 시작 => 번호_로__코드__알아내기
														CASE "num_code" :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 번호_가__같으면
																	IF ($var_val == $val['num'])				$get__val = $val["code"];
																}

														BREAK;
														// 끝 => 번호_로__코드__알아내기
														//=============================


														//=============================
														// 시작 => 코드_로__번호__알아내기
														CASE 'code_num' :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 코드_가__같으면
																	IF ($var_val == $val["code"])				$get__val = $val['num'];
																}

														BREAK;
														// 끝 => 코드_로__번호__알아내기
														//=============================


														//=============================
														// 시작 => 이름_으로__번호__알아내기
														CASE "name_num" :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 코드_가__같으면
																	IF ($var_val == $val["name"])				$get__val = $val['num'];
																}

														BREAK;
														// 끝 => 이름_으로__번호__알아내기
														//=============================


														//=============================
														// 시작 => 코드_로__이름__알아내기
														CASE "code_name" :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 코드_가__같으면
																	IF ($var_val == $val["code"])				$get__val = $val["name"];
																}

														BREAK;
														// 끝 => 코드_로__번호__알아내기
														//=============================


														//=============================
														// 시작 => 번호_로__모두_가져오기
														CASE "num_all" :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 모두 가져오기 배열에 저장
																	IF ($var_val == $val['num'])				$get__val = $val;
																}

														BREAK;
														// 끝 => 번호_로__모두_가져오기
														//=============================


														//=============================
														// 시작 => 코드로__모두_가져오기
														CASE "code_all" :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 모두 가져오기 배열에 저장
																	IF ($var_val == $val["code"])				$get__val = $val;
																}

														BREAK;
														// 끝 => 코드로__모두_가져오기
														//=============================


														//=============================
														// 시작 => 이름으로__모두_가져오기
														CASE "name_all" :

																WHILE (list($key, $val) = each($arrs))
																{
																	// 모두 가져오기 배열에 저장
																	IF ($var_val == $val["name"])				$get__val = $val;
																}

														BREAK;
														// 끝 => 이름으로__모두_가져오기
														//=============================

												}
												// 끝 => 원하는_정보__가져오는_방식
												//=================================


												//=================================
												// 값__없으면
												IF (!$get__val)										 						$get__val = 0;

										}
										// 끝 => 배열_건수__있으면
										//=====================================

								}
								// 끝 => 조건_값__있으면
								//=========================================

						}
						// 끝 => 조건_필드__있으면
						//=============================================

				}
				# 끝 => 배열이면
				#################################################


				//=================================================
				// 넘겨주기
				return $get__val;

		}
		#######################################################
		# 끝 => 배열에서_정보__뽑아내기
		#######################################################



		#######################################################
		# 시작 => 디렉토리__만들기
		#######################################################
		function mkdir_chmod($dir_s)
		{

				//=================================================
				// 시작 => 1차_디렉토리__없으면__만들기
				IF ($dir_s)
				{

						//=============================================
						// 시작 => 1차_디렉토리__없으면__만들기
						IF (!is_dir($dir_s))
						{

								//=========================================
								// 디렉토리__만들기
								mkdir($dir_s, G5_DIR_PERMISSION);
								chmod($dir_s, G5_DIR_PERMISSION);

						}
						// 끝 => 1차_디렉토리__없으면__만들기
						//=============================================

				}
				// 끝 => 1차_디렉토리__없으면__만들기
				//=================================================

		}
		#######################################################
		# 끝 => 디렉토리__만들기
		#######################################################



		#######################################################
		# 시작 => 행의_첫번째_결과__가져오기
		#######################################################
		function sql_efv($sql, $error=G5_DISPLAY_SQL_ERROR, $link=null)
		{

				global $g5;

				if(!$link)
				    $link = $g5['connect_db'];

				$result = sql_query($sql, $error, $link);
				//$row = @sql_fetch_array($result) or die("<p>$sql<p>" . mysqli_errno() . " : " .  mysqli_error() . "<p>error file : $_SERVER['SCRIPT_NAME']");
				$row = sql_fetch_array($result);
				//return $row[0];
				//return $row;

				$loop_n = 0;

				$return_var = '';

				WHILE ( list($key, $val) = each($row) )
				{
						IF ( $loop_n == 0 )
						{
								$return_var = $val;
						}

						$loop_n++;
				}

				return $return_var;

		}
		#######################################################
		# 끝 => 행의_첫번째_결과__가져오기
		#######################################################



		#######################################################
		# 시작 => 쿼리_실행__결과_메세지__보여주기
		#######################################################
		function query_res($sql, $msg_s = '', $msg_echo = 'alert', $is_exit = 1)
		{

				//=================================================
				// 시작 => 쿼리_실행
				IF ( !sql_query ($sql) )
				{

						//=============================================
						// 시작 => 메세지__있으면
						IF ( $msg_echo )
						{

								//=========================================
								// 시작 => 메세지_출력__방법
								SWITCH ( $msg_s )
								{
										CASE 'echo' :						echo $msg_s;						BREAK;
										CASE 'alert' :					alert($msg_s);					BREAK;
										CASE 'return' :					return $msg_s;					BREAK;
										DEFAULT :								alert($msg_s);					BREAK;
								}
								// 끝 => 메세지_출력__방법
								//=========================================

						}
						// 끝 => 메세지__있으면
						//=============================================


						//=============================================
						// 시작 => 끝내기__이면
						IF ( $is_exit == 1 )
						{
								EXIT;
						}
						// 끝 => 끝내기__이면
						//=============================================

				}
				// 끝 => 쿼리_실행
				//=================================================

		}
		#######################################################
		# 끝 => 쿼리_실행__결과_메세지__보여주기
		#######################################################



		#######################################################
		# 시작 => 입력_폼_안내문__출력
		#######################################################
		function echo_help($help_s="")
		{
				global $g5;

				$str = "<span class='font_green'>".str_replace("\n", "<br />", $help_s)."</span>";

				echo $str;

		}
		#######################################################
		# 끝 => 입력_폼_안내문__출력
		#######################################################



		#######################################################
		# 시작 => 페이지__이동
		#######################################################
		function go_url($go_url_s, $go_time_n)
		{

				// 이동할_URL
				$go_url_s = str_replace("&amp;", "&", $go_url_s);

				// 이동_대기_시간
				IF (!$go_time_n || $go_time_n < 1)				 $go_time_n = 0;

				// 페이지__이동
				echo '<meta http-equiv="refresh" content="'.$go_time_n.';url='.$go_url_s.'" />';
				EXIT;

		}
		#######################################################
		# 끝 => 페이지__이동
		#######################################################
		

		function select_ca_bar($ARTI_VOTE_vote_category_list_s, $search_options){
			global $gr_id;
			$category_href = G5_BBS_URL.'/group.php?gr_id='.$gr_id;
			$category_option .= '<nav id = gr_cate>';
			$category_option .= '<ul id = gr_cate_ul>';
			$category_option .= '<li><a href="'.$category_href.'"';
			if ($search_options['sca']=='')
				$category_option .= ' id="gr_cate_on"';
			$category_option .= '>전체</a></li>';

			$categories = get_category_list($ARTI_VOTE_vote_category_list_s); // 구분자가 , 로 되어 있음
			foreach ($categories as $ca) {
				$category_option .= '<li><a href="'.($category_href."&amp;sca=".urlencode($ca)).'"';
				$category_msg = '';
				if ($ca==$search_options['sca']) { // 현재 선택된 카테고리라면
					$category_option .= ' id="gr_cate_on"';
					$category_msg = '<span class="sound_only">열린 분류 </span>';
				}
				$category_option .= '>'.$category_msg.$ca.'</a></li>';
			}
			$category_option .='</ul></nav>';
			echo $category_option;
		}

		function latest_poll_group($max_title_s,$max_row, $max_date ,$search_options, $ARTI_VOTE_vote_category_list_s){
			#category_list는 DB:g5__piree_program_sam / pgs_cf_1_txt에 위치한다 "A|B|C" 와 같이 '|'로 구분되는 문자열 형태로.
			select_ca_bar($ARTI_VOTE_vote_category_list_s,$search_options);

			if($search_options['sca']!=''){ //sca가 있으면 이렇게 하구 없으면 저렇게.
				latest_poll($max_title_s,$max_row, $max_date ,$search_options, $search_options['sca']);
			}else{
				$categories = get_category_list($ARTI_VOTE_vote_category_list_s);
				foreach($categories as $category){
					latest_poll($max_title_s,$max_row, $max_date ,$search_options, $category);
				}
			}
		}

		function latest_poll($max_title_s,$max_row, $max_date ,$search_options, $category){
			#@todo query를 받아야한다.
			echo "<div class = 'vote_list'>";
			$sql = get_poll_sql($search_options,$category);
			$result = sql_query($sql);
			echo "<b>[$category]</b><br/>";

			//@todo 최신글이 없으면 없다고 표시 후 탈출 
			if(sql_num_rows($result)==0){echo "게시물이 없습니다";}

			for ($i = 0; ($row = sql_fetch_array($result))&&($i<$max_row) ; $i++) {

				//글이 있으면 진행
				$options = explode("||",$search_options['sfl']);
				$is_stx  = ($search_options['stx']!='')?1:0;

				if(in_array("avl_title_s",$options)&&$is_stx){ 
				//검색어가 있으면 검색어에 해당하는 문자를 bold red 처리한다.
					$vo_title = search_font($search_options['stx'], $row['avl_title_s']);
				}else{
					$vo_title = $row['avl_title_s'];
				}

				echo "
				<div class='vote_list item'>
					<div class=vote_title>
					<a href='".G5_BBS_URL."/board.php?bo_table={$row['avl_bo_table']}&wr_id={$row['avl_wr_id']}'>
						<li>{$vo_title}</li>
					</a>
					</div>";

				for ($x = 1; $x <= 20; $x++) {
					if ($row['avl_poll_' . $x]) {
						////home/www/gboard.codys.co.kr/public_html/gnuboard5/data . /vote . /row['avl_bo_table']
						//아.. 폴더명이 왜 1이되는지 모르겠다...
						//TODO 폴더명 동적으로 수정 -> 특히나 이름이 숫자로 된 폴더.
						echo "<div class='vote_list item polls'>";

						if ($row['avl_image_' . $x] != null) {
							echo
								"<img style='width:20px; height:20px'
							src='" . G5_DATA_URL . "/vote/" . $row['avl_bo_table'] . "/1/" .
								$row['avl_wr_id'] . "/" . $row['avl_image_' . $x] . "'" . "
							</img>";
						}
						//@todo 검색된 스트링을 붉은색으로 바꿔야함
						if(in_array("avl_poll_x",$options)&&$is_stx){ 
						//검색어가 있으면 검색어에 해당하는 문자를 bold red 처리한다.
							$vo_item = search_font($search_options['stx'], $row['avl_poll_' . $x]);
						}else{
							$vo_item = $row['avl_poll_' . $x];
						}
						echo
							$vo_item.
							"</div>";
					}
				}
				echo "</div>";
			}
			echo "</div>";
		}
		
		function get_poll_sql($s_arr, $category){

			$options = explode("||",$s_arr['sfl']);

			$sql = " select * from g5__piree_770015_vote_list";
			$sql_stx = "";
			$sql_cat = "";
			//echo "s_arr".$s_arr['stx'];
			if($s_arr['stx']!= ''){
				$sql_stx .= " and (";
				foreach($options as $opt){
					switch ($opt)
					{
						case 'avl_title_s':
							$sql_stx .= " INSTR( LOWER(avl_title_s), LOWER('{$s_arr[stx]}') )";
							break;
						case 'avl_poll_x':
							for($i = 1 ; $i <= 20 ; $i++ ){
								$sql_stx .= " OR 
								INSTR( LOWER(avl_poll_{$i}), LOWER('{$s_arr[stx]}') )";
							}
							break;
						default:
					}
				}
				$sql_stx .= ")"; //여러 검색 조건을 묶기 위해서.
				/*if($s_arr['sfl']==""){
					$sql_stx .= " and 
					(
					INSTR( LOWER(avl_title_s), LOWER('{$s_arr[stx]}') )";
				}*/
			}

			if($category != '' && $category!=null){
				$sql_cat .= " and avl_ca_name = '{$category}'";
			}
			$sql .= " where avl_ca_name is not null and avl_ca_name != '' ";
			$sql .= $sql_stx;
			$sql .= $sql_cat;

			return $sql;
		}
		#######################################################
		# 시작 => 카테고리 리스트를__SELECT_형식으로__얻음 By BryanPark
		#######################################################
		
		// '|' 로 구분된 문자열을 array로 분할해줌.
		function get_category_list($ARTI_VOTE_vote_category_list_s,$is_adm_check=0){
			//is_adm_check인 경우 admin을 check하고 공지 카테고리를 붙이고 아닐 경우 그냥 붙여준다.
			global $g5, $is_admin;
			//admin인경우에는 공지를 무조건 붙여줘야 하고, 그렇건 그러지 않건 $is_adm_check = 0 인
			//경우(ex 투표 보기의 경우) 공지 카테고리도 볼 수 있어야함.
			//
			$categories = explode("|", 
				( ($is_admin || !$is_adm_check) ? "공지|" : "" ).$ARTI_VOTE_vote_category_list_s);
			foreach($categories as $ca){
				if(!trim($ca)) continue;
				$categories_return[] = $ca; 
			}
			return $categories_return;
		}

		//get_category_list로 문자열을 받아서 html select문에 담아서 줌.
		//그리고 수정시에는 기존의 카테고리를 selected 하게끔..
		function get_category_list_select($ARTI_VOTE_vote_category_list_s, $avl_ca_name=""){
			global $g5, $is_admin;
			$str = "<select name='avl_ca_name_s' id='avl_ca_name_s' required>";

			$categories = get_category_list($ARTI_VOTE_vote_category_list_s,1); // 구분자가 | 로 되어 있음
			
			foreach ($categories as $ca) {
		        $str .= "<option value=\"$ca\"";
		        //trim을 통해서 공백만 있는 항목을 걸러내고 다른 것들은 띄어쓰기를 온전히 보전해주는군. 
		        if ($ca == $avl_ca_name) {
		            $str .= ' selected="selected"';
		        }
		        $str .= ">$ca</option>\n";
		    }
			$str .= "</select>";
			return $str;
		}

		#######################################################
		# 끝 => 회원권한을__SELECT_형식으로__얻음 By BryanPark
		#######################################################

		#######################################################
		# 시작 => 회원권한을__SELECT_형식으로__얻음
		#######################################################
		function get_member_level_select__piree($name, $start_id=0, $end_id=10, $selected="", $event="", $disabled="")
		{

		    //=================================================
		    // 전역변수
		    global $g5;


		    //=================================================
		    // TAG_문자열
		    $str = "\n<select id=\"".$name."\" name=\"".$name."\"";


		    //=================================================
		    // 이벤트_있으면
		    IF ($event) 															$str .= " ".$event;


		    //=================================================
		    // 활성화__여부
		    IF ($disabled) 														$str .= " ".$disabled;


		    //=================================================
		    // TAG_문자열
		    $str .= ">\n";


		    //=================================================
		    // 시작 => 반복문
		    FOR ($i=$start_id; $i<=$end_id; $i++)
		    {
		        $str .= '<option value="'.$i.'"';
		        if ($i == $selected)
								$str .= ' selected="selected"';
		        $str .= ">{$i}</option>\n";
		    }
		    // 끝 => 반복문
		    //=================================================


		    //=================================================
		    // TAG_문자열__마무리
		    $str .= "</select>\n";


		    //=================================================
		    // 넘겨주기
		    return $str;

		}
		#######################################################
		# 끝 => 회원권한을__SELECT_형식으로__얻음
		#######################################################



		#######################################################
		# 시작 => 구성_디렉토리__파일__경로__알아내기
		#######################################################
		function get__sam_file($program_n, $file_s = '')
		{

				//=================================================
				// 프로그램_경로
				$program_path = "";


				//=================================================
				// 시작 => 프로그램_번호__있으면
				IF ( (int)$program_n > 0 )
				{

						//=============================================
						// 파일_이름__없으면
						IF (!$file_s || $file_s == "")				$file_s = "__config.php";


						//=============================================
						// 파일__경로
						$program_path = PIREE_PATH."/p". $program_n ."/".$file_s;

				}
				// 끝 => 프로그램_번호__있으면
				//=================================================


				//=================================================
				// 넘겨주기____프로그램_경로
				return $program_path;

		}
		#######################################################
		# 끝 => 구성_디렉토리__파일__경로__알아내기
		#######################################################



		#######################################################
		# 시작 => 디렉토리_내__파일__삭제
		#######################################################
		function delete__dir_file($dir)
		{

				IF ( $dirHandle = opendir($dir) )
				{

						chdir($dir);

						WHILE ( $file = readdir($dirHandle) )
						{

								IF ( $file == '.' || $file == '..' )				CONTINUE;

								IF ( is_dir($file) )												delete__dir_file($file);
								ELSE																				unlink($file);
      		  }

      		  chdir('..');

      		  rmdir($dir);

      		  closedir($dirHandle);

				}

		}
		#######################################################
		# 끝 => 디렉토리_내__파일__삭제
		#######################################################



		#######################################################
		# 시작 => 이미지_썸네일__삭제
		#######################################################
		function delete__thumbnail($dir, $file)
		{

			if(!$dir || !$file)
					return;

			$filename = preg_replace("/\.[^\.]+$/i", "", $file); // 확장자제거

			$files = glob($dir.'/thumb-'.$filename.'*');

			if(is_array($files)) {
					foreach($files as $thumb_file) {
							@unlink($thumb_file);
					}
			}

		}
		#######################################################
		# 끝 => 이미지_썸네일__삭제
		#######################################################


###########################################################
# 끝 => 함수
###########################################################


?>