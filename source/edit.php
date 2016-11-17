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

}
}

editHeader();
?>