<?php 
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);
include($_SERVER["DOCUMENT_ROOT"].$SEARCH);

$_SESSION["trend"] = $_GET["tname"];
$trend = $_SESSION["trend"];

echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';

$query = "select * from link, user_link as ul where ul.link_id=link.link_id";
$result = doQuery($query);
$rows= getResult($result);

if(count($rows)<1)
{
		echo '<div style="margin-left:5px;" class="note">There is no link being shared for <font style="font-weight:bold; font-size:25px; color:#0000FF;">'.$trend.'</font>.</div>';
}	

$flag = false;
$trend=stripslashes($trend);
for($i=0;$i<count($rows);$i++)
{
	$inside = false;
	$tname = $rows[$i]['title'];
	
	$haystack = strtolower($_SESSION['trend']);
	$needle = strtolower($tname);
	
	$tok = strtok($needle, " ");

	while ($tok !== false) {
		$pos = strpos($haystack,$tok);

		if($pos !== false) {
			//echo '<em>&nbsp;&nbsp;Links being shared for </em><font class="title">'.$trend.'</font>';
			echo '<div style="word-wrap:break-word; border:solid grey; border-width:1px; background-color:#9EBCBE; margin-bottom:1px; padding-left:5px; padding-right:5px; min-height:25px;">';
			echo '<a target="_blank" href="'.$rows[$i]['url'].'">'.$tname.'</a>';
			echo '
				<div id="menu" align="right" style="margin-right:0px; margin-top:3px; padding-left:5px;">
					in the trend: <em>'.$rows[$i]['trend_name'].'</em>&nbsp;&nbsp;&nbsp;<a style="background-color:#FBEA1E; color:#000; font-size:12px;" href="'.$TREND.'?tname='.$rows[$i]['trend_name'].'">&nbsp;Join this!&nbsp;</a>
				 </div>
			';
			echo '</div>';
			$flag = true;
			$inside = true;
			break;
		}	
		$tok = strtok(" \n\t");
	}
	
	if(!$inside)
	{
		$haystack = strtolower($tname);
		$needle = strtolower($_SESSION['trend']);
		
		$tok = strtok($needle, " ");
		
		while ($tok !== false) {
			$pos = strpos($haystack,$tok);

			if($pos !== false) {			
				echo '<div style="word-wrap:break-word; background-color:#9EBCBE; margin-bottom:1px; padding-left:5px; padding-right:5px; min-height:25px;">';
				echo '<a target="_blank" href="'.$rows[$i]['url'].'">'.$tname.'</a>';
				echo '
					<div id="menu" align="right" style="margin-right:0px; margin-top:3px; padding-left:5px;">
						in the trend: <em>'.$rows[$i]['trend_name'].'</em>&nbsp;&nbsp;&nbsp;<a style="background-color:#FBEA1E; color:#000; font-size:12px;" href="'.$TREND.'?tname='.$rows[$i]['trend_name'].'">&nbsp;Join this!&nbsp;</a>
					 </div>
				';
				echo '</div>';
				$flag = true;
				break;
			}	
			$tok = strtok(" \n\t");
		}
	}
	if($i==(count($rows)-1) && !$flag)
	{
		echo '<div style="margin-left:5px;" class="note">There is no link being shared for <font style="font-weight:bold; font-size:25px; color:#0000FF;">'.$trend.'</font>.</div></div>';
	}	
}
?>
