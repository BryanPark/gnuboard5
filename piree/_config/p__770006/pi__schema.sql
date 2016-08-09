
-- 작성날짜 : 2014년 03월 06일 목요일 오전 09시 47분, 날씨 꽃샘추위 위세가 좀 쎄다, 쌀쌀하다

-- 피리 > 피리 신고하기 PLUS G5 > 신고하기 DB SCHEMA 화일

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree_770006_report_reason`
--

DROP TABLE IF EXISTS `g5__piree_770006_report_reason`;
CREATE TABLE IF NOT EXISTS `g5__piree_770006_report_reason` (
  `num` INT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_n` INT(11) UNSIGNED NOT NULL,
  `regi_mem_mn` INT(11) UNSIGNED NOT NULL,
  `regi_mem_id` VARCHAR(20) NOT NULL DEFAULT '',
  `regi_mem_nick` VARCHAR(255) NOT NULL DEFAULT '',
  `prog_article` TINYINT(4) UNSIGNED NOT NULL,
  `prog_comment` TINYINT(4) UNSIGNED NOT NULL,
  `prog_member` TINYINT(4) UNSIGNED NOT NULL,
  `subject_s` VARCHAR(255) NOT NULL DEFAULT '',
  `report_t` INT(11) UNSIGNED NOT NULL,
  `ip_s` VARCHAR(255) NOT NULL DEFAULT '',
  `regi_time_n` INT(11) UNSIGNED NOT NULL,
  `modi_time_n` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY  (`num`),
  KEY `ord_n` (`order_n`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `g5__piree_770006_report_list`
--

DROP TABLE IF EXISTS `g5__piree_770006_report_list`;
CREATE TABLE IF NOT EXISTS `g5__piree_770006_report_list` (
  `num` INT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `do_mem_mn` INT(11) UNSIGNED NOT NULL,
  `do_mem_id` VARCHAR(20) NOT NULL DEFAULT '',
  `do_mem_nick` VARCHAR(255) NOT NULL DEFAULT '',
  `get_mem_mn` INT(11) UNSIGNED NOT NULL,
  `get_mem_id` VARCHAR(20) NOT NULL DEFAULT '',
  `get_mem_nick` VARCHAR(255) NOT NULL DEFAULT '',
  `res_mem_mn` INT(11) UNSIGNED NOT NULL,
  `res_mem_id` VARCHAR(20) NOT NULL DEFAULT '',
  `res_mem_nick` VARCHAR(255) NOT NULL DEFAULT '',
  `prog_div_c` VARCHAR(20) NOT NULL DEFAULT '',
  `bo_table` VARCHAR(20) NOT NULL DEFAULT '',
  `arti_n` INT(11) UNSIGNED NOT NULL,
  `parent_n` INT(11) UNSIGNED NOT NULL,
  `reason_n` INT(11) UNSIGNED NOT NULL,
  `title_s` VARCHAR(255) NOT NULL DEFAULT '',
  `active_s` VARCHAR(40) NOT NULL DEFAULT '',
  `resu_s` VARCHAR(40) NOT NULL DEFAULT '',
  `report_memo_s` VARCHAR(255) NOT NULL DEFAULT '',
  `hidden_memo_s` VARCHAR(600) NOT NULL DEFAULT '',
  `send_how_s` VARCHAR(20) NOT NULL DEFAULT '',
  `send_msg_s` VARCHAR(600) NOT NULL DEFAULT '',
  `do_ip_s` VARCHAR(255) NOT NULL DEFAULT '',
  `regi_time_n` INT(11) UNSIGNED NOT NULL,
  `upda_time_n` INT(11) UNSIGNED NOT NULL,
  `read_time_n` INT(11) UNSIGNED NOT NULL,
  `resu_time_n` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY  (`num`),
  KEY `mymn_uptm` (`do_mem_mn`, `get_mem_mn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree_770006_black_list`
--

DROP TABLE IF EXISTS `g5__piree_770006_black_list`;
CREATE TABLE IF NOT EXISTS `g5__piree_770006_black_list` (
  `bl_no` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mb_id` VARCHAR(30)  NOT NULL DEFAULT '' COMMENT '아이디',
  `mb_ip` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '아이피',
  `rp_num` INT(13) NOT NULL DEFAULT '0' COMMENT 'report_list의 num',
  `prog_div_c` VARCHAR(20) NOT NULL DEFAULT '' COMMENT 'article|comment|member ->신고 대상의 타입.',
  `bo_table` VARCHAR(20) NOT NULL DEFAULT '' COMMENT 'article|comment일때 bo_table',
  `wr_id` INT(11) NOT NULL DEFAULT '0' COMMENT 'article|comment일때 wr_id값',
  `bl_comment` LONGTEXT  NOT NULL COMMENT '등록내용',
  `bl_type` ENUM('T','P')  NOT NULL DEFAULT 'T' COMMENT '타입',
  `bl_active` ENUM('Y','N')  NOT NULL DEFAULT 'Y' COMMENT '체크타입',
  `regdate` DATETIME NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록날짜',
  PRIMARY KEY  (`bl_no`),
  KEY `bl_no` (`bl_no`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree_770006_blinded_list` 
-- 블라인드 된 게시물을 기록하는 TABLE.

CREATE TABLE `g5__piree_770006_blinded_list` (
  `bl_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mb_id` varchar(30) NOT NULL DEFAULT '' COMMENT '작성자 id',
  `mb_ip` varchar(255) NOT NULL DEFAULT '' COMMENT '작성자 ip',
  `rp_num` int(13) NOT NULL DEFAULT '0' COMMENT 'report_list의 num',
  `prog_div_c` varchar(20) NOT NULL DEFAULT '' COMMENT 'article|comment|member ->신고 대상의 타입.',
  `bo_table` varchar(20) NOT NULL DEFAULT '' COMMENT 'article|comment일때 bo_table',
  `wr_id` int(11) NOT NULL DEFAULT '0' COMMENT 'article|comment일때 wr_id값',
  `bl_comment` longtext NOT NULL COMMENT '등록내용',
  `bl_active` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '블라인드 적용중인지 해제됬는지',
  `bl_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '블라인드된 날짜',
  PRIMARY KEY (`bl_no`),
  KEY `bl_no` (`bl_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
