
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
<title>p760034 - 게시글에 투표, 다중 질문 (이온큐브) 글쓰기 | 그누보드5</title>
<link rel="stylesheet" href="http://www.piree.co.kr/demo_760/p760000e/theme/basic/css/default.css">
<link rel="stylesheet" href="http://www.piree.co.kr/demo_760/p760000e/theme/basic/skin/connect/basic/style.css">
<link rel="stylesheet" href="http://www.piree.co.kr/demo_760/p760000e/theme/basic/skin/outlogin/basic/style.css">
<link rel="stylesheet" href="http://www.piree.co.kr/demo_760/p760000e/skin/board/piree_FREE_article_vote_multi/style.css">
<link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/base/jquery-ui.css" rel="stylesheet" />
<link type="text/css" href="http://www.piree.co.kr/demo_760/p760000e/plugin/jquery-ui/style.css">
<link rel="stylesheet" href="http://www.piree.co.kr/demo_760/p760000e/theme/basic/skin/popular/basic/style.css">
<link rel="stylesheet" href="http://www.piree.co.kr/demo_760/p760000e/theme/basic/skin/visit/basic/style.css">
<link rel="stylesheet" href="//mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.css">
<link rel="stylesheet" href="http://www.piree.co.kr/demo_760/p760000e/piree/p760034/_skin_pc/piree_basic/style.css">
<!--[if lte IE 8]>
<script src="http://www.piree.co.kr/demo_760/p760000e/js/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "http://www.piree.co.kr/demo_760/p760000e";
var g5_bbs_url   = "http://www.piree.co.kr/demo_760/p760000e/bbs";
var g5_is_member = "1";
var g5_is_admin  = "super";
var g5_is_mobile = "";
var g5_bo_table  = "p760034__arti_vote_m";
var g5_sca       = "";
var g5_editor    = "smarteditor2";
var g5_cookie_domain = "";
var g5_admin_url = "http://www.piree.co.kr/demo_760/p760000e/adm";
</script>
<script src="http://www.piree.co.kr/demo_760/p760000e/js/jquery-1.8.3.min.js"></script>
<script src="http://www.piree.co.kr/demo_760/p760000e/js/jquery.menu.js"></script>
<script src="http://www.piree.co.kr/demo_760/p760000e/js/common.js"></script>
<script src="http://www.piree.co.kr/demo_760/p760000e/js/wrest.js"></script>


			<link rel="stylesheet" href="http://www.piree.co.kr/demo_760/p760000e/piree/_css/pi__style.css">


			<script src="http://www.piree.co.kr/demo_760/p760000e/piree/_js/pi__piree.js"></script>
			<script src="http://www.piree.co.kr/demo_760/p760000e/piree/_js/jquery.autogrow.js"></script>


			<script>

					//===============================================
					// PIREE__기본_상수
					var piree_url = "http://www.piree.co.kr/demo_760/p760000e/piree";
					var piree_js_url = "http://www.piree.co.kr/demo_760/p760000e/piree/_js";

			</script>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="//mugifly.github.io/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
<script src="http://www.piree.co.kr/demo_760/p760000e/piree/p760034/_skin_pc/piree_basic/vote_write_form.js"></script>
</head>
<body>
<div id="hd_login_msg">최고관리자 최고관리자님 로그인 중 <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/logout.php">로그아웃</a></div>
<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1">p760034 - 게시글에 투표, 다중 질문 (이온큐브) 글쓰기</h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    
    <div id="hd_wrapper">

        <div id="logo">
            <a href="http://www.piree.co.kr/demo_760/p760000e"><img src="http://www.piree.co.kr/demo_760/p760000e/img/logo.jpg" alt="그누보드5"></a>
        </div>

        <fieldset id="hd_sch">
            <legend>사이트 내 전체검색</legend>
            <form name="fsearchbox" method="get" action="http://www.piree.co.kr/demo_760/p760000e/bbs/search.php" onsubmit="return fsearchbox_submit(this);">
            <input type="hidden" name="sfl" value="wr_subject||wr_content">
            <input type="hidden" name="sop" value="and">
            <label for="sch_stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="stx" id="sch_stx" maxlength="20">
            <input type="submit" id="sch_submit" value="검색">
            </form>

            <script>
            function fsearchbox_submit(f)
            {
                if (f.stx.value.length < 2) {
                    alert("검색어는 두글자 이상 입력하십시오.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                var cnt = 0;
                for (var i=0; i<f.stx.value.length; i++) {
                    if (f.stx.value.charAt(i) == ' ')
                        cnt++;
                }

                if (cnt > 1) {
                    alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                return true;
            }
            </script>
        </fieldset>

        <div id="text_size">
            <!-- font_resize('엘리먼트id', '제거할 class', '추가할 class'); -->
            <button id="size_down" onclick="font_resize('container', 'ts_up ts_up2', '');"><img src="http://www.piree.co.kr/demo_760/p760000e/img/ts01.gif" alt="기본"></button>
            <button id="size_def" onclick="font_resize('container', 'ts_up ts_up2', 'ts_up');"><img src="http://www.piree.co.kr/demo_760/p760000e/img/ts02.gif" alt="크게"></button>
            <button id="size_up" onclick="font_resize('container', 'ts_up ts_up2', 'ts_up2');"><img src="http://www.piree.co.kr/demo_760/p760000e/img/ts03.gif" alt="더크게"></button>
        </div>

        <ul id="tnb">
                                    <li><a href="http://www.piree.co.kr/demo_760/p760000e/adm"><b>관리자</b></a></li>
                        <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/member_confirm.php?url=http://www.piree.co.kr/demo_760/p760000e/bbs/register_form.php">정보수정</a></li>
            <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/logout.php">로그아웃</a></li>
                        <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/faq.php">FAQ</a></li>
            <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/qalist.php">1:1문의</a></li>
            <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/current_connect.php">접속자 
1</a></li>
            <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/new.php">새글</a></li>
        </ul>
    </div>

    <hr>

    <nav id="gnb">
        <h2>메인메뉴</h2>
        <ul id="gnb_1dul">


            <li class="gnb_1dli" style="z-index:">
								<a href="http://www.piree.co.kr/demo_760/p760000s/" class="gnb_1da">무료 데모 (소스)</a>
								<ul class="gnb_2dul">
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_760/p760000s/bbs/board.php?bo_table=p760031__comment_sta" class="gnb_2da">별점평가 댓글 게시판</a></li>
								</ul>
            </li>

            <li class="gnb_1dli" style="z-index:">
								<a href="http://www.piree.co.kr/demo_760/p760000e/" class="gnb_1da">무료 데모 (이온큐브)</a>
								<ul class="gnb_2dul">
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/board.php?bo_table=p760008__arti_vote" class="gnb_2da">p760008 - 게시글에 투표</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/board.php?bo_table=p760032__map_skin" class="gnb_2da">p760032 - 피리 맵 스킨</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/board.php?bo_table=p760033__map_page" class="gnb_2da">p760033 - 피리 맵 페이지 (구글맵 비동기)</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/board.php?bo_table=p760034__arti_vote_m" class="gnb_2da">p760034 - 게시글에 투표, 다중 질문</a></li>
								</ul>
            </li>

            <li class="gnb_1dli" style="z-index:">
								<a href="http://www.piree.co.kr/demo_770/p770000s/" class="gnb_1da">유료 데모 G5</a>
								<ul class="gnb_2dul">
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770002/" class="gnb_2da">피리 레벨도우미</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770008/" class="gnb_2da">피리 카테고리</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770012/" class="gnb_2da">장터 게시판 스킨</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770000s/bbs/board.php?bo_table=p770015__arti_vote" class="gnb_2da">p770015 - 게시글에 투표</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770020/" class="gnb_2da">피리 쪽지</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770022/" class="gnb_2da">구인 게시판 스킨</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770023/" class="gnb_2da">부동산 매물 스킨</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770029/" class="gnb_2da">가입인사 게시판 스킨</a></li>
										<li class="gnb_2dli"><a href="http://www.piree.co.kr/demo_770/p770000s/bbs/board.php?bo_table=p770032__map_skin&view_map=1" class="gnb_2da">p770032 - 피리 맵 스킨</a></li>
								</ul>
            </li>

                    </ul>
    </nav>
</div>
<!-- } 상단 끝 -->

<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="aside">
        
<!-- 로그인 후 아웃로그인 시작 { -->
<section id="ol_after" class="ol">
    <header id="ol_after_hd">
        <h2>나의 회원정보</h2>
        <strong>최고관리자님</strong>
        <a href="http://www.piree.co.kr/demo_760/p760000e/adm" class="btn_admin">관리자 모드</a>    </header>
    <ul id="ol_after_private">
        <li>
            <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                <span class="sound_only">안 읽은 </span>쪽지
                <strong>0</strong>
            </a>
        </li>
        <li>
            <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/point.php" target="_blank" id="ol_after_pt" class="win_point">
                포인트
                <strong>1,000</strong>
            </a>
        </li>
        <li>
            <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">스크랩</a>
        </li>
    </ul>
    <footer id="ol_after_ft">
        <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a>
        <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/logout.php" id="ol_after_logout">로그아웃</a>
    </footer>
</section>

<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "http://www.piree.co.kr/demo_760/p760000e/bbs/member_confirm.php?url=member_leave.php";
}
</script>
<!-- } 로그인 후 아웃로그인 끝 -->
        		<!-- 시작 => 사이트__테스트__메뉴 -->
		<section id="site_temp_page" class="piree_side_menu">
				<ul>
						<li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/login_check.php?url=http%3A%2F%2Fwww.piree.co.kr%2Fdemo_760%2Fp760000e%2Fbbs%2Fwrite.php%3Fbo_table%3Dp760034__arti_vote_m">★ 테스트용 렌덤 로그인 ★</a></li>
						<li><a href="http://www.piree.co.kr/demo_760/p760000e/piree/_temp_page/pi__point.form.php">★ 테스트용 포인트 요청 ★</a></li>
						<li><a href="PIREE_PLUS_LEVEL_HELPER_URL/">레벨 변경 신청</a></li>
				</ul>
		</section>
		<!-- 끝 => 사이트__테스트__메뉴 -->

    </div>
    <div id="container">
        <!-- skin : piree_FREE_article_vote_multi -->

		<section id="bo_w">
			<h2 id="container_title">p760034 - 게시글에 투표, 다중 질문 (이온큐브) 글쓰기</h2>

			<!-- 게시물 작성/수정 시작 { -->
			<form name="fwrite" id="fwrite" action="http://www.piree.co.kr/demo_760/p760000e/bbs/write_update.php" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:100%">
			<input type="hidden" name="uid" value="16031418065872">
			<input type="hidden" name="w" value="">
			<input type="hidden" name="bo_table" value="p760034__arti_vote_m">
			<input type="hidden" name="wr_id" value="0">
			<input type="hidden" name="sca" value="">
			<input type="hidden" name="sfl" value="">
			<input type="hidden" name="stx" value="">
			<input type="hidden" name="spt" value="">
			<input type="hidden" name="sst" value="">
			<input type="hidden" name="sod" value="">
			<input type="hidden" name="page" value="">
<input type="hidden" value="html1" name="html">
			<div class="btn_confirm">
					<input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
					<a href="./board.php?bo_table=p760034__arti_vote_m" class="btn_cancel">취소</a>
			</div>
			<br class="cl_bo"><br class="cl_bo">


			<div class="tbl_frm01 tbl_wrap">
					<table>
					<tbody>
					
					
					
					
										<tr>
							<th scope="row">옵션</th>
							<td>
<input type="checkbox" id="notice" name="notice" value="1" >
<label for="notice">공지</label></td>
					</tr>
					
					
					<tr>
							<th scope="row"><label for="wr_subject">제목<strong class="sound_only">필수</strong></label></th>
							<td>
									<div id="autosave_wrapper">
											<input type="text" name="wr_subject" value="" id="wr_subject" required class="frm_input required" size="50" maxlength="255">
																						<script src="http://www.piree.co.kr/demo_760/p760000e/js/autosave.js"></script>
											<button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count">0</span>)</button>
											<div id="autosave_pop">
													<strong>임시 저장된 글 목록</strong>
													<div><button type="button" class="autosave_close"><img src="http://www.piree.co.kr/demo_760/p760000e/skin/board/piree_FREE_article_vote_multi/img/btn_close.gif" alt="닫기"></button></div>
													<ul></ul>
													<div><button type="button" class="autosave_close"><img src="http://www.piree.co.kr/demo_760/p760000e/skin/board/piree_FREE_article_vote_multi/img/btn_close.gif" alt="닫기"></button></div>
											</div>
																				</div>
							</td>
					</tr>

					<tr>
							<th scope="row"><label for="wr_content">내용<strong class="sound_only">필수</strong></label></th>
							<td class="wr_content">
																		<span class="sound_only">웹에디터 시작</span><script>document.write("<div class='cke_sc'><button type='button' class='btn_cke_sc'>단축키 일람</button></div>");</script>
<script src="http://www.piree.co.kr/demo_760/p760000e/plugin/editor/smarteditor2/js/HuskyEZCreator.js"></script>
<script>var g5_editor_url = "http://www.piree.co.kr/demo_760/p760000e/plugin/editor/smarteditor2", oEditors = [];</script>
<script src="http://www.piree.co.kr/demo_760/p760000e/plugin/editor/smarteditor2/config.js"></script>
<script>
        $(function(){
            $(".btn_cke_sc").click(function(){
                if ($(this).next("div.cke_sc_def").length) {
                    $(this).next("div.cke_sc_def").remove();
                    $(this).text("단축키 일람");
                } else {
                    $(this).after("<div class='cke_sc_def' />").next("div.cke_sc_def").load("http://www.piree.co.kr/demo_760/p760000e/plugin/editor/smarteditor2/shortcut.html");
                    $(this).text("단축키 일람 닫기");
                }
            });
            $(document).on("click", ".btn_cke_sc_close", function(){
                $(this).parent("div.cke_sc_def").remove();
            });
        });
</script>
<textarea id="wr_content" name="wr_content" class="smarteditor2" maxlength="65536" style="width:100%"></textarea>
<span class="sound_only">웹 에디터 끝</span>																</td>
					</tr>

										<tr>
							<th scope="row"><label for="wr_link1">링크 #1</label></th>
							<td><input type="text" name="wr_link1" value="" id="wr_link1" class="frm_input" size="50"></td>
					</tr>
										<tr>
							<th scope="row"><label for="wr_link2">링크 #2</label></th>
							<td><input type="text" name="wr_link2" value="" id="wr_link2" class="frm_input" size="50"></td>
					</tr>
					
										<tr>
							<th scope="row">파일 #1</th>
							<td>
									<input type="file" name="bf_file[]" title="파일첨부 1 : 용량 1,048,576 바이트 이하만 업로드 가능" class="frm_file frm_input">
																									</td>
					</tr>
										<tr>
							<th scope="row">파일 #2</th>
							<td>
									<input type="file" name="bf_file[]" title="파일첨부 2 : 용량 1,048,576 바이트 이하만 업로드 가능" class="frm_file frm_input">
																									</td>
					</tr>
					
					
					</tbody>
					</table>
			</div>



			<div class="btn_confirm">
					<input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
					<a href="./board.php?bo_table=p760034__arti_vote_m" class="btn_cancel">취소</a>
			</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<script>
jQuery(function($){
    $.datepicker.regional["ko"] = {
        closeText: "닫기",
        prevText: "이전달",
        nextText: "다음달",
        currentText: "오늘",
        monthNames: ["1월(JAN)","2월(FEB)","3월(MAR)","4월(APR)","5월(MAY)","6월(JUN)", "7월(JUL)","8월(AUG)","9월(SEP)","10월(OCT)","11월(NOV)","12월(DEC)"],
        monthNamesShort: ["1월","2월","3월","4월","5월","6월", "7월","8월","9월","10월","11월","12월"],
        dayNames: ["일","월","화","수","목","금","토"],
        dayNamesShort: ["일","월","화","수","목","금","토"],
        dayNamesMin: ["일","월","화","수","목","금","토"],
        weekHeader: "Wk",
        dateFormat: "yymmdd",
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: ""
    };
	$.datepicker.setDefaults($.datepicker.regional["ko"]);
});
</script>			<script>
					$(function(){
							// 날짜_선택
							$('#atvt_end_date_s').appendDtpicker({ 'locale':'ko', 'autodateOnStart':false, 'minuteInterval':10 });
					});
			</script>


			<br class="cl_bo"><br class="cl_bo">


			<div class="tbl_wrap">
					<input type="checkbox" name="wr_use_arti_vote_n" id="wr_use_arti_vote_n" value="1" > 
					<label for="wr_use_arti_vote_n"><span class="str_3334dd_bold_11">"게시글에 투표"를 사용하시려면 체크해 주세요.</span><strong class="sound_only">선택</strong></label>
			</div>
			<br class="cl_bo">


			<div id="vote_write_form" class="tbl_frm01 tbl_wrap">
					<table>
					<tbody>
					<tr>
							<th scope="row"><label for="atvt_title_s">투표 제목<strong class="sound_only">필수</strong></label></th>
							<td><input type="text" name="atvt_title_s" id="atvt_title_s" value="" class="frm_input" style="width:450px;" maxlength="255"></td>
					</tr>

					<tr>
							<th scope="row"><label for="atvt_end_date_s">투표 마감<strong class="sound_only">필수</strong></label></th>
							<td>
									<div class="line_h_2_4">
											<input type="text" name="atvt_end_date_s" id="atvt_end_date_s" value="" class="frm_input" style="width:120px;">
											<br />
											<span class='font_green'>입력칸을 클릭(터치) 하시면 "날짜", "시간"을 선택할수 있는 창이 뜹니다.</span>											<br />
											<span class='font_green'>선택할수 있는 창이 뜨면 "날짜", "시간"을 선택하시면 됩니다.</span>									</div>
							</td>
					</tr>

					<tr>
							<th scope="row"><label for="vote_do_level_n">투표 레벨<strong class="sound_only">필수</strong></label></th>
							<td>
									<div class="line_h_2_8">
											
<select id="vote_do_level_n" name="vote_do_level_n">
<option value="2" selected="selected">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
											<br />
											<span class='font_green'>투표에 참여할수 있는 회원 레벨을 선택해 주세요.</span>									</div>
							</td>
					</tr>

					<tr>
							<th scope="row">다중 투표</th>
							<td>
									<div class="line_h_2_8">
<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_1" value="1" checked> <label for="atvt_vote_do_1">1표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_2" value="2"> <label for="atvt_vote_do_2">2표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_3" value="3"> <label for="atvt_vote_do_3">3표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_4" value="4"> <label for="atvt_vote_do_4">4표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_5" value="5"> <label for="atvt_vote_do_5">5표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_6" value="6"> <label for="atvt_vote_do_6">6표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_7" value="7"> <label for="atvt_vote_do_7">7표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_8" value="8"> <label for="atvt_vote_do_8">8표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_9" value="9"> <label for="atvt_vote_do_9">9표</label> &nbsp;<input type="radio" name="atvt_vote_do_t" id="atvt_vote_do_10" value="10"> <label for="atvt_vote_do_10">10표</label> &nbsp;											<br />
											<span class='font_green'>한번 투표할때 몇표까지 선택할수 있는지 입력해 주세요.</span>									</div>
							</td>
					</tr>

					<tr>
							<th scope="row"><label for="atvt_re_vote_n">재투표<strong class="sound_only">선택</strong></label></th>
							<td>
									<div class="line_h_2_8">
											<input type="checkbox" name="atvt_re_vote_n" id="atvt_re_vote_n" value="1"> <label for="atvt_re_vote_n"> 
											재투표를 허용합니다.
											<br />
											<span class='font_green'>투표를 하고 나중에 다시 투표하는것을 허용합니다.</span>									</div>
							</td>
					</tr>

					<tr>
							<th scope="row">투표 #1</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_1" id="atvt_que_1" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_1" id="avl_choice_1" value="1" checked="checked" onclick="vote_type_check(this.form, 1);"> 
											<label for="avl_choice_1" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_1" id="avl_subjective_1" value="1" checked="checked" onclick="vote_type_check(this.form, 1);"> 
											<label for="avl_subjective_1" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_1" id="atvt_poll_1_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_1" id="atvt_image_1_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_2" id="atvt_poll_1_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_2" id="atvt_image_1_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_3" id="atvt_poll_1_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_3" id="atvt_image_1_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_4" id="atvt_poll_1_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_4" id="atvt_image_1_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_5" id="atvt_poll_1_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_5" id="atvt_image_1_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_6" id="atvt_poll_1_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_6" id="atvt_image_1_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_7" id="atvt_poll_1_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_7" id="atvt_image_1_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_8" id="atvt_poll_1_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_8" id="atvt_image_1_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_9" id="atvt_poll_1_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_9" id="atvt_image_1_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#1.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_1_10" id="atvt_poll_1_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_1_10" id="atvt_image_1_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #2</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_2" id="atvt_que_2" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_2" id="avl_choice_2" value="1" checked="checked" onclick="vote_type_check(this.form, 2);"> 
											<label for="avl_choice_2" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_2" id="avl_subjective_2" value="1" checked="checked" onclick="vote_type_check(this.form, 2);"> 
											<label for="avl_subjective_2" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_1" id="atvt_poll_2_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_1" id="atvt_image_2_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_2" id="atvt_poll_2_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_2" id="atvt_image_2_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_3" id="atvt_poll_2_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_3" id="atvt_image_2_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_4" id="atvt_poll_2_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_4" id="atvt_image_2_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_5" id="atvt_poll_2_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_5" id="atvt_image_2_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_6" id="atvt_poll_2_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_6" id="atvt_image_2_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_7" id="atvt_poll_2_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_7" id="atvt_image_2_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_8" id="atvt_poll_2_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_8" id="atvt_image_2_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_9" id="atvt_poll_2_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_9" id="atvt_image_2_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#2.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_2_10" id="atvt_poll_2_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_2_10" id="atvt_image_2_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #3</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_3" id="atvt_que_3" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_3" id="avl_choice_3" value="1" checked="checked" onclick="vote_type_check(this.form, 3);"> 
											<label for="avl_choice_3" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_3" id="avl_subjective_3" value="1" checked="checked" onclick="vote_type_check(this.form, 3);"> 
											<label for="avl_subjective_3" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_1" id="atvt_poll_3_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_1" id="atvt_image_3_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_2" id="atvt_poll_3_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_2" id="atvt_image_3_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_3" id="atvt_poll_3_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_3" id="atvt_image_3_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_4" id="atvt_poll_3_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_4" id="atvt_image_3_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_5" id="atvt_poll_3_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_5" id="atvt_image_3_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_6" id="atvt_poll_3_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_6" id="atvt_image_3_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_7" id="atvt_poll_3_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_7" id="atvt_image_3_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_8" id="atvt_poll_3_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_8" id="atvt_image_3_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_9" id="atvt_poll_3_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_9" id="atvt_image_3_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#3.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_3_10" id="atvt_poll_3_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_3_10" id="atvt_image_3_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #4</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_4" id="atvt_que_4" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_4" id="avl_choice_4" value="1" checked="checked" onclick="vote_type_check(this.form, 4);"> 
											<label for="avl_choice_4" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_4" id="avl_subjective_4" value="1" checked="checked" onclick="vote_type_check(this.form, 4);"> 
											<label for="avl_subjective_4" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_1" id="atvt_poll_4_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_1" id="atvt_image_4_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_2" id="atvt_poll_4_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_2" id="atvt_image_4_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_3" id="atvt_poll_4_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_3" id="atvt_image_4_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_4" id="atvt_poll_4_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_4" id="atvt_image_4_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_5" id="atvt_poll_4_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_5" id="atvt_image_4_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_6" id="atvt_poll_4_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_6" id="atvt_image_4_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_7" id="atvt_poll_4_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_7" id="atvt_image_4_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_8" id="atvt_poll_4_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_8" id="atvt_image_4_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_9" id="atvt_poll_4_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_9" id="atvt_image_4_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#4.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_4_10" id="atvt_poll_4_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_4_10" id="atvt_image_4_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #5</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_5" id="atvt_que_5" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_5" id="avl_choice_5" value="1" checked="checked" onclick="vote_type_check(this.form, 5);"> 
											<label for="avl_choice_5" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_5" id="avl_subjective_5" value="1" checked="checked" onclick="vote_type_check(this.form, 5);"> 
											<label for="avl_subjective_5" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_1" id="atvt_poll_5_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_1" id="atvt_image_5_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_2" id="atvt_poll_5_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_2" id="atvt_image_5_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_3" id="atvt_poll_5_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_3" id="atvt_image_5_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_4" id="atvt_poll_5_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_4" id="atvt_image_5_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_5" id="atvt_poll_5_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_5" id="atvt_image_5_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_6" id="atvt_poll_5_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_6" id="atvt_image_5_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_7" id="atvt_poll_5_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_7" id="atvt_image_5_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_8" id="atvt_poll_5_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_8" id="atvt_image_5_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_9" id="atvt_poll_5_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_9" id="atvt_image_5_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#5.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_5_10" id="atvt_poll_5_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_5_10" id="atvt_image_5_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #6</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_6" id="atvt_que_6" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_6" id="avl_choice_6" value="1" checked="checked" onclick="vote_type_check(this.form, 6);"> 
											<label for="avl_choice_6" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_6" id="avl_subjective_6" value="1" checked="checked" onclick="vote_type_check(this.form, 6);"> 
											<label for="avl_subjective_6" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_1" id="atvt_poll_6_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_1" id="atvt_image_6_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_2" id="atvt_poll_6_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_2" id="atvt_image_6_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_3" id="atvt_poll_6_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_3" id="atvt_image_6_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_4" id="atvt_poll_6_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_4" id="atvt_image_6_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_5" id="atvt_poll_6_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_5" id="atvt_image_6_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_6" id="atvt_poll_6_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_6" id="atvt_image_6_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_7" id="atvt_poll_6_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_7" id="atvt_image_6_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_8" id="atvt_poll_6_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_8" id="atvt_image_6_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_9" id="atvt_poll_6_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_9" id="atvt_image_6_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#6.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_6_10" id="atvt_poll_6_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_6_10" id="atvt_image_6_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #7</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_7" id="atvt_que_7" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_7" id="avl_choice_7" value="1" checked="checked" onclick="vote_type_check(this.form, 7);"> 
											<label for="avl_choice_7" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_7" id="avl_subjective_7" value="1" checked="checked" onclick="vote_type_check(this.form, 7);"> 
											<label for="avl_subjective_7" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_1" id="atvt_poll_7_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_1" id="atvt_image_7_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_2" id="atvt_poll_7_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_2" id="atvt_image_7_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_3" id="atvt_poll_7_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_3" id="atvt_image_7_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_4" id="atvt_poll_7_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_4" id="atvt_image_7_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_5" id="atvt_poll_7_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_5" id="atvt_image_7_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_6" id="atvt_poll_7_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_6" id="atvt_image_7_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_7" id="atvt_poll_7_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_7" id="atvt_image_7_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_8" id="atvt_poll_7_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_8" id="atvt_image_7_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_9" id="atvt_poll_7_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_9" id="atvt_image_7_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#7.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_7_10" id="atvt_poll_7_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_7_10" id="atvt_image_7_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #8</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_8" id="atvt_que_8" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_8" id="avl_choice_8" value="1" checked="checked" onclick="vote_type_check(this.form, 8);"> 
											<label for="avl_choice_8" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_8" id="avl_subjective_8" value="1" checked="checked" onclick="vote_type_check(this.form, 8);"> 
											<label for="avl_subjective_8" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_1" id="atvt_poll_8_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_1" id="atvt_image_8_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_2" id="atvt_poll_8_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_2" id="atvt_image_8_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_3" id="atvt_poll_8_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_3" id="atvt_image_8_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_4" id="atvt_poll_8_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_4" id="atvt_image_8_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_5" id="atvt_poll_8_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_5" id="atvt_image_8_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_6" id="atvt_poll_8_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_6" id="atvt_image_8_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_7" id="atvt_poll_8_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_7" id="atvt_image_8_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_8" id="atvt_poll_8_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_8" id="atvt_image_8_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_9" id="atvt_poll_8_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_9" id="atvt_image_8_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#8.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_8_10" id="atvt_poll_8_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_8_10" id="atvt_image_8_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #9</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_9" id="atvt_que_9" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_9" id="avl_choice_9" value="1" checked="checked" onclick="vote_type_check(this.form, 9);"> 
											<label for="avl_choice_9" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_9" id="avl_subjective_9" value="1" checked="checked" onclick="vote_type_check(this.form, 9);"> 
											<label for="avl_subjective_9" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_1" id="atvt_poll_9_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_1" id="atvt_image_9_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_2" id="atvt_poll_9_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_2" id="atvt_image_9_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_3" id="atvt_poll_9_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_3" id="atvt_image_9_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_4" id="atvt_poll_9_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_4" id="atvt_image_9_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_5" id="atvt_poll_9_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_5" id="atvt_image_9_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_6" id="atvt_poll_9_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_6" id="atvt_image_9_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_7" id="atvt_poll_9_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_7" id="atvt_image_9_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_8" id="atvt_poll_9_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_8" id="atvt_image_9_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_9" id="atvt_poll_9_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_9" id="atvt_image_9_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#9.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_9_10" id="atvt_poll_9_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_9_10" id="atvt_image_9_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					<tr>
							<th scope="row">투표 #10</th>
							<td>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 질문</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_que_10" id="atvt_que_10" value="" class="frm_input vote_que_input_470" maxlength="255"><br>
											<input type="checkbox" name="avl_choice_10" id="avl_choice_10" value="1" checked="checked" onclick="vote_type_check(this.form, 10);"> 
											<label for="avl_choice_10" class="font_4444ff">객관식 (선택식)<strong class="sound_only">선택</strong></label>
											&nbsp;+ &nbsp; 
											<input type="checkbox" name="avl_subjective_10" id="avl_subjective_10" value="1" checked="checked" onclick="vote_type_check(this.form, 10);"> 
											<label for="avl_subjective_10" class="font_4444ff">주관식(기타의견)<strong class="sound_only">선택</strong></label>
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 1</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_1" id="atvt_poll_10_1" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_1" id="atvt_image_10_1" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 2</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_2" id="atvt_poll_10_2" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_2" id="atvt_image_10_2" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 3</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_3" id="atvt_poll_10_3" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_3" id="atvt_image_10_3" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 4</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_4" id="atvt_poll_10_4" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_4" id="atvt_image_10_4" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 5</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_5" id="atvt_poll_10_5" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_5" id="atvt_image_10_5" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 6</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_6" id="atvt_poll_10_6" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_6" id="atvt_image_10_6" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 7</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_7" id="atvt_poll_10_7" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_7" id="atvt_image_10_7" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 8</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_8" id="atvt_poll_10_8" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_8" id="atvt_image_10_8" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 9</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_9" id="atvt_poll_10_9" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_9" id="atvt_image_10_9" value="" class="frm_input vote_que_input_470">
									</div>
									<div class="vote_write_form_left cell_height_72"><strong>#10.</strong> 항목 10</div>
									<div class="vote_write_form_right cell_height_72">
											<input type="text" name="atvt_poll_10_10" id="atvt_poll_10_10" value="" class="frm_input vote_que_input_470" maxlength="255">
											<br />
											<input type="file" name="atvt_image_10_10" id="atvt_image_10_10" value="" class="frm_input vote_que_input_470">
									</div>
						 </td>
					</tr>
					</tbody>
					</table>


								<div style="background:#fff2c3; display:block; clear:both; margin:0 auto; padding:7px 12px 7px 14px; float:left; width:auto; height:auto; position:absolute; right:0; top:0; z-index:20;">
					<span style="color:#777;">Powered by</span> 					<a href="http://www.piree.co.kr" target="_blank"><span style="color:#000;">PIREE Article Vote Multi FREE G5 ( 피리 게시글에 투표, 복수 질문 FREE G5 ) Ver 0.1.0</span></a>
			</div>


			</div>

			<br class="cl_bo"><br class="cl_bo">


			<div class="btn_confirm">
					<input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit">
					<a href="./board.php?bo_table=p760034__arti_vote_m" class="btn_cancel">취소</a>
			</div>

			</form>

			<script>
						function html_auto_br(obj)
			{
					if (obj.checked) {
							result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
							if (result)
									obj.value = "html2";
							else
									obj.value = "html1";
					}
					else
							obj.value = "";
			}

			function fwrite_submit(gform)
			{
					var wr_content_editor_data = oEditors.getById['wr_content'].getIR();
oEditors.getById['wr_content'].exec('UPDATE_CONTENTS_FIELD', []);
if(jQuery.inArray(document.getElementById('wr_content').value.toLowerCase().replace(/^\s*|\s*$/g, ''), ['&nbsp;','<p>&nbsp;</p>','<p><br></p>','<div><br></div>','<p></p>','<br>','']) != -1){document.getElementById('wr_content').value='';}
if (!wr_content_editor_data || jQuery.inArray(wr_content_editor_data.toLowerCase(), ['&nbsp;','<p>&nbsp;</p>','<p><br></p>','<p></p>','<br>']) != -1) { alert("내용을 입력해 주십시오."); oEditors.getById['wr_content'].exec('FOCUS'); return false; }

					var subject = "";
					var content = "";
					$.ajax({
							url: g5_bbs_url+"/ajax.filter.php",
							type: "POST",
							data: {
									"subject": gform.wr_subject.value,
									"content": gform.wr_content.value
							},
							dataType: "json",
							async: false,
							cache: false,
							success: function(data, textStatus) {
									subject = data.subject;
									content = data.content;
							}
					});

					if (subject) {
							alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
							gform.wr_subject.focus();
							return false;
					}

					if (content) {
							alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
							if (typeof(ed_wr_content) != "undefined")
									ed_wr_content.returnFalse();
							else
									gform.wr_content.focus();
							return false;
					}

					if (document.getElementById("char_count")) {
							if (char_min > 0 || char_max > 0) {
									var cnt = parseInt(check_byte("wr_content", "char_count"));
									if (char_min > 0 && char_min > cnt) {
											alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
											return false;
									}
									else if (char_max > 0 && char_max < cnt) {
											alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
											return false;
									}
							}
					}


					//===============================================
					// 시작 => 투표__사용하면
					if (gform.wr_use_arti_vote_n.checked == true)
					{

							//===========================================
							// 시작 => 투표_정보__입력_확인_하기
							if (!check_vote_form(gform))
							{
									return false;
							}
							// 끝 => 투표_정보__입력_확인_하기
							//===========================================

					}
					// 끝 => 투표__사용하면
					//===============================================


					
					document.getElementById("btn_submit").disabled = "disabled";

					return true;
			}
			</script>
</section>
<!-- } 게시물 작성/수정 끝 -->
    </div>
</div>

<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">
    
<!-- 인기검색어 시작 { -->
<section id="popular">
    <div>
        <h2>인기검색어</h2>
        <ul>
                    <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/search.php?sfl=wr_subject&amp;sop=and&amp;stx=%EC%B0%BD%EC%9D%98%EB%82%98%EB%9D%BC">창의나라</a></li>
                    <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/search.php?sfl=wr_subject&amp;sop=and&amp;stx=%EA%B5%90%EB%AC%B8">교문</a></li>
                    <li><a href="http://www.piree.co.kr/demo_760/p760000e/bbs/search.php?sfl=wr_subject&amp;sop=and&amp;stx=%EA%B5%AD%EC%A0%9C">국제</a></li>
                </ul>
    </div>
</section>
<!-- } 인기검색어 끝 -->    
<!-- 접속자집계 시작 { -->
<section id="visit">
    <div>
        <h2>접속자집계</h2>
        <dl>
            <dt>오늘</dt>
            <dd>0</dd>
            <dt>어제</dt>
            <dd>0</dd>
            <dt>최대</dt>
            <dd>0</dd>
            <dt>전체</dt>
            <dd>0</dd>
        </dl>
        <a href="http://www.piree.co.kr/demo_760/p760000e/adm/visit_list.php">상세보기</a>    </div>
</section>
<!-- } 접속자집계 끝 -->    <div id="ft_catch"><img src="http://www.piree.co.kr/demo_760/p760000e/img/ft.png" alt="그누보드5"></div>
    <div id="ft_company">
    </div>
    <div id="ft_copy">
        <div>
            <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/content.php?co_id=company">회사소개</a>
            <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/content.php?co_id=privacy">개인정보취급방침</a>
            <a href="http://www.piree.co.kr/demo_760/p760000e/bbs/content.php?co_id=provision">서비스이용약관</a>
            Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.<br>
            <a href="#hd" id="ft_totop">상단으로</a>
        </div>
    </div>
</div>

<a href="http://www.piree.co.kr/demo_760/p760000e/bbs/write.php?bo_table=p760034__arti_vote_m&amp;device=mobile" id="device_change">모바일 버전으로 보기</a>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>


<!-- <div style='float:left; text-align:center;'>RUN TIME : 0.04914116859436<br></div> -->
<!-- ie6,7에서 사이드뷰가 게시판 목록에서 아래 사이드뷰에 가려지는 현상 수정 -->
<!--[if lte IE 7]>
<script>
$(function() {
    var $sv_use = $(".sv_use");
    var count = $sv_use.length;

    $sv_use.each(function() {
        $(this).css("z-index", count);
        $(this).css("position", "relative");
        count = count - 1;
    });
});
</script>
<![endif]-->

</body>
</html>
