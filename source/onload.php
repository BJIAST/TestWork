<?php 
require_once 'connect.php';

function printRes($result){
    if (($row = $result->fetch_assoc()) != false){
        echo "<div id='top'>".$row['top']."</div>";
        echo "<div id='left'>".$row['leftcol']."</div>";
    }
}

function printH($resultH){
    if(($row = $resultH->fetch_assoc()) != false){
        echo $row['header'];
    }else{
        echo "<h1> That is default header on clean DB</h1>";

    }
}

function onLoadSquare(){
  $mysqli = connect_db();

  $sql = "SELECT * FROM squarepos";
  $result = $mysqli->query($sql);
  printRes($result);
  $mysqli->close();

}

function onLoadHeader(){
  $mysqli = connect_db();

  $sqlHeader = "SELECT * FROM posts WHERE header != ''";
  $resultH = $mysqli->query($sqlHeader);
  printH($resultH);
  $mysqli->close();
}


?>