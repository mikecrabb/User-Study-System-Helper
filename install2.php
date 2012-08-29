<?
include ("db_connect.php");
mysql_query(" CREATE TABLE IF NOT EXISTS `currentStudy` (`userID` varchar(5),`currentPosition` varchar(5) COLLATE latin1_german2_ci NOT NULL,PRIMARY KEY (`userID`,`currentPosition`)) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci");

mysql_query("CREATE TABLE IF NOT EXISTS `participant` (`participant_ID` int(5) NOT NULL AUTO_INCREMENT, `participant_name` varchar(50) NOT NULL,PRIMARY KEY (`participant_ID`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5");

mysql_query("CREATE TABLE IF NOT EXISTS `participant_data` (
  `data_ID` int(5) NOT NULL AUTO_INCREMENT,
  `data_name` varchar(200) NOT NULL,
  `data_description` varchar(1000) NOT NULL,
  PRIMARY KEY (`data_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14");


mysql_query("CREATE TABLE IF NOT EXISTS `participant_data_information` (
  `participant_data_ID` int(10) NOT NULL AUTO_INCREMENT,
  `data_value` varchar(50) NOT NULL,
  `data_ID` int(10) NOT NULL,
  `participant_ID` int(10) NOT NULL,
  PRIMARY KEY (`participant_data_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9");

mysql_query("CREATE TABLE IF NOT EXISTS `questionnaires` (
  `questionnaire_ID` int(5) NOT NULL AUTO_INCREMENT,
  `questionnaire_name` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`questionnaire_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1");

mysql_query("CREATE TABLE IF NOT EXISTS `questionnaire_data` (
  `q_data_ID` int(5) NOT NULL AUTO_INCREMENT,
  `q_answer` varchar(100) NOT NULL,
  `questionnaire_ID` int(5) NOT NULL,
  `questionnaire_question_ID` int(5) NOT NULL,
  `participant_ID` int(5) NOT NULL,
  `question_ID` int(5) NOT NULL,
  PRIMARY KEY (`q_data_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");

mysql_query("CREATE TABLE IF NOT EXISTS `questionnaire_questions` (
  `question_ID` int(5) NOT NULL AUTO_INCREMENT,
  `question_text` varchar(500) NOT NULL,
  PRIMARY KEY (`question_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");

mysql_query("CREATE TABLE IF NOT EXISTS `questionOrder` (
  `questionOrderID` int(3) NOT NULL AUTO_INCREMENT,
  `questionID` int(4) NOT NULL,
  `userID` int(4) NOT NULL,
  `orderID` int(4) NOT NULL,
  PRIMARY KEY (`questionOrderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=682");

mysql_query("CREATE TABLE IF NOT EXISTS `questions` (
  `questionID` int(4) NOT NULL AUTO_INCREMENT,
  `questionWebsite` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `questionText` varchar(300) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`questionID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=4");

mysql_query("CREATE TABLE IF NOT EXISTS `question_data` (
  `q_data_ID` int(11) NOT NULL AUTO_INCREMENT,
  `q_data_name` varchar(500) NOT NULL,
  `q_data_description` varchar(1000) NOT NULL,
  PRIMARY KEY (`q_data_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4");

mysql_query("CREATE TABLE IF NOT EXISTS `question_data_information` (
  `question_data_ID` int(10) NOT NULL AUTO_INCREMENT,
  `q_data_value` varchar(500) NOT NULL,
  `q_data_ID` int(10) NOT NULL,
  `question_ID` int(10) NOT NULL,
  PRIMARY KEY (`question_data_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4");

mysql_query("CREATE TABLE IF NOT EXISTS `studyTimestamps` (
  `studyTimestampID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(3) COLLATE latin1_german2_ci NOT NULL,
  `questionID` varchar(3) COLLATE latin1_german2_ci NOT NULL,
  `timestamp` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `stampType` varchar(10) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`studyTimestampID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=1");

mysql_query("CREATE TABLE IF NOT EXISTS `systemusers` (
  `userName` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `name` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci");

mysql_query("CREATE TABLE IF NOT EXISTS `system_info` (
  `variable` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  PRIMARY KEY (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

$username= $_POST["username"];
$password= $_POST["password"];
$title= $_POST["study_title"];
$subtitle= $_POST["study_sub"];
$password = md5($password);

mysql_query("INSERT INTO systemusers (userName, password) VALUES ('" . $username . "', '" . $password ."')");
mysql_query("INSERT INTO system_info (variable, value) VALUES ('main_title', '" . $title ."')");
mysql_query("INSERT INTO system_info (variable, value) VALUES ('sub_title', '" . $subtitle ."')");

$URL="finish_install.php";

header ("Location: $URL");

?>