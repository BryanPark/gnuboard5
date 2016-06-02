					<thead>
						<tr><!--테이블 헤드 -> <div class='vote_list_header'>-->
								<th scope="col">번호</th>
								<?php if ($is_checkbox) { ?>
								<th scope="col">
										<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
										<input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
								</th>
								<?php }?>
								<th scope="col">제목</th>
								<th scope="col">글쓴이</th>
								<th scope="col"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></th>
								<th scope="col"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회</a></th>
								<?php if ($is_good) { ?><th scope="col"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></th><?php } ?>
								<?php if ($is_nogood) { ?><th scope="col"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></th><?php } ?>
						</tr>
					</thead>