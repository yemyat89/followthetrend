//Constants
var BASE_DIR = "talktweet/";

var CHAT_SAVE = "/" + BASE_DIR + "components/async_call/" + "chat_save.php";
var HIGHLIGHT = "/" + BASE_DIR + "components/async_call/" + "highlight.php";
var FAV_SEARCH = "/" + BASE_DIR + "components/async_call/" + "fav_search.php";
var DISPLAY = "/" + BASE_DIR + "components/async_call/" + "display.php";
var DISPLAY_ALL = "/" + BASE_DIR + "components/common/" + "display_all.php";
var NUMBER_PPL = "/" + BASE_DIR + "components/async_call/" + "number_ppl.php";
var HOW = "/" + BASE_DIR + "components/async_call/" + "how.php";
var LINKS_DEL = "/" + BASE_DIR + "components/async_call/" + "links_del.php";
var LINKS_SAVE = "/" + BASE_DIR + "components/async_call/" + "links_save.php";
var LINKS_SEARCH = "/" + BASE_DIR + "components/async_call/" + "links_search.php";
var ONLINE_PPL = "/" + BASE_DIR + "components/async_call/" + "online_ppl.php";
var POPULAR_TALK = "/" + BASE_DIR + "components/async_call/" + "popular_talk.php";
var REALTIME = "/" + BASE_DIR + "components/async_call/" + "realtime.php";
var SHOW_FAV = "/" + BASE_DIR + "components/async_call/" + "show_fav.php";
var SHOW_LINK = "/" + BASE_DIR + "components/async_call/" + "show_link.php";
var STATUS = "/" + BASE_DIR + "components/async_call/" + "status.php";
var TWEET_SAVE = "/" + BASE_DIR + "components/async_call/" + "tweet_save.php";
var TWITTER_TREND = "/" + BASE_DIR + "components/async_call/" + "twitter_trend.php";
var ONLINE_CHECK_SCRIPT = "/" + BASE_DIR + "crontab/" + "online_check_script(footer).php";

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }

    return vars;
}

function formatTwitString(str)
{
	str=' '+str;
	str = str.replace(/((ftp|https?):\/\/([-\w\.]+)+(:\d+)?(\/([\w/_\.]*(\?\S+)?)?)?)/gm,'<a href="$1" target="_blank">$1</a>');
	str = str.replace(/([^\w])\@([\w\-]+)/gm,'$1@<a href="http://twitter.com/$2" target="_blank">$2</a>');
	str = str.replace(/([^\w])\#([\w\-]+)/gm,'$1<a href="http://twitter.com/search?q=%23$2" target="_blank">#$2</a>');
	return str;
}

function relativeTime(pastTime)
{	
	var origStamp = Date.parse(pastTime);
	var curDate = new Date();
	var currentStamp = curDate.getTime();	
	var difference = parseInt((currentStamp - origStamp)/1000);

	if(difference < 0) return false;

	if(difference <= 5)				return "Just now";
	if(difference <= 20)			return "Less than a minute ago";
	if(difference <= 60)			return "1 minute ago";
	if(difference < 3600)			return parseInt(difference/60)+" minutes ago";
	if(difference <= 1.5*3600) 		return "One hour ago";
	if(difference < 23.5*3600)		return Math.round(difference/3600)+" hours ago";
	if(difference < 1.5*24*3600)	return "One day ago";
	
	var dateArr = pastTime.split(' ');
	return dateArr[4].replace(/\:\d+$/,'')+' '+dateArr[2]+' '+dateArr[1]+(dateArr[3]!=curDate.getFullYear()?' '+dateArr[3]:'');
}