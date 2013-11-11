<?
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" ); 
session_start();
$_SESSION["trend"] = $_GET["tname"];
$_SESSION["talkname"] = $_SESSION["trend"];
$rmText = stripslashes($_SESSION["talkname"]);

if($_SESSION["trend"]=="")
{
	echo '
	<script>
		parent.location = "'.$INDEX.'"
	</script>
	';
}



$title = $_GET["tname"];//urldecode($_SESSION["trend"] );

$query = "select * from trend where name='".$title."'";
$result = doQuery($query);
$rows = getResult($result);
if(count($rows)<1)
{
	echo '
	<script>
		parent.location = "'.$INDEX.'"
	</script>
	';
}

if($_SESSION["userid"]==NULL)
{

	echo '
	<script>
		parent.location = "'.$LOGIN.'"
	</script>
	';
	exit;
}


$current = date("Y-m-d H:i:s",time()-date("Z"));


$query = "select name from user where user_id='".$_SESSION["userid"]."'";
$result = doQuery($query);
$rows = getResult($result);
$username = $rows[0][0];



$query = "select trend_id from trend where name='".$title."'";
$result = doQuery($query);
$rows = getResult($result);
$trend_id = $rows[0][0];

$query = "delete from trend_user where user_id='".$_SESSION["userid"]."'";
$flag = doQuery($query);

$query = "insert into trend_user values('$trend_id','".$_SESSION["userid"]."', '".$current."', '0')";
$flag = doQuery($query);

//Empty All
$query = "delete from trend where trend_id not in (select trend_id from trend_user)";
$flag = doQuery($query);

$query = "delete from chat where trend_name not in (select name from trend)";
$flag = doQuery($query);

$query = "delete from user_chat where chat_id not in (select chat_id from chat)";
$flag = doQuery($query);

$query = "delete from link where trend_name not in (select name from trend)";
$flag = doQuery($query);

$query = "delete from favourite where trend_name not in (select name from trend)";
$flag = doQuery($query);

$query = "delete from user_link where link_id not in (select link_id from link)";
$flag = doQuery($query);
///////////

$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;
//$ee=strtotime($gmt)-strtotime($t);
//echo $ee;

?>