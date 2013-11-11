<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_CREATE_1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FollowTheTrend | Already Existed</title>

<LINK REL="SHORTCUT ICON" HREF="<? echo $IMAGE_DIR; ?>mainicon.ico">
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />
<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>"></script>

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
		<div align="center" style="padding-top:20px; padding-right:0px;">
			
				<?
				echo "<h1>This trend is existed. Do you want to join?</h1>";
				echo "			
				<span align='center' style='padding:10px; border:dotted thin;'>";
				echo "<a href='".$TREND."?tname=".$tname."'><button>Yes</button></a> | <a href='".$INDEX."'><button>No</button></a>";
				echo "
				</span>
				";
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
	
	<? include($_SERVER["DOCUMENT_ROOT"].$LOWER); ?>
</div>	
<?
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_CREATE_2);
?>

</body>
</html>