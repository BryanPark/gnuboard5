
-- 작성날짜 : 2015년 08월 07일 금요일 오전 02시 45분, 날씨 겨울치고 날씨 덜 추움, 맨발로도 안 시려움

-- 피리 > 피리 설정 관리 > 설정 관리 DB SCHEMA 화일

-- --------------------------------------------------------

--
-- Table structure for table test_zipcode_site_1
--

DROP TABLE IF EXISTS `test_zipcode_site_1`;
CREATE TABLE IF NOT EXISTS test_zipcode_site_1 (
  `tzs_num` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tzs_url_s` VARCHAR(255) NOT NULL,
  `tzs_email_1` VARCHAR(255) NOT NULL,
  `tzs_email_2` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`tzs_num`),
  UNIQUE KEY `uq_url` (`tzs_url_s`),
  UNIQUE KEY `uq_em_1` (`tzs_email_1`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table test_zipcode_site_2
--

DROP TABLE IF EXISTS test_zipcode_site_2;
CREATE TABLE IF NOT EXISTS test_zipcode_site_2 (
  `tzs_num` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tzs_url_s` VARCHAR(255) NOT NULL,
  `tzs_email_1` VARCHAR(255) NOT NULL,
  `tzs_email_2` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`tzs_num`),
  UNIQUE KEY `uq_url` (`tzs_url_s`),
  UNIQUE KEY `uq_em_1` (`tzs_email_1`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
