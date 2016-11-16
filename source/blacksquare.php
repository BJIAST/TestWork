<?php 
require_once 'connect.php';

function onMouseUp(){
  $mysqli = connect_db();
  $userIp = $_SERVER["REMOTE_ADDR"];

  $sql = "SELECT * from squarepos WHERE ipadress = '$userIp'";
  if ($result = $mysqli->query($sql)){

    $left = $_POST['left'];
    $top = $_POST['top'];

    if ($result->num_rows > 0){

      $sqlUpd = "UPDATE squarepos SET top = $top , leftcol = $left WHERE ipadress = '$userIp'";
      $mysqli->query($sqlUpd);

    }else{

     $sqlIns = "INSERT INTO squarepos VALUES(NULL,'$userIp','$top','$left')";
     $mysqli->query($sqlIns);

   }
   $mysqli->close();
 }else{
  echo 'Неудачно! ' . $mysqli->error;
}
}
onMouseUp();

?>