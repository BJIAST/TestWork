<?php 

function connect_db(){
    $mysqli = new mysqli("localhost", "root", "", "testdb");
    
    if( $mysqli->connect_error){
        die('Connect Error: ' . $mysqli->connect_error);
    }
    return  $mysqli;
}
function select_list(){
    $mysqli = connect_db();
    $userIp = $_SERVER["REMOTE_ADDR"];

    $sql = "SELECT * from squarepos WHERE ipadress = '$userIp'";
    if ($result = $mysqli->query($sql)){
        if ($result->num_rows > 0){
           echo "Стою!";
       }else{
            $top=0;
            $left=0;
           $sqlIns = "INSERT INTO squarepos VALUES(NULL,'$userIp','$top','$left')";
           $mysqli->query($sqlIns);
       }
   }else{
    echo 'Неудачно! ' . $mysqli->error;
}
}
print_r(select_list());
echo "<br>";
?>