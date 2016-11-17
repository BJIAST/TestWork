<?php 

require_once 'connect.php';

function editHeader(){
  $mysqli = connect_db();


  if( isset($_POST['headerText'])){
    $header = $_POST['headerText'];

    $sqlSelect = "SELECT * FROM posts WHERE header != ''";
    $result = $mysqli->query($sqlSelect);
    if ($result->num_rows > 0){
        $sqlUpd = "UPDATE posts SET header='$header' WHERE header != ''";
        $mysqli->query($sqlUpd);
    }else{

        $sqlIns = "INSERT INTO posts (header) VALUES('$header')";
        $mysqli->query($sqlIns);
    }

}else if (isset($_POST['description'])){
    $description = $_POST['description'];

    $sqlSelect = "SELECT * FROM posts WHERE paragraph != ''";
    $result = $mysqli->query($sqlSelect);
    if ($result->num_rows > 0){
        $sqlUpd = "UPDATE posts SET paragraph='$description' WHERE paragraph != ''";
        $mysqli->query($sqlUpd);
    }else{

        $sqlIns = "INSERT INTO posts (paragraph) VALUES('$description')";
        $mysqli->query($sqlIns);
    }

}
}

editHeader();
?>