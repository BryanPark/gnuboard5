
  //#######################################################
  // 시작 => 공통
  //#######################################################

  		//###################################################
  		// 시작 => 페이지의__버튼_페이지__이동
  		function PageUrl(turl)
  		{
  		  self.window.location = turl;
  		}
  		// 끝 => 페이지의__버튼_페이지__이동
  		//###################################################



  		//###################################################
  		// 시작 => AJAX__에러_ALERT__띄우기
  		function is_error_ajax(msg_s)
  		{

  				//===============================================
					// 시작 => 에러__여부
					if (msg_s.substring(0, 7) == "#ERROR:")
					{

  						//###########################################
					    // 시작 => 에러

  						//===========================================
					    // 시작 => 에러
					    alert (msg_s.substring(7, msg_s.length));
					    return false;

					}
					else
					{

  						//###########################################
					    // 시작 => 에러_아니니__통과

					    return true;

					}
					// 끝 => 에러__여부
  				//===============================================

  		}
  		// 끝 => AJAX__에러_ALERT__띄우기
  		//###################################################


  		//###################################################
  		// 시작 => 회원_정보__팝업창
      //shorten from $(function(){}); -> $(document).ready(function(){}); 
  		$(document).ready(function(){

  				//===============================================
  				// 시작 => 회원_정보_보기_링크__클릭시
  				$(".win_member_info_pop").click(function() {
  				    win_member_info_pop(this.href);
  				    return false;
  				});
  				// 끝 => 회원_정보_보기_링크__클릭시
  				//===============================================

  		});
  		// 끝 => 회원_정보__팝업창
  		//###################################################



  		//###################################################
  		// 시작 => 회원_정보__팝업창__열기
  		var win_member_info_pop = function(href) {
					var new_win = window.open(href, 'win_member_info_pop', 'left=100, top=100, width=620, height=510, scrollbars=1');
					new_win.focus();
  		}
  		// 끝 => 회원_정보__팝업창__열기
  		//###################################################

  //#######################################################
  // 끝 => 공통
  //#######################################################
