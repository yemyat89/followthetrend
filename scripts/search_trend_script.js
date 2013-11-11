$(document).ready(function(){
	var update = true;					 
	$('a[@rel*=facebox]').facebox();	
    var qry = document.getElementById("myForm").tname.value;
	qry = encodeURIComponent(qry);	
	showRealtime();
	showPopularTalk();
	setInterval (showRealtime, 25000 );
	
	function showRealtime()
	{
		if(update == true){
			var url="http://search.twitter.com/search.json?rpp=10&callback=?&q=";		
			query = qry;
			$.getJSON(url+query,function(json){			
				$("#loading").hide();
				$("#realtime").html('');
				$.each(json.results,function(i,tweet){			
					var content = '';
					content = '<div style="font-style:normal; padding:8px;">';
					content += '<div style="float:left;"><img src="' + tweet.profile_image_url + '" width=50 height=50 class="twitter_image"> &nbsp;</div>';
					content += '<div style="margin-left:5px;">';
					content += '<strong><a target="_blank" href="http://www.twitter.com/' + tweet.from_user + '">' + tweet.from_user + '</a></strong>';
					content += tweet.text;
					content += '<div style=margin-top:2px;" class="note">';
					content += '<em>' + relativeTime(tweet.created_at) + '</em>';
					content += '</div>';
					content += '</div>';
					content += '<hr/>';
					content += '</div>';
					$("#realtime").append(content);
				});
			});	
		}
	}	
	function showPopularTalk()
	{
		$("#popularTrend").load(POPULAR_TALK);
	}
    $("#popular-link").click(function () {		
		$("#active").hide(); 
		showPopularTalk();
		$("#popular").show();
		
		$("#active-link").css("color","white");
		$("#popular-link").css("color","red");		
    });	
    $("#active-link").click(function () {		
		$("#popular").hide();
		$("#active").show();
		
		$("#popular-link").css("color","white");
		$("#active-link").css("color","red");
    });	
	 $("#tweet").click(function () {
   	  	$("#fav_rsl").hide();
	    $("#link_result").hide();	
		$("#news_result").hide();	
		$("#tweets").show();
		
		$("#link").css("color","white");
		$("#favourite").css("color","white");
		$("#tweet").css("color","red");
    });	
	$("#msg_close").click(function () {
      $("#msg").hide();
    });
	$("#link").click(function () {	
	  $("#fav_rsl").hide();
	  $("#tweets").hide();		
	  $("#news_result").hide();	
	  $("#link_result").show();
	  
	  $("#tweet").css("color","white");
	  $("#favourite").css("color","white");
	  $("#link").css("color","red");
	    
	  $.ajax({		   
		 url: LINKS_SEARCH,
		 cache: false,
		 dataType: "html",
		 data: "tname="+qry,
		 success: function(data){
		   $("#loading2").hide();		   
		   $("#link_result").html(data);
		    
		 }
	  });
  });	
	
	
	$("#favourite").click(function () {	
		
	  $("#tweets").hide();		
	  $("#news_result").hide();	
	  $("#link_result").hide();
	  $("#fav_rsl").show();
	   
	  $("#tweet").css("color","white");
	  $("#link").css("color","white");
	  $("#favourite").css("color","red");
	    
	  $.ajax({		   
		 url: FAV_SEARCH,
		 cache: false,
		 dataType: "html",
		 data: "tname="+qry,
		 success: function(data){				 
		   $("#loading4").hide();		   
		   $("#fav_rsl").html(data);
		    
		 }
	  });
  });	
  
  $("#sw_pause").click(function () {	
	if(update){
		update = false;
		$("#sw_pause").html("Resume updating");
	}
	else
	{
		update = true;
		showRealtime();
		$("#sw_pause").html("Pause updating");
	}
  });
  
  $("#sw_refresh").click(function () {		
		$("#realtime").html('');
		$("#loading").show();		
		if(!update){
			update = true;			
			$("#sw_pause").html("Pause updating");
		}
		showRealtime();
  });	
});