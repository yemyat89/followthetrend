<?
if($_GET['tname']!=""){
$query = "SELECT name, count( DISTINCT user_id ) AS user FROM trend AS t, trend_user AS tu WHERE t.trend_id = tu.trend_id GROUP BY name ORDER BY user DESC";

$result = doQuery($query);
$rows= getResult($result);

//test

$flag = false;

for($i=0;$i<count($rows);$i++)
{
	$inside = false;
	$tname = $rows[$i]['name'];
	
	$haystack = strtolower($_SESSION['trend']);
	$needle = strtolower($tname);
	
	$tok = strtok($needle, " ");

	while ($tok !== false) {
		$pos = strpos($haystack,$tok);

		if($pos !== false) {
			echo '<a href="'.$TREND.'?tname='.urlencode($tname).'">'.$tname.'</a><br/>';
			$flag = true;
			$inside = true;
			break;
		}	
		$tok = strtok(" ");
	}
	
	if(!$inside)
	{
		$haystack = strtolower($tname);
		$needle = strtolower($_SESSION['trend']);
		
		$tok = strtok($needle, " ");

		while ($tok !== false) {
			$pos = strpos($haystack,$tok);

			if($pos !== false) {
				echo '<a href="'.$TREND.'?tname='.urlencode($tname).'">'.$tname.'</a><br/>';
				$flag = true;
				break;
			}	
			$tok = strtok(" ");
		}
	}
	
	if(($i==(count($rows)-1) && !$flag) || count($rows)<1)
	{
		echo '<div style="color:grey; font-size:14px;"><b>No active trend is happening now.</b></div></div>';
	}				
	
}

if(count($rows)<1)
{
	echo '<div style="color:grey; font-size:14px;"><b>No active trend is happening now.</b></div></div>';
}				

}
else
{
echo 'Please specify the keyword to search.';
}
?>