<?php
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
	

	//2016-07-08 by Bryan Park  -> 페이징을 위한 sql.
	$sql_common = " from g5__piree_770006_black_list  ";
	$sql_search = " where (1) ";
	if ($stx) {//2016-07-08 by Bryan Park  -> 검색기준, 검색어 입력.
		$sql_search .= " and ( ";
		switch ($sfl) {
			case 'mb_id' :
				$sql_search .= " ({$sfl} like '{$stx}') ";
				break;
			case 'mb_ip' :
				$sql_search .= " ({$sfl} = '{$stx}') ";
				break;
			case 'bl_type' :
				$sql_search .= " ({$sfl} = '{$stx}') ";
				break;
			case 'bl_active' :
				$sql_search .= " ({$sfl} = '{$stx}') ";
				break;
			case 'bl_comment' :
				$sql_search .= " ({$sfl} like '%{$stx}') ";
				break;
			default :
				$sql_search .= " ({$sfl} like '{$stx}%') ";
				break;
		}
		$sql_search .= " ) ";
	}
	if (!$sst) {//2016-07-08 by Bryan Park -> 정렬 기준, 정렬 순서.
		$sst = "bl_no";
		$sod = "desc";
	}
	$sql_order = " order by {$sst} {$sod} ";


	$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";//2016-07-08 by Bryan Park - 이 쿼리로 페이지 수를 구한다.
	$row = sql_fetch($sql);
	$total_count = $row['cnt'];

	$rows = $config['cf_page_rows'];
	$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
	if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
	$from_record = ($page - 1) * $rows; // 시작 열을 구함

	$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$from_record}, {$rows} ";//2016-07-08 by Bryan Park  해당 페이지 최종 출력 쿼리.
	$result = sql_query($sql);


	###########################################################################
	#//2016-07-08 by Bryan Park 끝 => 기존 blacklist/list.php 의 php로직
	###########################################################################	


	#########################################################
	# 끝 => 화면_ECHO
	#########################################################

?>

<section>
		<h2>신고/차단 회원목록 ( 타입: T -> 12시간 , P -> 1주일 )</h2>

		<form id="fsearch" name="fsearch" class="local_sch01 local_sch" method="get">
			<label for="sfl" class="sound_only">검색대상</label>
			<select name="sfl" id="sfl">
				<option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id"); ?>>회원아이디</option>
				<option value="mb_ip"<?php echo get_selected($_GET['sfl'], "mb_ip"); ?>>회원 ip</option>
				<option value="bl_type"<?php echo get_selected($_GET['sfl'], "bl_type"); ?>>차단타입(T|P)</option>
				<option value="bl_active"<?php echo get_selected($_GET['sfl'], "bl_active"); ?>>차단중(Y|N)</option>
			</select>
			<label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
			<input type="text" name="stx" value="<?php echo $stx ?>" id="stx" required class="required frm_input">
			<input type="submit" class="btn_submit" value="검색">
		</form>
		<div class="tbl_head01 tbl_wrap">
				<table>
					<caption>신고 목록</caption>
					<thead>
						<tr>
							<th scope="col">no</th>
							<th scope="col">회원 id</th>
							<th scope="col">회원 ip</th>
							<th scope="col">신고사유 / 메모</th>
							<th scope="col">타입</th>
							<th scope="col">차단 등록일시</th>
							<th scope="col">체크여부</th>
							<th scope="col">비고</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					while($row = sql_fetch_array($result)){?>
						<tr>
							<td scope="col"><?=$row['bl_no'];?></td>
							<td scope="col"><?=$row['mb_id'];?></td>
							<td scope="col"><?=$row['mb_ip'];?></td>
							<td scope="col"><?=$row['bl_comment'];?></td>
							<td scope="col"><?=$row['bl_type'];?></td>
							<td scope="col"><?=$row['regdate'];?></td>
							<td scope="col"><?=$row['bl_active'];?></td>
							<td scope="col"><a href="javascript:del('<?=$row['bl_no']?>')">삭제</a></td>
						</tr>
					<?}?>
					</tbody>
				</table>
				
				<?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, "{$_SERVER['SCRIPT_NAME']}?$qstr&amp;page="); ?>


		</div>
		<div class="btn_confirm">
			<input type="button" class="btn_submit" value=" 돌아가기 " onClick="PageUrl('./')">
			<input type="button" class="btn_submit" value=" 불량회원 입력 " onClick="PageUrl('./pi__reported.user.insert.form.php')">
		</div>
		
		<!--//2016-07-08 by Bryan Park 해당 데이터 삭제를 위한 스크립트. -->
		<script type="text/javascript">
			function check(){
				var obj = document.searchForm;

				if(obj.user_id.value == ''){
					alert("아이디를 입력하고 검색버튼을 누르세요.");
					obj.user_id.focus();
					return false;
				}
			}

			function del(bl_no){
				if(confirm("해당 데이터를 삭제하시겠습니까?") == true){
					$.ajax({
						type : "POST",
						url : "./pi__reported.user.update.php",
						data : {"mode" : "del", "bl_no" : bl_no},
						cache : false,
						dataType : "text",
						success:function(result){
							if(result == 'success'){
								alert("삭제되었습니다.");
								location.reload();
							}
						}
					});
				}
			}
		</script>

<?php
	//=======================================================
	// ADMIN_TAIL__첨부
	include_once("../admin.tail.php");

?>