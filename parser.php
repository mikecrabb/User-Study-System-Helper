<?php
gc_enable(); // Enable Garbage Collector
include ("simple_html_dom.php"); // Acknowledge: Jose Solorzano (https://sourceforge.net/projects/php-html/)
include ("syllable_counter.php"); // Acknowledge: http://www.russellmcveigh.info/maintenance.php

function tagcounter($link, $tagtype, $identifier)
    {   
    	global $dom;
    	if (!isset($dom))
    	{
        $ret = array(); // returns an array
        $dom = new domDocument; // sets up a new dom object
        @$dom->loadHTML(file_get_contents($link)); // gets the html of the page while supressing any errors
        $dom->preserveWhiteSpace = false; // does not preserve whitespaces in the html
        }
        $links = $dom->getElementsByTagName($tagtype); // polls the links in the page and stores them as "$links"
        // Loop for walking through each "a" tag and looking for href to make sure it's a link
        foreach ($links as $tag)
        {   
            $ret[$tag->getAttribute($identifier)] = $tag->childNodes->item(0)->nodeValue;
        }
		$ret = count($ret);
        return $ret;
    }

function kill_dom()
{
//Whatever did Dom do to you!?
unset($GLOBALS['dom']);
unset($GLOBALS['text']);
}
		
function strip_everything($link)
{
		global $text;
	if (!isset($text))
	{
		$text = file_get_html($link)->plaintext;
	}
	return $text;
}

function strip_everything_keep_tags($link)
{
		global $textandtag;
	if (!isset($textandtag))
	{
		$textandtag = file_get_html($link);
	}
	return $textandtag;
}

function words_on_page($link)
	{
		$wordcount=count(str_word_count(strip_everything($link), 1));
		return $wordcount;
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
	$readingease = abs(round($readingease , 2));
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

function searchbox_present($link)
{
	if (preg_match("/search/", strip_everything($link)))
	{
    	return 1;
    }
    	else
    {
    	return 0;
	}
}

function accessibility_mention($link)
{
	if (preg_match("/accessibility/", strip_everything($link)))
	{
    	return 1;
    }
    	else
    {
    	return 0;
	}
}

function check_valid($link)
{
$link = "http://validator.w3.org/check?uri=". $link;

if (preg_match("/Passed/", strip_everything($link)))
	{
    	return 1;
    }
    	else
    {
    	return 0;
	}
}
function get_website_data($tableID, $characteristicID)
{
	$result = mysql_query("SELECT * FROM urls WHERE tableid = '" . $tableID . "'");
	while($row = mysql_fetch_array($result))
	{
		$webaddress = $row['url'];
		
			$resultt = mysql_query("SELECT * FROM website_characteristics WHERE characteristicID = '" . $characteristicID . "'");

	while($row = mysql_fetch_array($resultt))
  	{
  		$codetorun = $row['testableFunction'];
  		$charicteristicName = $row['characteristicName'];
  		eval("\$myanswer = $codetorun".";"); 
  		return $myanswer;
  	}  
	}

}

?>