<?php
//2016-07-15 미처리된 신고내역을 개별 php파일로 저장. by Bryan Park
//index.php 에 include 되게끔 제작.

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

	//============== 2016-07-19 by Bryan Park =============
	//전체 목록 또는 미처리 목록을 구분짓는 파라매터. 
	//하단의 function set_btn_active에서 사용
	$menu_attr = (isset($_GET['mattr'])) ? $_GET['mattr'] : "unprocessed";
	//mtype=unprocessed 일때 active_s 에 따른 조건을 걸도록.
	$use_where = is_active_option($menu_attr,"unprocessed");
	//prog_div_c -> "article", "comment", "member" ; 신고의 종류.
	$prog_div_c = "comment";


	#######################################################
	# 끝 => 상수__변수__배열
	#######################################################



	#######################################################
	# 시작 => 신고_목록__가져오기
	#######################################################

	//=====================================================
	// 신고_목록__가져오는__쿼리문
	/*$sql	 = "SELECT COUNT(*) FROM `".$piree_table['report_list']."` ";
	$sql	.= "WHERE active_s='".$report_active_s__new."'";
	$total = sql_efv($sql);
	*/
	//2016-07-19 댓글에 대한 신고만 가져오게끔 해야함. by Bryan Park
	$sql	 = "SELECT COUNT(*) FROM `".$piree_table['report_list']."` ";
	$sql	.= "WHERE prog_div_c='".$prog_div_c."' ";
	if($use_where){
	$sql	.=	" AND active_s='".$report_active_s__new."'";
	}
	$sql	.= "  ";
	$sql	.= "  ";
	$sql	.= "  ";

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

		//2016-07-19 댓글에 대한 신고만 가져오게끔 해야함. by Bryan Park
		$sql	 = "SELECT * FROM `".$piree_table['report_list']."` ";
		$sql	.= "";
		//$prog_div_c == comment -> comment에 대한 신고만 가져오게끔.
		$sql	.= "WHERE prog_div_c='".$prog_div_c."' ";
		if($use_where){
		$sql	.= " AND active_s='".$report_active_s__new."' ";
		}
		$sql	.= " ORDER BY `num` DESC";

		$result = sql_query($sql);

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
		댓글 신고내역 (개발중 )
			<input type="button" class="btn_cancel tab_btn<?=set_btn_active($menu_attr,"all")?>"  value="전체" onClick="PageUrl('./?menu=comment&mattr=all#blinded')">
			<input type="button" class="btn_cancel tab_btn<?=set_btn_active($menu_attr,"unprocessed")?>"  value="미처리" onClick="PageUrl('./?menu=comment&mattr=unprocessed#blinded')">
		</h2>

		<div class="tbl_head01 tbl_wrap">
				<table>
				<caption>댓글 신고내역</caption>
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
						<span class="font_777">댓글</span> <a href="<?php echo $arti_link_s ?>" target="_blank"><?php echo $title_s ?></a>
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