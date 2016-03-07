<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<header id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div class="to_content"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>

    <div id="hd_wrapper">

        <div id="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_IMG_URL ?>/logo_m1.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>

        <div id="btn_side">
            <button type="button" id="side_mn_btn"><a href="#"><span class="sound_only"> 메뉴 열기</span></a></button>
        </div>

        <div id="side_menu">
            <div class="side_close"><button type="button">닫기</button></div>
            <div class="side_wr add_side_wr">
                <aside id="isroll_wrap" class="side_inner_rel">
                    <div class="side_inner_abs">
                        <header class="side_hd">
                            <div id="aside">
                                <?php echo outlogin('theme/basic'); // 외부 로그인 ?>
                            </div>
                            <div class="shor_cut">
                                <ul>
                                    <li><a href="<?php echo G5_BBS_URL ?>/register.php" id="snb_join">회원가입</a></li>
                                    <li><a href="<?php echo G5_BBS_URL ?>/current_connect.php" id="snb_cnt">접속자 <?php echo connect('theme/basic'); // 현재 접속자수 ?></a></li>
                                    <li><a href="<?php echo G5_BBS_URL ?>/qalist.php" id="snb_new">1:1 문의</a></li>
                                    <li><a href="<?php echo G5_BBS_URL ?>/faq.php" id="snb_faq">FAQ</a></li>
                                </ul>
                            </div>
                        </header>
                        <nav class="side_menu">
                            <ul>
                                <?php
                                $sql = " select *
                                            from {$g5['menu_table']}
                                            where me_mobile_use = '1'
                                              and length(me_code) = '2'
                                            order by me_order, me_id ";
                                $result = sql_query($sql, false);

                                for ($i=0; $row=sql_fetch_array($result); $i++) {
                                ?>
                                <li class="mu_title">
                                    <?php
                                    $submenus = '';

                                    $sql2 = " select *
                                                from {$g5['menu_table']}
                                                where me_mobile_use = '1'
                                                  and length(me_code) = '4'
                                                  and substring(me_code, 1, 2) = '{$row['me_code']}'
                                                order by me_order, me_id ";
                                    $result2 = sql_query($sql2);

                                    for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                                        if($k == 0) {
                                            $submenus .= '<button type="button" class="sub_toggle">하위메뉴</button>'.PHP_EOL;
                                            $submenus .= '<ul class="sub_menu">'.PHP_EOL;
                                        }

                                        $submenus .= '<li><a href="'.$row2['me_link'].'" target="_'.$row2['me_target'].'" class="gnb_2da">'.$row2['me_name'].'</a></li>'.PHP_EOL;
                                    }

                                    if($k > 0)
                                        $submenus .= '</ul>'.PHP_EOL;

                                    if($submenus)
                                        $gnb_class = 'sd_cl';
                                    else
                                        $gnb_class = 'sd_cl';
                                    ?>
                                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="<?php echo $gnb_class; ?>"><?php echo $row['me_name'] ?></a>
                                    <?php echo $submenus; ?>
                                </li>
                            <?php
                            }

                            if ($i == 0) {  ?>
                                <li id="side_menu_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하세요.<?php } ?></li>
                            <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </aside>
            </div>
        </div>

        <div id="hd_sch" class="hd_div">
            <h2>사이트 내 전체검색</h2>
            <form name="fsearchbox" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" method="get">
            <input type="hidden" name="sfl" value="wr_subject||wr_content">
            <input type="hidden" name="sop" value="and">
            <input type="text" name="stx" id="sch_stx" placeholder=" 검색어(필수)" required class="required" maxlength="20">
            <input type="submit" value="검색" id="sch_submit">
            </form>

            <script>
            function fsearchbox_submit(f)
            {
                if (f.stx.value.length < 2) {
                    alert("검색어는 두글자 이상 입력하십시오.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                var cnt = 0;
                for (var i=0; i<f.stx.value.length; i++) {
                    if (f.stx.value.charAt(i) == ' ')
                        cnt++;
                }

                if (cnt > 1) {
                    alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                return true;
            }
            </script>
        </div>
        <ul id="hd_nb">
            <li><a href="">메뉴1</a></li>
            <li><a href="">메뉴2</a></li>
            <li><a href="">메뉴3</a></li>
            <li><a href="">메뉴4</a></li>
            <li><a href="">메뉴5</a></li>
        </ul>
    </div>      
</header>

<script>
//사이드 메뉴
var $btn_side = $("#btn_side"),
    $side_menu = $("#side_menu"),
    $side_wr = $("#side_menu .side_wr"),
    side_obj = { my : {} },
    is_trans_sup = '';

$side_wr.css({"right":"-280px"});   //초기화

side_obj.destory = function(){
    if( !is_trans_sup ) return;
    side_obj.my.destroy();
}
side_obj.refresh = function(){
    if( !is_trans_sup ) return;
    side_obj.my.refresh();
}

function iscroll_loaded() {
    if( is_trans_sup ){
        $side_wr.removeClass("add_side_wr");
        side_obj.my = new IScroll('#isroll_wrap', { bounceTime : 400, mouseWheel: true, click: true, hScroll:false });
    }
}

$btn_side.on("click", function() {
    if (!$(this).data('toggle_enable')) {
        $(this).data('toggle_enable', true);
        $side_menu.show();
        $side_wr.animate({"right": "0px"}, 200, function(){
            iscroll_loaded();
            height_update($(this));
        });
    } else {
        remove_side_data();
    }
});

$(document).on("click", ".side_close", function(e){
    if ( !$(e.target).closest("#btn_side").length && $btn_side.data('toggle_enable') ){
        remove_side_data();
    }
})

function height_update(target){
    var side_wr_height = target.height();
    $("body").css({"min-height":side_wr_height+"px"}).addClass("over_hidden");
}

function remove_side_data(){
    $btn_side.data('toggle_enable', false);
    $side_wr.animate({"right": "-280px"}, 160, function(){
        $side_menu.hide();
        $("body").removeClass("over_hidden").css({"min-height":""});
    });
}

$("#side_menu .side_wr").on("clickoutside", function(e){
    //if ( !$(e.target).is('#btn_side *, #btn_side') ){
    if ( !$(e.target).closest("#btn_side").length && $btn_side.data('toggle_enable') ){
        remove_side_data();
    }
});

// 서브메뉴 열기
$(function (){
    $(".sub_toggle").on("click", function() {
        var $this = $(this);
        $sub_ul = $(this).closest("li").children("ul.sub_menu");

        if($sub_ul.size() > 0) {
            var txt = $this.text();

            if($sub_ul.is(":visible")) {
                txt = txt.replace(/닫기$/, "열기");
                $this
                    .removeClass("sd_cl")
                    .text(txt);
            } else {
                txt = txt.replace(/열기$/, "닫기");
                $this
                    .addClass("sd_cl")
                    .text(txt);
            }

            $sub_ul.toggle();
        }
    });
});
</script>


<hr>
<div id="wrapper">
    <div id="container">
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>
        <!-- <div id="text_size"> -->
            <!-- font_resize('엘리먼트id', '제거할 class', '추가할 class'); -->
            <!-- <button id="size_down" onclick="font_resize('container', 'ts_up ts_up2', '');"><img src="<?php echo G5_URL; ?>/img/ts01.gif" alt="기본"></button>
            <button id="size_def" onclick="font_resize('container', 'ts_up ts_up2', 'ts_up');"><img src="<?php echo G5_URL; ?>/img/ts02.gif" alt="크게"></button>
            <button id="size_up" onclick="font_resize('container', 'ts_up ts_up2', 'ts_up2');"><img src="<?php echo G5_URL; ?>/img/ts03.gif" alt="더크게"></button>
        </div> -->
