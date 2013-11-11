<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$COMMON);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_TREND_1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>FollowTheTrend | <? echo $rmText; ?></title>

<LINK REL="SHORTCUT ICON" HREF="<? echo $IMAGE_DIR; ?>mainicon.ico">
<link href="<? echo $STYLE; ?>" rel="stylesheet" type="text/css" />
<link href="<? echo $STYLE_FACEBOX; ?>" media="screen" rel="stylesheet" type="text/css"/>

<script src="<? echo $COMMON_JS; ?>"></script>
<script src="<? echo $JQUERY; ?>"></script>
<script src="<? echo $FACEBOX; ?>"></script>
<script src="<? echo $TREND_SCRIPT; ?>"></script>

</head>

<body class="main">
<div id="status" style="display:none"></div>
<div class="header">
<?
include($_SERVER["DOCUMENT_ROOT"].$MENU);
?>
</div>

<div align="center" class="middle">
	<div id="num_ppl_container"><strong><span id="oll"></span> </strong></div>
	<div id="msg"> 
		<div id="close_btn_container"><a id="msg_close" href="#"><img id="close_btn_img" src="<? echo $IMAGE_DIR; ?>error.gif"/></a></div> 
		You can see the real-time tweets and links shared for this trend. You can tell anything to people in this talk by posting on the bulletin board. Please use @ character in front of the user whom you want to refer to so that it is highlighted in that user's side. You can share websites which you think cool and interesting for other users in this trend.
	</div>
	<table class="searchmain" cellspacing="3">
		<tr>
			<td class="searchleft">    
				<div title="Share links that you find interesting for the people in the trend" style="border:solid thin; text-align:center; margin-bottom:2px; font-size:14px; background-color:yellow">You can hide/view shared links by clicking on Links at the bottom.</div>
				
				<div style="display:none" id="current"><? echo $_SESSION["talkname"]; ?></div>
				
				<div id="link_div">
					<div id="link_head"><em>Latest Shared Links</em><span id="trend_link_upper"><a href="#" id="share">Add</a> | <a id="share-link2" href="#">Hide</a></span></div>
					<div align="center" id="more_link">
					URL: <input id="url_link" type="text" /> <button id="add_link">Share</button>
					</div>
					<div id="loading_link"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
					
					<div id="showLinks"></div>      	

				</div>				 
				<div style="border:none;">
					<div id="menu_bar_container_trend" align="right">
						<a href="#showsearch" rel="facebox"><img src="<? echo $IMAGE_DIR; ?>search.jpg" width="40px" height="35px" title="Search Another Trend"/></a>&nbsp;
						<a title="Latest Tweets" href="#" id="twt"><img id="twt_link" style="border:solid red; border-width:2px;" src="<? echo $IMAGE_DIR; ?>twt.png" width="35" height="35"/></a>&nbsp;
						<a title="Favourite Tweets" href="#" id="all_fav"><img id="fav_link" src="<? echo $IMAGE_DIR; ?>fav.png" width="35" height="35"/></a>
					</div>
					<table width="500" id="showsearch"  style="display:none; " height="100%" border="0" cellspacing="0" bordercolor="#000000">
						<tr>
						  <td width="500" align="center" valign="middle" bgcolor="" class="update">			
							<div align="center">  			
							<p>            
							<form method="get" action="<? echo $SEARCH_TREND; ?>">
								<input name="tname" type="text" size="40" />			
								<input type="submit" name="submit" style="font-weight:bold" value="Search"/>		
							</form>
							</p>
							</div>				
						  </td>		  
						</tr>
					</table>
					<div id="rtitle" style="margin-left:10px; margin-top:8px;"><em>Latest tweets about </em><font class="title"><span id="tn"><? echo $rmText; ?></span></font>  <span style="color:#F00; font-size:12px;"><a id="sw_refresh" href="#">[Refresh]</a> | <a id="sw_pause" href="#">[Pause updating]</a></span><hr/></div>
					<div id="loading" align="center" style="margin-top:50px;" width="90px" height="90px"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
					<div id="ftitle" style="margin-left:10px; display:none; margin-top:8px;"><em>Favourite tweets for </em><font class="title"><? echo $rmText; ?></font> <hr/></div>
					
					<div id="realtime">
					</div>
					
					<div id="fav" style="display:none;">
					</div>
					
				</div>
			</td>
			<td class="searchright">			
				<div id="moveable">	
					<div class="switch"><a id="bulletin-link" style="background-color:#006; color:red; padding-left:3px; padding-right:3px;" title="Bulletin board" href="#">Bulletin</a> <a id="popular-link" style="background-color:#006; color:#FFF; padding-left:3px; padding-right:3px;" title="Popular trends" href="#">Popular</a> <a id="online-link" title="People who are interested in this trend" style="background-color:#006; color:#FFF; padding-left:3px; padding-right:3px;" href="#">People</a><br/>
					</div>
					<div align="center" id="online" class="trend_right_boxes" style="display:none;">
						<div class="hiddenContent">
							<div align="left" class="hiddenHead">
								<table style="" width="100%">
									<tr><td align="left"><font class="title">People in Trend</font></td>
									</tr>
								</table>
							</div>
							<div id="talk">
								<div class="talk">
									<div style="padding:10px;" id="onlinePeople">
									</div>									
								 </div>
							 </div>
						 </div>
					</div>
					<div align="center" id="popular" class="trend_right_boxes" style="display:none;">
						<div class="hiddenContent">
							<div align="left" class="hiddenHead">
								<table style="" width="100%">
								<tr><td><font class="title">Popular Trends</font></td>
								</tr>
								</table>
							</div>
							<div id="talk">
								<div class="talk">
									<div style="padding:10px;" id="popularTrend">
									</div>
								</div>
							</div>
						</div>
					</div>					
					<div align="center" id="chatting" class="trend_right_boxes">
						<div class="hiddenContent">
							<div class="hiddenHead">
								<table width="100%"><tr>
								<td><font class="title">Bulletin Board</font></td>
								<td align="right"><a href="#show2" id="showAll"><img src="<? echo $IMAGE_DIR; ?>view.jpg" width="30px" height="30px" title="View all posts on Bulletin Board"/></a></td>
								</tr>
								</table>
							</div>
							<div id="talk">
								<div id="display" class="talk"></div>
								<div id="loading_chat" align="center" style="position:absolute; right:2px; border:solid thin; background-color:white; bottom:23px;" width="90px" height="90px"><img src="<? echo $IMAGE_DIR; ?>loading.gif"/></div>
							</div>
						</div>
					</div>
				</div>
			</td>
	</tr>
	</table>
	<?
	include($_SERVER["DOCUMENT_ROOT"].$LOWER);
	?>
	<p>&nbsp;</p>
</div>
<?
include($_SERVER["DOCUMENT_ROOT"].$FOOTER_TREND);
?>
</body>
</html>