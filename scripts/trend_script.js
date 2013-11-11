function resizeFrame(f) {
   	f.style.height = f.contentWindow.document.body.scrollHeight + "px";
}
function remove(data){
	 $.ajax({
	   type: "POST",
	   url: LINKS_DEL,
	   data: "id="+data,
	   success: function(msg){				
			$("#showLinks").load(SHOW_LINK);
	   }
	 });		
	 $("#more_link").hide();
	$('html, body').animate({
	scrollTop: $("#ifr").offset().top
	}, 800);
}  

function like(num)
{
	alert("This tweet has been put into favourite tweets. ");
	$.ajax({
			   type: "POST",
			   url: TWEET_SAVE,
			   data: "count="+num,
			   success: function(msg){			   
					
			   }
	});	
}

$(document).ready(function(){

	var http = getHTTPObject();
	var update = true;
	var qry = document.getElementById("tn").innerHTML;
	var latest = "0";
	
	$("a[rel='facebox']").facebox();
	numOfPeople();
	showTalk();
	showLinks();
	showRealtime();
	showOnlinePeople();
	showPopularTalk();
	
	setInterval (showTalk, 5000 );	
    setInterval (showRealtime, 25000 );	
	setInterval (showLinks, 30000 );
	function updateTrend()
	{		
		$("#checker").load(ONLINE_CHECK_SCRIPT);
	}
	
	function showOnlinePeople()
	{
		$("#onlinePeople").load(ONLINE_PPL);		
	}
	
	function showPopularTalk()
	{
		$("#popularTrend").load(POPULAR_TALK);
	}	
	
	function updateStatus()
    {	
		var title = document.title;
		var trend = document.getElementById("current").innerHTML;		
		trend2 = "FollowTheTrend | "+trend;		
		$("#status").load(STATUS+"?current="+trend);
    }
	
	function showTalk()
	{		
	
		var el = document.getElementById('display'); // div element
		var h_original = el.scrollHeight; // height of div scroll
		
		$.ajax({		
		   url: DISPLAY,		  
		   cache: false,
		   dataType: "html",
		   data: "tname="+encodeURIComponent(qry),
		   success: function(data){			 
			 $("#loading_chat").hide();			 
			 $("#display").html(data);	
			 numOfPeople();			 
			 var el = document.getElementById('display'); // div element
			 var h = el.scrollHeight; // height of div scroll
			 var y = el.scrollTop; // vertical scroll offset from top (of scrollHeight)
			 var c = el.clientHeight; // scroll bar height
			 
			 if(h>h_original)
			 {
				 var scrollBottom = h - (y + c);
				 
				 document.getElementById('display').scrollTop += scrollBottom;
			 }
		   } 
		   
		});	
	}
	function showDisplayAll()
	{
		$("#displayAll").load(DISPLAY_ALL+"?talkname="+encodeURIComponent(qry));
	}
	
	function showRealtime()
	{
		if(update==true)
		{		
			var url="http://search.twitter.com/search.json?rpp=10&callback=?&q=";		
			query = encodeURIComponent(qry);
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
	
	function adjustWindow()
	{
		$('html, body').animate({
		scrollTop: $("#moveable").offset().top
		}, 800);
	}
	
	function showLinks()
	{			
		$.ajax({
			   type: "POST",
			   url: SHOW_LINK,			   
			   success: function(msg){					
					$("#showLinks").html(msg);			
					$("#loading_link").hide();
			   }
		});	
	}
	
	function numOfPeople()
	{			
		var arr = getUrlVars();
		$("#oll").load(NUMBER_PPL + "?tname=" + arr['tname']);		
	}
	
	function getHTTPObject() {
		  var xmlhttp; 
		  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
			try {
			  xmlhttp = new XMLHttpRequest();
			} catch (e) {
			  xmlhttp = false;
			}
		  }
		return xmlhttp;
	}
	$("#talk_box").click(function () {		
	
		$("#loading_chat").show();
		
		var t = document.getElementById("input_ch");
		var val = t.value;
		
		if(val!=""){		      
		 document.getElementById("input_ch").value="";		 
		 http.open("GET", CHAT_SAVE + "?tname=" + encodeURIComponent(qry) + "&words=" + encodeURIComponent(val), true);		 
		 http.onreadystatechange = handleHttpResponse;
		 http.send(null);						  
		}
		t.focus();
		
	});
	function handleHttpResponse() {

	  if (http.readyState == 4) {

		showTalk();

	  }

	}
	
	$("#chat-link").click(function () {		
		$("#chat_box").show();  
		adjustWindow();
    });
	
	$("#showAll").click(function () {						
		all = window.open(DISPLAY_ALL+"?talkname="+encodeURIComponent(qry));					
		
    });
	
	$("#chat-close").click(function () {		
		$("#chat_box").hide();      			
		
    });
	$("#sw_pause").click(function () {	
	if(update){
		update = false;
		$("#sw_pause").html("[Resume updating]");
	}
	else
	{
		update = true;
		showRealtime();
		$("#sw_pause").html("[Pause updating]");
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
	$("#share-link").click(function () {
		$("#more_link").hide();
		$("#link_div").toggle("slow");  		
		showLinks();
		$('html, body').animate({
		scrollTop: $("#ifr").offset().top
		}, 800);
    });	
		
	$("#share-link2").click(function () {
		$("#more_link").hide();
		$("#link_div").hide();  
		showLinks();
		
    });	
	$("#share-link-close").click(function () {		
		$("#link_div").hide();		
    });
	
	$("#bulletin-link").click(function () {		
		$("#online").hide();
      	$("#popular").hide();
		showPopularTalk();
		$("#chatting").show();
		//adjustWindow();
		
		$("#popular-link").css("color","white");
		$("#online-link").css("color","white");
		$("#bulletin-link").css("color","red");
    });
	
    $("#popular-link").click(function () {		
		$("#online").hide();
      	$("#chatting").hide();
		showPopularTalk();
		$("#popular").show();
		//adjustWindow();
		
		$("#bulletin-link").css("color","white");
		$("#online-link").css("color","white");
		$("#popular-link").css("color","red");
    });
	
	$("#online-link").click(function () {		
		$("#popular").hide();
      	$("#chatting").hide();
		showOnlinePeople();
		numOfPeople();
		$("#online").show();
		//adjustWindow();
		
		$("#bulletin-link").css("color","white");
		$("#popular-link").css("color","white");
		$("#online-link").css("color","red");
    });
	
	$("#online-link2").click(function () {		
		$("#popular").hide();
      	$("#chatting").hide();
		showOnlinePeople();
		numOfPeople();
		$("#online").show();
		//adjustWindow();
		
		$("#bulletin-link").css("color","white");
		$("#popular-link").css("color","white");
		$("#online-link").css("color","red");
    });
		
	$("#share").click(function () {
      $("#more_link").toggle();
	  $('html, body').animate({
		scrollTop: $("#ifr").offset().top
		}, 800);
    });
	
	$("#msg_close").click(function () {
      $("#msg").hide();
    });
	
	$("#all_fav").click(function () {
	  $("#realtime").hide();								  
      $("#fav").load(SHOW_FAV);
	  $("#rtitle").hide();
	  $("#ftitle").show();
	  $("#fav").show("slow");
	  
	  var twt = document.getElementById("twt_link");
	  var fav = document.getElementById("fav_link");
	  
	  fav.style.border = "solid";
	  fav.style.borderWidth = "2px";
	  fav.style.borderColor = "red";
	  
	  twt.style.border = "none";
    });
	
	$("#twt").click(function () {
	  $("#fav").hide();		
	  $("#ftitle").hide();
	  $("#rtitle").show();
	  $("#realtime").show("slow");								        	  
	  
	  var twt = document.getElementById("twt_link");
	  var fav = document.getElementById("fav_link");
	  
	  twt.style.border = "solid";
	  twt.style.borderWidth = "2px";
	  twt.style.borderColor = "red";
	  
	  fav.style.border = "none";
    });
	
	$("#add_link").click(function () {			
					
		var url = document.getElementById("url_link").value;
		$("#loading_link").show();
		if(url!="")
		{
			
			document.getElementById("url_link").value="";
			
			 $.ajax({
			   type: "POST",
			   url: LINKS_SAVE,			   
			   data: "url="+url+"&tname="+encodeURIComponent(qry),
			   success: function(msg){			   
					
					if(msg.indexOf("ftt__none__")<0){
						showLinks();
					}
					else
					{
						$("#loading_link").hide();
						alert("The URL could not be retrieved");
						return;
										 
					}
			   }
			 });		
			 $("#more_link").hide();
			$('html, body').animate({
			scrollTop: $("#ifr").offset().top
			}, 800);
		}			 
    });
});
