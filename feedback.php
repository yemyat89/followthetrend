<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_FEEDBACK_1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FollowTheTrend | Feedback</title>

<link rel="shortcut icon" href="<? echo $IMAGE_DIR; ?>mainicon.ico" />
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $FEEDBACK_SCRIPT; ?>"></script>

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
			<div id="feedback_main">
			<? 
			if($_SESSION["feed"]=="finish")
			{ 
				include($_SERVER["DOCUMENT_ROOT"].$INSIDE_FEEDBACK_2);
				?>
				<div style="color:#060; font-size:27px;">Thank you for your feedback</div>
				<?
			}
			else
			{ ?>
				<div class="title">Your feedback is very important to us.</div>
			<? 
			} 
			?>
				<div id="feedback_container">
				  <div align="center" id="error"  style="color:#F00; display:none">Please fill all.</div>
				  <form method="get" onsubmit="return validate(this)" action="<? echo $FEED; ?>">
					Dear FollowTheTrend,<br/>
					<textarea rows="5" style=" width:490px; overflow:auto;  font-family:'Times New Roman', Times, serif; font-size:17px;" name="data"></textarea>
					<p> name:
					  <input name="name" style="width:100px" maxlength="25" type="text" />
					  email:
					  <input name="email" maxlength="25" style="width:220px" type="text" />
					  <input type="submit" name="send" value="Send" />
					</p>
				  </form>
				</div>
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
</div>
<?
include($_SERVER["DOCUMENT_ROOT"].$FOOTER);
?>
</body>
</html>
