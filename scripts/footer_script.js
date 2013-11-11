$(document).ready(function(){
	$('a[@rel*=facebox]').facebox();	
	showPopularTalk();	
	setInterval (showPopularTalk, 30000 );		
	function showPopularTalk()
	{
		$("#popularTrend").load(POPULAR_TALK);
	}	
	function updateTrend()
	{
		$("#checker").load(ONLINE_CHECK_SCRIPT);
	}	
});