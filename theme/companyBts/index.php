<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

$idx_nav = ' navigation';

$nav_li_1 = ' class="active"';
$nav_li_2 = '';
$nav_li_3 = '';
$nav_li_4 = '';
$nav_li_5 = '';
$nav_li_6 = '';
$nav_li_7 = '';

include_once(G5_THEME_PATH.'/head.php');
?>
<nav  id="myScrollspy">
    <div class="main-menu">
        <i class="fa fa-bars"></i>
        <i class="fa fa-times"></i>
    </div>
    <ul class="nav-pills navbar-nav text-right<?php echo $idx_nav; ?>">
        <li><a href="<?php echo $menu_href; ?>#introduce"<?php echo $nav_li_1; ?>>회사소개</a></li>
        <li><a href="<?php echo $menu_href; ?>#business"<?php echo $nav_li_2; ?>>사업영역</a></li>
        <li><a href="<?php echo $menu_href; ?>#public_relation"<?php echo $nav_li_3; ?>>홍보센터</a></li>
        <li><a href="<?php echo $menu_href; ?>#recruit_process"<?php echo $nav_li_4; ?>>채용절차</a></li>
        <li><a href="<?php echo $menu_href; ?>#recruit"<?php echo $nav_li_5; ?>>채용정보</a></li>
        <li><a href="<?php echo $menu_href; ?>#request"<?php echo $nav_li_6; ?>>문의</a></li>
        <li><a href="<?php echo $menu_href; ?>#location"<?php echo $nav_li_7; ?>>찾아오시는 길</a></li>
    </ul>
</nav>

<script>
function gnbEvent() {
    jQuery(".main-menu .fa-bars").click(function() {
        $("ul.nav-pills").animate({bottom: "15%"}, 250);
        $(".fa-bars").css({display: "none"});
        $(".fa-times").css({display: "block"});
    });
    jQuery(".main-menu .fa-times").click(function() {
        $("ul.nav-pills").animate({bottom: "-100%"}, 200);
        $(".fa-bars").css({display: "block"});
        $(".fa-times").css({display: "none"});
    });
}
jQuery(document).ready(function() {	
    $(".fa-bars").css({display: "block"});
    $(".fa-times").css({display: "none"});
    gnbEvent();	
})
</script>

<!-- 홈 배너 -->
<section id="home" class="home_section">
    <div class="background_bg"></div>
    <div class="container">
        <div class="home_content text-center">
            <div class="blue_bg text-vertical-center">
                <span class="title">COMPANY THEME</span>
                <p class="description">Gnuboard5 &amp; bootstrap</p>
            </div>
        </div>
    </div>
</section>
<script>
    //IE8에서 background 100% 적용
	$( function() {
        $.backstretch("<?php echo G5_THEME_IMG_URL ?>/bg.jpg");
    });
</script>


<!-- 회사소개 -->
<section id="introduce">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ct_header text-center">
                    <h3 class="ct_title">회사소개</h3>
                    <a href="#business"><i class="fa fa-arrow-circle-o-down down0"></i></a>
                </div>
            </div>
        </div>
        <div class="row itd_ct">
            <div class="main_feature text-center">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <div class="content">
                        <?php
                        // 회사소개 co_id=company
                        // co_content 중 <!--more--> 가 포함되어 있으면 그 이전까지만 출력

                        $co_id = 'company';
                        $sql = " select * from {$g5['content_table']} where co_id = '$co_id' ";
                        $co = sql_fetch($sql);
                        $content = preg_split('#<!--more-->#i', $co['co_content']);

                        echo conv_content($content[0], $co['co_html']);
                        ?>
                        <a class="com_intro_more" href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">더보기</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 사업영역 -->
<section id="business">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ct_header text-center">
                    <h3 class="ct_title">사업영역</h3>
                    <a href="#public_relation"><i class="fa fa-arrow-circle-o-down down1"></i></a>
                </div>
            </div>
        </div>
        <div class="row bis_ct">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <div class="col-md-4">
                    <div class="content">
                        <span class="icon01"></span>
                        <h5>그누보드 &amp; 영카트</h5>
                        <p>그누보드와 영카트를 통하여 웹 쇼핑몰, 커뮤니티, 기업 등 사이트를 구축하려고 할 때 더욱 편리하게 작성된 높은 품질의 컨텐츠입니다.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content">
                        <span class="icon02"></span>
                        <h5>커뮤니티</h5>
                        <p>현재 운영되는 sir 커뮤니티를 통해 웹 개발자, 기획자, 퍼블리셔, 디자이너 등의 정보를 교류하고 쾌적한 환경을 만들도록 힘쓰고 있습니다.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content">
                        <span class="icon03"></span>
                        <h5>무료 컨텐츠</h5>
                        <p>오랜 기간 사랑을 받았던 그누보드, 영카트를 통해 더 편리하고 쉽게 사용자가 웹을 구현하고 사용할 수 있도록 무료 서비를 진행하고 있습니다. 앞으로도 더 많은 서비를 위하여 개발에 노력을 아끼지 않고 있습니다.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 홍보센터 -->
<section id="public_relation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">홍보센터</h3>
                    <a href="#recruit_process"><i class="fa fa-arrow-circle-o-down" down0></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        $options = array(
                'thumb_width'    => 170, // 썸네일 width
                'thumb_height'   => 149,  // 썸네일 height
                'content_length' => 40  // 간단내용 길이
        );
        echo latest('theme/gallery', 'gallery', 8, 20, 2, $options);
        ?>
    </div>
</section>

<!-- 채용절차 -->
<section id="recruit_process">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">채용절차</h3>
                    <a href="#recruit"><i class="fa fa-arrow-circle-o-down down0"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="tal_tabs">
                <ul class="tabs">
                    <li class="active" rel="tab1">Step 01</li>
                    <li rel="tab2">Step 02</li>
                    <li rel="tab3">Step 03</li>
                    <li rel="tab3">Step 04</li>
                </ul>
                <div class="tab_container">
                    <div id="tab1" class="tab_content">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/step04.png" alt="원서접수" />
                    </div>
                    <!-- #tab1 -->
                    <div id="tab2" class="tab_content">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/step04.png" alt="서류전형" />
                    </div>
                    <!-- #tab2 -->
                    <div id="tab3" class="tab_content">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/step03.png" alt="내용을 입력하세요" />
                    </div>
                    <!-- #tab3 -->
                    <div id="tab4" class="tab_content">
                        <img src="<?php echo G5_THEME_IMG_URL ?>/step03.png" alt="내용을 입력하세요" />
                    </div>
                    <!-- #tab4 -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(function () {

    $(".tab_content").hide();
    $(".tab_content:first").show();

    $("ul.tabs li").click(function () {
        $("ul.tabs li").removeClass("active").css("color", "#333");
        //$(this).addClass("active").css({"color": "darkred","font-weight": "bolder"});
        $(this).addClass("active").css("color", "darkred");
        $(".tab_content").hide()
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn()
    });
});
	
</script>

<!-- 채용정보 -->
<section id="recruit">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">채용정보</h3>
                    <a href="#request"><i class="fa fa-arrow-circle-o-down down0"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="recruit_info">
                <div class="single_blog text-center">
                    <?php
                    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                    $options = array(
                            'thumb_width'    => 170,  // 썸네일 width
                            'thumb_height'   => 149,  // 썸네일 height
                            'content_length' => 100   // 간단내용 길이
                    );
                    echo latest('theme/gallery2', 'gallery', 4, 20, 2, $options);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 문의하기 -->
<section id="request">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">문의</h3>
                    <a href="#location"><i class="fa fa-arrow-circle-o-down down0"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
                <div id="contact_from" class="col-lg-10 col-lg-offset-1">
                    <form name="fcontact" action="<?php echo G5_THEME_URL; ?>/contact_send.php" method="post" onsubmit="return fcontact_submit(this);">
                        <fieldset id="contact_fs">
                            <legend>Contact</legend>
                            <label for="con_name">이름</label>
                            <input type="text" name="con_name" id="con_name" required class="frm_input required" minlength="2" maxlength="100" placeholder=" 보내실 분의 이름을 입력해 주세요.">
                            <label for="con_name">이메일</label>
                            <input type="text" name="con_email" id="con_email" required class="frm_input required email" maxlength="100" placeholder=" 보내실 분의 이메일을 입력해 주세요.">
                            <label for="con_tel">연락처</label>
                            <input type="text" name="con_tel" id="con_tel" required class="frm_input required telnum" maxlength="20" placeholder=" 예) 010-1234-5678">
                            <label for="">메시지</label>
                            <textarea name="con_message" rows="15" cols="100%" id="con_message"  title="내용쓰기" required class="required" placeholder=" 내용을 입력해주세요."></textarea>
                            <label for="">자동등록방지</label>
                            <div class="captcha"><?php echo captcha_html(); ?></div>
                            <input type="submit" value="보내기" id="btn_submit" class="btn_submit">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 찾아오시는 길 -->
<section id="location">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">찾아오시는 길</h3>
                    <a href="#home"><i class="fa fa-arrow-circle-o-up"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="location_info">
            <ul>
                <li class="col-md-3 col-xs-12 col-sm-6 text-center"><i class="fa fa-map-marker"></i><br /><?php echo get_text($config['cf_1']); ?></li>
                <li class="col-md-3 col-xs-12 col-sm-6 text-center"><i class="fa fa-phone"></i><br />+<?php echo get_text($config['cf_2']); ?></li>
                <li class="col-md-3 col-xs-12 col-sm-6 text-center"><i class="fa fa-envelope"></i><br /><?php echo get_text($config['cf_admin_email']); ?></li>
                <li class="col-md-3 col-xs-12 col-sm-6 text-center"><i class="fa fa-home"></i><br /><?php echo get_text($config['cf_3']); ?></li>
            </ul>
        </div>
    </div>
    <div id="map" style="width:100%;height:400px;">
        <script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=5b8d8351d4d794868c84ad9498192d7b"></script>
        <script>
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div
            mapOption = {
                center: new daum.maps.LatLng(37.497986405020626, 127.02766097835136), // 지도의 중심좌표
                level: 3 // 지도의 확대 레벨
            };

        // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
        var map = new daum.maps.Map(mapContainer, mapOption);
        </script>
    </div>
</section>
<?php
/*
<h2 class="sound_only">최신글</h2>
<?php
//  최신글
$sql = " select bo_table
            from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)
            where a.bo_device <> 'mobile' ";
if(!$is_admin)
    $sql .= " and a.bo_use_cert = '' ";
$sql .= " order by b.gr_order, a.bo_order ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    if ($i%2==1) $lt_style = "margin-left:20px";
    else $lt_style = "";
?>
    <div style="float:left;<?php echo $lt_style ?>">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo latest('theme/basic', $row['bo_table'], 5, 25);
        ?>
    </div>
<?php
}
*/
?>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>