$(document).ready(function(){		$.ajax({		   		   url: HOW,		   cache: false,		   dataType: "html",		   success: function(data){			 			 $("#loading").hide();			 $("#how").append(data);			 		 		   }	 });	});