<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
//include_once('../../../_common.php');
?>

<!-- 설문조사 시작 { -->
<link rel="stylesheet" href="<?php echo $poll_skin_url ?>/style.css">

<li>
	<a href="#" id="poll_wrap_open">
	</a>
</li>
<!--{이미 투표한지 확인-->
<?php
//$pollcheck = sql_fetch(" select mb_ids from {$g5['poll_table']} where po_id = '{$po_id}' ");
//$row = sql_fetch_array("select mb_ids from {$g5['poll']} where po_id = '{$po_id}'");
//echo $po['mb_ids'] . "이게 로우 ";
//$idpos = strrpos($pollcheck['mb_ids'],);
//echo $member['mb_id'] . $is_member;
?>
<script type="text/javascript">var voted = false;</script>
<?
// 투표했던 회원아이디들 중에서 찾아본다
$idss = explode(',', trim($po['mb_ids']));
for ($i=0; $i<count($idss); $i++) {
    if ($member['mb_id'] == trim($idss[$i])) {
        $search_mb_ids = true;
        ?>
        <script type="text/javascript"> voted = true;</script>
        <?

        break;
    }
}

/*else {
    // 투표했던 ip들 중에서 찾아본다
    $ips = explode(',', trim($po['po_ips']));
    for ($i=0; $i<count($ips); $i++) {
        if ($_SERVER['REMOTE_ADDR'] == trim($ips[$i])) {
            $search_ip = true;
            break;
        }
    }
}*/

// 이미 투표했다면 아에 안보여지게
// 

//if (($search_ip || $search_mb_id)) {
if ( $search_mb_ids ) {
	echo "이미 투표에 참여하셨습니다.";

} else {
    echo "투표에 아직 참여하지 않으셨습니다.";
}


?>
<!--이미 투표한지 확인}-->

<!-- 로그인 전 외부로그인 시작 -->
<div class="poll_wrap">
	<div class="poll_bg"></div>
	<div class="poll_wrap_area" id="layer_poll">

		<form name="fpoll" action="<?php echo G5_BBS_URL ?>/poll_update.php" onsubmit="return fpoll_submit(this);" method="post">
		<input type="hidden" name="po_id" value="<?php echo $po_id ?>">
		<input type="hidden" name="skin_dir" value="<?php echo $skin_dir ?>">

		<div id="poll-box">
			<a id="poll_wrap_close" href="#">X</a>
			<H2>Poll</H2>



			<section id="poll">
				<header>
					<?php if ($is_admin == "super") {  ?><a href="<?php echo G5_ADMIN_URL ?>/poll_form.php?w=u&amp;po_id=<?php echo $po_id ?>" class="btn_admin">설문조사 관리</a><?php }  ?>
					<p><?php echo $po['po_subject'] ?></p>
				</header>
				<ul>
					<?php for ($i=1; $i<=9 && $po["po_poll{$i}"]; $i++) {  ?>
					<li><input type="radio" name="gb_poll" value="<?php echo $i ?>" id="gb_poll_<?php echo $i ?>"> <label for="gb_poll_<?php echo $i ?>"><?php echo $po['po_poll'.$i] ?></label></li>
					<?php }  ?>
				</ul>
				<footer>
					<input type="submit" value="투표하기">
					<a href="<?php echo G5_BBS_URL."/poll_result.php?po_id=$po_id&amp;skin_dir=$skin_dir" ?>" target="_blank" onclick="poll_result(this.href); return false;">결과보기</a>
				</footer>
			</section>





		</div>

		</form>
	</div>
</div>



<script>
$omi = $('#ol_id');
$omp = $('#ol_pw');
$omp.css('display','inline-block').css('width',104);
$omi_label = $('#ol_idlabel');
$omi_label.addClass('ol_idlabel');
$omp_label = $('#ol_pwlabel');
$omp_label.addClass('ol_pwlabel');

$(function() {
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

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 패스워드를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    return true;
}
</script>


<script type="text/javascript">
jQuery(function($){
	$(document).ready(function(){
		if(!voted){
			poll_wrap_open('layer_poll'); /* 열고자 하는 것의 아이디를 입력 */
			$("#mb_id").focus().select();
			return false;
		}
	});
	function poll_wrap_open(el){
		//$('.poll_wrap').addClass('open');
		$('.poll_wrap').fadeIn();
		var temp = $('#' + el);
		if (temp.outerHeight() < $(document).height() ) temp.css('margin-top', '-'+temp.outerHeight()/2+'px');
		else temp.css('top', '0px');
		if (temp.outerWidth() < $(document).width() ) temp.css('margin-left', '-'+temp.outerWidth()/2+'px');
		else temp.css('left', '0px');
	}
	$('#poll_wrap_open').click(function(){
		poll_wrap_open('layer_poll'); /* 열고자 하는 것의 아이디를 입력 */
		$("#mb_id").focus().select();
		return false;
	});
	$('.poll_wrap .poll_bg').click(function(){
		$('.poll_wrap').fadeOut();
	});
	$('#poll_wrap_close').click(function(){
		$('.poll_wrap').fadeOut();
		return false;
	});
});
</script>
<!-- 로그인 전 외부로그인 끝 -->



































<script>
function fpoll_submit(f)
{
    <?php
    if ($member['mb_level'] < $po['po_level'])
        echo " alert('권한 {$po['po_level']} 이상의 회원만 투표에 참여하실 수 있습니다.'); return false; ";
     ?>

    var chk = false;
    for (i=0; i<f.gb_poll.length;i ++) {
        if (f.gb_poll[i].checked == true) {
            chk = f.gb_poll[i].value;
            break;
        }
    }

    if (!chk) {
        alert("투표하실 설문항목을 선택하세요");
        return false;
    }

    var new_win = window.open("about:blank", "win_poll", "width=616,height=500,scrollbars=yes,resizable=yes"); 
    f.target = "win_poll"; 

    return true;
}

function poll_result(url)
{
    <?php
    if ($member['mb_level'] < $po['po_level'])
        echo " alert('권한 {$po['po_level']} 이상의 회원만 결과를 보실 수 있습니다.'); return false; ";
     ?>

    win_poll(url);
}
</script>
<!-- } 설문조사 끝 -->