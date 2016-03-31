
-- 작성날짜 : 2014년 12월 28일 일요일 오전 03시 29분, 날씨 춥다~ 추워~

-- 피리 > 피리 게시글에 투표 > DB SCHEMA 화일

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree_{PIREE_PROGRAM_N}_vote_list`
-- Table structure for table `g5__piree_{PIREE_PROGRAM_N}_vote_item`
--
-- `avl_ca_name` has been addded - Bryan Park.
DROP TABLE IF EXISTS `g5__piree_{PIREE_PROGRAM_N}_vote_list`;
CREATE TABLE IF NOT EXISTS `g5__piree_{PIREE_PROGRAM_N}_vote_list` (
  `avl_n` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `avl_mem_id` VARCHAR(20) NOT NULL DEFAULT '',
  `avl_bo_table` VARCHAR(20) NOT NULL DEFAULT '',
  `avl_wr_id` INT(11) NOT NULL DEFAULT '0',
  `avl_ca_name` VARCHAR(20) NOT NULL DEFAULT '',
  `avl_title_s` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_1` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_2` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_3` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_4` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_5` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_6` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_7` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_8` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_9` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_10` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_11` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_12` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_13` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_14` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_15` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_16` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_17` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_18` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_19` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_poll_20` VARCHAR(255) NOT NULL DEFAULT '',

  `avl_image_1` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_2` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_3` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_4` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_5` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_6` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_7` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_8` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_9` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_10` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_11` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_12` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_13` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_14` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_15` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_16` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_17` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_18` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_19` VARCHAR(255) NOT NULL DEFAULT '',
  `avl_image_20` VARCHAR(255) NOT NULL DEFAULT '',

  `avl_vote_1` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_2` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_3` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_4` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_5` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_6` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_7` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_8` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_9` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_10` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_11` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_12` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_13` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_14` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_15` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_16` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_17` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_18` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_19` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_20` INT(11) NOT NULL DEFAULT '0',

  `avl_per_1` FLOAT NOT NULL DEFAULT '0',
  `avl_per_2` FLOAT NOT NULL DEFAULT '0',
  `avl_per_3` FLOAT NOT NULL DEFAULT '0',
  `avl_per_4` FLOAT NOT NULL DEFAULT '0',
  `avl_per_5` FLOAT NOT NULL DEFAULT '0',
  `avl_per_6` FLOAT NOT NULL DEFAULT '0',
  `avl_per_7` FLOAT NOT NULL DEFAULT '0',
  `avl_per_8` FLOAT NOT NULL DEFAULT '0',
  `avl_per_9` FLOAT NOT NULL DEFAULT '0',
  `avl_per_10` FLOAT NOT NULL DEFAULT '0',
  `avl_per_11` FLOAT NOT NULL DEFAULT '0',
  `avl_per_12` FLOAT NOT NULL DEFAULT '0',
  `avl_per_13` FLOAT NOT NULL DEFAULT '0',
  `avl_per_14` FLOAT NOT NULL DEFAULT '0',
  `avl_per_15` FLOAT NOT NULL DEFAULT '0',
  `avl_per_16` FLOAT NOT NULL DEFAULT '0',
  `avl_per_17` FLOAT NOT NULL DEFAULT '0',
  `avl_per_18` FLOAT NOT NULL DEFAULT '0',
  `avl_per_19` FLOAT NOT NULL DEFAULT '0',
  `avl_per_20` FLOAT NOT NULL DEFAULT '0',

  `avl_level_n` TINYINT(4) UNSIGNED NOT NULL,
  `avl_vote_do_t` TINYINT(4) UNSIGNED NOT NULL,
  `avl_re_vote_n` TINYINT(4) UNSIGNED NOT NULL,
  `avl_vote_row_t` TINYINT(4) UNSIGNED NOT NULL,
  `avl_vote_all_t` INT(11) NOT NULL DEFAULT '0',
  `avl_vote_mem_t` INT(11) NOT NULL DEFAULT '0',
  `avl_poll_t` TINYINT(4) UNSIGNED NOT NULL,
  `avl_image_t` TINYINT(4) UNSIGNED NOT NULL,

  `avl_ip_s` VARCHAR(40) NOT NULL DEFAULT '',
  `avl_regi_time_n` INT(11) NOT NULL DEFAULT '0',
  `avl_last_time_n` INT(11) NOT NULL DEFAULT '0',
  `avl_end_time_n` INT(11) NOT NULL DEFAULT '0',

  PRIMARY KEY  (`avl_n`),
  KEY `kbowr` (`avl_bo_table`, `avl_wr_id`),
  KEY `kmem_id` (`avl_mem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree_{PIREE_PROGRAM_N}_vote_result`
--

DROP TABLE IF EXISTS `g5__piree_{PIREE_PROGRAM_N}_vote_result`;
CREATE TABLE IF NOT EXISTS `g5__piree_{PIREE_PROGRAM_N}_vote_result` (
  `avr_n` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `avr_avl_n` INT(11) NOT NULL DEFAULT '0',
  `avr_mem_id` VARCHAR(20) NOT NULL DEFAULT '',
  `avr_bo_table` VARCHAR(20) NOT NULL DEFAULT '',
  `avr_wr_id` INT(11) NOT NULL DEFAULT '0',
  `avr_opinion_n` INT(11) NOT NULL DEFAULT '0',
  `avr_opinion_s` VARCHAR(255) NOT NULL DEFAULT '',
  `avr_ip_s` VARCHAR(40) NOT NULL DEFAULT '',
  `avr_regi_time_n` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY  (`avr_n`),
  KEY `kbowr` (`avr_bo_table`, `avr_wr_id`),
  KEY `kmem_id` (`avr_mem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
