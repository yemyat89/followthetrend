<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SEARCH);

$search = new TwitterSearch();

if (!@$results = $search->trends()) {
	echo " ftt__none__";
	exit;
}

if(count($results->trends)>0){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo "<link href='style.css' rel='stylesheet' type='text/css' />";
	
	echo '<div style="width:100%;">';
	foreach($results->trends as $result){		
		
		$st = urlencode($result->name);

		echo '<a href="'.$SEARCH_TREND.'?tname='.$st.' " target="_parent">'.$result->name.'</a><br/>';
		
		
	}
	echo '</div>';
	
}
else{
	echo " ftt__none__";
	exit;	
}
?>
