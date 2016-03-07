<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>
<?php
if(!defined('_INDEX_')) { // index가 아닐경우에만 실행
?>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<footer>
    <div class="container">
        <div id="ft" class="col-lg-10 text-center">
            <div id="ft_catch">로고</div>
            <div id="ft_company">
                <div class="f_sns">
                    <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a href="http://instagram.com/"><i class="fa fa-instagram"></i></a>
                </div>
                <p class="ft_info">TEL. 00-000-0000 FAX. 00-000-0000 서울 강남구 강남대로 1 <br>대표:홍길동 사업자등록번호:000-00-00000 개인정보관리책임자:홍길동</p>
            </div>
        </div>
    </div>
</footer>
<div id="ft_copy">
    <div class="text-center">
        Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.
    </div>
</div>

<script>
$(function() {
    $("#top_btn").on("click", function() {
        $("html, body").animate({scrollTop:0}, '500');
        return false;
    });
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>