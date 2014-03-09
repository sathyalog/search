<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
error_reporting(0);
if (ob_get_level() == 0) ob_start();

$dir='c:\wamp\www';
$strsear='add';
function recursiveGlob($dir, $ext) {
	//ob_start();
	$globFiles = glob("$dir".DIRECTORY_SEPARATOR."*admin*.$ext");
	//ob_flush();
	//print_r($globFiles);
    $globDirs  = glob("$dir/*",GLOB_ONLYDIR);
	print_r($globDirs);
      //echo "scanning";  
	  ob_flush();
	  flush();
		sleep(1);
    foreach ($globDirs as $dir) {
        recursiveGlob($dir, $ext);
		
    }
	//ob_start();
	 foreach ($globFiles as $file=>$v) {
		//ob_start();
	        echo "$v"; echo "<br/>";
		//ob_flush();	
	}
	//ob_flush();
	
}
recursiveGlob($dir, 'php');







/*for ($i = 0; $i<10; $i++){

        echo "<br> Line to show.";
		
        //echo str_pad('',4096)."\n";    

        ob_flush();
        flush();
        sleep(1);
		//echo "<br/>";
		
}


echo "Done.";
*/
ob_end_flush();
//echo "";
?>

<body>
<!--<img src='img/7.gif'/>-->
</body>
</html>
