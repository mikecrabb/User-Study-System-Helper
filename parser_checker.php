<br /><br />
<form action="" method="post" enctype="multipart/form-data" name="link">
timeout<input name="timeout" type="text" value="" />
userid<input name="userid" type="text" value="" />
<input name="Submit" type="Submit" />
</form>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '0');
gc_enable();
function convert($size)
 {
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
 }
 
 function get_memory() {
	$memory_last_line = exec('free',$memory);
	$memory[1] = str_replace("     ", "-",$memory[1]);
	$parts = explode(" ",$memory[1]);
	$parts2 = explode("-",$parts[3]);
	$mem_percent = $parts2[1] / $parts2[0] * 100;
	$mem_percent = round($mem_percent);
	
	return $mem_percent;
	}



if (isset($_POST['Submit'])) {

include ("parser.php");
include ("db_connect.php");

$timeout=$_POST["timeout"];
$userID=$_POST["userid"];
$websiteno=0;

echo "<h1>User ".$userID."</h1>";
  set_time_limit($timeout);
  $webnumber = 0;
  $rowsdone = 0;
$resultz = mysql_query("SELECT * FROM urls WHERE userID = '". $userID ."' and url NOT LIKE '%mcmanus%' and url NOT LIKE '%wikipedia%'");
//$resultz = mysql_query("SELECT * FROM urls WHERE userID = '". $userID ."' ");

$numberofrows = mysql_num_rows($resultz);
echo "<h3>" . $numberofrows . "</h3>"; 

//$resultz = mysql_query("SELECT * FROM urls WHERE tableid = '3'");
while($row = mysql_fetch_array($resultz))
	{
	  	$url = $row['url'];
	  	$tableid = $row['tableid'];
	  	
		$result3 = mysql_query("SELECT * FROM website_characteristics WHERE testableFunction != ''");
		//$result3 = mysql_query("SELECT * FROM website_characteristics WHERE characteristicID= '7'");
		while($row = mysql_fetch_array($result3))
		{
			$characteristicID = $row['characteristicID'];
			$characteristicName = $row['characteristicName'];
			$characteristicValue = get_website_data($tableid, $characteristicID);
			
				mysql_query("INSERT INTO page_characteristics ( characteristicID, characteristicValue, tableid) VALUES ('" . $characteristicID . "', '" . $characteristicValue . "', '" . $tableid . "')") ;
				
				echo $webnumber . " " . $characteristicID . " " . $characteristicName . " " . $characteristicValue . " " . $tableid . "".$url;
				//echo $characteristicName . " = " . $characteristicValue ."<br/>";
				$webnumber++;
						flush();
		ob_flush();	
		}
	$rowsdone++;
	echo "<h4>" .$rowsdone. "/" . $numberofrows . " - Memory at ".get_memory()."%</h4>";
	//echo " ---NEXT--- ";
  	kill_dom();
  	gc_collect_cycles();
	}
}

/*

		?> "You are looking at <? echo $link; ?> <br/>; <?
		
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
*/
?>
