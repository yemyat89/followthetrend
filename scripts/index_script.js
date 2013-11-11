function submitform(){
	var t=document.getElementById("myForm");	
	if(document.myForm.tname.value!=""){
		t.submit();
	}
}
$(document).ready(function(){
	var update = true;
	showHighlight();
	setInterval(showHighlight, 25000 );
	$("#sw_pause").click(function () {	
		if(update){
			update = false;
			$("#sw_pause").html("[Resume updating]");			
		}
		else
		{
			update = true;
			showHighlight();
			$("#sw_pause").html("[Pause updating]");
		}
	});
	function showHighlight()
	{			
		if(update==true)
		{			
			var trends = new Array();
			var url="http://search.twitter.com/trends.json?callback=?";			
			$.getJSON(url,function(json){								
				$.each(json.trends,function(i,tweet){			
					trends.push(tweet.name);				
				});
				
				var number = Math.floor(Math.random()*trends.length)							
				var url="http://search.twitter.com/search.json?rpp=10&callback=?&q=";
				query = escape(trends[number]);
				
				$.getJSON(url+query,function(json){			
					$("#loading").hide();
					$("#highlight").html('');					
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
						$("#highlight").append(content);
					});
				});	 
				
			});				
			
		}
	}	
	
 });

 
