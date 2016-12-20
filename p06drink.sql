-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- ホスト: 127.0.0.1
-- 生成日時: 2016 年 12 月 20 日 11:08
-- サーバのバージョン: 5.5.27
-- PHP のバージョン: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `p06drink`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_drink`
--

CREATE TABLE IF NOT EXISTS `tb_drink` (
  `dk_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dk_name` varchar(64) NOT NULL,
  `dk_detail` text NOT NULL,
  `color` varchar(32) NOT NULL,
  `taste` text NOT NULL,
  `ingredients` text NOT NULL,
  `alcohol` float NOT NULL,
  `maker` varchar(64) NOT NULL,
  `price` int(11) NOT NULL,
  UNIQUE KEY `dk_id` (`dk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `tb_drink`
--

INSERT INTO `tb_drink` (`dk_id`, `dk_name`, `dk_detail`, `color`, `taste`, `ingredients`, `alcohol`, `maker`, `price`) VALUES
(1, 'ジントニック', '#鼻に抜ける爽やかな香りが特徴。 #スッキリとした口当たりに控えめな甘さがある。 #王道なスタンダードカクテル故に作り手により様々なバリエーションを見せる。 #バーテンダーの登竜門とも呼べるカクテル。 ', '赤', 'うす甘', '#ドライ・ジン #トニックウォーター #ライム（orレモン） ', 0, '', 560),
(2, 'ジントニック', '#鼻に抜ける爽やかな香りが特徴。\r\n#スッキリとした口当たりに控えめな甘さがある。\r\n#王道なスタンダードカクテル故に作り手により様々なバリエーションを見せる。\r\n#バーテンダーの登竜門とも呼べるカクテル。\r\n', 'ピンク', '少々しぶみ', '#ドライ・ジン\r\n#トニックウォーター\r\n#ライム（orレモン）\r\n', 0, '', 1250);

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_event`
--

CREATE TABLE IF NOT EXISTS `tb_event` (
  `e_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `e_name` varchar(64) NOT NULL,
  `e_detail` text NOT NULL,
  `period` varchar(64) NOT NULL,
  `place` text NOT NULL,
  `access` text NOT NULL,
  UNIQUE KEY `e_id` (`e_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- テーブルのデータのダンプ `tb_event`
--

INSERT INTO `tb_event` (`e_id`, `e_name`, `e_detail`, `period`, `place`, `access`) VALUES
(1, '西日本大堀花火大会\r\n', '☆福岡市の中心部にある大濠公園で大規模な花火大会が行われます。周囲360度から花火を鑑賞できる立地のよさが魅力で、4号玉、早打、仕掛花火やナイアガ ラなど約6000発が楽しめます。隣接する平和台陸上競技場などが有料開放され、ゆったりと観覧することができます。福岡県内だけでなく、遠方からもたく さんの人が訪れ賑わいます。\r\n', '2016年8月1日　 20:00～21:30　※雨天の時は翌日に順延 ', '福岡市中央区大濠公園\r\n', '地下鉄「大濠公園駅」からすぐ、またはＪＲ「博多駅」から西鉄バス「大濠公園」すぐ\r\n'),
(2, 'のおがた夏祭り', '☆直方リバーサイドパークを会場に、全長約1kmにわたるナイアガラ（仕掛花火）をはじめ、8号玉など豪華な花火が打ち上げられ、大輪の花が夜空を彩ります。眼前の遠賀川に映る花火を眺めながら、格別な夏の夜が過ごせます。\r\n\r\n問い合わせ先：直方商工会議所　0949-22-5500\r\n', '2016年7月31日　 花火/20:00～21:00　※雨天の時は8月2日または9日に順延 ', '福岡県直方市　直方リバーサイドパーク（直方市役所下遠賀川河川敷）\r\n', 'ＪＲ筑豊本線「直方駅」から徒歩10分\r\n');

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `uid` varchar(32) NOT NULL,
  `m_no` varchar(32) NOT NULL,
  `m_name` varchar(64) NOT NULL,
  `m_yomi` varchar(64) NOT NULL,
  `m_sex` int(11) NOT NULL,
  `m_birth` date NOT NULL,
  `m_tel` varchar(32) NOT NULL,
  `m_address` text NOT NULL,
  `m_prefer` varchar(128) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `m_no` (`m_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tb_member`
--

INSERT INTO `tb_member` (`uid`, `m_no`, `m_name`, `m_yomi`, `m_sex`, `m_birth`, `m_tel`, `m_address`, `m_prefer`) VALUES
('k01', '207052014201', '宇良 田啓太', '', 1, '1998-11-20', '090-3323-4432', '', ''),
('k02', '207052015201', '山田 奈緒美', '', 2, '1999-07-17', '090-3416-0687', '', ''),
('k03', '207052016201', '野中 健太', '', 1, '2000-08-14', '090-6789-9221', '', ''),
('k04', '207052017201', '畠山 昇平', '', 1, '1975-10-02', '080-5606-0666', '', ''),
('k05', '207052014204', '福田 奨', '', 1, '1969-01-02', '090-6789-9221', '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_order`
--

CREATE TABLE IF NOT EXISTS `tb_order` (
  `oid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(16) NOT NULL,
  `od_tel` varchar(16) NOT NULL,
  `od_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `od_address` varchar(128) NOT NULL,
  `od_memo` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `oid` (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `tb_order`
--

INSERT INTO `tb_order` (`oid`, `uid`, `od_tel`, `od_date`, `od_address`, `od_memo`, `status`) VALUES
(1, 'k01', '03-1111-1111', '2016-12-02 16:03:43', '福岡県福岡市東区', 'お願いします', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_order_detail`
--

CREATE TABLE IF NOT EXISTS `tb_order_detail` (
  `odid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `dk_id` varchar(32) NOT NULL,
  `qty` int(11) NOT NULL,
  `memo` text,
  PRIMARY KEY (`odid`),
  UNIQUE KEY `odid` (`odid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- テーブルのデータのダンプ `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`odid`, `oid`, `dk_id`, `qty`, `memo`) VALUES
(1, 1, '1', 2, NULL),
(2, 1, '2', 1, NULL),
(3, 1, '1', 1, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_role`
--

CREATE TABLE IF NOT EXISTS `tb_role` (
  `urole` int(11) NOT NULL,
  `role_name` varchar(32) NOT NULL,
  `role_detail` varchar(64) NOT NULL,
  PRIMARY KEY (`urole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tb_role`
--

INSERT INTO `tb_role` (`urole`, `role_name`, `role_detail`) VALUES
(1, '会員', '登録会員'),
(2, '店員', '店員スタッフ'),
(3, '店長', 'マスター');

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_tags`
--

CREATE TABLE IF NOT EXISTS `tb_tags` (
  `tg_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dk_id` int(11) NOT NULL,
  `tag` varchar(32) NOT NULL,
  PRIMARY KEY (`tg_id`),
  UNIQUE KEY `id` (`tg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- テーブルのデータのダンプ `tb_tags`
--

INSERT INTO `tb_tags` (`tg_id`, `dk_id`, `tag`) VALUES
(1, 1, 'あっさり');

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `uid` varchar(16) NOT NULL,
  `uname` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `upass` varchar(16) NOT NULL,
  `urole` int(11) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `urole` (`urole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tb_user`
--

INSERT INTO `tb_user` (`uid`, `uname`, `email`, `tel`, `upass`, `urole`) VALUES
('fumi', '松本　文子', 'fumi@qmail.com', '090-3343-4567', 'abcd', 2),
('goto', '後藤  智彦', 'goto@gmail.com', '092-673-0110', 'abcd', 3),
('k01', '宇良 田啓太', 'k01@gmail.com', '090-3323-4432', 'abcd', 1),
('k02', '山田 奈緒美', 'k02@gmail.com', '090-3416-0687', 'abcd', 1),
('k03', '野中 健太', 'k03@gmail.com', '090-6789-9221', 'abcd', 1),
('k04', '畠山 昇平', 'k04@gmail.com', '080-5606-0666', 'abcd', 1),
('k05', '福田 奨', 'k05@gmail.com', '090-6789-9221', 'abcd', 1);

-- --------------------------------------------------------

--
-- ビュー用の代替構造 `vw_chumon`
--
CREATE TABLE IF NOT EXISTS `vw_chumon` (
`dk_id` bigint(20) unsigned
,`dk_name` varchar(64)
,`dk_detail` text
,`color` varchar(32)
,`taste` text
,`ingredients` text
,`alcohol` float
,`maker` varchar(64)
,`price` int(11)
,`oid` bigint(20) unsigned
,`uid` varchar(16)
,`od_tel` varchar(16)
,`od_date` timestamp
,`od_address` varchar(128)
,`od_memo` text
,`status` int(11)
,`qty` decimal(32,0)
,`money` decimal(42,0)
);
-- --------------------------------------------------------

--
-- ビュー用の構造 `vw_chumon`
--
DROP TABLE IF EXISTS `vw_chumon`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_chumon` AS select `k`.`dk_id` AS `dk_id`,`k`.`dk_name` AS `dk_name`,`k`.`dk_detail` AS `dk_detail`,`k`.`color` AS `color`,`k`.`taste` AS `taste`,`k`.`ingredients` AS `ingredients`,`k`.`alcohol` AS `alcohol`,`k`.`maker` AS `maker`,`k`.`price` AS `price`,`o`.`oid` AS `oid`,`o`.`uid` AS `uid`,`o`.`od_tel` AS `od_tel`,`o`.`od_date` AS `od_date`,`o`.`od_address` AS `od_address`,`o`.`od_memo` AS `od_memo`,`o`.`status` AS `status`,sum(`d`.`qty`) AS `qty`,(`k`.`price` * sum(`d`.`qty`)) AS `money` from ((`tb_order` `o` join `tb_order_detail` `d`) join `tb_drink` `k`) where ((`o`.`oid` = `d`.`oid`) and (`d`.`dk_id` = `k`.`dk_id`)) group by `k`.`dk_id`;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`urole`) REFERENCES `tb_role` (`urole`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
