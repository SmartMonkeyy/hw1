<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
        exit;
    }

    include 'databaseinf.php';

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $personid = $_SESSION["personid"];

    $query = "SELECT * FROM likes WHERE user = $personid";

    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

    while($row = mysqli_fetch_object($res)){
        
        $liked_post[] = $row;

    }

    echo json_encode($liked_post);
    mysqli_close($conn);
?>