<?

header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" ); 
session_start();
$_SESSION["trend"] = $_GET["tname"];
$title = stripslashes($_GET["tname"]);


if(isset($_GET["submit"]))
{	
	$st = stripslashes($_GET['tname']);
	$st = urlencode($st);
	header( 'Location: '.$SEARCH_TREND.'?tname='.$st) ;
}


$query = "select name from user where user_id='".$_SESSION["userid"]."'";
$result = doQuery($query);
$rows = getResult($result);
$username = $rows[0][0];

$query = "select trend_id from trend where name='".$_SESSION["trend"]."'";
$result = doQuery($query);
$rows = getResult($result);
$trend_id = $rows[0][0];

$query = "insert into trend_user values('$trend_id','".$_SESSION["userid"]."')";
$flag = doQuery($query);

$query = "select * from chat where trend_name='".$_SESSION["trend"]."' order by chtime";
$result = doQuery($query);
$rows = getResult($result);

$t = $rows[0]['chtime'];
$gmt = date("Y-m-d H:i:s", time() - date("Z")) ;
//$ee=strtotime($gmt)-strtotime($t);
//echo $ee;
$started = DifferenceWithGMT($gmt,$t);

?>