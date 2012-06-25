<?php

if (isset($_POST['Submit'])) {

include ("parser.php");

$link=$_POST["address"];

		echo "You are looking at ". $link. "<br/>";
		
		echo "<h3>Reading Information</h3>";
		
		echo "There are ". words_on_page($link) ." words on the page<br/>";
        
        echo "There are ". sentences_on_page($link) . " sentences on the page<br/>";
        
        echo "There are ". total_syllables($link) . " syllables on the page<br/>";
        
        echo "There is an average of ". words_per_sentence($link) . " words per sentance</br>";
        
        echo "There is an average of ". syllables_per_word($link) . " syllables per word</br>";
        
        echo "The reading ease of the webpage is <strong>" . flesh_reading_ease($link) . "</strong><br/>";
        
        echo "<h3>Navigational Information</h3>";

    	echo "There are ". tagcounter($link, 'div', 'id') . " divs on the page</br>";
    	
    	echo "There are ". tagcounter($link, 'img', 'src') ." images on the page<br/>";

        echo "There are ". tagcounter($link, 'a', 'href') ." links on the page<br/>";
        
        echo "The link density is ". linkdensity($link) . " words per link<br/>";
        
        echo "Sitemap rating is " . sitemap_present($link) . "</br>";
        
        echo "Searchbox rating is " . searchbox_present($link) . "</br>";
        
        echo "Accessibility mention rating is " . accessibility_mention($link) . "</br>";
        
        echo "Page Valid rating is " . check_valid($link) . "</br>";

}
?>
<br /><br />
<form action="" method="post" enctype="multipart/form-data" name="link">
<input name="address" type="text" value="" />
<input name="Submit" type="Submit" />
</form>