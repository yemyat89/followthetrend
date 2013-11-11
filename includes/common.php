<?
function DifferenceWithThailandTime($time)
{
	date_default_timezone_set('Asia/Bangkok');
	$target = strtotime($time);
	$current = time();		
	$diff = $current-$target;
	if( ($diff/(3*30*24*60*60)) > 1 )
	{
		return "More than 3 months ago";
	}
	else if( ($diff/(30*24*60*60)) >= 1 ) 
	{
		return round($diff/(30*24*60*60))." months ago";
	}
	else if( ($diff/(24*60*60)) > 1 ) 
	{
		return round($diff/(24*60*60))." days ago";
	}
	else if( ($diff/(60*60)) > 1 ) 
	{
		return round($diff/(60*60))." hours ago";
	}
	else if( ($diff/(60)) > 1 ) 
	{
		return round($diff/(60))." minutes ago";
	}
	else if( $diff > 1 )
	{
		return round($diff)." seconds ago";
	}
}


function DifferenceWithGMT($gmt2,$t2)
{
	//date_default_timezone_set('Asia/Bangkok');
	//$current = time();		
	$gmt2 = strtotime($gmt2);
	$t2 = strtotime($t2);
	$diff = $gmt2-$t2;	

	if( ($diff/(3*30*24*60*60)) > 1 )
	{
		return "More than 3 months ago";
	}
	else if( ($diff/(30*24*60*60)) >= 1 ) 
	{
		$temp = round($diff/(30*24*60*60));
		if($temp <= 1) {
			return $temp." month ago";
		}
		else {
			return $temp." months ago";
		}
	}
	else if( ($diff/(24*60*60)) > 1 ) 
	{
		$temp = round($diff/(24*60*60));
		if($temp <= 1) {
			return $temp." day ago";
		}
		else {
			return $temp." days ago";
		}
	}
	else if( ($diff/(60*60)) > 1 ) 
	{
		$temp = round($diff/(60*60));
		if($temp <= 1) {
			return $temp." hour ago";
		}
		else {
			return $temp." hours ago";
		}
	}
	else if( ($diff/(60)) > 1 ) 
	{
		$temp = round($diff/(60));
		if($temp <= 1) {
			return $temp." minute ago";
		}
		else {
			return $temp." minutes ago";
		}
		return $temp." minutes ago";
	}
	else if( $diff >= 1 )
	{
		$temp = round($diff);
		if($temp <= 1) {
			return $temp." second ago";
		}
		else {
			return $temp." seconds ago";
		}				
	}
	else
	{
		return "Less than a second ago";
	}
}
function DifferenceWithGMTforChat($gmt2,$t2)
{
	//date_default_timezone_set('Asia/Bangkok');
	//$current = time();		
	$gmt2 = strtotime($gmt2);
	$t2 = strtotime($t2);
	$diff = $gmt2-$t2;	

	if( ($diff/(3*30*24*60*60)) > 1 )
	{
		return "More than 3 months ago";
	}
	else if( ($diff/(30*24*60*60)) >= 1 ) 
	{
		$temp = round($diff/(30*24*60*60));
		if($temp <= 1) {
			return $temp." month ago";
		}
		else {
			return $temp." months ago";
		}
	}
	else if( ($diff/(24*60*60)) > 1 ) 
	{
		$temp = round($diff/(24*60*60));
		if($temp <= 1) {
			return $temp." day ago";
		}
		else {
			return $temp." days ago";
		}
	}
	else if( ($diff/(60*60)) > 1 ) 
	{
		$temp = round($diff/(60*60));
		if($temp <= 1) {
			return $temp." hour ago";
		}
		else {
			return $temp." hours ago";
		}
	}
	else if( ($diff/(60)) > 1 ) 
	{
		$temp = round($diff/(60));
		if($temp <= 1) {
			return $temp." minute ago";
		}
		else {
			return $temp." minutes ago";
		}
		return $temp." minutes ago";
	}
	else
	{
		return "Less than a minute ago";		
	}
	
}


function toLinkC($text){
		include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
        $text = html_entity_decode($text);
        $text = " ".$text;
        $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a target="_blank" href="\\1">\\1</a>', $text);
        $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a target="_blank" href="\\1">\\1</a>', $text);
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
        '\\1<a target="_blank" href="http://\\2">\\2</a>', $text);
        $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})',
        '<a target="_blank" href="mailto:\\1">\\1</a>', $text);
		$text = preg_replace('/(^|[^a-z0-9_])@([a-z0-9_]+)/i', '$1<a target="_blank" href="http://twitter.com/$2">@$2</a>', $text);
		$text = preg_replace('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', '$1<a href="'."/".$BASE_DIR.'search_trend.php?tname=$2">#$2</a>', $text);
        return $text;
}

function toLinkD($text){
		include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
        $text = html_entity_decode($text);
        $text = " ".$text;
        $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a target="_blank" href="\\1">\\1</a>', $text);
        $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a target="_blank" href="\\1">\\1</a>', $text);
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
        '\\1<a target="_blank" href="http://\\2">\\2</a>', $text);
		
		$text = eregi_replace('(@([0-9a-z][0-9a-z-]+))','<a href="'."/".$BASE_DIR.'profile.php?pid=\\2">\\1</a>', $text);
		
        //$text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})', '<a target="_blank" href="mailto:\\1">\\1</a>', $text);
		$text = preg_replace('/(^|[^a-z0-9_])#([a-z0-9_]+)/i', '$1<a href="'."/".$BASE_DIR.'search_trend.php?tname=$2">#$2</a>', $text);
		return $text;
}
?>