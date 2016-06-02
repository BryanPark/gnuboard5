			<tbody>
				<?php
				FOR ($i=0; $i<count($list); $i++) {
				 ?>
				<div class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?>">
						<div class="td_num">
						<?php
						if ($list[$i]['is_notice']) // 공지사항
								echo '<strong>공지</strong>';
						else if ($wr_id == $list[$i]['wr_id'])
								echo "<span class=\"bo_current\">열람중</span>";
						else
								echo trim($list[$i]['num']);
						 ?>
						</div>
						<?php if ($is_checkbox) { ?>
						<div class="td_chk">
								<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
								<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
						</div>
						<?php } ?>
						<!--Added by BryanPark td_subject가 제목을 받아서 출력하는 부분. 여기에 투표 내용도 추가-->
						<div class="td_subject">
							<?php
							##### 해당 게시물의 투표 제목, 항목 등 가져오기.
							$sql = " select * from {$piree_table['vote_list']} WHERE avl_bo_table='{$bo_table}' 
									AND avl_wr_id = '{$list[$i]['wr_id']}'";
							$vote_rows = sql_fetch($sql);


							if (!$vote_rows){//투표없는거는 게시물자체만 출력.?>
								<?php
								echo $list[$i]['icon_reply'];
								if ($is_category && $list[$i]['ca_name']) {
								?>
									<a href="<?php echo trim($list[$i]['ca_name_href']); ?>" class="bo_cate_link"><?php echo trim($list[$i]['ca_name']); ?></a>
								<?php } ?>

								<a href="<?php echo $list[$i]['href'] ?>">
										<?php echo $list[$i]['subject']?>
										<?php if ($list[$i]['comment_cnt']) { ?>
										<?php } ?>
										
									<?php //아이콘 새글, 파일첨부 등 출력.
									// if ($list[$i]['link']['count']) { echo '['.$list[$i]['link']['count']}.']'; }
									// if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

									IF (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
									IF (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
									IF (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
									IF (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
									IF (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
									?>
								</a>
							<?}else{ //투표 게시물 제목과 정보 출력..?>

									<?php
									if ($is_category && $list[$i]['ca_name']) {
									?>
									<div class="category" style="float:left;vertical-align:center;">
										<a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo trim($list[$i]['ca_name']); ?></a>
									</div>
									<?php }?>
									<div style="display:inline-block; float:left">
										<a href="<?php echo $list[$i]['href'] ?>">
											<?=trim($vote_rows['avl_title_s']);?>
											<br/>
											<img src="http://gboard.codys.co.kr/gnuboard5/theme/codys_vote_board/skin/board/piree_PLUS_article_vote/img/icon_clock.gif" alt="시간"><!--only works in vote_skin--> <b><?=date('Y-m-d',$vote_rows['avl_regi_time_n']);?>~<?=date('Y-m-d',$vote_rows['avl_end_time_n']);?></b>
										</a>
									</div>
									
								<?php
								/*
									//최대 20개까지 가능한 투표 보기 항목들중 있는 것들만 뿌려줌.
									for($x = 1 ; $x<=20; $x++){
										if($vote_rows['avl_poll_'.$x]){
											echo "<div class='vote_list_item'>".
											$vote_rows['avl_poll_'.$x].
											"</div>";
										}
									}
								*/
								?>
							<div class="comment_icon" style="float:left">
								<?} // 공통적으로 댓글 있을시에 댓글 아이콘 삽입.
								if ($list[$i]['comment_cnt']) {//댓글 아이콘 삽입.
									echo '<img src="http://gboard.codys.co.kr/gnuboard5/theme/codys_vote_board/skin/board/piree_PLUS_article_vote/img/icon_comments.gif" alt="댓글"><!--only works in vote_skin-->';
									echo $list[$i]['comment_cnt']; 
								}
								if($vote_rows) {
									echo '<img src="http://gboard.codys.co.kr/gnuboard5/theme/codys_vote_board/skin/board/piree_PLUS_article_vote/img/icon_vote.gif" alt="투표수"><!--only works in vote_skin-->';
									echo " <b>".$vote_rows['avl_vote_all_t']."</b>";
								}
								?>
							</div>
						</div>
						<div class="td_name sv_use"><?php echo $list[$i]['name'] ?></div>
						<div class="td_date"><?php echo $list[$i]['datetime2'] ?></div>
						<div class="td_num"><?php echo $list[$i]['wr_hit'] ?></div>
						<?php if ($is_good) { ?><div class="td_num"><?php echo $list[$i]['wr_good'] ?></div><?php } ?>
						<?php if ($is_nogood) { ?><div class="td_num"><?php echo $list[$i]['wr_nogood'] ?></div><?php } ?>
				</div>
				<?php } ?>
				<?php if (count($list) == 0) { echo '<div><div colspan="'.$colspan.'" class="empty_table">게시물이 없습니다.</div></div>'; } ?>
				</tbody>