<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
        exit;
    }

    include 'databaseinf.php';

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $query = "SELECT * FROM articles";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

    $articles = array();

    while($row = mysqli_fetch_object($res)){
        
        $eventi[] = $row;

    }

    echo json_encode($eventi);


?>