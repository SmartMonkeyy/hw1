<?php

    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
        exit;
    }

    include 'databaseinf.php';

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $id_post = mysqli_real_escape_string($conn, $_COOKIE["post_id"]);

    $personid = $_SESSION["personid"];

    $insert_query = "INSERT INTO likes(user, post) VALUES($personid, $id_post)";

    $getlikes_query = "SELECT total_likes FROM articles WHERE id = $id_post";

    $res = mysqli_query($conn, $insert_query) or die("Errore: ".mysqli_error($conn));

    if($res){

        $res = mysqli_query($conn, $getlikes_query);
        $return = mysqli_fetch_assoc($res);
        echo json_encode($return);
        
    }

    mysqli_close($conn);
?>