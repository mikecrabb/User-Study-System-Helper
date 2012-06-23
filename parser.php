<?php

if (isset($_POST['Submit'])) {

include ("syllable_counter.php");

function tagcounter($link, $tagtype, $identifier)
    {   
        $ret = array(); // returns an array
        $dom = new domDocument; // sets up a new dom object
        @$dom->loadHTML(file_get_contents($link)); // gets the html of the page while supressing any errors
        $dom->preserveWhiteSpace = false; // does not preserve whitespaces in the html
        $links = $dom->getElementsByTagName($tagtype); // polls the links in the page and stores them as "$links"
        // Loop for walking through each "a" tag and looking for href to make sure it's a link
        foreach ($links as $tag)
        {   
            $ret[$tag->getAttribute($identifier)] = $tag->childNodes->item(0)->nodeValue;
        }
		$ret = count($ret);
        return $ret;
    }
	
function strip_everything($link)
{
	$stripper = strip_tags(strip_html_tags($link));
	return $stripper;
}	

function words_on_page($link)
	{
		$wordcount=count(str_word_count(strip_everything($link), 1));
		return $wordcount;
	}	

function strip_html_tags($link) 
{ 
	$text = file_get_contents($link);
    $text = preg_replace( 
        array( 
          // Remove invisible content 
            '@<head[^>]*?>.*?</head>@siu', 
            '@<style[^>]*?>.*?</style>@siu', 
            '@<script[^>]*?.*?</script>@siu', 
            '@<object[^>]*?.*?</object>@siu', 
            '@<embed[^>]*?.*?</embed>@siu', 
            '@<applet[^>]*?.*?</applet>@siu', 
            '@<noframes[^>]*?.*?</noframes>@siu', 
            '@<noscript[^>]*?.*?</noscript>@siu', 
            '@<noembed[^>]*?.*?</noembed>@siu', 
          // Add line breaks before and after blocks 
            '@</?((address)|(blockquote)|(center)|(del))@iu', 
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu', 
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu', 
            '@</?((table)|(th)|(td)|(caption))@iu', 
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu', 
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu', 
            '@</?((frameset)|(frame)|(iframe))@iu', 
        ), 
        array( 
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',"$0", "$0", "$0", "$0", "$0", "$0","$0", "$0",), $text ); 

    return $text; 
} 
		
function sentences_on_page($link)
	{
		$str = strip_everything($link);
		return preg_match_all('/[^\s](\.|\!|\?)(?!\w)/',$str,$match);
	}
	
	function linkdensity($link)
	{
		 $words = words_on_page($link);
		 $urls = tagcounter($link, 'a', 'href');
		 $density = $words / $urls;
		 $density = round($density, 3);
		 return $density;
	}

function total_syllables($link)
		{
			$input = strip_everything($link);
			$input = trim($input);
			$output = ereg_replace("\n", " ", $input);
			$output = preg_replace('/\s\s+/', ' ', $output);
			$word_array = split_words($output);
			$total_syllables = 0;

		if (count($word_array)>0 && !empty($input))
		{
			foreach($word_array as $key=>$value)
			{
				$total_syllables += count_syllables($value);
			}
		}
	return $total_syllables;
}

function flesh_reading_ease($link)
{
	$readingease= 206.835 - 1.015*(words_per_sentence($link)) - 84*(syllables_per_word($link));
	$readingease = round($readingease , 2);
	return $readingease;	
}

function words_per_sentence($link)
{
	return round((words_on_page($link)/sentences_on_page($link)), 2);
}

function syllables_per_word($link)
{
	return round(total_syllables($link)/words_on_page($link), 2);
}

function sitemap_present($link)
{
	if (preg_match("/map/", strip_everything($link)))
	{
    	return 1;
    }
    	else
    {
    	return 0;
	}
}



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
        


}
?>
<br /><br />
<form action="" method="post" enctype="multipart/form-data" name="link">
<input name="address" type="text" value="" />
<input name="Submit" type="Submit" />
</form>