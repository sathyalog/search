<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php define('BASE_URL', 'http://localhost/search/filesearch.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search Results</title>
<script src="js/jquery-2.1.0.js"/></script>
<script src="js/jquery.zclip.js"/></script>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<link rel="shortcut icon" href="img/search.ico" type="image/x-icon"/>
<body style="padding-top:1%;padding-left:1%;">
<button type="button" class="btn btn-default btn-lg">
  <a href="<?php echo BASE_URL; ?>"/><span class="glyphicon glyphicon-home" style="padding-left:2%"></span> </a>
</button>
<!--<img src="img/Redim_Logo.png" style="padding-left: 45%;padding-right: 45%;"/>-->
<img  src="img/search196.png" style="display: block; margin: 0 auto; "/>
<blockquote>
<div class="bs-callout bs-callout-info">Search Results</div>
<?php
	if (ob_get_level() == 0) ob_start();
$countv=$countnew=$countfoul=0;

#######################################

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$time_start = microtime_float();



######################################
$GLOBALS['status']='';
    
error_reporting(0);

  
$getpath = $_POST["userText1"];	

$dir=$getpath;
if(!realpath($dir))
{
echo "Not a valid directory path.";
}
else
{


$strsear=$_POST["stringsearch"];
$radio=$_POST["radiobutton"];


#######################################################


function recursiveGlob($dir, $ext) {


$search = $_POST['stringsearch']; 
$str =  $search; 
$str .= ",".strtoupper($search); 
$str .=  ",".ucfirst($search); 
$str .=  ",".strtolower($search); 
//$str .= ",".ucfirst(strtolower($search)); 


//$files = glob($dir."/*{".$str."}*", GLOB_BRACE);

//$strsear=ucfirst($_POST["stringsearch"]);
$strsear=$_POST["stringsearch"];
//$strupper=strtoupper($_POST["stringsearch"]);
//$strlow=strtolower($_POST["stringsearch"]);

	$globFiles = glob("$dir".DIRECTORY_SEPARATOR."*$strsear*.$ext");
	
	//$globFiles = glob("$dir".DIRECTORY_SEPARATOR."*{".$str."}*.$ext",GLOB_BRACE);
	
	//$globFiles = glob("$dir".DIRECTORY_SEPARATOR."*$strupper*.$ext");
	//$globFiles = glob("$dir".DIRECTORY_SEPARATOR."*$strlow*.$ext");
    $globDirs  = glob("$dir/*",GLOB_ONLYDIR);

    foreach ($globDirs as $dir) {
        recursiveGlob($dir, $ext);
		
    }
	
	$errors = array_filter($globFiles);

		if (!empty($errors)) {
		$countnew=count($globFiles);
		
		$GLOBALS['countnew']=$GLOBALS['countnew']+$countnew;
		}
	//ob_flush();
    foreach ($globFiles as $file=>$v) {
	
	?><ul class="list-group">
<!--<a href="" data-copy="<?php echo $v;?>"  class="list-group-item">
	<a href="" data-copy="<?php echo $v;?>" class="copy" class="list-group-item">--><?php
		
        echo "$v"; 
		ob_flush();
		flush();
        sleep(0.1);
		 ?><!--</a>--></ul>
		<?php	
		if(count($v)!=0)$status=1;
		$GLOBALS['status']=$status;
		
	}
	
	
}


######################################################


switch ($radio)
{
case "image":
  recursiveGlob($dir, 'png');
  recursiveGlob($dir, 'jpg');
  //$result=$strsear."*.png";
  break;
case "doc":
   recursiveGlob($dir, 'doc');
   recursiveGlob($dir, 'docx');
  break;
case "ppt":
 recursiveGlob($dir, 'ppt');
  break;
case "xls":
  recursiveGlob($dir, 'xls');
  break;
case "audio":
 recursiveGlob($dir, 'mp3');
  break;
case "video":
  recursiveGlob($dir, 'mp4');
  break;
case "others":
 // $getfiles->recursiveGlob($dir, 'php');
  recursiveGlob($dir, 'php');
  break;
case "all":
  recursiveGlob($dir, '*');
  break;
default:
  recursiveGlob($dir, '*');
}
if(is_null($status)){
echo "Sorry. No matches found.";
}
}
####################################################
$time_end = microtime_float();
$time = $time_end - $time_start;
$min = $time/60;
//echo "Time taken = ".$min." minutes ";//$time seconds\n";
echo "Time taken = ".$time." seconds ";//$time seconds\n";
echo "<br/>".$countnew."Files found.";
###################################################


ob_end_flush(); 
?></blockquote>
<script>
$("a.copy").on('click', function (e) {
  e.preventDefault();
}).each(function () {
  $(this).zclip({
    path: 'http://www.steamdev.com/zclip/js/ZeroClipboard.swf',
    copy: function() {
      return $(this).data('copy');
    }
  });
});
</script>

</body>
</html>
