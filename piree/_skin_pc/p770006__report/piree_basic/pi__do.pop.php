<?php
IF (!defined('_GNUBOARD_')) exit; // 개별_페이지__접근_불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$report_config['skin_pc_u'].'/style.css">', 0);
?>


<!-- 시작 => 신고하기__폼 -->
<div class="new_win">

		<h1 id="win_title"><?php echo $g5['title'] ?></h1>

		<form name="report_do_form" id="report_do_form" action="./do.pop.php" method="post">
		<input type="hidden" name="mode" value="report_do">
		<input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
		<input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
		<input type="hidden" name="prog_div_c" value="<?php echo $prog_div_c ?>">

		<div id="report_do">

			<div class="report_guide">
				신고하기는 자신과 반대 의견을 표현하는 기능이 아닙니다.<br />
				허위, 장난, 부문별하게 신고하면 권한이 회수되니 신중이 신고하시기 바랍니다.<br />
				신고하시면 검토하여 필요하면 삭제, 이동, 회원 제재 조치 합니다.
			</div>

			<div class="cl_bo space_10px"></div>


			<div class="reason_title">
				⊙ 신고 대상
			</div>

			<div class="reason_box">
				<ul>
					<li>
						<div class="reason_arti_s">구분</div>
						<div class="reason_arti_b"><?php echo $report_div_s ?> 신고</div>
					</li>
					<li>
						<div class="reason_arti_s">작성자</div>
						<div class="reason_arti_b"><?php echo $report_get_mem_nick ?> ( <?php echo $report_get_mem_id ?> )</div>
					</li>
					<li>
						<div class="reason_arti_s">내용</div>
						<div class="reason_arti_b"><?php echo $report_title_s ?></div>
					</li>
				</ul>
			</div>

			<div class="cl_bo space_10px"></div>


			<div class="reason_title">
				⊙ 신고 사유
			</div>

			<div class="reason_box">
<?php

	//=======================================================
	// 시작 => 신고_사유__있으면
	IF ($total > 0)
	{
?>
				<ul>
<?php

				//=================================================
				// 시작 => 반복문
				WHILE ($row = sql_fetch_array($result))
				{
?>
					<li>
						<input type="radio" name="reason_n" value="<?php echo $row['num'] ?>">
						<?php echo $row["subject_s"] ?>
					</li>
<?php
				}
				// 끝 => 반복문
				//=================================================

?>
				</ul>
				<textarea name="report_memo_s"></textarea>
<?php
	}
	// 끝 => 신고_사유__있으면
	//=======================================================

?>
			</div>

		</div>

		<div class="win_btn">
				<button type="button" onclick="this.form.submit();">신고하기</button>
				<button type="button" onclick="window.close();">창닫기</button>
		</div>

		</form>

</div>
<!-- 끝 => 신고하기__폼 -->


<script>

function submit__report_do(gform)
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