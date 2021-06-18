<?php
    $DBhost = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "db_atacadao";

    $conn = mysqli_connect($DBhost,$DBuser,$DBpassword,$DBname);

    if(!$conn){
        die("Conexão não concluída: ".mysqli_connect_error());
    }
?>