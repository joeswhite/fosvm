SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE DATABASE IF NOT EXISTS `fosvm`;


--
-- Database: `fosvm`
--

-- --------------------------------------------------------



--
-- Table structure for table `fosvm`
--

CREATE TABLE IF NOT EXISTS `fosvm` (
  `version` varchar(255) NOT NULL COMMENT 'fosvm Version'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fosvm`
--

INSERT INTO `fosvm` (`version`) VALUES
('v0.03a');

-- --------------------------------------------------------

--
-- Table structure for table `Servers`
--

CREATE TABLE IF NOT EXISTS `Servers` (
  `user` varchar(255) NOT NULL,
  `vpsid` varchar(255) NOT NULL,
  `ip1` varchar(255) NOT NULL,
  `ip2` varchar(255) NOT NULL default 'no',
  `dns1` varchar(255) NOT NULL default '208.67.222.222',
  `dns2` varchar(255) NOT NULL default '208.67.222.220',
  `dedram` varchar(255) NOT NULL,
  `burstram` varchar(255) NOT NULL,
  `diskspace` varchar(255) NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `rootpass` varchar(255) NOT NULL,
  `ostemplate` varchar(255) NOT NULL default 'ubuntu-8.10-x86',
  `onboot` varchar(3) NOT NULL default 'yes',
  `action` varchar(7) NOT NULL default 'no' COMMENT 'stop/start/restart/rebuild/destroy VPS',
  `update` varchar(6) NOT NULL default 'no' COMMENT 'upram,updisk,upip '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `Traffic`
--

CREATE TABLE IF NOT EXISTS `Traffic` (
  `ip` longtext NOT NULL,
  `measuringtime` longtext NOT NULL,
  `bytes` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Traffic`
--



-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_lvl` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--
