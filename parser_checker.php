<br /><br />
<form action="" method="post" enctype="multipart/form-data" name="link">
address<input name="address" type="text" value="" />
urlid<input name="urlid" type="text" value="" />
userid<input name="userid" type="text" value="" />
<input name="Submit" type="Submit" />
</form>
<?php

function convert($size)
 {
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
 }

if (isset($_POST['Submit'])) {

include ("parser.php");
include ("db_connect.php");
$link=$_POST["address"];
$webaddress=$_POST["address"];
$urlID=$_POST["urlid"];
$userID=$_POST["userid"];
$websiteno=0;

set_time_limit (120);
echo "<h1>User ".$userID."</h1>";
$resultz = mysql_query("SELECT * FROM urls WHERE userID = '". $userID ."' and url NOT LIKE '%mcmanus%'");
  echo "<table border = 1>";
  echo "<th>WebsiteNumber</th><th>Memory</th><th>Web Address</th><th>sitemap</th><th>valid html</th><th>readability</th><th>searchbox</th><th>sop</th><th>wop</th><th>tot_syl</th><th>wps</th><th>sypw</th><th>divs</th><th>images</th><th>links</th><th>linkdens</th><th>access</th>";
while($row = mysql_fetch_array($resultz))
  {
  $url = $row['url'];
  $tableid = $row['tableid'];
  $websiteno++;

  echo "<tr><td>" . $websiteno . "</td>";
    echo "<td>" . convert(memory_get_usage(true)) . "</td>";
  echo "<td>" . $url . "</td>";
  get_website_data($tableid);
  kill_dom();
  gc_collect_cycles();
  echo "</tr>";
  }  
echo "</table>";
get_website_data($urlID);




		echo "You are looking at ". $link. "<br/>";
		
		echo "<h3>Reading Information</h3>";
		
		echo "There are ". words_on_page($webaddress) ." words on the page<br/>";
        
        echo "There are ". sentences_on_page($webaddress) . " sentences on the page<br/>";
        
        echo "There are ". total_syllables($webaddress) . " syllables on the page<br/>";
        
        echo "There is an average of ". words_per_sentence($webaddress) . " words per sentance</br>";
        
        echo "There is an average of ". syllables_per_word($webaddress) . " syllables per word</br>";
        
        echo "The reading ease of the webpage is <strong>" . flesh_reading_ease($webaddress) . "</strong><br/>";
        
        echo "<h3>Navigational Information</h3>";

    	echo "There are ". tagcounter($webaddress, 'div', 'id') . " divs on the page</br>";
    	
    	echo "There are ". tagcounter($webaddress, 'img', 'src') ." images on the page<br/>";
    	
    	echo "There are ". tagcounter($webaddress, 'img', 'alt') ." alt tagged images on the page<br/>";

        echo "There are ". tagcounter($webaddress, 'a', 'href') ." links on the page<br/>";
        
        echo "The link density is ". linkdensity($webaddress) . " words per link<br/>";
        
        echo "Sitemap rating is " . sitemap_present($webaddress) . "</br>";
        
        echo "Searchbox rating is " . searchbox_present($webaddress) . "</br>";
        
        echo "Accessibility mention rating is " . accessibility_mention($webaddress) . "</br>";
        
        echo "Page Valid rating is " . check_valid($webaddress) . "</br>";

}
?>
