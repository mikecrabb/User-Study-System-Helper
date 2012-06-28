<?
include ("db_connect.php");

	$questionanswers = 0;
	$questionanswers2 = 0;
	 $preQuestionInterest = 0; 	 	 	 	 	
	 $preQuestionEase = 0; 	 	 	 	 	 	
	 $preVisitSite = 0;	 	 	 	 	 	
	 $postFeelLost = 0; 	 	 	 	
	 $postFeelCircles = 0; 	 	 	
	 $postFindPrevious = 0;
	 $postNavigation = 0;
	 $postDesiredLocation = 0;
	 $postDisoriented = 0; 	 	 	
	 $postNoIdea = 0;
	 $postLearningSite = 0;
	 $postSkilfulEasy = 0;
	 $postEasyNav = 0;
	 $postConfDirection = 0;
	 $postRightPath = 0;
	 $postBackForward = 0;
	 $postCurrentPlace = 0;
	 $postFindPage = 0;	 
$result = mysql_query("SELECT * FROM questionnaires WHERE questionID = '".$qID."' and userID = '" . $userID . "'");
$result2 = mysql_query("SELECT * FROM questionnaires WHERE userID = '" . $userID . "'");
while($row = mysql_fetch_array($result))
  {
     $questionanswers++;
	 $preQuestionInterest = $preQuestionInterest + $row['preQuestionInterest'] - 1;	 	 	
	 $preQuestionEase = $preQuestionEase + $row['preQuestionEase'] - 1; 	 	 	 	
	 $preVisitSite = $preVisitSite + $row['preVisitSite'] - 1;
	 $postFeelLost = $postFeelLost + $row['postFeelLost'] - 1; 	 	 	
	 $postFeelCircles = $postFeelCircles + $row['postFeelCircles'] - 1;
	 $postFindPrevious = $postFindPrevious + $row['postFindPrevious'] - 1;
	 $postNavigation = $postNavigation + $row['postNavigation'] - 1;
	 $postDesiredLocation = $postDesiredLocation + $row['postDesiredLocation'] - 1;
	 $postDisoriented = $postDisoriented + $row['postDisoriented'] - 1;
	 $postNoIdea = $postNoIdea + $row['postNoIdea'] - 1;
	 $postLearningSite = $postLearningSite + $row['postLearningSite'] - 1;
	 $postSkilfulEasy = $postSkilfulEasy + $row['postSkilfulEasy'] - 1;
	 $postEasyNav = $postEasyNav + $row['postEasyNav'] - 1;
	 $postConfDirection = $postConfDirection + $row['postConfDirection'] - 1;
	 $postRightPath = $postRightPath + $row['postRightPath'] - 1;
	 $postBackForward = $postBackForward + $row['postBackForward'] - 1;
	 $postCurrentPlace = $postCurrentPlace + $row['postCurrentPlace'] - 1;
	 $postFindPage = $postFindPage + $row['postFindPage'] - 1;
  }
  
  	 $preQuestionInterest = round($preQuestionInterest / $questionanswers * 33.33333); 	 	
	 $preQuestionEase = round($preQuestionEase / $questionanswers * 33.33333); 		 	 	 	
	 $preVisitSite = round($preVisitSite / $questionanswers * 50); 	
	 $postFeelLost = round($postFeelLost / $questionanswers * 33.33333); 		
	 $postFeelCircles = round($postFeelCircles / $questionanswers * 33.33333); 	
	 $postFindPrevious = round($postFindPrevious / $questionanswers * 33.33333); 	
	 $postNavigation = round($postNavigation / $questionanswers * 33.33333); 	
	 $postDesiredLocation = round($postDesiredLocation / $questionanswers * 33.33333); 	
	 $postDisoriented = round($postDisoriented / $questionanswers * 33.33333); 	
	 $postNoIdea = round($postNoIdea / $questionanswers * 33.33333); 	
	 $postLearningSite = round($postLearningSite / $questionanswers * 33.33333); 	
	 $postSkilfulEasy = round($postSkilfulEasy / $questionanswers * 33.33333); 	
	 $postEasyNav = round($postEasyNav / $questionanswers * 33.33333); 	
	 $postConfDirection = round($postConfDirection / $questionanswers * 33.33333); 	
	 $postRightPath = round($postRightPath / $questionanswers * 33.33333); 	
	 $postBackForward = round($postBackForward / $questionanswers * 33.33333); 	
	 $postCurrentPlace = round($postCurrentPlace / $questionanswers * 33.33333); 	
	 $postFindPage = round($postFindPage / $questionanswers * 33.33333);
	 
	$disorientation = $postFeelLost	+ $postFeelCircles + $postFindPrevious + $postNavigation + $postDesiredLocation + $postDisoriented + $postNoIdea;
	$disorientation = round($disorientation / 7);
	$easeofuse = $postLearningSite + $postSkilfulEasy + $postEasyNav + $postBackForward + $postCurrentPlace + $postFindPage;
	$easeofuse = round($easeofuse / 7);
    $disorientation_rc = $postConfDirection + $postRightPath + $postCurrentPlace;
    $disorientation_rc = round($disorientation_rc / 3);
    
    while($row = mysql_fetch_array($result2))
  {
     $questionanswers2++;
	 $preQuestionInterest2 = $preQuestionInterest2 + $row['preQuestionInterest'] - 1;	 	 	
	 $preQuestionEase2 = $preQuestionEase2 + $row['preQuestionEase'] - 1; 	 	 	 	
	 $preVisitSite2 = $preVisitSite2 + $row['preVisitSite'] - 1;
	 $postFeelLost2 = $postFeelLost2 + $row['postFeelLost'] - 1; 	 	 	
	 $postFeelCircles2 = $postFeelCircles2 + $row['postFeelCircles'] - 1;
	 $postFindPrevious2 = $postFindPrevious2 + $row['postFindPrevious'] - 1;
	 $postNavigation2 = $postNavigation2 + $row['postNavigation'] - 1;
	 $postDesiredLocation2 = $postDesiredLocation2 + $row['postDesiredLocation'] - 1;
	 $postDisoriented2 = $postDisoriented2 + $row['postDisoriented'] - 1;
	 $postNoIdea2 = $postNoIdea2 + $row['postNoIdea'] - 1;
	 $postLearningSite2 = $postLearningSite2 + $row['postLearningSite'] - 1;
	 $postSkilfulEasy2 = $postSkilfulEasy2 + $row['postSkilfulEasy'] - 1;
	 $postEasyNav2 = $postEasyNav2 + $row['postEasyNav'] - 1;
	 $postConfDirection2 = $postConfDirection2 + $row['postConfDirection'] - 1;
	 $postRightPath2 = $postRightPath2 + $row['postRightPath'] - 1;
	 $postBackForward2 = $postBackForward2 + $row['postBackForward'] - 1;
	 $postCurrentPlace2 = $postCurrentPlace2 + $row['postCurrentPlace'] - 1;
	 $postFindPage2 = $postFindPage2 + $row['postFindPage'] - 1;
  }
  	 $preQuestionInterest2 = round($preQuestionInterest2 / $questionanswers2 * 33.33333); 	 	
	 $preQuestionEase2 = round($preQuestionEase2 / $questionanswers2 * 33.33333); 		 	 	 	
	 $preVisitSite2 = round($preVisitSite2 / $questionanswers2 * 50); 	
	 $postFeelLost2 = round($postFeelLost2 / $questionanswers2 * 33.33333); 		
	 $postFeelCircles2 = round($postFeelCircles2 / $questionanswers2 * 33.33333); 	
	 $postFindPrevious2 = round($postFindPrevious2 / $questionanswers2 * 33.33333); 	
	 $postNavigation2 = round($postNavigation2 / $questionanswers2 * 33.33333); 	
	 $postDesiredLocation2 = round($postDesiredLocation2 / $questionanswers2 * 33.33333); 	
	 $postDisoriented2 = round($postDisoriented2 / $questionanswers2 * 33.33333); 	
	 $postNoIdea2 = round($postNoIdea2 / $questionanswers2 * 33.33333); 	
	 $postLearningSite2 = round($postLearningSite2 / $questionanswers2 * 33.33333); 	
	 $postSkilfulEasy2 = round($postSkilfulEasy2 / $questionanswers2 * 33.33333); 	
	 $postEasyNav2 = round($postEasyNav2 / $questionanswers2 * 33.33333); 	
	 $postConfDirection2 = round($postConfDirection2 / $questionanswers2 * 33.33333); 	
	 $postRightPath2 = round($postRightPath2 / $questionanswers2 * 33.33333); 	
	 $postBackForward2 = round($postBackForward2 / $questionanswers2 * 33.33333); 	
	 $postCurrentPlace2 = round($postCurrentPlace2 / $questionanswers2 * 33.33333); 	
	 $postFindPage2 = round($postFindPage2 / $questionanswers2 * 33.33333);
	 
	$disorientation2 = $postFeelLost2	+ $postFeelCircles2 + $postFindPrevious2 + $postNavigation2 + $postDesiredLocation2 + $postDisoriented2 + $postNoIdea2;
	$disorientation2 = round($disorientation2 / 7);
	$easeofuse2 = $postLearningSite2 + $postSkilfulEasy2 + $postEasyNav2 + $postBackForward2 + $postCurrentPlace2 + $postFindPage2;
	$easeofuse2 = round($easeofuse2 / 7);
    $disorientation_rc2 = $postConfDirection2 + $postRightPath2 + $postCurrentPlace2;
    $disorientation_rc2 = round($disorientation_rc2 / 3);
    
    
?>


	 	 	 	 	
	 	 	 	 	 	
	 	 	 	 	 	



<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
function drawVisualization() {
  // Create and populate the data table.
  var data = google.visualization.arrayToDataTable([
    [' ', 'This Question', 'Average'],
    ['Is this question of interest to yourself?',  <? echo $preQuestionInterest; ?>,  <? echo $preQuestionInterest2; ?>],
    ['How easy do you think this question will be to answer?',  <? echo $preQuestionEase; ?>,  <? echo $preQuestionEase2; ?>],
    ['Have you visited this website in the past?',  <? echo $preVisitSite; ?>,  <? echo $preVisitSite2; ?>]
  ]);

  // Create and draw the visualization.
  new google.visualization.ColumnChart(document.getElementById('previsit')).
      draw(data,
           {title:"Pre Visit Questions",
            width:300, height:200, vAxis: {minValue:0, maxValue:100},
            hAxis: {title: " "}}
      );
}

      google.setOnLoadCallback(drawVisualization);
    </script>    
    <div id="previsit" style="width: 300px; height: 200px;"></div>

<div id="infobox">
<h4>This question has been answered <strong><? echo $questionanswers; ?></strong> times</h4>
</div>    
    
    
<script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
function drawVisualization() {
  // Create and populate the data table.
  var data = google.visualization.arrayToDataTable([
    [' ', 'This Question', 'Average'],
    ['I felt lost while answering this question',  <? echo $postFeelLost; ?>,  <? echo $postFeelLost2; ?>],
    ['I felt like I was going around in circles',  <? echo $postFeelCircles; ?>	,  <? echo $postFeelCircles2; ?>	],
    ['It was difficult to find a page that I had previously viewed',  <? echo $postFindPrevious; ?>,  <? echo $postFindPrevious2; ?>],
    ['Navigating between pages was a problem',  <? echo $postNavigation; ?>,  <? echo $postNavigation2; ?>],
    ['I didn’t know how to get to my desired location',  <? echo $postDesiredLocation; ?>,  <? echo $postDesiredLocation2; ?>],
    ['I felt disoriented',  <? echo $postDisoriented; ?>,  <? echo $postDesiredLocation2; ?>],
    ['After browsing for a while I had no idea where to go next',  <? echo $postNoIdea; ?>,  <? echo $postNoIdea2; ?>],
    ['Average',  <? echo $disorientation; ?>,  <? echo $disorientation2; ?>]
  ]);

  // Create and draw the visualization.
  new google.visualization.ColumnChart(document.getElementById('disorientation')).
      draw(data,
           {title:"Disorientation",
            width:433, height:200, vAxis: {minValue:0, maxValue:100},
            hAxis: {title: " "}}
      );
}

      google.setOnLoadCallback(drawVisualization);
    </script>

<div id="disorientation" style="width: 433px; height: 200px;"></div>
    
<script type="text/javascript">
function drawVisualization() {
  // Create and populate the data table.
  var data = google.visualization.arrayToDataTable([
    [' ', 'This Question', 'Average'],
    ['I was confident I was heading in the correct direction',  <? echo $postConfDirection; ?>,  <? echo $postConfDirection2; ?>],
    ['I was confident that I was on the right path',  <? echo $postRightPath; ?>,  <? echo $postRightPath2; ?>	],
    ['I knew my current position in the web-site',  <? echo $postCurrentPlace; ?>,  <? echo $postCurrentPlace2; ?>],
    ['Average',  <? echo $disorientation_rc; ?>,  <? echo $disorientation_rc2; ?>]
  ]);

  // Create and draw the visualization.
  new google.visualization.ColumnChart(document.getElementById('disorientation_rc')).
      draw(data,
           {title:"Disorientation - Reverse Coded",
            width:198, height:200, vAxis: {minValue:0, maxValue:100},
            hAxis: {title: " "}}
      );
}

      google.setOnLoadCallback(drawVisualization);
    </script>    
<div id="disorientation_rc" style="width: 198px; height: 200px;"></div>     
<script type="text/javascript">
function drawVisualization() {
  // Create and populate the data table.
  var data = google.visualization.arrayToDataTable([
    [' ', 'This Question', 'Average'],
    ['Learning to use the site was easy',  <? echo $postLearningSite; ?>,  <? echo $postLearningSite2; ?>],
    ['Becoming skilful at using the site was easy',  <? echo $postSkilfulEasy; ?>,  <? echo $postSkilfulEasy2; ?>		],
    ['The site was easy to navigate',  <? echo $postEasyNav; ?>,  <? echo $postEasyNav2; ?>],
    ['I had no problem going back and forward between pages',  <? echo $postBackForward; ?>,  <? echo $postBackForward2; ?>],
    ['I knew my current position in the web-site',  <? echo $postCurrentPlace; ?>,  <? echo $postCurrentPlace2; ?>	],
    ['Finding a page I had been to previously was not a problem',  <? echo $postFindPage; ?>,  <? echo $postFindPage2; ?>],
    ['Average',  <? echo $easeofuse; ?>,  <? echo $easeofuse2; ?>]
  ]);

  // Create and draw the visualization.
  new google.visualization.ColumnChart(document.getElementById('easeofuse')).
      draw(data,
           {title:"Ease of Use",
            width:650, height:200, vAxis: {minValue:0, maxValue:100},
            hAxis: {title: " "}}
      );
}

      google.setOnLoadCallback(drawVisualization);
    </script>   
    <div id="easeofuse" style="width: 650px; height: 200px;"></div>
    
