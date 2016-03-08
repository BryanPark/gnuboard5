<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');

add_javascript('<script src="'.G5_THEME_JS_URL.'/unslider.min.js"></script>', 10);
add_javascript('<script src="'.G5_THEME_JS_URL.'/tabslide.js"></script>', 10);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_JS_URL.'/tabslide.css">', 0);

?>


<!--메인배너 {-->
<div id="main_bn_box">
    <div id="main_bn">
        <ul class="bn_ul">
            <li class="bn_bg1">
                <div class="bn_wr"><a href="#none"><img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" /></a></div>
            </li>
            <li class="bn_bg1">
                <div class="bn_wr"><a href="#none"><img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" /></a></div>
            </li>
            <li class="bn_bg1">
                <div class="bn_wr"><a href="#none"><img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" /></a></div>
            </li>
            <li class="bn_bg1">
                <div class="bn_wr"><a href="#none"><img src="<?php echo G5_THEME_IMG_URL ?>/main_banner.png" alt="메인베너" /></a></div>
            </li>
        </ul>
    </div>
</div>
<!--} 메인배너-->
<script>
$(function() {
    $("#main_bn").unslider({
        speed: 700,               //  The speed to animate each slide (in milliseconds)
        delay: 3000,              //  The delay between slide animations (in milliseconds)
        keys: true,               //  Enable keyboard (left, right) arrow shortcuts
        dots: true,               //  Display dot navigation
        fluid: false              //  Support responsive design. May break non-responsive designs
    });
    $('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];

        //  Either do unslider.data('unslider').next() or .prev() depending on the className
        unslider.data('unslider')[fn]();
        });
    });
</script>

<div id="tabslide_container"> <!--container for tabslider-->
	<ul class ="tabs">
		<li class="active" rel="tab1">최신 게시글</li>
		<li rel="tab2">자유게시판</li>
		<li rel="tab3">자유게시판2</li>
	</ul>
	<div class = "tab_container">
		<!-- 최신게시글 -->
		<div id="tab1" class="new_latest lt_pc tab_content">
			<strong class="lt_title"><a href="<?php echo G5_BBS_URL ?>/new.php">최신 게시글</a></strong>
			<?php
			// new_latest('스킨', '출력라인', '글자수', 'is_comment', cache_minute)
			echo new_latest('theme/new_latest', 6, 25, false, 5);
			?>
			<div class="lt_more"><a href="<?php echo G5_BBS_URL ?>/new.php"><span class="sound_only">최신게시글</span>더보기</a></div>
		</div>
		<!-- 최신게시글-->


		<div id="tab2" class="lt_pc full_size tab_content">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board', 6, 25);
			?>
		</div>
		<div id="tab3" class="lt_pc full_size tab_content">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			echo latest('theme/basic', 'free_board2', 6, 25);
			?>
		</div>
		<!--
		<div class="lt_pc">
			<?php
			// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			//echo latest('theme/basic', 'gallery2', 6, 25);
			?>
		</div>
		-->
	</div>
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
    echo latest('theme/gallery', 'gallery1', 4, 25, 1, $options);
    ?>
</div>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>