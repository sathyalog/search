<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<style>
body 
{
#background-image:url('img/searchengine.jpg');

}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search File..</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

	
<!--<script src="js/path.js"/></script>-->
<link rel="stylesheet" href="assets/css/styles.css" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" type="text/css" />
<!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
	<script src="js/button.js"/></script>	
</head>
<link rel="shortcut icon" href="img/search.ico" type="image/x-icon"/>
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

<body>

<br/>

<img  src="img/search196.png" style="display: block; margin: 0 auto; padding-top:1%;"/><br/>
<div id="container" style="padding-left:2%;"> > Welcome to Folder Search!</div>
<p class="lead" ><blockquote>
<form id="form1" name="form1" method="post" action="searchresult.php" role="form" >
<div style="float:right;padding-right:2%;">
    <input type="text" placeholder="Enter Path(c:\x\y\..) here.." name="userText1" id="userText1" style="#direction:RTL;border:none;border-bottom:1px solid #aaa;outline: none;color: #777777;display: block;font-family: 'Open Sans Condensed',sans-serif;font-size: 26px;margin: 0 auto 0px;padding: 10px;text-align: center;" required>
</div><br/><br/><br/>
  <div class="form-group" >
  
  <input type="text" id="stringsearch" name="stringsearch" class="form-control" placeholder="Enter file name.." required/>
  <br />
  <br /><blockquote>
  <input name="radiobutton" type="radio" value="image" class="radio" />
  Images
  <input name="radiobutton" type="radio" value="doc" class="radio"/>
  Docs
  <input name="radiobutton" type="radio" value="ppt" class="radio"/>
  PPT
  <input name="radiobutton" type="radio" value="xls" class="radio"/>
  XLS
  <input name="radiobutton" type="radio" value="audio" class="radio"/>
  Audio
  <input name="radiobutton" type="radio" value="video"  class="radio"/>
  Video
  <input name="radiobutton" type="radio" value="others" class="radio"/>
  Others
  <input name="radiobutton" type="radio" value="all" class="radio"/>
  Any Extension
  <br /></blockquote>
  <br />

  <label>
  <button type="submit" id="formsubmit" class="btn btn-primary" data-loading-text="Searching...">Submit</button>  
  <button type="reset" class="btn btn-primary">Reset</button>


 
  <br />
  <br />
    </label>
	
  </div>

</form></p></blockquote>
<p>&nbsp; </p>

		<script src="assets/js/jquery.shuffleLetters.js"></script>
        <script src="assets/js/script.js"></script>
	
<script>

//{
//$('#formsubmit').button();

$('#formsubmit').click(function() {
if(($("#userText1").val())&&($("#stringsearch").val()))
{
    $(this).button('loading');
	}
});
//}
</script>
	
	<div class="bs-callout bs-callout-danger">{Images - jpg/png} # {Docs - doc/docx} # {PPT - ppt/pptx} # {XLS - xls/xlsx} # {Audio - mp3} # {Video - mp4} # {Others - php/etc} # {Any Ext - *.*}</div>
	
	

</body>

</html>
