<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);

$_SESSION["trend"] = $_GET["tname"];
$trend = $_SESSION["trend"];

echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';

$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;

$query = "select * from favourite where data like '%".$trend."%' order by favourite_id desc";
$result = doQuery($query);
$rows= getResult($result);

if(count($rows)<1)
{
		echo '<div style="margin-left:5px;" class="note">There is no favourite tweet for <font style="font-weight:bold; font-size:25px; color:#0000FF;">'.$trend.'</font>.</div>';
		die();
}	

$flag = false;

for($i=0;$i<count($rows);$i++)
{
	$inside = false;
	$tname = $rows[$i]['data'];	
	echo '<div style="font-style:normal; padding:8px;">';
	$text_n=$tname;	
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
	echo '
			<div id="menu" align="right" style="">
				in the trend: <em>'.$rows[$i]['trend_name'].'</em>&nbsp;&nbsp;&nbsp;<a style="background-color:#FBEA1E; color:#000; font-size:12px;" href="'.$TREND.'?tname='.$rows[$i]['trend_name'].'">&nbsp;Join this!&nbsp;</a>
			 </div>
		';
	echo '<hr/>';
	echo '</div>';
	$flag = true;	
	if($i==(count($rows)-1) && !$flag)
	{
		echo '<div style="margin-left:5px;" class="note">There is no favourite tweet for <font style="font-weight:bold; font-size:25px; color:#0000FF;">'.$trend.'</font>.</div></div>';
	}			
}
?>