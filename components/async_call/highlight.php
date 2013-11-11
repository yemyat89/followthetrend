<?php 
session_start();
echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SEARCH);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);

$search = new TwitterSearch();

if (!@$results = $search->trends()) {
	echo " ftt__none__";
	exit;
}

if(count($results->trends)>0){
	$i = 0;	
	$num = rand(0,9);
	foreach($results->trends as $result){
		$st = urlencode($result->name);
		if($i==$num)
		{
			$trend = urldecode($st);			
			$twitter_query= $trend;
			$search = new TwitterSearch($twitter_query);
			$search->rpp=10;			
			
			if (!@$results_t = $search->results()) {
				echo " ftt__none__";
				exit;
			}
			
			$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;
			
			foreach($results_t as $result){
					echo '<div style="font-style:normal; padding:8px;">';
					
					$text_n=toLink($result->text);
					echo '<div style="float:left;"><img src="'.$result->profile_image_url.'" width=50 height=50 class="twitter_image"> &nbsp;</div>';
					echo '<div style="margin-left:5px;">';
					echo '<strong><a target="_blank" href="http://www.twitter.com/'.$result->from_user.'">'.$result->from_user.'</a></strong> ';
					
					echo $text_n;
					
					echo '<div style=margin-top:2px;" class="note">';
					$res_str= str_replace("+0000","", $result->created_at);
					$res_str= str_replace(",","", $res_str);
					
					
					$tt = strtotime($res_str);
					$t = date("Y-m-d H:i:s", $tt);
					
					$res_str = DifferenceWithGMT($gmt,$t);
					echo '<em>'.$res_str.'</em>';
					echo '</div>';
					echo '</div>';
					echo '<hr/>';
					echo '</div>';
					
			
			}
		}
		$i++;
	}
	
}
else{
	echo " ftt__none__";
}
?>