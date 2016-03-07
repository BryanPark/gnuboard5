<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_THEME_LIB_PATH.'/new_lastest.lib.php');


add_javascript('<script src="'.G5_THEME_JS_URL.'/unslider.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/swiper.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/outsideEvent.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/iscroll.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/tabslide.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/swiper.min.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/tabslide.css">', 0);

?>


<!--메인이미지-->
<div class="main_bn_box swiper-container">
    <ul class="main_bn_ul swiper-wrapper">
        <li class="swiper-slide">
            <div class="bn_img">
                <img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" />
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
                <img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" />
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
                <img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" />
            </div>
        </li>
        <li class="swiper-slide">
            <div class="bn_img">
                <img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" />
            </div>
        </li>
    </ul>  
<!-- Add Pagination -->
<div class="swiper-pagination"></div>
</div>

<script>
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true
});
</script>

<!--} 메인배너 끝-->

<!-- 메인화면 최신글 시작 -->
<!-- 최신게시글 {-->
<div class="new_latest" tabindex="1">
    <a class="lt_title" href="<?php echo G5_BBS_URL ?>/new.php"><strong>최신 게시글</strong></a>
    <?php
    // new_latest('스킨', '출력라인', '글자수', 'is_comment', cache_minute)
    echo new_latest('theme/new_latest', 5, 25, false, 5);
    ?>
    <div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/new.php"><span class="sound_only">최신게시글</span>더보기</a></div>
</div>
<!-- 최신게시글 }-->


<div id="container">
	<ul class ="tabs">
		<li class="active" rel="tab1">공지사항</li>
		<li rel="tab2">자유게시판</li>
		<li rel="tab3">자유게시판2</li>
	</ul>
	<div class="tab_container">
		<div id="tab1" class="tab_content">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'notice', 6, 25);
			?>
		</div>
		<div id="tab2" class="tab_content">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board', 6, 25);
			?>
		</div>
		<div id="tab3" class="tab_content">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board2', 6, 25);
			?>
		</div>
	</div>
<div>

<!--<div>
    <?php
    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
    echo latest('theme/basic', 'free', 6, 25);
    ?>
</div>-->
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
    echo latest('theme/gallery', 'gallery1', 4, 25, 1, $options);
    ?>
</div>

<!-- 메인화면 최신글 끝 -->


<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>