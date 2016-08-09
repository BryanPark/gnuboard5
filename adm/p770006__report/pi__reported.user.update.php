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
		
	if(!$mode){
		$mode = $_POST['mode'];
	}
		if($mode == ''){
?>
			<script type="text/javascript">
				alert("사용하실수 없는 페이지입니다.");
			</script>
<?
			exit;
		}

		if($mode == 'insert'){
			$mb_id = $_POST['mb_id'];
			$mb_ip = $_POST['mb_ip'];
			$bl_comment = $_POST['bl_comment'];
			$bl_type = $_POST['bl_type'];

			$qry = "INSERT INTO g5__piree_770006_black_list SET `mb_id`='".sql_escape_string($mb_id)."', `mb_ip`='".sql_escape_string($mb_ip)."', `bl_comment`='".sql_escape_string($bl_comment)."', `bl_type`='".sql_escape_string($bl_type)."', `regdate`=NOW()";
			if(sql_query($qry)){
?>
			<script type="text/javascript">
				alert("불량회원이 등록되었습니다.");
				location.href = "./pi__reported.user.list.php";
			</script>
<?
			}
			else{
?>
			<script type="text/javascript">
				alert("불량회원 등록에 실패하였습니다.");
				location.href = "./pi__reported.user.list.php";
			</script>
<?
			}
		}else if($mode == 'del'){
			$idx = $_POST['bl_no'];

			$qry = "DELETE FROM g5__piree_770006_black_list WHERE `bl_no`='".sql_escape_string($idx)."'";

			if(sql_query($qry)){
				echo 'success';
			}
			else{
			?>
				<script type="text/javascript">
				alert("데이터를 정상적으로 삭제하지 못했습니다.");
				</script>
			<?
			}
		}
?>