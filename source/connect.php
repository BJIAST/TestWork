<?php 
function connect_db(){
   $mysqli = new mysqli("localhost", "root", "", "testdb");

   if( $mysqli->connect_error){
    die('Connect Error: ' . $mysqli->connect_error);
}
return  $mysqli;
}
?>