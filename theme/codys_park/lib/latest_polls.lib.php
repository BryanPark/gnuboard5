<?php
if (!defined('_GNUBOARD_')) {exit;}
// 개별 페이지 접근 불가
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

####################################################
#added by BryanPark
# 흐름도
# 1. vote_list table에서 avl_bo_table들을 distinct하게 가져옴.
# 2. query를 ㅠ
# 
####################################################
#
/*
function select_ca_bar($ARTI_VOTE_vote_category_list_s, $search_options){
	global $gr_id;
	$category_href = G5_BBS_URL.'/group.php?gr_id='.$gr_id;
	$category_option .= '<nav id = gr_cate>';
	$category_option .= '<ul id = gr_cate_ul>';
	$category_option .= '<li><a href="'.$category_href.'"';
	if ($search_options['sca']=='')
		$category_option .= ' id="gr_cate_on"';
	$category_option .= '>전체</a></li>';

	$categories = get_category_list($ARTI_VOTE_vote_category_list_s); // 구분자가 , 로 되어 있음
	foreach ($categories as $ca) {
		$category_option .= '<li><a href="'.($category_href."&amp;sca=".urlencode($ca)).'"';
		$category_msg = '';
		if ($ca==$search_options['sca']) { // 현재 선택된 카테고리라면
			$category_option .= ' id="gr_cate_on"';
			$category_msg = '<span class="sound_only">열린 분류 </span>';
		}
		$category_option .= '>'.$category_msg.$ca.'</a></li>';
	}
	$category_option .='</ul></nav>';
	echo $category_option;
}

function latest_poll_group($max_title_s,$max_row, $max_date ,$search_options, $ARTI_VOTE_vote_category_list_s){
	#category_list는 DB:g5__piree_program_sam / pgs_cf_1_txt에 위치한다 "A|B|C" 와 같이 '|'로 구분되는 문자열 형태로.
	select_ca_bar($ARTI_VOTE_vote_category_list_s,$search_options);

	if($search_options['sca']!=''){ //sca가 있으면 이렇게 하구 없으면 저렇게.
		latest_poll($max_title_s,$max_row, $max_date ,$search_options, $search_options['sca']);
	}else{
		$categories = get_category_list($ARTI_VOTE_vote_category_list_s);
		foreach($categories as $category){
			latest_poll($max_title_s,$max_row, $max_date ,$search_options, $category);
		}
	}
}

function latest_poll($max_title_s,$max_row, $max_date ,$search_options, $category){
	#@todo query를 받아야한다.
	echo "<div class = 'vote_list'>";
	$sql = get_poll_sql($search_options,$category);
	$result = sql_query($sql);
	echo "<b>[$category]</b><br/>";

	//@todo 최신글이 없으면 없다고 표시 후 탈출 
	if(sql_num_rows($result)==0){echo "게시물이 없습니다";}

	for ($i = 0; ($row = sql_fetch_array($result))&&($i<$max_row) ; $i++) {

		//글이 있으면 진행
		$options = explode("||",$search_options['sfl']);
		$is_stx  = ($search_options['stx']!='')?1:0;

		if(in_array("avl_title_s",$options)&&$is_stx){ 
		//검색어가 있으면 검색어에 해당하는 문자를 bold red 처리한다.
			$vo_title = search_font($search_options['stx'], $row['avl_title_s']);
		}else{
			$vo_title = $row['avl_title_s'];
		}

		echo "
		<div class='vote_list item'>
			<div class=vote_title>
			<a href='".G5_BBS_URL."/board.php?bo_table={$row['avl_bo_table']}&wr_id={$row['avl_wr_id']}'>
				<li>{$vo_title}</li>
			</a>
			</div>";

		for ($x = 1; $x <= 20; $x++) {
			if ($row['avl_poll_' . $x]) {
				////home/www/gboard.codys.co.kr/public_html/gnuboard5/data . /vote . /row['avl_bo_table']
				//아.. 폴더명이 왜 1이되는지 모르겠다...
				//TODO 폴더명 동적으로 수정 -> 특히나 이름이 숫자로 된 폴더.
				echo "<div class='vote_list item polls'>";

				if ($row['avl_image_' . $x] != null) {
					echo
						"<img style='width:20px; height:20px'
					src='" . G5_DATA_URL . "/vote/" . $row['avl_bo_table'] . "/1/" .
						$row['avl_wr_id'] . "/" . $row['avl_image_' . $x] . "'" . "
					</img>";
				}
				//@todo 검색된 스트링을 붉은색으로 바꿔야함
				if(in_array("avl_poll_x",$options)&&$is_stx){ 
				//검색어가 있으면 검색어에 해당하는 문자를 bold red 처리한다.
					$vo_item = search_font($search_options['stx'], $row['avl_poll_' . $x]);
				}else{
					$vo_item = $row['avl_poll_' . $x];
				}
				echo
					$vo_item.
					"</div>";
			}
		}
		echo "</div>";
	}
	echo "</div>";
}
function get_poll_sql($s_arr, $category){

	$options = explode("||",$s_arr['sfl']);

	$sql = " select * from g5__piree_770015_vote_list";
	$sql_stx = "";
	$sql_cat = "";
	//echo "s_arr".$s_arr['stx'];
	if($s_arr['stx']!= ''){
		$sql_stx .= " and (";
		foreach($options as $opt){
			switch ($opt)
			{
				case 'avl_title_s':
					$sql_stx .= " INSTR( LOWER(avl_title_s), LOWER('{$s_arr[stx]}') )";
					break;
				case 'avl_poll_x':
					for($i = 1 ; $i <= 20 ; $i++ ){
						$sql_stx .= " OR 
						INSTR( LOWER(avl_poll_{$i}), LOWER('{$s_arr[stx]}') )";
					}
					break;
				default:
			}
		}
		$sql_stx .= ")"; //여러 검색 조건을 묶기 위해서.
		/*if($s_arr['sfl']==""){
			$sql_stx .= " and 
			(
			INSTR( LOWER(avl_title_s), LOWER('{$s_arr[stx]}') )";
		}*/
	}

	if($category != '' && $category!=null){
		$sql_cat .= " and avl_ca_name = '{$category}'";
	}
	$sql .= " where avl_ca_name is not null and avl_ca_name != '' ";
	$sql .= $sql_stx;
	$sql .= $sql_cat;

	return $sql;
}


