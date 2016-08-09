
-- 작성날짜 : 2014년 01월 25일 토요일 오전 07시 16분, 날씨 겨울치고 날씨 덜 추움, 맨발로도 안 시려움

-- 피리 > 피리 설정 관리 > 설정 관리 DB SCHEMA 화일

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree__program`
--

DROP TABLE IF EXISTS `g5__piree__program`;
CREATE TABLE IF NOT EXISTS `g5__piree__program` (
  `num` INT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `grp_n` SMALLINT(11) UNSIGNED NOT NULL,
  `user_n` INT(11) UNSIGNED NOT NULL,
  `prog_n` INT(11) UNSIGNED NOT NULL,
  `prog_c` VARCHAR(120) NOT NULL,
  `prog_s` VARCHAR(255) NOT NULL,
  `version_s` VARCHAR(60) NOT NULL,

  `prog_key_s` VARCHAR(255) NOT NULL,

	`pp_license_key_1` VARCHAR(255) NOT NULL DEFAULT '',
	`pp_license_key_2` VARCHAR(255) NOT NULL DEFAULT '',

  `prog_memo_s` VARCHAR(255) NOT NULL,
  `domain_s` VARCHAR(255) NOT NULL,
  `is_paid` TINYINT(4) UNSIGNED NOT NULL,

  `use_pc_c` TINYINT(4) UNSIGNED NOT NULL,
  `skin_pc_c` VARCHAR(255) NOT NULL DEFAULT '',
  `use_mobile_c` TINYINT(4) UNSIGNED NOT NULL,
  `skin_mobile_c` VARCHAR(255) NOT NULL DEFAULT '',

  `pp_cf_1_c` VARCHAR(20) NOT NULL,
  `pp_cf_1_m` VARCHAR(255) NOT NULL,
  `pp_cf_1_n` int NOT NULL DEFAULT '0',
  `pp_cf_1_s` VARCHAR(255) NOT NULL,

  `pp_cf_2_c` VARCHAR(20) NOT NULL,
  `pp_cf_2_m` VARCHAR(255) NOT NULL,
  `pp_cf_2_n` int NOT NULL DEFAULT '0',
  `pp_cf_2_s` VARCHAR(255) NOT NULL,

  `pp_cf_3_c` VARCHAR(20) NOT NULL,
  `pp_cf_3_m` VARCHAR(255) NOT NULL,
  `pp_cf_3_n` int NOT NULL DEFAULT '0',
  `pp_cf_3_s` VARCHAR(255) NOT NULL,

  `pp_cf_4_c` VARCHAR(20) NOT NULL,
  `pp_cf_4_m` VARCHAR(255) NOT NULL,
  `pp_cf_4_n` int NOT NULL DEFAULT '0',
  `pp_cf_4_s` VARCHAR(255) NOT NULL,

  `pp_cf_5_c` VARCHAR(20) NOT NULL,
  `pp_cf_5_m` VARCHAR(255) NOT NULL,
  `pp_cf_5_n` int NOT NULL DEFAULT '0',
  `pp_cf_5_s` VARCHAR(255) NOT NULL,

  `pp_cf_6_c` VARCHAR(20) NOT NULL,
  `pp_cf_6_m` VARCHAR(255) NOT NULL,
  `pp_cf_6_n` int NOT NULL DEFAULT '0',
  `pp_cf_6_s` VARCHAR(255) NOT NULL,

  `pp_cf_7_c` VARCHAR(20) NOT NULL,
  `pp_cf_7_m` VARCHAR(255) NOT NULL,
  `pp_cf_7_n` int NOT NULL DEFAULT '0',
  `pp_cf_7_s` VARCHAR(255) NOT NULL,

  `pp_cf_8_c` VARCHAR(20) NOT NULL,
  `pp_cf_8_m` VARCHAR(255) NOT NULL,
  `pp_cf_8_n` int NOT NULL DEFAULT '0',
  `pp_cf_8_s` VARCHAR(255) NOT NULL,

  `pp_cf_9_c` VARCHAR(20) NOT NULL,
  `pp_cf_9_m` VARCHAR(255) NOT NULL,
  `pp_cf_9_n` int NOT NULL DEFAULT '0',
  `pp_cf_9_s` VARCHAR(255) NOT NULL,

  `pp_cf_10_c` VARCHAR(20) NOT NULL,
  `pp_cf_10_m` VARCHAR(255) NOT NULL,
  `pp_cf_10_n` int NOT NULL DEFAULT '0',
  `pp_cf_10_s` VARCHAR(255) NOT NULL,

  `pp_cf_11_c` VARCHAR(20) NOT NULL,
  `pp_cf_11_m` VARCHAR(255) NOT NULL,
  `pp_cf_11_n` int NOT NULL DEFAULT '0',
  `pp_cf_11_s` VARCHAR(255) NOT NULL,

  `pp_cf_12_c` VARCHAR(20) NOT NULL,
  `pp_cf_12_m` VARCHAR(255) NOT NULL,
  `pp_cf_12_n` int NOT NULL DEFAULT '0',
  `pp_cf_12_s` VARCHAR(255) NOT NULL,

  `pp_cf_13_c` VARCHAR(20) NOT NULL,
  `pp_cf_13_m` VARCHAR(255) NOT NULL,
  `pp_cf_13_n` int NOT NULL DEFAULT '0',
  `pp_cf_13_s` VARCHAR(255) NOT NULL,

  `pp_cf_14_c` VARCHAR(20) NOT NULL,
  `pp_cf_14_m` VARCHAR(255) NOT NULL,
  `pp_cf_14_n` int NOT NULL DEFAULT '0',
  `pp_cf_14_s` VARCHAR(255) NOT NULL,

  `pp_cf_15_c` VARCHAR(20) NOT NULL,
  `pp_cf_15_m` VARCHAR(255) NOT NULL,
  `pp_cf_15_n` int NOT NULL DEFAULT '0',
  `pp_cf_15_s` VARCHAR(255) NOT NULL,

  `pp_cf_16_c` VARCHAR(20) NOT NULL,
  `pp_cf_16_m` VARCHAR(255) NOT NULL,
  `pp_cf_16_n` int NOT NULL DEFAULT '0',
  `pp_cf_16_s` VARCHAR(255) NOT NULL,

  `pp_cf_17_c` VARCHAR(20) NOT NULL,
  `pp_cf_17_m` VARCHAR(255) NOT NULL,
  `pp_cf_17_n` int NOT NULL DEFAULT '0',
  `pp_cf_17_s` VARCHAR(255) NOT NULL,

  `pp_cf_18_c` VARCHAR(20) NOT NULL,
  `pp_cf_18_m` VARCHAR(255) NOT NULL,
  `pp_cf_18_n` int NOT NULL DEFAULT '0',
  `pp_cf_18_s` VARCHAR(255) NOT NULL,

  `pp_cf_19_c` VARCHAR(20) NOT NULL,
  `pp_cf_19_m` VARCHAR(255) NOT NULL,
  `pp_cf_19_n` int NOT NULL DEFAULT '0',
  `pp_cf_19_s` VARCHAR(255) NOT NULL,

  `pp_cf_20_c` VARCHAR(20) NOT NULL,
  `pp_cf_20_m` VARCHAR(255) NOT NULL,
  `pp_cf_20_n` int NOT NULL DEFAULT '0',
  `pp_cf_20_s` VARCHAR(255) NOT NULL,

  `pp_cf_21_c` VARCHAR(20) NOT NULL,
  `pp_cf_21_m` VARCHAR(255) NOT NULL,
  `pp_cf_21_n` int NOT NULL DEFAULT '0',
  `pp_cf_21_s` VARCHAR(255) NOT NULL,

  `pp_cf_22_c` VARCHAR(20) NOT NULL,
  `pp_cf_22_m` VARCHAR(255) NOT NULL,
  `pp_cf_22_n` int NOT NULL DEFAULT '0',
  `pp_cf_22_s` VARCHAR(255) NOT NULL,

  `pp_cf_23_c` VARCHAR(20) NOT NULL,
  `pp_cf_23_m` VARCHAR(255) NOT NULL,
  `pp_cf_23_n` int NOT NULL DEFAULT '0',
  `pp_cf_23_s` VARCHAR(255) NOT NULL,

  `pp_cf_24_c` VARCHAR(20) NOT NULL,
  `pp_cf_24_m` VARCHAR(255) NOT NULL,
  `pp_cf_24_n` int NOT NULL DEFAULT '0',
  `pp_cf_24_s` VARCHAR(255) NOT NULL,

  `pp_cf_25_c` VARCHAR(20) NOT NULL,
  `pp_cf_25_m` VARCHAR(255) NOT NULL,
  `pp_cf_25_n` int NOT NULL DEFAULT '0',
  `pp_cf_25_s` VARCHAR(255) NOT NULL,

  `pp_cf_26_c` VARCHAR(20) NOT NULL,
  `pp_cf_26_m` VARCHAR(255) NOT NULL,
  `pp_cf_26_n` int NOT NULL DEFAULT '0',
  `pp_cf_26_s` VARCHAR(255) NOT NULL,

  `pp_cf_27_c` VARCHAR(20) NOT NULL,
  `pp_cf_27_m` VARCHAR(255) NOT NULL,
  `pp_cf_27_n` int NOT NULL DEFAULT '0',
  `pp_cf_27_s` VARCHAR(255) NOT NULL,

  `pp_cf_28_c` VARCHAR(20) NOT NULL,
  `pp_cf_28_m` VARCHAR(255) NOT NULL,
  `pp_cf_28_n` int NOT NULL DEFAULT '0',
  `pp_cf_28_s` VARCHAR(255) NOT NULL,

  `pp_cf_29_c` VARCHAR(20) NOT NULL,
  `pp_cf_29_m` VARCHAR(255) NOT NULL,
  `pp_cf_29_n` int NOT NULL DEFAULT '0',
  `pp_cf_29_s` VARCHAR(255) NOT NULL,

  `pp_cf_30_c` VARCHAR(20) NOT NULL,
  `pp_cf_30_m` VARCHAR(255) NOT NULL,
  `pp_cf_30_n` int NOT NULL DEFAULT '0',
  `pp_cf_30_s` VARCHAR(255) NOT NULL,

  `regi_time_n` INT(11) UNSIGNED NOT NULL,
  `modi_time_n` INT(11) UNSIGNED NOT NULL,

  PRIMARY KEY (`num`),
  UNIQUE KEY `date_Ymd` (`prog_n`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree__calendar`
--

DROP TABLE IF EXISTS `g5__piree__calendar`;
CREATE TABLE IF NOT EXISTS `g5__piree__calendar` (
  `num` INT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date_n` INT(11) UNSIGNED NOT NULL,
  `date_Y` SMALLINT(11) UNSIGNED NOT NULL,
  `date_m` TINYINT(4) UNSIGNED NOT NULL,
  `date_d` TINYINT(4) UNSIGNED NOT NULL,
  `date_Ymd` date NOT NULL,
  `yoil_n` TINYINT(4) UNSIGNED NOT NULL,
  `yoil_seq` TINYINT(4) UNSIGNED NOT NULL,
  `lunar_Ymd` date NOT NULL,
  `kor_gapja_s` VARCHAR(10) NOT NULL,
  `cha_gapja_s` VARCHAR(12) NOT NULL,
  `is_holiday` TINYINT(4) UNSIGNED NOT NULL,
  `is_24_jeolki` VARCHAR(12) NOT NULL,
  `memo_s` VARCHAR(255) NOT NULL,
  `member_all_t` INT(11) UNSIGNED NOT NULL,
  `member_join_t` INT(11) UNSIGNED NOT NULL,
  `visit_t` INT(11) UNSIGNED NOT NULL,
  `arti_all_t` INT(11) UNSIGNED NOT NULL,
  `arti_new_t` INT(11) UNSIGNED NOT NULL,
  `comm_all_t` INT(11) UNSIGNED NOT NULL,
  `comm_new_t` INT(11) UNSIGNED NOT NULL,
  `attend_t` INT(11) UNSIGNED NOT NULL,
  `regi_time_n` INT(11) UNSIGNED NOT NULL,
  `relo_time_n` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`num`),
  UNIQUE KEY `date_Ymd` (`date_Y`, `date_m`, `date_d`),
  KEY `kd_Yn` (`date_Y`,`date_n`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree__member_active_stat`
--

DROP TABLE IF EXISTS `g5__piree__member_active_stat`;
CREATE TABLE IF NOT EXISTS `g5__piree__member_active_stat` (
  `num` int NOT NULL AUTO_INCREMENT,
  `mem_mn` int NOT NULL DEFAULT '0',
  `point_n` INT(11) UNSIGNED NOT NULL,
  `total_rank_n` INT(11) UNSIGNED NOT NULL,
  `total_arti_t` INT(11) UNSIGNED NOT NULL,
  `total_comm_t` INT(11) UNSIGNED NOT NULL,
  `total_attend_t` SMALLINT(11) UNSIGNED NOT NULL,
  `total_piriji_t` INT(11) UNSIGNED NOT NULL,
  `people_regi_t` SMALLINT(11) UNSIGNED NOT NULL,
  `item_regi_t` SMALLINT(11) UNSIGNED NOT NULL,
  `pireeji_regi_t` INT(11) UNSIGNED NOT NULL,
  `level_up_rank_n` INT(11) UNSIGNED NOT NULL,
  `level_up_arti_t` INT(11) UNSIGNED NOT NULL,
  `level_up_comm_t` INT(11) UNSIGNED NOT NULL,
  `level_up_attend_t` SMALLINT(11) UNSIGNED NOT NULL,
  `level_up_piriji_t` INT(11) UNSIGNED NOT NULL,
  `is_auto_n` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `is_end_n` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `active_s` VARCHAR(20) NOT NULL DEFAULT '',
  `active_m` VARCHAR(600) NOT NULL DEFAULT '',
  `requ_time_n` int NOT NULL DEFAULT '0',
  `view_time_n` int NOT NULL DEFAULT '0',
  `chng_time_n` int NOT NULL DEFAULT '0',
  PRIMARY KEY  (`num`),
  KEY `mnlv` (`mem_mn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree_770_gnu_board_extend`
--

DROP TABLE IF EXISTS `g5__piree_770_gnu_board_extend`;
CREATE TABLE IF NOT EXISTS `g5__piree_770_gnu_board_extend` (
  `num` INT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bo_table` VARCHAR(20) NOT NULL DEFAULT '',
  `gbe_n` INT(11) UNSIGNED NOT NULL,
  `wr_id` INT(11) UNSIGNED NOT NULL,
  `order_n` SMALLINT(11) UNSIGNED NOT NULL,
  `var1_n` INT(11) UNSIGNED NOT NULL,
  `var2_n` INT(11) UNSIGNED NOT NULL,
  `var1_s` VARCHAR(255) NOT NULL DEFAULT '',
  `var2_s` VARCHAR(255) NOT NULL DEFAULT '',
  `bo_div_c` VARCHAR(12) NOT NULL DEFAULT '',
  `title_s` VARCHAR(255) NOT NULL DEFAULT '',
  `arti_all_t` INT(11) UNSIGNED NOT NULL,
  `arti_new_t` INT(11) UNSIGNED NOT NULL,
  `arti_7d_t` INT(11) UNSIGNED NOT NULL,
  `arti_1m_t` INT(11) UNSIGNED NOT NULL,
  `arti_1y_t` INT(11) UNSIGNED NOT NULL,
  `regi_time_n` INT(11) UNSIGNED NOT NULL,
  `modi_time_n` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY  (`num`),
  KEY `kor_n` (`order_n`),
  KEY `kbo_or` (`bo_table`, `order_n`),
  KEY `kbo_wr` (`bo_table`, `wr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
