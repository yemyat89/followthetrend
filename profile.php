<?
include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_PROFILE_1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FollowTheTrend | <? echo $profile_name ?></title>

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
	<div style="display:none; margin-left:40px" id="change_picture">
		<div style="color:blue; margin-bottom:10px; font-size:21px">Change profile picture</div>
		<form enctype="multipart/form-data" method="POST" action="<? echo $PICTURE_CHANGE; ?>">
			<input type="file" name="uploaded_file" style="margin-left:0px; font-weight:bold;" /><br/>
			<input style="margin-left:0px; width:200px; font-weight:bold; margin-top:5px;" type="submit" name="upload" value="Upload" />
		</form>
	</div>
	<table class="maintable" cellspacing="0">
		<tr>
			<td class="mainleft" align="center" style="margin-left:0px">
				<br/>
				<?
				if($user==NULL){
					echo '<h1 style="text-align:center" >Sorry! There is no user with this id.</h1><br/>';
					exit;
				}
				?>
				<?
				$query = "select * from trend_user as tu, trend as t where tu.trend_id=t.trend_id and user_id='".$profile_id."'";
				$result = doQuery($query);
				$user_trend = getResult($result);			
				?>
				<?
				if($profile_id == $current_user_id){
				?>
				<div style="border:solid grey; border-width:2px; width:560px; margin-left:30px; margin-top:20px; padding:0px">
					<span style="color:#000; font-size:23px;">
						<table border='0' cellspacing='0' style="width:100%">
							<tr>
								<td align='center' valign='middle' style=" padding:10px;" width=20%>
									<img style="border:dotted #000 thin;" src="<? echo $user[0]["photo"]; ?>" width="150" height="150" /><br/>
								</td>
								<td align='left' valign='top' rowspan='2' style=" padding:10px;padding-top:20px;">
									<div style="border:dotted #000 thin; min-height:140px; padding:10px">
										<div style="color:blue; font-size:21px"><? echo $profile_name; ?></div>
										<p>
											<? 
											if($user[0]['about'] != ""){
												echo $user[0]['about']; 
											}
											else{
												echo "<i style='color:grey'>You haven't written anything about you.</i>"; 
											}
											?>
											<a rel="facebox" href="#change_about">[Change this]</a>
										</p>
									</div>
									<div style="display:none; margin-left:40px" id="change_about">
										<div style="color:blue; margin-bottom:10px; font-size:21px">Change about me</div>
										<form method="GET" action="<? echo $PICTURE_CHANGE; ?>">
											<textarea name="about_me" style="width:250px; height:100px"/><? echo $user[0]['about'];  ?></textarea><br/>
											<input style="margin-left:0px; width:200px; font-weight:bold; margin-top:5px;" type="submit" name="submit_about" value="Save" />
										</form>
									</div>
									<div style="border:dotted #000 thin; margin-top:5px; padding:5px">
										<?
											if($user_trend==NULL){
										?>
												Currently interested in no trend.
										<?
											}
											else{											
										?>
												Currently interested in <a href="<? echo $TREND; ?>?tname=<? echo urlencode($user_trend[0]['name']) ?>"><? echo $user_trend[0]['name']; ?></a>.												
											<? } ?>
									</div>
								</td>
							</tr>
							<tr>
								<td align='center' valign='middle' style=" padding:10px; padding-top:0px;" width=20%>
									<a href="#change_picture" rel="facebox"><button style="width:150px; font-family: sans-serif; font-size: 16px; font-weight:bold">Change Picture</button></a><br/>
									<form method="GET" action="<? echo $PICTURE_CHANGE; ?>">
										<input type="hidden" name="pid" value="<? echo $profile_id; ?>" />
										<input type="hidden" name="pname" value="<? echo $profile_name; ?>" />
										<input type="submit" name="use_default" value="Use default" style="width:150px; font-weight:bold" />
									</form>
								</td>
							</tr>
						</table>
					</span>
				</div>
				<?
				}
				else
				{
				?>
					<div style="border:solid grey; border-width:2px; width:560px; margin-left:30px; margin-top:20px; padding:0px">					
						<span style="color:#000; font-size:23px;">
							<table border='0' cellspacing='0' style="width:100%">
								<tr>
									<td align='center' valign='middle' style=" padding:10px;" width=20%>
										<img style="border:dotted #000 thin;" src="<? echo $user[0]["photo"]; ?>" width="150" height="150" /><br/>									
									</td>
									<td align='left' valign='top' style=" padding:10px;padding-top:10px;">
										<div style="border:dotted #000 thin; min-height:100px; padding:10px">
										<div style="color:blue; font-size:21px"><? echo $profile_name; ?></div>
										<p>										
										<? echo $user[0]['about']; ?>										
										</p>
										</div>										
										<div style="border:dotted #000 thin; margin-top:5px; padding:5px">
										<?										
											if($user_trend==NULL){
										?>
												Currently interested in no trend.
										<?
											}
											else{											
										?>
												Currently interested in <a href="<? echo $TREND; ?>?tname=<? echo urlencode($user_trend[0]['name']) ?>"><? echo $user_trend[0]['name']; ?></a>.	
											<? } ?>
										</div>									
									</td>
								</tr>
							</table>
						</span>
					</div>
				<?
				}
				?>
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
<?
include($_SERVER["DOCUMENT_ROOT"].$INSIDE_PROFILE_2); 
?>
</body>
</html>
