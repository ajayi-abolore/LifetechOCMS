




<?php /*
$host = "localhost";
$username = "root";
$password = "";
$dbname = "lifetechocms";

include('connect2.php');
  
*/




 //$pageurl =lifetechrandom_string(150);
	
	
			
//rename ($pageurl, "$pageurl");




if(isset($_POST['dbinfo'])){
//echo 'welcome';
$host = $_POST['hostname'];
$username =  $_POST['username'];
$password = $_POST['password'];
$dbname = $_POST['database'];

echo '<br /><br /><br /><br />';
if( empty($host) || empty($username)      || empty($dbname) ){
echo '<div  style="margin-left:100px"><font   color="#FF0000"> Your elements must not be empty</font></div>';
}else{

try{$connect2db = new PDO("mysql:dbname=$dbname; host=$host", $username, $password);
$connect2db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);$connect2db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($connect2db){//global $connect2db;


 $pageurl= 'connect2db.php'; 
	
	$fh = fopen($pageurl,"w");
	 	
		$content='<?php 
 

$host = "'.$host.'";
$username =  "'.$username.'";
$password = "'.$password.'";
$dbname = "'.$dbname.'";



try{$connect2db = new PDO("mysql:dbname=$dbname; host=$host", $username, $password);
$connect2db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);$connect2db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($connect2db){

}}catch(PDOException $e){echo "The Database Information Supplied is not Correct, Reverify!!!";} 



 
?>';
fwrite($fh,$content);
			fclose($fh);
			
$pageurldelete= 'connect2dbdelete.php'; 
	
	$fhdelete = fopen($pageurldelete,"w");
	 	
		$contentdelete='<?php 
 

$host = "'.$host.'";
$username =  "'.$username.'";
$password = "'.$password.'";
$dbname = "'.$dbname.'";

include("connect2.php");
 
?>';


	fwrite($fhdelete,$contentdelete);
			fclose($fhdelete);
			rename ($pageurldelete, "includes/connect2db.php");
			$pageurldelete= 'connect2dbdelete.php'; 
	
	$fhdelete = fopen($pageurldelete,"w");
	 	
		$contentdelete='<?php 
 

$host = "'.$host.'";
$username =  "'.$username.'";
$password = "'.$password.'";
$dbname = "'.$dbname.'";
 
 
?>';


	fwrite($fhdelete,$contentdelete);
			fclose($fhdelete);
			rename ($pageurldelete, "includes/connect_config.php");
echo '<div  style="margin-left:100px"><font color="#00CC33"><h2>Connection successful</h2> </font></div>';
echo'<script>window.location= "setup2.php";</script>';				
			

}}catch(PDOException $e){echo'<div  style="margin-left:100px"><font   color="#FF0000"><h2>The Database Information Supplied is not Correct, Reverify!!!</h2></font></div>';} 

}

}


?> 
<br /><br /><br /><br />
<div  style="margin-left:100px">   
<form action="setup.php" method="post">


<h2><font color="#0000FF">Step1: Database Configuration </font></h2>You are to firstly create your database and add your database priviledge to it, then supply the information here for verification<br /><br />
<br />
<br /><strong>Note:</strong>If you are creating a student account, then use this compulsory details so that you can be getting the general <strong>activation license</strong><br />
Database Name: <strong>lifetechocms</strong><br />
Package Name: <strong>lifetech_ocms</strong><br />
Host Name:<strong>localhost</strong><br />
Username:<strong>root</strong><br />
Password:<strong>Nill</strong><br />
<br /><br /><br />
<br />

Username:  <input type="text" name="username"/>  <br /><br />

Host Name: <input type="text" name="hostname" value="localhost"/>  <br /><br />

Password: <input type="password" name="password" />  <br /><br />

Database Name :   <input type="text" name="database" />  <br /><br />


<input type="submit" name="dbinfo" value="Verify Connection"/>
</form>

</div>