<?php
$preQuestionInterest= $_POST["preQuestionInterest"];
$preQuestionEase= $_POST["preQuestionEase"];
$preVisitSite= $_POST["preVisitSite"];
$postFeelLost= $_POST["postFeelLost"];
$postFeelCircles= $_POST["postFeelCircles"];
$postFindPrevious= $_POST["postFindPrevious"];
$postNavigation= $_POST["postNavigation"];
$postDesiredLocation= $_POST["postDesiredLocation"];
$postDisoriented= $_POST["postDisoriented"];
$postNoIdea= $_POST["postNoIdea"];
$postLearningSite=$_POST["postLearningSite"];
$postSkilfulEasy=$_POST["postSkilfulEasy"];
$postEasyNav=$_POST["postEasyNav"];
$postConfDirection=$_POST["postConfDirection"];
$postRightPath=$_POST["postRightPath"];
$postBackForward=$_POST["postBackForward"];
$postCurrentPlace=$_POST["postCurrentPlace"];
$postFindPage=$_POST["postFindPage"];
$userID=$_POST["userID"];
$questionID=$_POST["questionID"];


include ("db_connect.php");

mysql_query("INSERT INTO questionnaires ( preQuestionInterest, preQuestionEase, preVisitSite, postFeelLost, postFeelCircles, postFindPrevious, postNavigation, postDesiredLocation, postDisoriented, postNoIdea, postLearningSite, postSkilfulEasy, postEasyNav, postConfDirection, postRightPath, postBackForward, postCurrentPlace, postFindPage, userID, questionID) VALUES ('" . $preQuestionInterest . "', '" . $preQuestionEase . "', '" . $preVisitSite . "', '" . $postFeelLost . "', '" . $postFeelCircles . "', '" . $postFindPrevious . "','" . $postNavigation . "','" . $postDesiredLocation . "', '" . $postDisoriented . "', '" . $postNoIdea . "', '" . $postLearningSite . "', '" . $postSkilfulEasy . "', '" . $postEasyNav . "', '" . $postConfDirection . "', '" . $postRightPath . "', '" . $postBackForward . "', '" . $postCurrentPlace . "', '" . $postFindPage . "', '" . $userID . "', '" . $questionID . "')") ;

$URL="insert_answers.php";

header ("Location: $URL");
?>


