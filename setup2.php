<?php
include('connect2db.php');
?>

 <div  style="margin-left:100px"> <br /><br /><br /><br /> 


<h2><font color="#0000FF">Step2: PhP Configuration Setup </font></h2> 
 
<a href="setup.php">Click Back to Database Integration</a>
<br /><strong>Note:</strong>In respective of PhP version you are using, You are to search for <strong>PhP.ini COnfiguration</strong> file in your server directories and adjust require paramatemer on <strong>RED</strong> font to meet atleast the minimum requirement on <strong>Black</strong> font infront of them..<br />
Once you change them <strong>restart</strong> your server then those parameters on<strong> RED</strong> font will change to <strong>GREEN</strong> font
<br /><br />Search for: <strong>upload_max_filesize, &nbsp;post_max_size, &nbsp;max_execution_time</strong> to adjust the value<br />
<br />


<br />How to Setup your PhP Configuration Guide in <strong>XAMPP</strong>  for Lifetech Usage: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   <a href="How to change Configuration settings in PhP for lifetech usage.pdf" target="_blank">Click this</a><br />
<br />
<br />
Please refresh This Page after you have succesfuly change the COnfiguration settings and you have restarted your XAMPP Machine
<br />
<br />


<?php /*
$host = "localhost";
$username = "root";
$password = "";
$dbname = "lifetechocms";

include('connect2.php');
  
*/

$maxUpload      = (int)(ini_get('upload_max_filesize'));
$maxPost        = (int)(ini_get('post_max_size'));
$maxtime      = (ini_get('max_execution_time'));
//echo $maxtime  ;
 
 $a=0;$b=0;$c=0;

if ($maxUpload < 40){
echo ' <br /> <font color="#FF0000"; size="6px"> Upload Max Size</font>   <small> should not be less than 40M</small><br />';
  
 }else{$a=2;
 echo ' <h2><div style="color:#00CC00"> Upload Max Size</div></h2>';
 }

if ($maxPost < 40){
echo ' <br /> <font color="#FF0000"; size="6px"> Post Maximum Size</font>   <small> should not be less than 40M</small><br />';
  
 }else{$b=3;
 echo '<h2> <div style="color:#00CC00"> Post Maximum Size</div></h2>';
 }
if ($maxtime < 120){ 
  echo ' <br /> <font color="#FF0000"; size="6px">  Maximum Execution Time</font>   <small> should not be less than 120sec</small><br />';

 }else{$c=4;
 echo ' <h2><div style="color:#00CC00">Maximum Execution Time </div></h2>';
 }
if($a==2 && $b==3 && $c==4){
echo '<br /><br /><a href="setup3.php">Verified!!!, Click Next </a>';
}
 


?>    

 
</div>