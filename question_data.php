<?
include ("db_connect.php");

	$questionanswers = 0;
	 $preQuestionInterest = 0; 	 	 	 	 	
	 $preQuestionEase = 0; 	 	 	 	 	 	
	 $preVisitSite = 0;	 	 	 	 	 	
	 $postFeelLost	 = 0; 	 	 	 	
	 $postFeelCircles 	 = 0; 	 	 	
	 $postFindPrevious = 0;
	 $postNavigation = 0;
	 $postDesiredLocation = 0;
	 $postDisoriented 	 = 0; 	 	 	
	 $postNoIdea = 0;
	 $postLearningSite = 0;
	 $postSkilfulEasy = 0;
	 $postEasyNav = 0;
	 $postConfDirection = 0;
	 $postRightPath = 0;
	 $postBackForward = 0;
	 $postCurrentPlace = 0;
	 $postFindPage = 0;
	 
$result = mysql_query("SELECT * FROM questionnaires WHERE questionID = '".$questionID."'");
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
?>


	 	 	 	 	
	 	 	 	 	 	
	 	 	 	 	 	



<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
function drawVisualization() {
  // Create and populate the data table.
  var data = google.visualization.arrayToDataTable([
    [' ', ' '],
    ['Is this question of interest to yourself?',  <? echo $preQuestionInterest; ?>],
    ['How easy do you think this question will be to answer?',  <? echo $preQuestionEase; ?>],
    ['Have you visited this website in the past?',  <? echo $preVisitSite; ?>]
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
    [' ', ' '],
    ['I felt lost while answering this question',  <? echo $postFeelLost; ?>],
    ['I felt like I was going around in circles',  <? echo $postFeelCircles; ?>	],
    ['It was difficult to find a page that I had previously viewed',  <? echo $postFindPrevious; ?>],
    ['Navigating between pages was a problem',  <? echo $postNavigation; ?>],
    ['I didn’t know how to get to my desired location',  <? echo $postDesiredLocation; ?>],
    ['I felt disoriented',  <? echo $postDisoriented; ?>],
    ['After browsing for a while I had no idea where to go next',  <? echo $postNoIdea; ?>],
    ['Average',  <? echo $disorientation; ?>]
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
    [' ', ' '],
    ['I was confident I was heading in the correct direction',  <? echo $postConfDirection; ?>],
    ['I was confident that I was on the right path',  <? echo $postRightPath; ?>	],
    ['I knew my current position in the web-site',  <? echo $postCurrentPlace; ?>],
    ['Average',  <? echo $disorientation_rc; ?>]
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
    [' ', ' '],
    ['Learning to use the site was easy',  <? echo $postLearningSite; ?>],
    ['Becoming skilful at using the site was easy',  <? echo $postSkilfulEasy; ?>	],
    ['The site was easy to navigate',  <? echo $postEasyNav; ?>],
    ['I had no problem going back and forward between pages',  <? echo $postBackForward; ?>],
    ['I knew my current position in the web-site',  <? echo $postCurrentPlace; ?>	],
    ['Finding a page I had been to previously was not a problem',  <? echo $postFindPage; ?>],
    ['Average',  <? echo $easeofuse; ?>]
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
    
