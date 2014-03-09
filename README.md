search
======

Project Root Cause: This is a simple file search program developed in php 5.4. When I was searching for a simple open source file search in internet, unfortunately i figured many of the projects are stagnate to php older versions and stopped working (as many functions got deprecated). Hence i thought to write up my own code in an simple manner. This project is developed in OOPHP and designed in HTML5 and CSS3 with simple and professional interface.

How to use it?

Download zip file and extract it into your wamp server(www) or xampp server(htdocs) and run it in browser.

How to search: 
Step1: Enter path 
Step2: Enter filename to search 
Step3: Select the extension type and click enter

Validations: If you enter a wrong path like test/test etc it throws an error like "Not a valid directory path". If the desired filename not found it shows "No results found" Output: It simply shows the filepath(C:\yourfolder\yoursubfolder\yourfilename.ext) in a list where copy to clipboard is activated.

Developers can add options in searching for extensions in searchresult.php switch-case statement easily.

Hope this simple file search will helps you alot if you are searching for a filename in 1000's of folders.
