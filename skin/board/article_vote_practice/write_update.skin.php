<?php

/*
===========================================================

	프로젝트 이름 : 피리 게시글에 투표, 복수 질문

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2016년 01월 10일 일요일 오전 08시 00분 - 날씨 그래도 요멸일보다는 덜 추운 편이네

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 게시판 > 스킨 > 피리 게시글에 투표, 복수 질문 > 투표 등록하기
===========================================================


*/


	#########################################################
	# 시작 => 선처리
	#########################################################

	//=======================================================
	// 개별_페이지__접근_불가
	IF ( !defined('_GNUBOARD_') )										EXIT;

	#########################################################
	# 끝 => 선처리
	#########################################################



	#########################################################
	# 시작 => 게시글에_투표__등록하기
	#########################################################

	//*******************************************************
	//** DEV_SOSS
	//*******************************************************

	//*******************************************************
	//** PWP__760034__ARTICLE_VOTE
	//*******************************************************



	//=======================================================
	// 시작 => 투표하기__이면
	IF ( !$w || $w == 'r' )
	{

			//===================================================
			// 투표하기__여부
			$wr_use_arti_vote_n = $_POST['wr_use_arti_vote_n'];


			//===================================================
			// 시작 => 투표하기__이면
			IF ($wr_use_arti_vote_n == 1)
			{

					//===============================================
					// 피리_메뉴__번호
					$piree_menu_n = 760034;


					//===============================================
					// 게시글에_투표__등록하는_파일__첨부
					include_once( get__sam_file($piree_menu_n, 'vote_regist.php') );

			}
			// 끝 => 투표하기__이면
			//===================================================

	}
	// 끝 => 투표하기__이면
	//=======================================================

	#########################################################
	# 끝 => 게시글에_투표__등록하기
	#########################################################


?>