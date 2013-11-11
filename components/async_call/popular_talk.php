<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$query = "SELECT name, count( DISTINCT user_id ) AS user FROM trend AS t, trend_user AS tu WHERE t.trend_id = tu.trend_id GROUP BY name ORDER BY user DESC limit 0,10";
$result = doQuery($query);
$rows= getResult($result);

if(count($rows)<1)
	{
		echo '
			<div align="left">
				<font style="color:grey; font-size:14px;"><b>There is no trend now.</b></font>
			</div>
		';
	}

for($i=0;$i<count($rows);$i++)
{
	$tname = $rows[$i]['name'];
	
	if($_SESSION["userid"]==""){
		echo '<a href="'.$LOGIN.'" target="_parent">'.$tname.'</a><br/>';
	}
	else
	{
		$tname2 = urlencode($tname);						
		echo '<a href="'.$TREND.'?tname='.$tname2.'" target="_parent">'.$tname.'</a><br/>';
	}
	
}				

?>