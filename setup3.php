

<div  style="margin-left:100px">   
<?php
error_reporting(1);
 /*
$host = "localhost";
$username = "root";
$password = "";
$dbname = "lifetechocms";

include('connect2.php');
  
*/

 
include('connect2db.php');
 

 $table_default = array( 'block','category','content_editor','content_page','content_tbl','lifepage','menu_mgt','lifetechfunction','module_form','registrations','module_tbl','site_tb','slide_priority','theme_form','theme_tbl_region','user_data','user_permission','user_role');
         
       
 

$tableList = array();
   // $result = $connect2db->query("SHOW TABLES");
 $result = $connect2db->prepare("SHOW TABLES"); 
 
     $result ->execute();
    $table_fields = $result->fetchAll(PDO::FETCH_NUM);
  
    $kingaaeusdf ="Unseen";
    
  foreach( $table_default as $value ) {
          //  echo "Value is $value <br />";
  	foreach($table_fields as $column){
$kjsrjwfk2i_djse = $column[0] ;
            if ($kjsrjwfk2i_djse == $value ){
            	$kingaaeusdf ="Seen";
            	//echo $kingaaeusdf.$kjsrjwfk2i_djse.'<br>';
            }

         }
         	if($kingaaeusdf != "Seen"){
         		echo '<br /><br /><br /><h1><font color="Red">Sorry!!! You need to go and Import the Tables to your Database before finalizing your Installation</font><br> Or Drop all the Tables and Re-Import them</h1>
         		<br><h2>The database file is named <strong><font color="Blue">lifetech_installation_db</font></strong> in your package name </h2>';
         		echo ' &nbsp; &nbsp; &nbsp; &nbsp;  A quick guideline on how to import <strong>TABLES</strong>  to your database: &nbsp;  <a href="import_table_to_database.pdf" target="_blank">Read this</a><br />
<br />';
         		exit();
         	}
         	$kingaaeusdf ="Unseen";
//echo $kjsrjwfk2i_djse.'<br>';
}
 echo '<h1> Congratulations Lifetech Software Successfully Installed!!!<h1>';
   echo '<h1> You can Login to your developer account to start developing your website  <a href="developer/"> Go there</a>!!!<h1>';
   
    
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ) ? "https://" : "http://";
 $djkasdgs = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 $djkasdgs=substr($djkasdgs,0,-11);

  $qry1= $connect2db->prepare("update site_tb set site_host_address='$djkasdgs'  where sn='1'");
if($qry1->execute()){
   
unlink("setup.php");
unlink("setup2.php");
unlink("setup3.php");	
unlink("connect2db.php");	
  }

  
if(isset($_POST['restore'])){ 
/*echo 'welcome';
$host = $_POST['hostname'];
$username =  $_POST['username'];
$password = $_POST['password'];
$dbname = $_POST['database'];
*/ 




//define('_PATH', dirname(__FILE__));

// Unzip selected zip file
 $filename = $_FILES['file']['name'];
  $database=$filename;
  $module_name = pathinfo($filename, PATHINFO_FILENAME);
   $ext = pathinfo($filename, PATHINFO_EXTENSION);
   if($ext <> 'sql'){
   echo '<h1> .....Sorry the file selected is not Supported by this System...<br /></h1>';
   }else{
   $tmp_name = $_FILES['file']['tmp_name'];
  // rename ($filename, "../../images/".$filename."");
    $database= $tmp_name;
   $sqlScriptss = file_get_contents($tmp_name);
   $query = ''; $mnt4= '';
						$sqlScript = file($database);
						foreach ($sqlScript as $line)	{
						$mnt4= $mnt4 . $line;
							
							$startWith = substr(trim($line), 0 ,2);
							$endWith = substr(trim($line), -1 ,1);
							$endWithL = substr(trim($line), -22 ,22);
							//22				
							/*if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
								continue;
							}*/
								
							$query = $query . $line;
							if ($endWith == ';') {
							if(strpos($query, 'AUTOCOMMIT') !== false){}else{ 
							$query = substr($query,0,-1); $query.=';';
							$qry= $connect2db->prepare($query);
							$qry->execute();
							// echo 'almost on it'.$query;
							  }
								
								//mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
								$query= '';		
							}
						
						}




						

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ) ? "https://" : "http://";
 $djkasdgs = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 $djkasdgs=substr($djkasdgs,0,-11);

  $qry1= $connect2db->prepare("update site_tb set site_host_address='$djkasdgs'  where sn='1'");
if($qry1->execute()){
   
unlink("setup.php");
unlink("setup2.php");
unlink("setup3.php");	
unlink("connect2db.php");	
   
   echo '<h1> Congratulations Lifetech Software Successfully Installed!!!<h1>';
   echo '<h1> You can Login to your developer account to start developing your website  <a href="developer/"> Go there</a>!!!<h1>';
   
   exit();
  }else{
echo '<h1> .....Sorry Your Software was unable to Finalize...<br />!<h1>';

   echo '<h1>Retry!!!! <a href="setup3.php"> Again</a>!!!<h1>';
    
   exit();

  }

					

   
   }












}





?>  

 
</div>