
-- 작성날짜 : 2015년 08월 01일 토요일 오전 04시 24분 - 날씨 맑음

-- 피리 > 피리 설정 관리 > 설정 관리 DB SCHEMA 화일

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree__program_sam`
--

DROP TABLE IF EXISTS `g5__piree__program_sam`;
CREATE TABLE IF NOT EXISTS `g5__piree__program_sam` (
  `pgs_tbl_n` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pgs_grp_n` SMALLINT(11) UNSIGNED NOT NULL,
  `pgs_user_n` INT(11) UNSIGNED NOT NULL,
  `pgs_prog_n` INT(11) UNSIGNED NOT NULL,
  `pgs_prog_c` VARCHAR(255) NOT NULL,
  `pgs_prog_s` VARCHAR(255) NOT NULL DEFAULT '',
  `pgs_version_s` VARCHAR(60) NOT NULL,

  `pgs_prog_memo_s` VARCHAR(255) NOT NULL DEFAULT '',
  `pgs_domain_s` VARCHAR(255) NOT NULL DEFAULT '',
  `pgs_is_paid` TINYINT(4) UNSIGNED NOT NULL,

  `pgs_ppgp_c` VARCHAR(255) NOT NULL DEFAULT '',

  `pgs_regi_site_n` VARCHAR(255) NOT NULL DEFAULT '',
  `pgs_regi_prog_n` VARCHAR(255) NOT NULL DEFAULT '',

  `pgs_phs_code_A` VARCHAR(255) NOT NULL DEFAULT '',
  `pgs_phs_code_B` VARCHAR(255) NOT NULL DEFAULT '',

  `pgs_use_pc_c` TINYINT(4) UNSIGNED NOT NULL,
  `pgs_skin_pc_c` VARCHAR(255) NOT NULL DEFAULT '',
  `pgs_use_mo_c` TINYINT(4) UNSIGNED NOT NULL,
  `pgs_skin_mo_c` VARCHAR(255) NOT NULL DEFAULT '',

  `pgs_cf_1_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_2_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_3_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_4_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_5_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_6_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_7_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_8_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_9_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_10_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_11_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_12_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_13_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_14_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_15_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_16_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_17_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_18_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_19_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_20_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_21_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_22_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_23_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_24_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_25_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_26_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_27_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_28_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_29_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_30_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_31_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_32_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_33_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_34_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_35_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_36_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_37_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_38_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_39_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_40_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_41_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_42_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_43_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_44_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_45_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_46_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_47_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_48_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_49_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_50_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_51_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_52_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_53_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_54_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_55_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_56_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_57_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_58_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_59_n` INT NOT NULL DEFAULT '0',
  `pgs_cf_60_n` INT NOT NULL DEFAULT '0',

  `pgs_cf_1_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_2_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_3_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_4_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_5_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_6_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_7_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_8_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_9_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_10_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_11_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_12_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_13_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_14_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_15_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_16_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_17_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_18_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_19_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_20_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_21_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_22_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_23_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_24_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_25_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_26_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_27_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_28_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_29_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_30_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_31_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_32_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_33_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_34_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_35_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_36_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_37_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_38_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_39_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_40_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_41_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_42_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_43_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_44_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_45_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_46_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_47_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_48_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_49_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_50_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_51_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_52_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_53_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_54_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_55_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_56_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_57_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_58_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_59_s` VARCHAR(255) DEFAULT '',
  `pgs_cf_60_s` VARCHAR(255) DEFAULT '',

  `pgs_cf_1_txt` TEXT DEFAULT '',
  `pgs_cf_2_txt` TEXT DEFAULT '',
  `pgs_cf_3_txt` TEXT DEFAULT '',
  `pgs_cf_4_txt` TEXT DEFAULT '',
  `pgs_cf_5_txt` TEXT DEFAULT '',

  `pgs_lpe_1` TEXT DEFAULT '',
  `pgs_lpe_2` TEXT DEFAULT '',
	`pgs_lpe_3` TEXT DEFAULT '',
	`pgs_lpe_4` TEXT DEFAULT '',
	`pgs_lpe_5` TEXT DEFAULT '',
	`pgs_lpe_6` TEXT DEFAULT '',
	`pgs_lpe_7` TEXT DEFAULT '',
	`pgs_lpe_8` TEXT DEFAULT '',
	`pgs_lpe_9` TEXT DEFAULT '',
	`pgs_lpe_10` TEXT DEFAULT '',

  `pgs_piree_mb_id` varchar(20) NOT NULL default '',

  `pgs_regi_time_n` INT(11) UNSIGNED NOT NULL,
  `pgs_modi_time_n` INT(11) UNSIGNED NOT NULL,
  `pgs_relo_time_n` INT(11) UNSIGNED NOT NULL,
  `pgs_phsr_time_n` INT(11) UNSIGNED NOT NULL,

  PRIMARY KEY (`pgs_tbl_n`),
  UNIQUE KEY `prog_n` (`pgs_prog_n`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree__calendar`
--

DROP TABLE IF EXISTS `g5__piree__calendar`;
CREATE TABLE IF NOT EXISTS `g5__piree__calendar` (
  `num` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `g5__piree__member_active_state`
--

DROP TABLE IF EXISTS `g5__piree__member_active_state`;
CREATE TABLE IF NOT EXISTS `g5__piree__member_active_state` (

  `pms_num` int NOT NULL AUTO_INCREMENT,
  `pms_mb_mn` INT(11) UNSIGNED NOT NULL,
  `pms_mb_id` VARCHAR(20) NOT NULL DEFAULT '',

  `pms_join_day_t` SMALLINT(11) UNSIGNED NOT NULL,
  `pms_join_day_r` MEDIUMINT(11) UNSIGNED NOT NULL,

  `pms_point_n` INT(11) UNSIGNED NOT NULL,
  `pms_point_r` INT(11) UNSIGNED NOT NULL,

  `pms_article_t` INT(11) UNSIGNED NOT NULL,
  `pms_article_r` INT(11) UNSIGNED NOT NULL,

  `pms_comment_t` INT(11) UNSIGNED NOT NULL,
  `pms_comment_r` INT(11) UNSIGNED NOT NULL,

  `pms_join_time_n` INT NOT NULL DEFAULT '0',
  `pms_regist_time_n` INT NOT NULL DEFAULT '0',
  `pms_reload_time_n` INT NOT NULL DEFAULT '0',

  PRIMARY KEY  (`pms_num`),
  KEY `mnlv` (`pms_mb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `g5__piree__gnu_board_extend`
--

DROP TABLE IF EXISTS `g5__piree__gnu_board_extend`;
CREATE TABLE IF NOT EXISTS `g5__piree__gnu_board_extend` (
  `num` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `is_face_n` TINYINT(4) UNSIGNED NOT NULL,
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
