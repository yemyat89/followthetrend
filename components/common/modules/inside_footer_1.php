<?
$count = 0;

$query = "select * from trend as t, trend_user as tu where t.trend_id=tu.trend_id and tu.user_id='".$_SESSION["userid"]."'";
$result = doQuery($query);
$rows = getResult($result);

$query3 = "select * from latest_shown where user_id='".$_SESSION["userid"]."'";
$result3 = doQuery($query3);
$rows3 = getResult($result3);
$time = strtotime($rows3[0]['time']);

$tname = $rows[0]["name"];
$query2 = "select * from chat where trend_name='".$tname."' and words like '%".$_SESSION["username"]."%'";
$result2 = doQuery($query2);
$rows2 = getResult($result2);
			
for($r=0; $r<count($rows2); $r++)
{
	$time2 = strtotime($rows2[$r]['chtime']);
	$chatid = $rows2[$r]['chat_id'];
	
	$query4 = "select * from user_chat as uc, user as u where u.user_id=uc.user_id and uc.chat_id='".$chatid."'";
	$result4 = doQuery($query4);
	$rows4 = getResult($result4);

	if($time2 > $time)
	{
		$count++;					
	}	
}

$query = "select * from trend as t, trend_user as tu where t.trend_id=tu.trend_id and tu.user_id='".$_SESSION["userid"]."'";
$result = doQuery($query);
$rows = getResult($result);
?>