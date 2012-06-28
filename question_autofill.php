<?php include ("db_connect.php"); ?>
<?php include ("parser.php"); ?>
<?php
$questionID = $_POST["questionID"];

$result = mysql_query("SELECT * FROM questions WHERE questionID = '".$questionID."'");
while($row = mysql_fetch_array($result))
  {
  $questionWebsite = $row['questionWebsite'];
  }
$questionWebsite = "http://" . $questionWebsite;

$result = mysql_query("SELECT * FROM website_characteristics WHERE testableFunction IS NOT NULL");
while($row = mysql_fetch_array($result))
  {
  $id = $row['characteristicID'];
  $functiontest = $row['testableFunction'];
  $functionresult = eval($functiontest);
  mysql_query("INSERT INTO page_characteristics ( characteristicID, characteristicValue, urlID) VALUES ('" . $id . "', '" . $functionresult . "', '" . $urlID . "')")
  
  
  $questionWebsite = $row['questionWebsite'];
  }  
  
  
$webaddress = "http://" . $questionWebsite;
$wordsonpage = words_on_page($webaddress);
$sentencesonpage = sentences_on_page($webaddress);
$totalsyllables = total_syllables($webaddress);
$wordspersentence = words_per_sentence($webaddress);
$syllablesperword = syllables_per_word($webaddress);
$fleshkincaid = flesh_reading_ease($webaddress);
$sitemap = sitemap_present($webaddress);
$div = tagcounter($webaddress, 'div', 'id');
$images = tagcounter($webaddress, 'img', 'src');
$links = tagcounter($webaddress, 'a', 'href');
$linkdensity = linkdensity($webaddress);
$searchbox = searchbox_present($webaddress);
$accessibilitymention = accessibility_mention($webaddress);
$validhtml = check_valid($webaddress);




include ("db_connect.php");

mysql_query("UPDATE questions SET
syllablesperword= '" . $syllablesperword . "',
sentenceonpage= '" . $sentencesonpage . "',
wordsonpage= '" . $wordsonpage . "',
syllablesonpage= '" . $totalsyllables . "',
wordspersentence= '" . $wordspersentence . "',
siteMap='" . $sitemap . "',
fleshkincaid='" . $fleshkincaid . "',
searchbox='" . $searchbox . "',
divs='" . $div . "',
images='" . $images . "',
w3cvalidhtml='" . $validhtml . "',
links='" . $links . "',
linkdensity='" . $linkdensity . "',
accessibilitymention='" . $accessibilitymention . "'
WHERE questionID = '" . $questionID . "'");


$URL="question_information.php?qno=". $questionID;

header ("Location: $URL");
?>


