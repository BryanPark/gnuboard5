<?
echo "gr id == community 입니다.";
$sql = " select bo_table, bo_subject, bo_1_subj
            from {$g5[board_table]}
            where gr_id = '{$gr_id}'
              and bo_list_level <= '{$member[mb_level]}'
              and bo_device <> 'mobile' ";
	if(!$is_admin)
		$sql .= " and bo_use_cert = '' ";
	$sql .= " order by bo_order ";
	$result = sql_query($sql);
	for ($i=0; $row=sql_fetch_array($result); $i++) {
		$lt_style = "";
		if ($i%2==1) $lt_style = "margin-left:5%";
		else $lt_style = "";
	?>
		<div style="float:left;width:45%;<?php echo "margin-left:5%" //echo $lt_style ?>">
		<?php
		// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
		// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
		if(strcmp($row['bo_1_subj'], 'meeting')==0){ 
			$options = array(
            'thumb_width'    => 144, // 썸네일 width
            'thumb_height'   => 149,  // 썸네일 height
            'content_length' => 40   // 간단내용 길이
			);
			echo latest('theme/gallery', $row['bo_table'], 5, 26,1,$options);
		}
		else
		{ 
			echo latest('theme/basic', $row['bo_table'], 5, 26);
		} 
		?>
		</div>
	<?php
	}
	?>
	