<?
session_start();
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
?>

<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>" type="text/javascript"></script>
<script src="<? echo $FOOTER_SCRIPT; ?>"></script>
<?
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_FOOTER_1);
?>
<div style="display:" id="checker"></div>
<div align="justify" style="display:none; width:380px; max-width:380px;" id="show_cur">

<? if(count($rows)>0){ ?>
	You are interested in <a href="<? echo $TREND; ?>?tname=<? echo urlencode($rows[0]["name"]); ?>"><? echo $rows[0]["name"]; ?></a>. 
	<div align="right"><a href="<? echo $TREND; ?>?tname=<? echo urlencode($rows[0]["name"]); ?>">[Go]</a> <a href="<? echo $LEAVE; ?>">[Leave]</a></div>
<?
}
else
{
	echo "You are not in any trend.";
}
?>
</div>
<div align="justify" style="display:none; width:380px; max-width:380px;" id="show">
	<div align="left"><h1>Initiate New Trend<img src="<? echo $IMAGE_DIR; ?>hand.jpg" width="90" height="90" /></h1></div>
	<div style="">
		<form name="new" method="post" action="<? echo $CREATE; ?>">
			<table align="center"><tr><td colspan="2">Trend Name: </td></tr><tr><td align="left"><input type="text" style="font-size:20px;" name="title" maxlength="30" /> </td><td align="left">&nbsp;<input style="font-size:20px;" type="submit" name="submit" value="Initiate" /></td></tr></table>
		</form>
	</div>
</div> 

<div align="center" style="display:none;" id="showlogin">
	<div class="loginpopup">
		<form name="new" method="post" action="<? echo $LOGIN_PROCESS; ?>">
		<br/>
			<table cellspacing="0" border="0">
				<tr>
					<td valign="top" >Username&nbsp;</td>
					<td align="right" valign="top" >						
						<input name="username" type="text" maxlength="25"/>
					  </td>
				</tr>
				<tr>
					<td valign="top" >&nbsp;</td>
					<td valign="top" >&nbsp;</td>
				</tr>
				<tr>
					<td valign="middle">Password </td>
					<td align="right" valign="top" >						
						<input name="password" type="password" maxlength="25" />
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="right"><br/>&nbsp;
						<label>
							<input type="submit" name="submit" value="Sign in" />
						</label>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="left">
						<br/>
						<input type="checkbox" name="remember" /> Remember me |
					&nbsp;<a href="<? echo $FORGET_PASSWORD; ?>">Forgot password?</a>  
					</td>	   
				</tr>
			</table>
		</form>
	</div>
		
</div>

<?
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_FOOTER_2);
?>
<div class="footer2">
	<table width="100%">
		<tr>
			<td style="padding-left:10px;">
			<? if($_SESSION["userid"]!=""){echo '<a href="'.$PROFILE.'?pid='.$_SESSION["userid"].'"><em>'.$_SESSION["username"].'</em></a> | ';} ?><a href="#show" title="Initiate a new trend" rel="facebox">New trend</a> | <? if($_SESSION["userid"]!=""){echo '<a href="#show_cur" title="Current trend" rel="facebox">Current trend</a> | ';} ?><? if($_SESSION["userid"]==""){echo '<a href="#showlogin" rel="facebox">Sign in</a>';}else echo '<a href="'.$LOGOUT.'">Sign out</a>'; ?><? if($_SESSION["userid"]==""){echo ' | <a href="'.$SETTINGS.'">Join Now</a>';} ?><? if($_SESSION["userid"]!=""){echo ' | <a href="'.$NOTIFICATIONS.'">Notifications <span style="color:red">'.$text.'</span></a>';} ?>&nbsp;&nbsp;
			</td>
		</tr>
	</table>
</div>