<?php include ("header.php"); ?>
<?php include ("db_connect.php"); ?>
<div class="main_content">
<form name="questionform" action="insert_answers2.php" method="post">
<div id="details">
<table id="participanttable">
	<tbody>
		<tr>
			<td>Is this question of interest to yourself?</td>
			<td><input type="text" name="preQuestionInterest" size="5" autofocus="autofocus"/></td>
		</tr>
		<tr>
			<td>How easy do you think this question will be to answer?</td>
			<td><input type="text" name="preQuestionEase" size="5" /></td>
		</tr>
		<tr>
			<td>Have you visited this website before?</td>
			<td><input type="text" name="preVisitSite" size="5" /></td>
		</tr>
		<tr>
			<td>I felt lost while answering this question</td>
			<td><input type="text" name="postFeelLost" size="5" /></td>
		</tr>
		<tr>
			<td>I felt like I was going around in circles</td>
			<td><input type="text" name="postFeelCircles" size="5" /></td>
		</tr>
		<tr>
			<td>It was difficult to find a page that I had previously viewed</td>
			<td><input type="text" name="postFindPrevious" size="5" /></td>
		</tr>
		<tr>
			<td>Navigating between pages was a problem</td>
			<td><input type="text" name="postNavigation" size="5" /></td>
		</tr>
		<tr>
			<td>I didn’t know how to get to my desired location</td>
			<td><input type="text" name="postDesiredLocation" size="5" /></td>
		</tr>
		<tr>
			<td>I felt disoriented</td>
			<td><input type="text" name="postDisoriented" size="5" /></td>
		</tr>
		<tr>
			<td>After browsing for a while I had no idea where to go next</td>
			<td><input type="text" name="postNoIdea" size="5" /></td>
		</tr>
		<tr>
			<td>Learning to use the site was easy</td>
			<td><input type="text" name="postLearningSite" size="5" /></td>
		</tr>
		<tr>
			<td>Becoming skilful at using the site was easy</td>
			<td><input type="text" name="postSkilfulEasy" size="5" /></td>
		</tr>
		<tr>
			<td>The site was easy to navigate</td>
			<td><input type="text" name="postEasyNav" size="5" /></td>
		</tr>
		<tr>
			<td>I was confident I was heading in the correct direction</td>
			<td><input type="text" name="postConfDirection" size="5" /></td>
		</tr>
		<tr>
			<td>I was confident that I was on the right path</td>
			<td><input type="text" name="postRightPath" size="5" /></td>
		</tr>
		<tr>
			<td>I had no problem going back and forward between pages</td>
			<td><input type="text" name="postBackForward" size="5" /></td>
		</tr>
		<tr>
			<td>I knew my current position in the web-site</td>
			<td><input type="text" name="postCurrentPlace" size="5" /></td>
		</tr>
		
		<tr>
			<td>Finding a page I had been to previously was not a problem</td>
			<td><input type="text" name="postFindPage" size="5" /></td>
		</tr>
		
	</tbody>
</table>


  </div>
  
  
  <div id="chart">
<table id="detailstable">
	<tbody>
		<tr>
			<th>Participant ID</th>
			<td><input type="text" name="userID" size="5" /></td>
		</tr>
		<tr>
			<th>Question ID</th>
			<td><input type="text" name="questionID" size="5" /></td>

		</tr>
			</tbody>
			
			</form>
</table>
<input type="submit" class="submitbutton" value="Submit">
</div>