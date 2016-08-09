<?
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


	###########################################################################
	#//2016-07-08 by Bryan Park 시작 => 기존 blacklist/list.php 의 php로직
	###########################################################################
?>
<section>
	<h2>불량회원 입력</h2>	
	<form name="level_list" id="level_list" action = "./pi__reported.user.update.php" method="post">
		<input type="hidden" id="mode" name="mode" value = "insert">
		<div class="tbl_frm01 tbl_wrap">
				<table>
				<tbody>
					<tr>
						<th>아이디</th>
						<td><input style="width:400px;" type="text" name="mb_id" required><td>
					</tr>
					<tr>
						<th>아이피</th>
						<td><input style="width:400px;" type="text" name="mb_ip" required pattern="((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$"><td>
					</tr>
					<tr>
						<th>내용</th>
						<td><textarea name="bl_comment" rows="5" cols="60" required></textarea><td>
					</tr>
					<tr>
						<th>타입</th>
						<td>
							<select name="bl_type" style="width:120px;" required>
								<option value="T">일시적</option>
								<option value="P">영구적</option>
							</select>
						<td>
					</tr>
				</tbody>
				</table>
		</div>

		<br>

		<div class="btn_confirm">
			<input type="submit" class="btn_submit" value=" 불량회원입력 ">
			<input type="button" class="btn_cancel" value=" 돌아가기 " onclick="PageUrl('./pi__reported.user.list.php')">
		</div>

	</form>

<?php
	//=======================================================
	// ADMIN_TAIL__첨부
	include_once("../admin.tail.php");

?>