<?

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

//echo "<meta http-equiv='refresh' content='10;url=online_check_script(footer).php'>";
//echo "<meta http-equiv='refresh' content='3;url=online_check_script(footer).php'>";
$query = "update trend_user set flag='1'";
$flag = doQuery($query);


$current = date("Y-m-d H:i:s",time()-date("Z"));
$test=$current;
$current = strtotime($current);

$query = "select * from trend_user";
$result = doQuery($query);
$rows = getResult($result);

$myFile = "checker.txt";
$fh = fopen($myFile, 'a') or die("can't open file");


for($i=0;$i<count($rows);$i++)
{
	$temp = strtotime($rows[$i]["latest"]);
	
	$rsl = $current-$temp;
	if($rsl>90)
	{
		
		//echo '<script>';
		//echo 'alert("From t. Delete on user:'.$rows[$i]["user_id"].' '.$test.' || '.$rows[$i]["latest"].'");';
		//echo '</script>';
		
	
		// Delete
		
		$query = "delete from trend_user where user_id='".$rows[$i]["user_id"]."'";
		$flag = doQuery($query);		
		
		$stringData = $flag;
		fwrite($fh, $stringData);

	}
}

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

fclose($fh);

$query = "update trend_user set flag='0'";
$flag = doQuery($query);
?>