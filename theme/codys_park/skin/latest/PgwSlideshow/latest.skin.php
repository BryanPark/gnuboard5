<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>
<link rel="stylesheet" href="<?=$latest_skin_url?>/style.css">
<link href="<?=$latest_skin_url?>/css/pgwslideshow.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?=$latest_skin_url?>/css/pgwslideshow_light.css" rel="stylesheet" type="text/css" media="screen" />
<script src="<?=$latest_skin_url?>/js/pgwslideshow.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.pgwSlideshow').pgwSlideshow();
});
</script>
<div class="wrapper">

	<div>
		<ul class="pgwSlideshow">	
	<?php for ($i=0; $i<count($list); $i++) { 
			$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
			$image = get_editor_image($list[$i]['wr_content'],true);
			preg_match_all("<img [^<>]*>", $image[0][0], $output);
			eregi("[:space:]*(src)[:space:]*=[:space:]*([^ >;]+)",$image[0][0],$regs);
			$regs[2] = str_replace(Array("'",'"'),"",$regs[2]); 
			$buff[] = $regs[2]; 

			if($image[0][0]==""){
				$sql = " select bf_file from g5_board_file where bo_table = '".$bo_table."' and wr_id = '".$list[$i]["wr_id"]."' order by bf_no ";
				$result = sql_query($sql);
				$img_url = mysql_result($result,0,0);
			}
			
			if($img_url){
				$thumb[0]['path'] = G5_DATA_URL.'/file/'.$bo_table;
				$thumb[0]['file'] = $img_url;
				$big_img_url = $thumb[0]['path']."/".$thumb[0]['file'];
			}else{
				$thumb[0]['file'] = $buff[$i];
				$big_img_url = $thumb[0]['file'];
			}
	?>		<li>
			<img src="<?=$big_img_url?>"/>
			
		
    <?php $img_url="";
		}  
	?>      
		</ul>
	</div>
</div>


