<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$TWITTER);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_RESET_1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FollowTheTrend | Account Settings</title>

<LINK REL="SHORTCUT ICON" HREF="<? echo $IMAGE_DIR; ?>mainicon.ico">
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />
<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>


<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>"></script>
<script src="<? echo $RESET_SCRIPT; ?>"></script>

</head>

<body class="main">

<div class="header">
<?
include($_SERVER["DOCUMENT_ROOT"].$MENU);
?>
</div>

<div class="middle" align="center">

	<table class="maintable" cellspacing="0">
		<tr>
		  <td class="mainleft">
			<br/>
			<? if($_SESSION["modify"]=="ok"){ ?>
			<div align="center" style="background-color:#FFFF33"><h3>Your account information has been updated. &nbsp;<a href="<? echo $LOGIN; ?>">Log in here</a></h3></div>
			<? } ?>
			<? if($_SESSION["modify"]!="ok"){ ?>
			<p>
			<div style="margin-left:20px;" align="left"><h1>Password Reset</h1></div>
			</p>
			
			<div class="signup">
			<span class="error" id="all_err"></span>
			<form method="post" onsubmit="return validate(this)" onsubmit="return validate(this);" action="<? echo $PHP_SELF; ?>?email=<? echo $email; ?>&key=<? echo $key; ?>">
			<table border="0" cellspacing="5">
					  <tr>
						<td align="left" height="29" valign="top">Email </td>
						<td valign="top" align="left"><label></label>						  
						  <input name="email2" disabled="disabled" type="text" size="25" value="<? echo $email; ?>" /><br/>
						 </td>
					  </tr>
					  <tr>
						<td align="left" width="167" height="30" valign="top">New Password* </td>
						<td valign="top" align="left"><label></label>
						<input name="password" type="password" size="25" maxlength="25" value=""/></td>
					  </tr>
					  <tr>
						<td align="left" height="30" valign="top">Confirm Password* </td>
						<td valign="top" align="left"><label></label>
						<input name="password2" type="password" size="25" maxlength="25" value=""/><br/>
						<span class="error" id="pwd_err"></span>
						</td>
					  </tr>
					  <tr>                    
					  <td>&nbsp;</td>
						<td style="padding-right:0px;" align="right" colspan="" width="" valign="top">
						<input type="submit" name="signup" value="Save changes" />
						</td>
					  </tr>
			</table>
			</form>
		 </div>
		 <? } ?>
		  </td>
		  <td class="mainright">
			<?
			include($_SERVER["DOCUMENT_ROOT"].$RIGHT_SIDE);
			?>
		  </td>
	  </tr>
	</table>
	<?
	include($_SERVER["DOCUMENT_ROOT"].$LOWER);
	?>
	<p>&nbsp;</p>
</div>	
<?
include($_SERVER["DOCUMENT_ROOT"].$FOOTER);
unset($_SESSION["modify"]);
?>
</body>
</html>