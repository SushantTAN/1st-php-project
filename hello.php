<?php
include("connection.php");

$query = "INSERT INTO STUDENT VALUES ()";
$data = mysqli_query($conn, $query);

if($data){
    echo "Data inserted into database";
}

?>