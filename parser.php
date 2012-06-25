<?php
/* FUNCTION DESCRIPTIONS

////////////////////////////////////////////
tagcounter($link, $tagtype, $identifier)

$link - web address
$tagtype - type of tag you are looking for
$identifier - identifying feature of this tag

RETURN - number

////////////////////////////////////////////
strip_everything($link)

$link - web address

RETURN - text from a web page

////////////////////////////////////////////
words_on_page($link)

$link - web address

RETURN - number of words on a page

////////////////////////////////////////////
sentence_on_page($link)

$link - web address

RETURN - number of sentences on a page

////////////////////////////////////////////
linkdensity($link)

($link) - web address

RETURN - ratio of links to words on a page

////////////////////////////////////////////
total_syllables($link)

$link - web address

RETURN - number of syllables on a page

////////////////////////////////////////////
flesh_reading_ease($link)

$link - web address

RETURN = Flesh Reading Score, to 2 decimal points

////////////////////////////////////////////
function words_per_sentence($link)

$link - web address

RETURN - Average words per sentence on a page

////////////////////////////////////////////
function syllables_per_word($link)

$link - web address

RETURN - average syllables per word

////////////////////////////////////////////
function sitemap_present($link)

$link - web address

RETURN - BINARY of site map link present on web page

////////////////////////////////////////////
function searchbox_present($link)

$link - web address

RETURN - BINARY of search box present on web page

////////////////////////////////////////////
function accessibility_mention($link)

$link - web address

RETURN - BINARY of mention of accessibility on web page

////////////////////////////////////////////


*/

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
?>