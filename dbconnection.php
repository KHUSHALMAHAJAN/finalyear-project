<?php
error_reporting(0);
    $servername = "localhost";
    $username = "root";
    $pawword = "";
    $dbname = "responsiveform";

    $conn = mysqli_connect($servername,$username,$pawword,$dbname);
    if($conn){
       //echo "connection ok";
    }
    else{
        echo "not connection";
    }
?>