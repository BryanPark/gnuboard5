<?php 
	if (!defined('_GNUBOARD_')) exit;

	if(isset($member['mb_open_date'])) {
		$open_day = date("Y년 m월 j일", strtotime("{$member['mb_open_date']} 00:00:00")+$config['cf_open_modify']*86400);
	} else {
		$open_day = date("Y년 m월 j일", G5_SERVER_TIME+$config['cf_open_modify']*86400);
	}

	//수정 : 소셜로그인 데이터 가져오기
	$sl_sns = get_session('sl_sns');
	$sl_str = get_session('sl_str');
	$sl_picture = get_session('sl_picture');

	if($sl_sns != '' && $sl_str != '' && $sl_picture != ''){
		if($sl_sns == 'gg') $sns_kind = '구글';
		else if($sl_sns == 'fb') $sns_kind = '페이스북';
		else if($sl_sns == 'tw') $sns_kind = '트위터';
		else if($sl_sns == 'ka') $sns_kind = '카카오톡';
		else if($sl_sns == 'nv') $sns_kind = '네이버';
	}
	//수정 : 소셜로그인 데이터 가져오기 끝

	// 사용자 프로그램
	@include_once(EYOOM_USER_PATH.'/member/register_form.skin.php');

	// Template define
	$tpl->define_template('member',$eyoom['member_skin'],'register_form.skin.html');

	@include EYOOM_INC_PATH.'/tpl.assign.php';

	$tpl->print_($tpl_name);

?>