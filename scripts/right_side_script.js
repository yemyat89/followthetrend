 $(document).ready(function(){	
	
	showPopularTalk();
	showTwitterTrend();
		
	setInterval (showPopularTalk, 60000 );
		
	function showPopularTalk()
	{
		$.ajax({		   
		   url: POPULAR_TALK,
		   cache: false,
		   dataType: "html",
		   success: function(data){			 
			 $("#loading2").hide();
			 $("#popularTrend").html(data);			 		 
		   }
	 });
		
	}
	
	function showTwitterTrend()
	{
		$.ajax({		   
		   url: TWITTER_TREND,
		   cache: false,
		   dataType: "html",
		   success: function(data){			
			if(data.indexOf("ftt__none__")<0){
				$("#loading2_1").hide();
				$("#twitter_trend").html(data);
			}
			else
			{
				setTimeout(showTwitterTrend(),"5000");			
			}
		   }
		   		   
	 });
		
	}
   
});