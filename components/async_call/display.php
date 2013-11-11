<?
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" ); 
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);

if($_SESSION["talkname"] != $_GET["tname"]){
		
	echo '
	<script>
		parent.location = "'.$INDEX.'"
	</script>
	';
	
}


$_SESSION["trend"] = $_GET["tname"];

?>


<?
$query = "select * from chat where trend_name='".$_SESSION["trend"]."' order by chtime desc limit 0,25";
$result = doQuery($query);
$rows = getResult($result);
$rows = array_reverse($rows);
$t = $rows[0]['chtime'];
$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;$t = $rows[0]['chtime'];

for($i=0;$i<count($rows);$i++)
{
	$query = "select * from user as u,user_chat as uc where u.user_id=uc.user_id and uc.chat_id='".$rows[$i]['chat_id']."'";
	$result = doQuery($query);
	$talker = getResult($result);
	$listTalker = $talker;
	
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
	$res = DifferenceWithGMTforChat($gmt,$t);		
	echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
	echo '
		<style>
		.note{
			font-size:14px;
			color:#666666;
			font-style:italic;
		}
		</style>
		';
	$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;
	$query = "insert into latest_shown values ('".$_SESSION["userid"]."', '".$gmt."')";
	$flag = doQuery($query);
	if(!$flag){
		$query = "update latest_shown set time='".$gmt."' where user_id='".$_SESSION["userid"]."'";
		doQuery($query);
	}
	echo '<div style="word-wrap:break-word;border:solid thin; margin:2px; margin-bottom:0px;">';
	
	echo "<div ".$title." style='margin-bottom:1px; font-size:18px; padding-right:0px; padding-left:5px; background-color:".$color.";'><span style='color:orange; font-weight:bold'><a href='".$PROFILE."?pid=".$listTalker[0]["user_id"]."'>".$talker."</a></span>: ".toLinkD($rows[$i]["words"])."<div class='note' style=''>".$res."</div></div>";
	echo '</div>';
}
?>