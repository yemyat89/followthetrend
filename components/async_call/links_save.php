<?
session_start();

include($_SERVER["DOCUMENT_ROOT"]."/"."talktweet/includes/variables.php");
include($_SERVER["DOCUMENT_ROOT"].$SQLCONNECT);

$_SESSION["trend"] = $_POST["tname"];

$query = "select * from trend_user where user_id='".$_SESSION["userid"]."'";
$result = doQuery($query);
$rows = getResult($result);

if(count($rows)<1)
{
	echo '
	<script>
		parent.location = "'.$INDEX.'"
	</script>
	';
}

if($_SESSION["talkname"] != $_POST["tname"] || $_SESSION["userid"]=="")
{
	//Do nothing
}
else{
	if (!@$content = file_get_contents_curl($_POST['url'])) {
		echo " ftt__none__";
		exit;
	}

	$r=parsetags($content);
	$title = $r["title"];
	
	$query = "insert into link values(NULL,'".$title."','".$_POST['url']."','".$_SESSION['trend']."')";
	$flag = doQuery($query);
	
	if($flag){	
		$query = "select link_id from link where url='".$_POST['url']."' and trend_name='".$_SESSION['trend']."'";	
		$result = doQuery($query);
		$rows = getResult($result);
		$link_id = $rows[0][0];		
		$query = "insert into user_link values ('".$_SESSION["userid"]."','$link_id')";
		$flag2 = doQuery($query);	
	}	
	else
	{
		echo " ftt__none__";
		exit;
	}
	
	$current = date("Y-m-d H:i:s",time()-date("Z"));
	$query = "update trend set created_at='".$current."' where name='".$_SESSION["trend"]."'";
	$flag = doQuery($query);
}

function parsetags($contents) {
   
    $result = false;
    $title = null;
    $metaTags = null;
    preg_match('/<title>([^>]*)<\/title>/si', $contents, $match );
    if (isset($match) && is_array($match) && count($match) > 0)  {
      $title = strip_tags($match[1]);
    }
    preg_match_all('/<[\s]*meta[\s]*name="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);
    if (isset($match) && is_array($match) && count($match) == 3) {
      $originals = $match[0];
      $names = $match[1];
      $values = $match[2];
      if (count($originals) == count($names) && count($names) == count($values)) {
        $metaTags = array();
        for ($i=0, $limiti=count($names); $i < $limiti; $i++) {
          $metaTags[strtolower($names[$i])] = array (
            'html' => htmlentities($originals[$i]),
            'value' => $values[$i]
          );
        }
      }
    }
 
    $result = array (
      'title' => $title,
      'metaTags' => $metaTags
    );
 
    return($result);
}
function file_get_contents_curl($url) {
	$ch = curl_init();
	$useragent="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";  

	curl_setopt($ch, CURLOPT_USERAGENT, $useragent); 
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_MAXREDIRS,100); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$data = curl_exec($ch);
	curl_close($ch);
	
	return $data;
}

function getMetaTitle($content){
	$pattern = "|<[\s]*title[\s]*>([^<]+)<[\s]*/[\s]*title[\s]*>|Ui";
	if(preg_match($pattern, $content, $match))
		return $match[1];
	else
		return false;
}

function getMetaDescription($content) {
	$metaDescription = false;
	$metaDescriptionPatterns = array("/]*>/Ui", "/]*>/Ui");
	foreach ($metaDescriptionPatterns as $pattern) {
		if (preg_match($pattern, $content, $match)){
			$metaDescription = $match[1];
			break;
		}
	}
	return $metaDescription;
}
?>