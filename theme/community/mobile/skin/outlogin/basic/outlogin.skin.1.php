<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<aside id="ol_before" class="ol">
    <h2>회원로그인</h2>
    <!-- 로그인 전 외부로그인 시작 -->
    <div id="mamber_info">
        <strong>로그인을 해주세요.</strong>
    </div>
    <div class="login_box">
        <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
        <fieldset>
            <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
            <input type="text" name="mb_id" id="ol_id" placeholder=" 아이디를 입력해주세요" required class="required" maxlength="20">
            <input type="password" id="ol_pw" name="mb_password" placeholder=" 비밀번호를 입력해주세요" required class="required" maxlength="20">
            <div id="ol_svc">
                <input type="checkbox" id="auto_login" name="auto_login" value="1">
                <label for="auto_login" id="auto_login_label">자동로그인</label>
            </div>
			<input type="submit" id="ol_submit" value="로그인">
			<a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">정보찾기</a>
        </fieldset>
        </form>
    </div>
</aside>

<script>
<?php if (!G5_IS_MOBILE) { ?>
$omi = $('#ol_id');
$omp = $('#ol_pw');
$omp.css('display','inline-block').css('width',104);
$omi_label = $('#ol_idlabel');
$omi_label.addClass('ol_idlabel');
$omp_label = $('#ol_pwlabel');
$omp_label.addClass('ol_pwlabel');
$omi.focus(function() {
    $omi_label.css('visibility','hidden');
});
$omp.focus(function() {
    $omp_label.css('visibility','hidden');
});
$omi.blur(function() {
    $this = $(this);
    if($this.attr('id') == "ol_id" && $this.attr('value') == "") $omi_label.css('visibility','visible');
});
$omp.blur(function() {
    $this = $(this);
    if($this.attr('id') == "ol_pw" && $this.attr('value') == "") $omp_label.css('visibility','visible');
});
<?php } ?>

$("#auto_login").click(function(){
    if (this.checked) {
        this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
    }
});

function fhead_submit(f)
{
	// 안드로이드로 로그인이 시작되었다는걸 보내줌.
	window.android.setMessage("login_start");
    return true;
}
</script>
<!-- 로그인 전 외부로그인 끝 -->
