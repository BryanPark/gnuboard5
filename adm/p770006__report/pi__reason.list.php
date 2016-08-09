<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 03월 07일 금요일 오후 20시 17분, 날씨 꽃샘추위 위세가 좀 쎄다, 쌀쌀하다

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 관리자 > 신고하기 PLUS G5 > 신고항목 목록보기
===========================================================


음란 사이트, 도박 사이트 광고 게시물

PIREE 사이트외 업체광고 또는 홍보성 게시물

선정적,폭력적 내용의 사진이나 내용, 링크 게시물

원글 내용 없이 짤방만 존재하는 게시물

게시판 성격과 맞지 않거나 타 게시판 링크 제공 게시물

타인을 비방하거나 심한 욕설을 하는 게시물

종교,정치,지역 단체를 포괄적으로 비방하는 게시물

기타 적합하지 않다고 판단되는 게시물




이 게시물은 게시판 용도와 맞지 않습니다.

이 게시물은 중복된 게시물 입니다.

회원들에게 불쾌감(선정성,욕설,분란성 등등)을 주는 글 입니다.

뽐뿌규칙을 위반(저작권,저격,쪽지공개 등등)하였습니다.

광고성,업자성 게시물로 보이고 있습니다


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
	# 시작 => 신고항목
	#########################################################

		#######################################################
		# 시작 => 상수__변수__배열
		#######################################################

		//=====================================================
		// 신고항목__건수
		$reason_list_t = 0;


		//=====================================================
		// 신고항목__배열
		$reason_list_arr = array();

		#######################################################
		# 끝 => 상수__변수__배열
		#######################################################



		#######################################################
		# 시작 => 신고항목__가져오기
		#######################################################

		//=====================================================
		// 신고항목__가져오는__쿼리문
		$sql	 = "SELECT COUNT(*) FROM `".$piree_table['report_reason']."`";
		$total = sql_efv($sql);
		$total = (int)$total;

		#######################################################
		# 끝 => 신고항목__가져오기
		#######################################################



		#######################################################
		# 시작 => 신고항목__불러오기
		#######################################################
		IF ($total > 0)
		{

			//===================================================
			// 신고_사유__불러오기
			$sql		= "SELECT * FROM `".$piree_table['report_reason']."` ORDER BY num ASC";
			$result = sql_query ($sql);

		}
		#######################################################
		# 끝 => 신고항목__불러오기
		#######################################################

	#########################################################
	# 끝 => 신고항목
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

	#########################################################
	# 끝 => 화면_ECHO
	#########################################################


?>

<section>
		<h2>신고 사유</h2>


		<form name="report_reason_list" id="report_reason_list" action="./pi__reason.list.update.php" method="post">

		<div class="tbl_head01 tbl_wrap">
				<table>
				<caption>신고 사유</caption>
				<thead>
				<tr>
					<th scope="col">
						<label for="chkall" class="sound_only">신고 사유 전체</label>
						<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
					</th>
					<th scope="col">번호</th>
					<th scope="col">게시글</th>
					<th scope="col">댓글</th>
					<th scope="col">회원</th>
					<th scope="col">순서</th>
					<th scope="col">신고사유 제목</th>
					<th scope="col">등록회원</th>
					<th scope="col">신고건수</th>
					<th scope="col">아이피</th>
					<th scope="col">등록일시</th>
				</tr>
				</thead>
				<tbody>

<?php

		//=====================================================
		// 시작 => 신고하기__설정_정보__유무
		IF ($total > 0)
		{

			#####################################################
			# 시작 => 신고하기__설정_정보__있으면
			#####################################################

			//===================================================
			// 시작 => 반복문
			FOR ($i=0; $row=sql_fetch_array($result); $i++)
			{

				//=================================================
				// 제목
				$subject_s = stripslashes($row["subject_s"]);


				//=================================================
				// 등록일시
				$requ_time_n_s = date("y.m.d H:i:s", $row["regi_time_n"]);

?>
				<tr>
					<td class="td_chk">
							<input type="hidden" name="reason_n[<?php echo $i ?>]" value="<?php echo $row['num'] ?>">
							<label for="chk_<?php echo $i; ?>" class="sound_only">CHECK</label>
							<input type="checkbox" name="chk[]" value="<?php echo $i; ?>" id="chk_<?php echo $i ?>">
					</td>
					<td class="td_grid"><?php echo $row['num']; ?></td>
					<td class="td_boolean">
							<label for="prog_article_<?php echo $i; ?>" class="sound_only">게시글</label>
							<input type="checkbox" name="prog_article[<?php echo $i; ?>]" value="1" id="prog_article_<?php echo $i; ?>""<?php	if ($row["prog_article"] == 1) echo " checked"; ?>>
					</td>
					<td class="td_boolean">
							<label for="prog_comment_<?php echo $i; ?>" class="sound_only">댓글</label>
							<input type="checkbox" name="prog_comment[<?php echo $i; ?>]" value="1" id="prog_comment_<?php echo $i; ?>""<?php	if ($row["prog_comment"] == 1) echo " checked"; ?>>
					</td>
					<td class="td_boolean">
							<label for="prog_member_<?php echo $i; ?>" class="sound_only">회원</label>
							<input type="checkbox" name="prog_member[<?php echo $i; ?>]" value="1" id="prog_member_<?php echo $i; ?>""<?php	if ($row["prog_member"] == 1) echo " checked"; ?>>
					</td>
					<td class="td_amount">
							<label for="order_n_<?php echo $i; ?>" class="sound_only">순서</label>
							<input type="text" name="order_n[<?php echo $i; ?>]" value="<?php echo $row["order_n"]; ?>" id="order_n_<?php echo $i; ?>"" class="frm_input" style="width:60px;">
					</td>
					<td>
							<label for="subject_s_<?php echo $i; ?>" class="sound_only">신고 사유</label>
							<input type="text" name="subject_s[<?php echo $i; ?>]" value="<?php echo $subject_s; ?>" id="subject_s_<?php echo $i; ?>"" class="frm_input required" required style="width:98%;">
					</td>
					<td class="td_id"><?php echo $row["regi_mem_nick"] ?></td>
					<td class="td_boolean"><?php echo $row["report_t"] ?></td>
					<td class="td_cnt"><?php echo $row["ip_s"] ?></td>
					<td class="td_cnt"><?php echo $requ_time_n_s ?></td>
				</tr>

<?php
			}
			// 끝 => 반복문
			//===================================================

			#####################################################
			# 끝 => 신고_사유__있으면
			#####################################################

		}
		ELSE
		{

			#####################################################
			# 시작 => 신고_사유__없으면
			#####################################################

?>
				<tr>
					<td colspan="14" align="center">
						<strong>" 신고 사유 " 이 없습니다.</strong>
					</td>
				</tr>

<?php

			#####################################################
			# 끝 => 신고_사유__없으면
			#####################################################

		}
		// 끝 => 신고_사유__유무
		//=====================================================

?>

				</tbody>
				</table>
		</div>


		<div class="btn_confirm">
			<input type="submit" class="btn_submit" value="선택수정" name="act_button" onclick="document.pressed=this.value">
			<input type="submit" class="btn_submit" value="선택삭제" name="act_button" onclick="document.pressed=this.value">
			<input type="button" class="btn_cancel" value="설정 정보 수정하기" onClick="PageUrl('./pi__config.form.php')">
			<input type="button" class="btn_cancel" value="신고 사유 관리하기" onClick="PageUrl('./pi__reason.list.php')">
			<input type="button" class="btn_cancel" value="신고 접수 관리하기" onClick="PageUrl('./pi__reason.list.php')">
		</div>

		</form>

</section>


<br />
<br />
<br />
<br />


<section>
		<h2>신고 사유 입력하기</h2>

		<form name="report_reason_input" id="report_reason_input" action="./pi__reason.update.php" onsubmit="return submit__report_reason_input(this);" method="post">

		<div class="tbl_head01 tbl_wrap">
				<table>
				<caption>신고 사유 입력하기</caption>
				<thead>
				<tr>
					<th scope="col">게시글</th>
					<th scope="col">댓글</th>
					<th scope="col">회원</th>
					<th scope="col">신고사유 제목</th>
					<th scope="col">입력</th>
				</tr>
				</thead>

				<tbody>
				<tr>
						<td class="td_grid">
							<label for="prog_article_label" class="sound_only">게시글</label>
							<input type="checkbox" name="prog_article" value="1" id="prog_article_label" checked >
						</td>
						<td class="td_grid">
							<label for="prog_comment_label" class="sound_only">댓글</label>
							<input type="checkbox" name="prog_comment" value="1" id="prog_comment_label" checked >
						</td>
						<td class="td_grid">
							<label for="prog_member_label" class="sound_only">회원</label>
							<input type="checkbox" name="prog_member" value="1" id="prog_member_label" checked >
						</td>
						<td align="center">
							<label for="subject_s_label" class="sound_only">신고사유 제목</label>
							<input type="text" name="subject_s" value="" id="subject_s_label" class="frm_input required" required style="width:96%;">
						</td>
						<td class="td_grid">
							<div class="btn_confirm">
								<input type="submit" class="btn_submit" value="입력">
							</div>
						</td>
				</tr>

				</tbody>
				</table>
		</div>

		</form>

</section>


<script>

function all_checked(sw) {
		var f = document.report_reason_list;

		for (var i=0; i<f.length; i++) {
				if (f.elements[i].name == "chk[]")
						f.elements[i].checked = sw;
		}
}


function submit__report_reason_input(gform)
{

		//=====================================================
		// 시작 => 신고사유_제목__입력확인
		if (gform.prog_article.checked == false && gform.prog_comment.checked == false && gform.prog_member.checked == false)
		{
			alert("[ 신고사유 ] 를 적용할 항목을 (게시글, 댓글, 회원) 중 1개이상 선택해 주세요.");
			gform.prog_article.focus();
			return false;
		}
		// 끝 => 신고사유_제목__입력확인
		//=====================================================


		//=====================================================
		// 시작 => 신고사유_제목__입력확인
		if (gform.subject_s.value == "")
		{
			alert("[ 신고사유 제목 ] 은 필수입력사항입니다. 입력해 주세요.");
			gform.subject_s.focus();
			return false;
		}
		// 끝 => 신고사유_제목__입력확인
		//=====================================================


		return true;

}
</script>





<?php

	//=======================================================
	// ADMIN_TAIL__첨부
	include_once("../admin.tail.php");

?>