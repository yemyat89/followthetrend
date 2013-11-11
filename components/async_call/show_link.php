<?

session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);

$_SESSION["trend"] = $_SESSION["talkname"];
?>

<?
	$query = "select * from link where trend_name='".$_SESSION["trend"]."' order by link_id desc";
	$result = doQuery($query);
	$rows = getResult($result);
	
	if(count($rows)<1)
	{
		echo '
			<div align="center" style="word-wrap:break-word; border:solid grey; border-width:1px; background-color:#9EBCBE; margin-bottom:1px; padding-left:5px; padding-right:5px; min-height:25px;">
				<font style="color:grey; font-size:14px;">There is no link so far.</font>
			</div>
		';
	}
	if(count($rows)>=10){
		$start = count($rows)-10;
	}
	else
	{
		$start = 0;
	}
	for($i=$start;$i<count($rows);$i++)
	{
		$query = "select * from user as u,user_link as ul where u.user_id=ul.user_id and ul.link_id='".$rows[$i]['link_id']."'";
		$result = doQuery($query);
		$talkerR = getResult($result);
		$talker = $talkerR[0][1];
		
		$talker_id = $talkerR[0]["user_id"];
		
		
		
			
		echo '<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
		
		?>
			<div style="word-wrap:break-word; background-color:#9EBCBE; margin-bottom:1px; padding-left:5px; padding-right:5px; min-height:25px;">
				<? echo $talker; ?>: <a href="<? echo $rows[$i]['url']; ?>" target="_blank"><? echo $rows[$i]['title']; ?></a>
				<div align="right">
				
				<? if($_SESSION["userid"]==$talker_id){ ?>
				<a onclick="remove(<? echo $rows[$i]['link_id']; ?>)" title="Delete this link" style="background-color:#006; color:#FFF; font-size:12px;" href="#">&nbsp;Delete&nbsp;</a>
				<? } ?>
				</div>
			</div>
		<?
	}
	
?>