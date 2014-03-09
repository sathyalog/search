<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 

$dir    = 'c:\wamp\www\apps';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

print_r($files1);
print_r($files2);


/*$a = new RegexIterator(
    new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator('c:\wamp\www\apps')
    ),
    '/REGEX HERE/',
    RegexIterator::MATCH
);

foreach ($a as $v) {
    echo "$v\n"; //$v will be the filename
}*/
?>
</body>
</html>
