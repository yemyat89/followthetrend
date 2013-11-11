<?
header( "Cache-Control: no-cache, must-revalidate" );
header( "Pragma: no-cache" );  
session_start();
$username = $_SESSION["username"];
if(isset($_GET["tname"]))
{
	$st = stripslashes($_GET['tname']);
	$st = urlencode($st);
	header( 'Location: '.$SEARCH_TREND.'?tname='.$st);
}
?>