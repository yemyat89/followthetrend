<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_INDEX_1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">

<title>FollowTheTrend | Home</title>

<LINK REL="SHORTCUT ICON" HREF="<? echo $IMAGE_DIR; ?>mainicon.ico">
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />
<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>"></script>
<script src="<? echo $INDEX_SCRIPT; ?>"></script>

</head>
<body class="main">

<div class="header">
<?
include($_SERVER["DOCUMENT_ROOT"].$MENU);
?>
</div>
<br/><br/><br/>
<div class="middle" align="center">
 <br/>
	<div align="center" id="s_box">
	<div id="s_box_label"><b>Discover what is happening now</b></div>
	<form id="myForm" name="myForm" method="get" action="<? echo $PHP_SELF ?>">
		<table border='0'>
			<tr>
				<td><img src="<? echo $IMAGE_DIR; ?>sc.png" id="s_image" title="Search what is happening now"/></td>
				<td valign="center" align="center"><input name="tname" id="s_input" title="Search the active trends" type="text" value="" />
				<div align="center" id="s_box_links"><a href="#showWhat" rel="facebox">What is FollowTheTrend?</a> | <a href="<? echo $HOWTO; ?>">How to use?</a><? if($_SESSION["userid"]==""){ ?> | <a href="<? echo $SIGNUP ?>">Join Now!</a><? } ?>
				</div>
				</td>			
				<td valign="center">&nbsp;<a href="#" onclick="submitform()"><img onMouseOver="over(this)" onMouseOut="out(this)" src="<? echo $IMAGE_DIR; ?>search.png" id="search_button"/></a>
				<br/>&nbsp;
				</td>
			</tr>
		</table>
	</form>
	</div>
    
	<table class="maintable" cellspacing="0">
		<tr>
		<td class="mainleft">
			<div id="index_message">
			<div id="msg_title" class="title">Connecting people based on the interest</div>
			<p id="msg_itself">
			<?
			include($_SERVER["DOCUMENT_ROOT"].$INSIDE_INDEX_2);
			?>
			</p>
			</div>
			<br/>
			&nbsp;&nbsp;<font class="title">Popular Tweets </font><a id="sw_pause" href="#">[Pause updating]</a>
			<div id="loading" align="center" class="loading_container_index"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
			<div id="highlight">
			</div>
			<div id="showWhat">
			<?
			include($_SERVER["DOCUMENT_ROOT"].$INSIDE_INDEX_3);
			?>		
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
	<p>&nbsp;</p>
</div>
<?
include($_SERVER["DOCUMENT_ROOT"].$FOOTER);
?>
</body>
</html>
