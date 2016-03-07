<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<header id="header" class="navbar-fixed-top navbar-inverse video-menu" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo G5_URL ?>">
                <img src="<?php echo G5_THEME_IMG_URL ?>/logo.png" alt="" class="img-responsive">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php
                $sql = " select *
                            from {$g5['menu_table']}
                            where me_use = '1'
                              and length(me_code) = '2'
                            order by me_order, me_id ";
                $result = sql_query($sql, false);
                $gnb_zindex = 999; // gnb_1dli z-index 값 설정용

                for ($i=0; $row=sql_fetch_array($result); $i++) {
                ?>
                <li>
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                </li>
                <?php
                }

                if ($i == 0) {  ?>
                <li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>
<div class="navbar-inverse" style="height:51px">
</div>
<div id="wrapper">
<?php
if(!defined('_INDEX_')) { // index가 아닐경우에만 실행
?>
    <script>
    //IE8에서 background 100% 적용
	$( function() {
        $.backstretch("<?php echo G5_THEME_IMG_URL ?>/bg.jpg");
    });
    </script>
    <div class="background_bg"></div>
    <div class="sub-header text-center">
        <span class="sub-title">The Bootstrap Blog</span>
        <p class="sub-description">The official example template of creating a blog with Bootstrap.</p>
    </div>
</div>
<div id="sub-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
12321312423423
            </div>
            <div class="col-sm-10">
<?php } ?>
