<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_SEARCH_TREND_1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>FollowTheTrend | Search Trend</title>

<LINK REL="SHORTCUT ICON" HREF="<? echo $IMAGE_DIR; ?>mainicon.ico">
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />
<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>"></script>
<script src="<? echo $SEARCH_TREND_SCRIPT; ?>"></script>

</head>
<body class="main">

<div class="header">
<?
include($_SERVER["DOCUMENT_ROOT"].$MENU);
?>
</div>
<div align="center" class="middle">
	<div id="msg" align="left" style="margin-top:15px;"> 
		<div style="float:right; margin-right:3px; margin-top:3px;"><a id="msg_close" href="#"><img id="close_btn_img" src="<? echo $IMAGE_DIR; ?>error.gif"/></a></div>
		You can see the real-time tweets from Twitter, favourite tweets and links being shared. The links are shared website addresses in the current active trends and the favourites are user favourite tweets in the current active trends. You can join to the active trends. You can create your new trend as well. A trend is a place where you can communicate and share with people who are following that trend.
	</div>
	<form id="myForm" method="get" action="<? echo $PHP_SELF ?>"> 
	<table class="searchmain" cellspacing="3">
		<tr>
			<td class="searchleft">
				<div class="searchbox">  
					<table border="0" align="center">
						<tr>
							<td valign="middle">
							<input id="tname" name="tname" style="width:500px;" type="text" value="<? echo $title; ?>" />
							</td>
							<td align="left">
							<input type="submit" name="submit" value="Search"/>
							</td>
						</tr>
					</table>
				</div>
				<div id="menu" style="margin-right:12px; margin-top:3px; padding-left:5px; float:right">
				<a id="tweet" title="Latest tweets from Twitter" style="background-color:#006; color:red; font-size:12px;" href="#">&nbsp;Tweets&nbsp;</a> <a title="User favourite tweets" style="background-color:#006; color:#FFF; font-size:12px;" href="#" id="favourite">&nbsp;Favourites&nbsp;</a> <a title="Links being shared in the current active talks" style="background-color:#006; color:#FFF; font-size:12px;" href="#" id="link">&nbsp;Links&nbsp;</a>
				</div>
				<hr style="margin-top:13px;"/>
				<div id="tweets">
					<em>&nbsp;&nbsp;Latest tweets about </em><font class="title"><? echo $title; ?></font> <span style="float:right; margin-right:12px; margin-top:8px;"><a id="sw_refresh" href="#">Refresh</a> | <a id="sw_pause" href="#">Pause updating</a> | <span style="border:none thin;"><a title="Create this trend" href="<? echo $CREATE; ?>?title=<? echo urlencode($title); ?>"> Create</a></span></span>
					<div id="loading" align="center" style="margin-top:50px;" width="90px" height="90px"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
					<div id="realtime"></div>
				</div>
				<div id="news_result" style="max-width:610px; overflow:hidden; margin-left:5px; margin-right:10px; display:none">
					<div id="loading3" align="center" style="margin-top:50px;" width="90px" height="90px"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
				</div>
				<div id="link_result" style="margin-left:10px; margin-right:10px; display:none">
					<div id="loading2" align="center" style="margin-top:50px;" width="90px" height="90px"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
				</div>
				<div id="fav_rsl" style="margin-left:10px; margin-right:10px; display:none">
					<div id="loading4" align="center" style="margin-top:50px;" width="90px" height="90px"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
				</div>
			</td>
			<td class="searchright">				
				<div class="switch" align="right"><a title="Related active trends with search keyword" style="background-color:#006; color:red; padding-left:3px; padding-right:3px;" id="active-link"  href="#">Related</a> <a id="popular-link" title="Popular trends" style="background-color:#006; color:#FFF; padding-left:3px; padding-right:3px;" href="#">Popular</a><br/>
				</div>
				<div align="center" class="search_trend_right" id="active" > 	
					<div class="hiddenContent">
						<div align="left" class="hiddenHead"><font class="title">Related Active Trends</font></div>
						<div class="talk">						
							<div align="justify" style="padding:10px;">
							<?
							include($_SERVER["DOCUMENT_ROOT"].$INSIDE_SEARCH_TREND_2);
							?>			
							</div>
						</div>
					</div>
				</div>
				<div align="center" id="popular" class="search_trend_right" style="display:none;" class="hidden">
					<div class="hiddenContent">  		
						<div align="left" class="hiddenHead"><font class="title">Popular Trends</font></div>
						<div class="talk">			
							<div style="padding:10px;" id="popularTrend">
							</div>  
						</div>			
					</div>
				</div>				
			</td>
		</tr>
	</table>
	</form>
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