<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$query = "select trend_id from trend where name='".$_SESSION["trend"]."'";
$result = doQuery($query);
$rows = getResult($result);
$trend_id = $rows[0][0];

$query = "select name, u.user_id from user as u,trend_user as tu where u.user_id=tu.user_id and tu.trend_id='$trend_id'";
$result = doQuery($query);
$rows = getResult($result);
//var_dump($rows);
for($i=0;$i<count($rows);$i++)
{	
	if($rows[$i][0]==$_SESSION["username"])
	{
		$name = "<a href='".$PROFILE."?pid=".$rows[$i][1]."'>".$rows[$i][0]."</a>"." (you)";
	}
	else
	{
		$name = "<a href='".$PROFILE."?pid=".$rows[$i][1]."'>".$rows[$i][0]."</a>";
	}
	echo '<strong style="margin-left:0px; font-size:18px; color:blue;">'.$name.'</strong><br/>';
}


?>
