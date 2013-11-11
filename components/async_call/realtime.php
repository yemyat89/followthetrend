<?php 
session_start();

$_SESSION["trend"] = $_GET["tname"];
$trend = $_SESSION["trend"];

if($_GET["type"]=="talk")
{
	$_SESSION["trend"] = $_SESSION["talkname"];
	$trend = $_SESSION["trend"];
}

//echo "<link href='style.css' rel='stylesheet' type='text/css' />";
?>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<?

//echo "<meta http-equiv='refresh' content='120;url=realtime.php'>";
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SEARCH);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);

	//echo "I will search ".$trend;
	$twitter_query= $trend;
	
	$search = new TwitterSearch($twitter_query);
	$search->rpp=10;
	$results = $search->results();
	
	$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;
if(count($results)>0){
	
	$i=0;
	foreach($results as $result){
			if($_GET["type"]=="talk"){
				$_SESSION["fav".$i]=$result;
			}
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
			if($_GET["type"]=="talk"){
				echo '<div style="float:right">';
				
				echo '<a title="I like this" onclick="like('.$i.')" style="background-color:#006; color:#FFF; font-size:12px;" href="#" id="favourite">&nbsp;Like&nbsp;</a>';
                
				echo '</div>';
			}
			echo '<hr/>';
			echo '</div>';
			$i++;
			
	
}
}
else
	if(trim($trend)=='')
	{
		echo "<div style='margin-top:15px; background-color:#FFFF33'>Please specify the keyword to search.</div>";	
	}
	else{
		echo "<div style='margin-top:15px; background-color:#FFFF33'>Could not find any tweets for '".$trend."'.</div>";
	}

?>
