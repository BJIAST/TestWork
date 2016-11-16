<?php 
require_once 'connect.php';

function printRes($result){
    if (($row = $result->fetch_assoc()) != false){
    echo "<div id='top'>".$row['top']."</div>";
    echo "<div id='left'>".$row['leftcol']."</div>";
}
}

function onLoadPage(){
  $mysqli = connect_db();

  $sql = "SELECT * FROM squarepos";
  $result = $mysqli->query($sql);
    printRes($result);

  $mysqli->close();

}


?>