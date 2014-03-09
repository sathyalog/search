<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php define('BASE_URL', 'http://10.10.11.95/search/filesearch.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Deep Search</title>
<script src="js/jquery-2.1.0.js"/></script>
<script src="js/jquery.zclip.js"/></script>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
<body style="padding-top:1%;padding-left:1%;">
<button type="button" class="btn btn-default btn-lg">
  <a href="<?php echo BASE_URL; ?>"/><span class="glyphicon glyphicon-home" style="padding-left:2%"></span> </a>
</button>
<!--<img src="img/Redim_Logo.png" style="padding-left: 45%;padding-right: 45%;"/>-->
<img  src="img/search196.png" style="display: block; margin: 0 auto; "/>
<blockquote>
<div class="bs-callout bs-callout-info">Search Results</div>
<?php 
###################################################
/*$mtime = microtime(); 
   $mtime = explode(" ",$mtime); 
   $mtime = $mtime[1] + $mtime[0]; 
   $starttime = $mtime; */
    function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$time_start = microtime_float();
#####################################################   
$getpath = $_POST["userText1"];	
$strsear=$_POST["stringsearch"];
//$directory="C:\wamp\www\apps";
/*$radio=$_POST["radiobutton"];
switch ($radio)
{
case "image":
  $searchtype=$strsear."*.jpg";
  //$result=$strsear."*.png";
  break;
case "doc":
    $searchtype=$strsear."*.doc";
  break;
case "ppt":
   $searchtype=$strsear."*.ppt";
  break;
case "xls":
  $searchtype=$strsear."*.xls";
  break;
case "audio":
  $searchtype=$strsear."*.mp3";
  break;
case "video":
 $searchtype=$strsear."*.mp4";
  break;
default:
  $searchtype=$strsear."*.php";
}
*/
$i=1;$count=0;$status=0;
//echo $strsear;
$path = realpath($getpath);
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename)
{		
		//$getfile= pathinfo($filename );
		//echo $getfile['extension'];
       $resultspath[$i]=$filename->getPathname();
	   foreach( $resultspath as $value)
		{
	   if(stripos(basename($value),$strsear)!==false){
	   echo $value."<br/>";
	   $count++;
	   $status=1;
	   }
	   }

}
if($status!=1)
{
echo "Sorry. File not found.";
}
#############################################
/* $mtime = microtime(); 
   $mtime = explode(" ",$mtime); 
   $mtime = $mtime[1] + $mtime[0]; 
   $endtime = $mtime; 
   $totaltime = ($endtime - $starttime); 
   $sec = ($totaltime-$totaltime%1000)/1000;
	$min = ($sec-$sec%60)/60;
   echo "This page was executed in ".$min." minutes".$sec."seconds.";*/
   
  



$time_end = microtime_float();
$time = $time_end - $time_start;
$min = $time/60;
echo $count." files found.";echo "<br/>";
echo "Time taken = ".$min." minutes ";//$time seconds\n";
   
########################################################   
?>
</body>
</html>
