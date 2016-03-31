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
function latest_poll($max_title_s,$max_row, $max_date ,$search_options, $category){
	#@todo query를 받아야한다.
	echo "<div class = 'vote_list'>";
	$sql ="";
	get_poll_sql($search_options, $sql,$category);
	$result = sql_query($sql);
	//echo "<div><b>[{$row_ca_count['ca_name']}]</b></br>";
	for ($i = 0; ($row = sql_fetch_array($result))&&($i<$max_row) ; $i++) {
		echo "
		<div class='vote_list item'>
			<div class vote_list item title>
			<a href='".G5_BBS_URL."/board.php?bo_table={$row['avl_bo_table']}&wr_id={$row['avl_wr_id']}'>
				{$row['avl_title_s']}
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
				//
				echo
					$row['avl_poll_' . $x] .
					"</div>";
			}
		}
		echo "</div>";
	}
	
}
function get_poll_sql($s_arr, &$sql, $category){//@todo 카피 수정

	$sql = " select * from g5__piree_770015_vote_list";
	$sql_stx = "";
	$sql_cat = "";
	if($s_arr['stx']!= ''){
		$sql_stx .= " and INSTR(LOWER(avl_title_s), LOWER(".$s_arr['stx'].")";
	}
	if($category != '' && $category!=null){
		$sql_cat .= " and avl_ca_name = '{$category}'";
	}
	$sql .= " where avl_ca_name is not null and avl_ca_name != '' ";
	$sql .= $sql_stx;
	$sql .= $sql_cat;

	return $sql;
	/*$sql = " select distinct avl_bo_table from g5__piree_770015_vote_list";
	$result = sql_query($sql);
	
	$sql = "select * from (";
	$sql_ca_count = "select ca_name,count(*) as count from(";
	$sql_stx = ""; // 검색어 있을시 검색문.
	if ($stx != '') {
		$sql_stx .= " and INSTR(LOWER(avl_title_s), LOWER(".$s_arr['stx']).")";
	}
	while ($rowss = sql_fetch_array($result)) {
		//print_r($rowss); @todo 카피 수정
		$sql .= " select a.*,b.ca_name from `g5__piree_770015_vote_list`";
		$sql .= " as a left join";
		$sql .= " `g5_write_{$rowss['avl_bo_table']}` as b on (a.avl_wr_id= b.wr_id)";
		$sql .= " where ca_name is not null and ca_name !=''";
		$sql .= $sql_stx;
		$sql .= " union all ";

		$sql_ca_count .= " select a.*,b.ca_name from `g5__piree_770015_vote_list`";
		$sql_ca_count .= " as a left join";
		$sql_ca_count .= " `g5_write_{$rowss['avl_bo_table']}` as b on (a.avl_wr_id= b.wr_id)";
		$sql_ca_count .= " where ca_name is not null and ca_name !=''";
		$sql_ca_count .= $sql_stx;
		$sql_ca_count .= " union all ";
	}
	$sql = substr($sql, 0, -10); //맨마지막에 붙는 union all 삭제.
	$sql .= ")";
	$sql_ca_count = substr($sql_ca_count, 0, -10);
	$sql_ca_count .= ")";
	$sql_ca_count .= " as t group by ca_name order by ca_name, avl_n desc";
	$sql .= " as t order by ca_name, avl_n desc";
	$sql2 = $sql_ca_count;
	*/
}



/*
function get_poll_list(){
	$sql;
	$sql2;

	get_poll_query();
}

function get_poll_query(){
	#######################################
	# 여기서 해야 할 일
	# sql문 생성하건 받아오건 하고.
	# 일단 기존의 list 형태로 처리하는 방법은
	# 쿼리 실행하고 패치 한것을 파라미터로 받아서 
	# 그래 패치 받는데 루프 돌면서 한행, 한행, 한행 받는다.
	# 그 받는 와중에 list에 넣는데 조금씩 변조해서 넣고
	# 그 변조된 행들을 받아 넣은 list를 반환한다.
	# 그러면 형식에 맞게 잘 정리된 테이블 배열이 완성되어 반환 되는 것인데.
	# 
	# 1. sql문을 잘 준비한다. => get_sql_poll();
	# 2. sql문을 실행하고 패치 받아서 변조해서 저장하는 루틴을 만든다.
	# 3. 2를 전체 쿼리 결과에 대해서 실행 할 수 있게 - 반복하는 루틴을 만든다.
	# 4. 3이 끝나면 완성된 list가 나오고 이걸 반환한다. 
	######################################### 
	



}

?>