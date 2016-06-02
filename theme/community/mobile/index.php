<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_THEME_LIB_PATH.'/new_lastest.lib.php');


add_javascript('<script src="'.G5_THEME_JS_URL.'/unslider.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/swiper.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/outsideEvent.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.min.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/swiper.min.css">', 0);
?>


<!--메인이미지-->
<div class="main_bn_box swiper-container" id="index_slider">
    <ul class="main_bn_ul swiper-wrapper">
        <li class="swiper-slide">
            <div class="bn_img">
                <a href="http://m.naver.com"><img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" /></a>
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
			<a href="http://www.daum.net"><img src="<?php echo G5_THEME_IMG_URL ?>/main_banner1.png" alt="메인베너" /></a>
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
				<a href="http://nate.com"><img src="<?php echo G5_THEME_IMG_URL ?>/main_banner2.png" alt="메인베너" /></a>
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
				<a href="http://www.google.com"><img src="<?php echo G5_THEME_IMG_URL ?>/main_banner3.png" alt="메인베너" /></a>
            </div>
        </li>
    </ul> 
<!-- Add Pagination -->
<div class="swiper-pagination"></div>
</div>

<script> 
$("#index_slider").bind('touchmove',function(event){
	$("#index_slider").data("slider",true);
});

function remove_side_data(){
    $btn_side.data('toggle_enable', false);
    $side_wr.animate({"right": "-280px"}, 160, function(){
        $side_menu.hide();
        $("body").removeClass("over_hidden").css({"min-height":""});
    });
}
</script>

<script>
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
	autoplay:4000,
	initialSlide:Math.floor(((Math.random() * 10) + 1) % 4)
});
</script>

<!--} 메인배너 끝-->

<!-- 메인화면 최신글 시작 -->
<!-- 최신게시글 {-->
<div class="new_latest">
    <a class="lt_title" href="<?php echo G5_BBS_URL ?>/new.php"><strong>최신 게시글</strong></a>
    <?php
    // new_latest('스킨', '출력라인', '글자수', 'is_comment', cache_minute)
    echo new_latest('theme/new_latest', 5, 25, false, 5);
    ?>
    <div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/new.php"><span class="sound_only">최신게시글</span>더보기</a></div>
</div>
<!-- 최신게시글 }-->

<div>
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/basic', 'issue', 6, 25);
    ?>
</div>
<div>
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/basic', 'notice', 6, 25);
    ?>
</div>
<div>
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/basic', 'event', 6, 25);
    ?>
</div>
<div>
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/basic', 'temp_01', 6, 25);
    ?>
</div>
<div>
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    $options = array(
            'thumb_width'    => 170, // 썸네일 width
            'thumb_height'   => 149,  // 썸네일 height
            'content_length' => 40   // 간단내용 길이
    );
    echo latest('theme/gallery', 'gallery', 4, 25, 1, $options);
    ?>
</div>

<!-- 메인화면 최신글 끝 -->


<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>