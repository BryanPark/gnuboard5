<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 01월 12일 일요일 오전 09시 04분 - 날씨 풀렸어, 겨울치고 덜 추워

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 피리 웹프로그램 소식
===========================================================


*/


	#########################################################
	# 시작 => 선_처리__메뉴_지정__관리자_확인
	#########################################################

	//=======================================================
	// 메뉴_번호__지정____피리_프로그램_소식
	$sub_menu = "760999";


	//=======================================================
	// 기본처리_파일__첨부
	include_once('./_common.php');


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
	$g5['title'] = "피리 웹프로그램 소식";


	//=======================================================
	// HEAD__첨부
	include_once("../admin.head.php");

	#########################################################
	# 끝 => 화면_ECHO
	#########################################################


?>

<div style="margin:0 20px 0 20px;">
		<iframe width="100%" height="600" border="0" frameborder="0" id="update_frame" name="update_frame" src="http://www.piree.co.kr/PWP_UPDATE/">
</div>



<script>

	$(function(){
	 if($("iframe")){
		$("iframe").height($(window).height());
	 }
	});

</script>





<?php

	//=======================================================
	// ADMIN_TAIL__첨부
	include_once('../admin.tail.php');

?>