<?php

include_once(ISPOP_CLASS_PATH.'/class.init.php');
global $levelset,$ispoper;
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

	$ispoper = array();
	if($member['mb_id']) {
		$ispoper = $eb->get_user_info($member['mb_id']);

		// 그누레벨 자동조정
		if(!$is_admin && $member['mb_level'] <= $levelset['max_use_gnu_level']) $eb->set_gnu_level($ispoper['level']);

		// 오늘 처음 로그인 이라면 로그인 레벨포인트 적용
		if (substr($member['mb_today_login'], 0, 10) != G5_TIME_YMD) {
			// 첫 로그인 레벨포인트 지급
			$eb->level_point($levelset['login']);
		}
		//$eb->level_point($levelset['login']); 여기 있으면 매번 레벨포인트지급.
	}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 후 외부로그인 시작 -->
<aside id="ol_after" class="ol">
    <header id="ol_after_hd">
        <h2>나의 회원정보</h2>
        <div id="mamber_info">
            <strong>
			<?php echo $nick ?>님 [<?=$ispoper['level']?>레벨]
			<br/>
			<?php //print_r($levelset);?>
			[경험치 : <?=$ispoper['level_point']?>]
			</strong>
			
            <?php if ($is_admin == 'super' || $is_auth) { ?><a href="<?php echo G5_ADMIN_URL ?>" class="btn_admin"><span class="sound_only">관리자 모드</span></a><?php } ?>
        </div>
    </header>
    <ul id="ol_after_private">
        <li id="ol_after_memo">
            <a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank">
                <span class="sound_only">안 읽은 </span>쪽지
                <strong><?php echo $memo_not_read ?></strong>
            </a>
        </li>
        <li id="ol_after_pt">
            <a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank">
                포인트
                <strong><?php echo $point ?></strong>
            </a>
        </li>
        <li id="ol_after_scrap">
            <a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank">스크랩</a>
        </li>
    </ul>
    <footer id="ol_after_ft">
        <a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout">로그아웃</a>
        <a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a>
    </footer>
</aside>

<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- 로그인 후 외부로그인 끝 -->
