<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
?>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $MENU_SCRIPT; ?>"></script>

<?
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]) )
{
	$username=$_COOKIE["username"];
	$password=$_COOKIE["password"];
	
	$query = "select * from user where name='$username' and password='$password'";
	$result = doQuery($query);
	$rows = getResult($result);
	
	if($rows != NULL)
	{
		session_start();
		$_SESSION["userid"] = $rows[0]["user_id"];
		$_SESSION["username"] = $rows[0]["name"];
		$_SESSION["password"] = $rows[0]["password"];		
	}
}
?>

<table style="margin-top:15px; margin-right:0px;" align="right" bgcolor="#FFFFFF" border="0" cellspacing="0">
  <tr>
    <td align="center" height="21" valign="center"><a href="<? echo $INDEX; ?>"><img onmouseout="out(this);" onmouseover="over(this);" src="<? echo $IMAGE_DIR; ?>home.png" width=46 height=46 title="Home"/></a>
	</td>    
	<td align="center" valign="center"><? if($_SESSION["userid"]==""){echo '<a href="'.$LOGIN.'"><img onmouseout="out(this);" onmouseover="over(this);" src="'.$IMAGE_DIR.'/profile.png" width=46 height=46 title="Profile" /></a>';}else echo '<a href="'.$PROFILE.'?pid='.$_SESSION["userid"].'"><img onmouseout="out(this);" onmouseover="over(this);" src="'.$IMAGE_DIR.'profile.png" width=46 height=46 title="Profile" /</a>'; ?>	
	</td>	
	<td align="center" valign="center"><a href="<? echo $PEOPLE; ?>"><img onmouseout="out(this);" onmouseover="over(this);" src="<? echo $IMAGE_DIR; ?>ppl.png" width=46 height=46 title="Find People"/></a>
	</td>
	<td align="center" valign="center"><? if($_SESSION["userid"]==""){echo '<a href="'.$LOGIN.'"><img onmouseout="out(this);" onmouseover="over(this);" src="'.$IMAGE_DIR.'setting.png" width=46 height=46 title="Settings" /></a>';}else echo '<a href="'.$SETTINGS.'"><img onmouseout="out(this);" onmouseover="over(this);" src="'.$IMAGE_DIR.'setting.png" width=46 height=46 title="Settings" /</a>'; ?>	
	</td>
	<td align="center" valign="center"><a href="http://www.twitter.com" target="_blank"><img onmouseout="out(this);" onmouseover="over(this);" src="<? echo $IMAGE_DIR; ?>twitter.png" width=46 height=46 title="Go to Twitter"/></a>
	</td>
  </tr>
</table>

<div style="margin-top:45px; margin-right:7px; float:right; color:white;">
</div>