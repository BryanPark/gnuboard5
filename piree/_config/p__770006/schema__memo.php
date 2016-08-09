<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2014년 04월 01일 화요일 오전 0시 48분, 날씨 지금은 한밤중이라

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 피리 신고하기 PLUS G5 > 신고하기 DB SCHEMA 화일
===========================================================




###########################################################




	# 테이블 이름 : _piree_program
	- 본 프로그래머가 만든 프로그램들 정보와 설정을 저장하는 테이블
	- 여러 프로그램들의 이름, 버젼, 스킨, 옵션, 선택사항등을 저장함
	- 각 프로그램별로 테이블을 따로 만들시 테이블이 늘어나고 관리도 어려워서 하나의 테이블에 모든 프로그램들 정보를 저장한다.




prog_n
	- 프로그램 번호
		. 본 프로그래머가 만든 프로그램들이 그누보드에서 작동시 SUBMENU로 적용될때 사용하는 번호
		. 프로그램 고유 번호
		. G4 무료 버젼은 740 002~998 사용중 또는 예정
		. G4 유료 버젼은 750 002~998 사용중 또는 예정
		. G5 무료 버젼은 760 002~998 사용중 또는 예정
		. G5 유료 버젼은 770 002~998 사용중 또는 예정




prog_c
	- 프로그램 영문 이름




prog_s
	- 프로그램 한글 이름




version_s
	- 프로그램 버젼




prog_key_s
	- 프로그램 구입한 사용자 키
	- 현재는 사용하지 않음, 차후 인코더 구입후 인코딩 버젼 배포시 사용할 예정




prog_memo_s
	- 프로그램에 대한 한글 설명




domain_s
	- 본 프로그램을 설치하여 운영중인 도메인




is_paid
	- 무료 또는 유료 여부
		. 0 : 무료
		. 1 : 유료




use_pc_c
	- PC 화면 사용 여부
	- 현재는 사용하지 않음 , 모든 버젼 PC 화면은 기본 사용중




skin_pc_c
	- PC 화면 스킨




use_mobile_c
	- 모바일 화면 사용 여부
	- 현재는 사용하지 않음 , G5는 모바일 기본 스킨이 들어 있음




skin_mobile_c
	- 모바일 화면 스킨




pp_cf_1_c
	- 설정 영문 코드
	- blind_do_t


pp_cf_1_m
	- 설정이 어떤 역확인지 알려주는 설명문
	- 블라인드 처리할 신고 건수 >> 입력한 회수만큼 신고 받으면 ( 게시글, 댓글 )을 블라인트 처리 합니다.");


pp_cf_1_n
	- 설정 숫자 값


pp_cf_1_s
	- 설정 문자열 값




pp_cf_2_c
	- 설정 영문 코드
	- report_do_level_n


pp_cf_2_m
	- 설정이 어떤 역확인지 알려주는 설명문
	- 신고 가능한 레벨 >> 입력하신 레벨 이상 회원은 \"신고하기\" 할수 있습니다.");


pp_cf_2_n
	- 설정 숫자 값


pp_cf_2_s
	- 설정 문자열 값




pp_cf_3_c
	- 설정 영문 코드
	- exemption_level_n


pp_cf_3_m
	- 설정이 어떤 역확인지 알려주는 설명문
	- 신고 면제 할 레벨 >> 입력하신 레벨 이상인 회원을 대상으로 \"신고하기\" 할수 없습니다. ( 신고 대상 면제하는 특권 )");


pp_cf_3_n
	- 설정 숫자 값


pp_cf_3_s
	- 설정 문자열 값




pp_cf_4_c
	- 설정 영문 코드
	- exemption_day_n


pp_cf_4_m
	- 설정이 어떤 역확인지 알려주는 설명문
	- 신고 면제 할 가입일수 >> \"가입후 입력한 날짜수\" 만큼 지난 회원을 대상으로 \"신고하기\" 할수 없습니다. ( 신고 대상 면제하는 특권 )");


pp_cf_4_n
	- 설정 숫자 값


pp_cf_4_s
	- 설정 문자열 값




pp_cf_5_c
	- 설정 영문 코드
	- report_do_point_n


pp_cf_5_m
	- 설정이 어떤 역확인지 알려주는 설명문
	- 신고 한 회원의 포인트 >> 신고할때 신고한 회원의 포인트 ( 지급, 차감을 선택할수 있음 ), 입력 않하시면 포인트 변동 없음");


pp_cf_5_n
	- 설정 숫자 값


pp_cf_5_s
	- 설정 문자열 값




pp_cf_6_c
	- 설정 영문 코드
	- report_get_point_n


pp_cf_6_m
	- 설정이 어떤 역확인지 알려주는 설명문
	- 신고 당한(받은) 회원의 포인트 >> 신고 당한(받은) 회원의 포인트 ( 지급, 차감을 선택할수 있음 ), 입력 않하시면 포인트 변동 없음");


pp_cf_6_n
	- 설정 숫자 값


pp_cf_6_s
	- 설정 문자열 값




pp_cf_7_c
	- 설정 영문 코드
	- report_rash_point_n


pp_cf_7_m
	- 설정이 어떤 역확인지 알려주는 설명문
	- 무분별한 신고시 신고 한 회원의 포인트 >> 무분별한 신고시 신고한 회원의 포인트 ( 지급, 차감을 선택할수 있음 ), 입력 않하시면 포인트 변동 없음");


pp_cf_7_n
	- 설정 숫자 값


pp_cf_7_s
	- 설정 문자열 값




pp_cf_8_c
	- 설정 영문 코드
	- report_rash_auth_n


pp_cf_8_m
	- 설정이 어떤 역확인지 알려주는 설명문
	- 무분별한 신고시 신고 권한 제한 >> 입력한 회수만큼 무분별한 신고를 하면 신고할수 있는 권한을 제한함");


pp_cf_8_n
	- 설정 숫자 값


pp_cf_8_s
	- 설정 문자열 값




regi_time_n
	- 프로그램 등록한 시간
	- "설정 정보 수정하기" 최초 실행한 시간




modi_time_n
	- 프로그램 정보 수정한 시간




###########################################################




	# 테이블 이름 : piree__770006__report_reason
	- 신고 사유를 입력하는 테이블
	- 신고화면에서 여러 신고할 이유를 선택할때 사용함




	`num` int unsigned NOT NULL auto_increment,
	- 신고 일련번호 , 자동 증가




	`order_n` int unsigned NOT NULL default '0',
	- 신고 사유 순서




	`regi_mem_mn` int unsigned NOT NULL default '0',
	- 신고사유 등록한 회원 번호 , 숫자만 등록 가능




	`regi_mem_id` varchar(20) NOT NULL DEFAULT '',
	- 신고사유 등록한 회원 아이디




	`regi_mem_nick` varchar(255) NOT NULL default '',
	- 신고사유 등록한 회원 닉네임




	`prog_article` tinyint unsigned NOT NULL default '0',
	- ( 게시글 ) 신고할때 보여줄지 여부
		. 0 : 안보여줌
		. 1 : 보여줌 , 게시글 신고할때 이 항목이 노출됨




	`prog_comment` tinyint unsigned NOT NULL default '0',
	- ( 댓글 ) 신고할때 보여줄지 여부
		. 0 : 안보여줌
		. 1 : 보여줌 , 댓글 신고할때 이 항목이 노출됨




	`prog_member` tinyint unsigned NOT NULL default '0',
	- ( 회원 ) 신고할때 보여줄지 여부
		. 0 : 안보여줌
		. 1 : 보여줌 , 회원 신고할때 이 항목이 노출됨




	`subject_s` varchar(255) NOT NULL default '',
	- 신고 사유 제목




	`report_t` int unsigned NOT NULL default '0',
	- 신고 건수 , 이 신고사유로 신고된 신고 건수 총 합




	`ip_s` varchar(255) NOT NULL DEFAULT '',
	- 운영자가 신고 사유 등록했을때 아이피




	`regi_time_n` int unsigned NOT NULL default '0',
	- 운영자가 신고 사유 등록했을때 시간




	`modi_time_n` int unsigned NOT NULL default '0',
	- 운영자가 신고 사유 마지막으로 수정한 시간




###########################################################




	# 테이블 이름 : piree__770006__report_list
	- 회원이 신고한 목록 테이블
	- 회원이 신고한 내용을 저장한 테이블




	`num` int unsigned NOT NULL auto_increment,
	- 신고 일련번호 , 자동 증가




	`do_mem_mn` int unsigned NOT NULL default '0',
	- 신고한 회원 번호




	`do_mem_id` varchar(20) NOT NULL DEFAULT '',
	- 신고한 회원 아이디




	`do_mem_nick` varchar(255) NOT NULL default '',
	- 신고한 회원 닉네임




	`get_mem_mn` int unsigned NOT NULL default '0',
	- 신고 당한 회원 번호
	- (게시글 작성자, 댓글 작성자등이 해당됨)




	`get_mem_id` varchar(20) NOT NULL DEFAULT '',
	- 신고 당한 회원 아이디




	`get_mem_nick` varchar(255) NOT NULL default '',
	- 신고 당한 회원 닉네임




	`res_mem_mn` int unsigned NOT NULL default '0',
	- 신고를 접수하여 조치한 운영자 회원 번호




	`res_mem_id` varchar(20) NOT NULL DEFAULT '',
	- 신고를 접수하여 조치한 운영자 아이디




	`res_mem_nick` varchar(255) NOT NULL default '',
	- 신고를 접수하여 조치한 운영자 닉네임




	`prog_div_c` varchar(20) NOT NULL DEFAULT '',
	- 신고 대상 구분 (영어)
		. article (설명 : 게시글)
		. comment (설명 : 댓글)
		. member (설명 : 회원)




	`bo_table` varchar(20) NOT NULL DEFAULT '',
	- 게시판 이름




	`arti_n` int unsigned NOT NULL default '0',
	- 신고 대상 자료 번호

	위 "prog_div_c" 가 "article" 일때 게시글 신고시 게시글 번호
	위 "prog_div_c" 가 "comment" 일때 댓글 신고시 댓글 번호
	위 "prog_div_c" 가 "member" 일때 회원 신고시 회원 번호




	`parent_n` int unsigned NOT NULL default '0',
	- 댓글 신고일때 게시글 번호
	- 댓글은 "arti_n"에 댓글 번호가 저장되므로 댓글의 관계인 게시글 번호를 따로 저장함
	- 게시글 신고일때나 회원 신고일때는 사용하지 않음




	`reason_n` int unsigned NOT NULL default '0',
	- 신고사유 번호
	- 위 테이블 "piree__770006__report_reason" 에 저장된 신고사유의 일련번호 (num 필드 번호)




	`title_s` varchar(255) NOT NULL default '',
	- 신고 대상 게시글




	`active_s` varchar(40) NOT NULL default '',
	- 신고 진행 상태 (한글)
		. 접수
		. 완료




	`resu_s` varchar(40) NOT NULL default '',
	- 신고 조치 결과 , 운영자가 신고를 조치한 결과 (한글)
		. 무분별한 신고
		. 회원레벨 강등
		. 회원 탈퇴
		. 무분별한 신고
		. 조치없이 완료




	`report_memo_s` varchar(255) NOT NULL default '',
	- 신고 하는 회원이 운영자에게 전할 말 , 신고하는 회원이 신고사유 선택과 함께 메모를 남겨 운영자에게 알려줌




	`hidden_memo_s` varchar(600) NOT NULL default '',
	- 신고를 접수한 운영자가 비공개로 운영자만 보기 위한 메모




	`send_how_s` varchar(20) NOT NULL default '',
	- 신고를 접수한 운영자가 신고 당한 회원(게시글, 댓글 작성자) 에게 할 말을 전할 수단

	- 현재는 위에 "hidden_memo_s"를 입력하면 "쪽지" 로 저장되고
					 위에 "hidden_memo_s"를 입력하지 않으면 ""로 저장된다.




	`send_msg_s` varchar(600) NOT NULL default '',
	- 신고를 접수한 운영자가 신고 당한 회원(게시글, 댓글 작성자) 에게 할 말




	`do_ip_s` varchar(255) NOT NULL DEFAULT '',
	- 신고 한 회원의 아이피




	`regi_time_n` int unsigned NOT NULL default '0',
	- 신고 한 시각




	`upda_time_n` int unsigned NOT NULL default '0',
	- 수정 시간 , 현재는 사용하지 않음




	`read_time_n` int unsigned NOT NULL default '0',
	- 신고를 접수한 운영자가 최초 읽은 시간




	`resu_time_n` int unsigned NOT NULL default '0',
	- 운영자가 이 신고를 조치(제재 또는 종결) 한 시간


*/


?>