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
        echo "That is default header on clean DB";

    }
}
function printD($resultD){
    if(($row = $resultD->fetch_assoc()) != false){
        echo $row['paragraph'];
    }else{
        echo "That is default paragraph on clean DB";

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
function onLoadDescription(){
  $mysqli = connect_db();

  $sqlDesc = "SELECT * FROM posts WHERE paragraph != ''";
  $resultD = $mysqli->query($sqlDesc);
  printD($resultD);
  $mysqli->close();
}


?>