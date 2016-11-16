<?php 
require_once 'connect.php';

function select_list(){
  $mysqli = connect_db();
  $userIp = $_SERVER["REMOTE_ADDR"];

  $sql = "SELECT * from squarepos WHERE ipadress = '$userIp'";
  if ($result = $mysqli->query($sql)){

    if ($result->num_rows > 0){

     if( isset($_POST['left']) && isset($_POST['top']) ){
      $left = $_POST['left'];
      $top = $_POST['top'];


      $sqlUpd = "UPDATE squarepos SET top = $top , leftcol = $left WHERE ipadress = '$userIp'";

      if ($mysqli->query($sqlUpd) === TRUE) {

        echo "Record updated successfully";

      } else {

        echo "Error updating record: " . $mysqli->error;

      }
    }
  }else{
   $top=0;
   $left=0;
   $sqlIns = "INSERT INTO squarepos VALUES(NULL,'$userIp','$top','$left')";
   $mysqli->query($sqlIns);
   echo "<div id='top'>".$top."</div>";
   echo "<div id='left'>".$left."</div>";
 }
}else{
  echo 'Неудачно! ' . $mysqli->error;
}
}
print_r(select_list());
echo "<br>";
?>