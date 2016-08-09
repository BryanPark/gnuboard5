<?php
//2016-07-15 미처리된 신고내역을 개별 php파일로 저장. by Bryan Park
//index.php 에 include 되게끔 제작.

#########################################################
# 시작 => 신고_목록
#########################################################

	#######################################################
	# 시작 => 상수__변수__배열
	#######################################################

	//======================================e===============
	// 신고_목록__건수
	$report_active_s__new = "접수";


	//=====================================================
	// 신고_목록__배열
	$report_list_arr = array();

	//============== 2016-07-19 by Bryan Park =============
	//전체 목록 또는 미처리 목록을 구분짓는 파라매터. 
	//하단의 function set_btn_active에서 사용
	$menu_attr = (isset($_GET['mattr'])) ? $_GET['mattr'] : "unprocessed";
	//mattr=unprocessed 일때 active_s 에 따른 조건을 걸도록.
	$use_where = is_active_option($menu_attr,"unprocessed");


	#######################################################
	# 끝 => 상수__변수__배열
	#######################################################



	#######################################################
	# 시작 => 신고_목록__가져오기
	#######################################################
	
		###########################################################
		# 시작 => 검색, 페이징 관련
		###########################################################
		// 2016-07-11 [bid -> 게시판id , bno -> 게시판 테이블 내에서 게시물 id] by Bryan Park
		$bid = ($_GET['bid'])?$_GET['bid']:"";
		$bno = ($_GET['bno'])?$_GET['bno']:"";
		//2016-07-08 by Bryan Park  -> 페이징을 위한 sql.
		$sql_common = " FROM ".$piree_table['report_list']." ";
		$sql_search = " where (1) ";
		if($use_where){
		$sql	.=	" AND active_s='".$report_active_s__new."' ";
		}
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
		$total = sql_efv($sql);

		$rows = $config['cf_page_rows'];
		$total_page  = ceil($total / $rows);  // 전체 페이지 계산
		if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
		$from_record = ($page - 1) * $rows; // 시작 열을 구함
		// 리스트_URL
		$qstr .= "&bid={$bid}&bno={$bno}";
		$page_url_s = "{$_SERVER['SCRIPT_NAME']}?$qstr";

		###########################################################
		# 끝 => 검색 페이징 관련
		###########################################################
	
	echo "<BR>TEST-list.blinded line 109 :";
	echo $sql;

	//2016-07-21 검색 분류를 추가하기 위한 SQL문 변경사항 적용. by Bryan Park
	$sql_menu = (isset($_GET['menu']))? $_GET['menu'] : "untreated";
	//2016-07-21 WHERE절에 포함되어야할 사항 ->  by Bryan Park
	$sql_search  = "WHERE ";
	$sql_search .= "(";
	$sql_search .=	"";
	$sql_search .= ")";


	//=====================================================
	// 신고_목록__가져오는__쿼리문
	/*$sql	 = "SELECT COUNT(*) FROM `".$piree_table['report_list']."` ";
	$sql	.= "WHERE active_s='".$report_active_s__new."'";
	$total = sql_efv($sql);
	*/

	//2016-07-18 블라인드된 게시물 최후의 것을 가져오게 해야함. by Bryan Park -> 2중 select를 사용해야 한다.
	//		SELECT COUNT(*) FROM 
	//			( SELECT COUNT(*) as cnt
	//				FROM `$piree_table['report_list']`
	//				WHERE active_s = '접수' 
	//				GROUP BY bo_table, arti_n 
	//			) AS list
	//		WHERE list.cnt >= 3;
	$sql	 = "SELECT COUNT(*) FROM ";
	$sql	.=	"( SELECT bo_table, arti_n, COUNT(*) as cnt ";
	$sql	.=	"	FROM `".$piree_table['report_list']."`" ;
	//mattr == unprocessed 일때 아래의 where 절을 추가.
	if($use_where){
	$sql	.=	"	WHERE active_s='".$report_active_s__new."'";
	}
	$sql	.=	"	GROUP BY bo_table, arti_n";
	$sql	.=	") AS report_group ";
	$sql	.= "WHERE report_group.cnt >= 3";
	$total = sql_efv($sql);

	#######################################################
	# 끝 => 신고_목록__가져오기
	#######################################################



	#######################################################
	# 시작 => 신고_목록__불러오기
	#######################################################
	IF ($total > 0)
	{

		//===================================================
		// 신고하기__설정_정보__불러오기
		/*$sql		= "SELECT * FROM `".$piree_table['report_list']."` ";
		$sql	 .= "WHERE active_s='".$report_active_s__new."' ORDER BY regi_time_n DESC LIMIT 10";
		$result = sql_query ($sql);
		*/

		//2016-07-18 위와 마찬가지로 블라인드 된 게시물에 대한 신고를 그룹으로 묶어서 처리 by Bryan Park
		$sql	 = "SELECT * FROM ";
		$sql	.=	"( SELECT *, COUNT(*) as cnt ";
		$sql	.=	"	FROM `".$piree_table['report_list']."`" ;
		//mattr == unprocessed 일때 아래의 where 절을 추가.
		if($use_where){
		$sql	.=	"	WHERE active_s='".$report_active_s__new."'";
		}
		$sql	.=	"	GROUP BY bo_table, arti_n ";
		$sql	.=	") AS report_group ";
		$sql	.= "WHERE report_group.cnt >= 3 ";
		//2016-07-25 검색을 위한 limit. by Bryan Park
		$sql .= "limit {$from_record}, {$rows}";
		//$sql	.= "ORDER BY arti_n DESC";
		$result = sql_query($sql);
		echo "<br>list.blinded - 186line : ".$sql;
	}
	#######################################################
	# 끝 => 신고_목록__불러오기
	#######################################################

#########################################################
# 끝 => 신고_목록
#########################################################



?>

<section>
		<h2 id="blinded">
		블라인드 신고내역 (개발중 )
			<input type="button" class="btn_cancel tab_btn<?=set_btn_active($menu_attr, "all")?>"  value="전체" onClick="PageUrl('./?menu=blinded&mattr=all#blinded')">
			<input type="button" class="btn_cancel tab_btn<?=set_btn_active($menu_attr,"unprocessed")?>"  value="미처리" onClick="PageUrl('./?menu=blinded&mattr=unprocessed#blinded')">
		</h2>

		<div class="tbl_head01 tbl_wrap">
				<table>
				<caption>블라인드 신고내역</caption>
				<thead>
				<tr>
					<th scope="col">번호</th>
					<th scope="col">신고한 회원</th>
					<th scope="col">신고 받은 회원</th>
					<th scope="col">신고구분</th>
					<th scope="col">신고사유 / 메모</th>
					<th scope="col">신고날짜</th>
				</tr>
				</thead>
				<tbody>

<?php


		//=====================================================
		// 시작 => 신고_목록__유무
		IF ($total > 0)
		{

			#####################################################
			# 시작 => 신고_목록__있으면
			#####################################################

			//===================================================
			// 시작 => 반복문
			FOR ($i=0; $row=sql_fetch_array($result); $i++)
			{

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
				//2016-07-18 신고구분에 게시판+번호 추가 by Bryan Park



				//=================================================
				// 신고_링크__가져오기
				$arti_link_s = get_report_row_url('admin_url', $row["prog_div_c"], $row['bo_table'], $row["arti_n"], $row["parent_n"], $row["get_mem_id"]);


				//=================================================
				// 신고일시
				$regi_time_s = date("y.m.d H:i:s", $row["regi_time_n"]);


				//=================================================
				// 내부링크
				$in_link_s = "pi__report.list.php?report_n=".$row['num'];

?>
				<tr>
					<td><?php echo $row['num'] ?></td>
					<td><?php echo $in_do_mem_s ?></td>
					<td><?php echo $in_get_mem_s ?></td>
					<td><a href="<?php echo $arti_link_s ?>" target="_blank"><?php echo $report_prog_arr["prog_s"].$row['arti_n'] ?></a></td>
					<td>
						<span class="font_777">사유</span> <a href="<?php echo $in_link_s ?>"><?php echo $reason_s ?></a>
<?php

					//===============================================
					// 시작 => 메모__있으면
					IF ($row["report_memo_s"])
					{
						// 메모
						$in_report_memo_s = stripslashes($row["report_memo_s"]);
?>
						<br />
						<span class="font_777">메모</span> <a href="<?php echo $in_link_s ?>"><?php echo $in_report_memo_s ?></a>
<?php

					}
					// 끝 => 메모__있으면
					//===============================================

?>
						<br />
						<span class="font_777">제목</span> <a href="<?php echo $arti_link_s ?>" target="_blank"><?php echo $title_s ?></a>
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
					<td colspan="6" align="center"><strong>접수된 신고가 없습니다.</strong></td>
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
</section>