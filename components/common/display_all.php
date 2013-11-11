<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);

$_SESSION["trend"] = $_GET["talkname"];

if($_SESSION["userid"]==NULL)
{
	echo '
	<script>
		parent.location = "'.$LOGIN.'"
	</script>
	';
	exit;
}
echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
echo
	'
	<title>All the talks</title>
	';
echo '
	<style>
	.note{
		font-size:14px;
		color:#666666;
		font-style:italic;
	}
	</style>
';

$query = "select * from chat where trend_name='".$_SESSION["trend"]."' order by chtime desc";
$result = doQuery($query);
$rows = getResult($result);
$rows = array_reverse($rows);
$t = $rows[0]['chtime'];
$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;

echo '<div style="word-wrap:break-word; font-size:20px; margin-left:200px; margin-right:200px;">';

for($i=0;$i<count($rows);$i++)
{
	$query = "select * from user as u,user_chat as uc where u.user_id=uc.user_id and uc.chat_id='".$rows[$i]['chat_id']."'";
	$result = doQuery($query);
	$talker = getResult($result);
	
	$talker_ori = $talker;
	$talker = $talker[0][1];
	
	if(strpos($rows[$i]["words"], "@".$_SESSION["username"])!==false)
	{			
		$color="pink";
	}
	else
	{
		$color="";
	}
	
	$t = $rows[$i]["chtime"];
	
	$res = DifferenceWithGMT($gmt,$t);
	
	echo "<div ".$title." style='border:solid thin; margin:2px; margin-bottom:0px; padding-right:0px; padding-left:5px; background-color:".$color.";'><a href='".$PROFILE."?pid=".$talker_ori[0]["user_id"]."'>".$talker."</a>: ".toLinkD($rows[$i]["words"])."<div class='note' style=''>".$res."</div></div>";	
}

echo '</div>';

?>
