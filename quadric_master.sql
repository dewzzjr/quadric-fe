SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `regional` (
  `tanggal` date NOT NULL,
  `reg1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reg2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reg3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reg5` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reg6` decimal(10,2) NOT NULL DEFAULT '0.00',
  `reg7` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yreg1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yreg2` decimal(10,2) DEFAULT '0.00',
  `yreg3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yreg5` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yreg6` decimal(10,2) NOT NULL DEFAULT '0.00',
  `yreg7` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ytotal` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `reg_data` (
  `ALPRO` varchar(10) DEFAULT NULL,
  `BEFORE_CA` varchar(10) DEFAULT NULL,
  `CHANEL` varchar(50) DEFAULT NULL,
  `CHANEL_APP` varchar(50) DEFAULT NULL,
  `CSEG` tinyint(4) DEFAULT NULL,
  `Cancel` varchar(10) DEFAULT NULL,
  `MTTI_GROUP` varchar(50) DEFAULT NULL,
  `MTD MTTI` decimal(10,2) DEFAULT NULL,
  `SLG` varchar(50) DEFAULT NULL,
  `APP` varchar(50) DEFAULT NULL,
  `DURASI` decimal(10,2) DEFAULT NULL,
  `DURASI_FO` decimal(10,2) DEFAULT NULL,
  `DURASI_PI` decimal(10,2) DEFAULT NULL,
  `DURASI_RE` decimal(10,2) DEFAULT NULL,
  `DURASI_UN` decimal(10,2) DEFAULT NULL,
  `DURASI_VA` decimal(10,2) DEFAULT NULL,
  `ISISKA_TGLVA` datetime DEFAULT NULL,
  `JENISPSB` varchar(50) DEFAULT NULL,
  `KANDATEL` varchar(50) DEFAULT NULL,
  `KAWASAN` tinyint(4) DEFAULT NULL,
  `KODEFIKASI_SC` varchar(50) DEFAULT NULL,
  `NDEM` int(11) DEFAULT NULL,
  `Number of Records` tinyint(4) DEFAULT NULL,
  `ORDER_ID` int(11) NOT NULL,
  `PS_DONE` tinyint(4) DEFAULT NULL,
  `REASON_CANCEL` varchar(500) DEFAULT NULL,
  `SC_TGLCA` datetime DEFAULT NULL,
  `SC_TGLCREATE` datetime DEFAULT NULL,
  `SC_TGLFO` datetime DEFAULT NULL,
  `SC_TGLPI` datetime DEFAULT NULL,
  `SC_TGLPS` datetime DEFAULT NULL,
  `SC_TGLUNSC` datetime DEFAULT NULL,
  `SLG (copy)` varchar(50) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `STATUS_INDIHOME` varchar(50) DEFAULT NULL,
  `STATUS_SERVICE` varchar(50) DEFAULT NULL,
  `TYPE_PIPE` varchar(500) DEFAULT NULL,
  `WITEL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usertype` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT IGNORE INTO `user` (`id`, `username`, `usertype`, `password`, `display_name`) VALUES(1, 'admin', 'admin', '7815696ecbf1c96e6894b779456d330e', 'Administrator');


ALTER TABLE `regional`
  ADD PRIMARY KEY (`tanggal`);

ALTER TABLE `reg_data`
  ADD PRIMARY KEY (`ORDER_ID`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
