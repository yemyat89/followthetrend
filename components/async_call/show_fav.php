<?

session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);
include($_SERVER["DOCUMENT_ROOT"].$SEARCH);

$_SESSION["trend"] = $_SESSION["talkname"];
?>

<?
//echo "<meta http-equiv='refresh' content='3;url=display.php'>";
	$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;
	
	$query = "select * from favourite where trend_name='".$_SESSION["trend"]."' order by favourite_id desc";
	$result = doQuery($query);
	$rows = getResult($result);
	
	if(count($rows)<1)
	{
		echo '
			<div align="center" style="word-wrap:break-word; border:solid grey; border-width:1px; background-color:#9EBCBE; margin-bottom:1px; padding-left:5px; padding-right:5px; min-height:25px;">
				<font style="color:grey; font-size:14px;">There is no favourite tweet so far.</font>
			</div>
		';
	}
	
	for($i=0;$i<count($rows);$i++)
	{			
		echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
		
		echo '<div style="font-style:normal; padding:8px;">';
			
		$text_n=toLink($rows[$i]["data"]);
		
		echo '<div style="float:left;"><img src="'.$rows[$i]["image"].'" width=50 height=50 class="twitter_image"> &nbsp;</div>';
		echo '<div style="margin-left:5px;">';
		echo '<strong><a target="_blank" href="http://www.twitter.com/'.$rows[$i]["user"].'">'.$rows[$i]["user"].'</a></strong> ';
		
		echo $text_n;
		
		echo '<div style=margin-top:2px;" class="note">';
		$res_str= str_replace("+0000","", $rows[$i]["time"]);
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
	
?>