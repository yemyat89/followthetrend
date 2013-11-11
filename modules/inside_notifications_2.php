<?
$query = "select * from trend as t, trend_user as tu where t.trend_id=tu.trend_id and tu.user_id='".$_SESSION["userid"]."'";
$result = doQuery($query);
$rows = getResult($result);

$query3 = "select * from latest_shown where user_id='".$_SESSION["userid"]."'";
$result3 = doQuery($query3);
$rows3 = getResult($result3);
$time = strtotime($rows3[0]['time']);


$tname = $rows[0]["name"];
$query2 = "select * from chat where trend_name='".$tname."' and words like '%".$_SESSION["username"]."%' order by chtime desc";
$result2 = doQuery($query2);
$rows2 = getResult($result2);


if(count($rows)>0){
	echo "You are interested in <a href='".$TREND."?tname=".urlencode($tname)."'>".$tname."</a>.<br/><br/>";
}
else
{
	echo "You are not in any trend.";
}
for($r=0; $r<count($rows2); $r++)
{
	$time2 = strtotime($rows2[$r]['chtime']);
	$chatid = $rows2[$r]['chat_id'];
	
	$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;
	
	$res = DifferenceWithGMTforChat($gmt,$rows2[$r]['chtime']);
	
	$query4 = "select * from user_chat as uc, user as u where u.user_id=uc.user_id and uc.chat_id='".$chatid."'";
	$result4 = doQuery($query4);
	$rows4 = getResult($result4);

	if($time2 > $time)
	{
		
		echo '<div style="border:solid thin; background-color:pink; margin-bottom:5px;">';
		echo 'You are talked by <span style="color:orange"><a href="'.$rows4[0]["user_id"].'">'.$rows4[0]["name"].'</a></span>. <a  target="_blank" href="'.$DISPLAY_ALL.'?talkname='.urlencode($tname).'">  [See the bulletin board]</a>';				
		echo "<div class='note' style=''>".$res."</div>";
		echo '</div>';
	}
	else
	{
		if($rows4[0]["name"]!=$_SESSION["username"]){
			echo '<div style="border:solid thin; background-color:white; margin-bottom:5px;">';
			echo 'You are talked by <span style="color:orange">'.$rows4[0]["name"].'</span>. <a target="_blank" href="'.$DISPLAY_ALL.'?talkname='.urlencode($tname).'">See the bulletin board</a>';
			echo "<div class='note' style=''>".$res."</div>";
			echo '</div>';
		}
	}
}
?>