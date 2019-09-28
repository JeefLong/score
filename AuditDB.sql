
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for accessinfo
-- ----------------------------
DROP TABLE IF EXISTS `accessinfo`;
CREATE TABLE `accessinfo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ConnectionID` int(11) DEFAULT NULL,
  `ConnUser` varchar(72) DEFAULT NULL,
  `MatchUser` varchar(72) DEFAULT NULL,
  `LoginTime` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

