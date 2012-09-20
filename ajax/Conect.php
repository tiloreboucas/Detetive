 <?
$dbname="detetive";
$usuario="root";
$password="";
 
if(!($id = mysql_connect("localhost",$usuario,$password))) {
   echo "localhost,$usuario,$password";
   exit;
} 
 
if(!($con=mysql_select_db($dbname,$id))) { 
   echo "$dbname,$id";
   exit; 
} 
?>