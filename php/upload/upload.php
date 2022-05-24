<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/style_utils.css" rel="stylesheet">
</head>

<?php
    session_start();

    if($_SESSION["username"] !== "root"){
        header("Location: ../../index.php");
        exit;
    }

    include '../databaseinf.php';

    $upload_path = "../../img/";
    $filename = basename($_FILES['file']["name"]);
    $target_file = $upload_path.$filename;
    $output = "";
    $check = true;

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $heading = mysqli_real_escape_string($conn, $_POST["heading"]);
    $paragraph = mysqli_real_escape_string($conn, $_POST["paragraph"]);
    $type = strtolower($_POST["type"]);

    if(strpos($filename,'.jpg')){
        $imgnameQuery = str_replace(".jpg","",$filename);
    }
    if(strpos($filename,'.jpeg')){
        $imgnameQuery = str_replace(".jpeg","",$filename);
    }
    
    $query = "SELECT count(*) as tot FROM articles";
    $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
    $row = mysqli_fetch_object($res);
    $tot = $row->tot + 1;

    $query = "INSERT INTO articles VALUES('$imgnameQuery', '$title', '$heading', '$paragraph', '$type', '$tot', 0)";
    
    if($imgnameQuery != "music_release" && $imgnameQuery != "news"){
        if(file_exists($target_file)){
            $check = false;
            $output = "Il file esiste già";
        }
    }
    
    if($_FILES['file']["size"] > 1000000){
        $check = false;
        $output = "File troppo grande! (MAX. 1MB)";
    }

    if($check){
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        if(move_uploaded_file($_FILES['file']["tmp_name"],$target_file) == false && $res == null){
            echo "<div>
                    <h1>Upload fallito...</h1>
                    <section>
                        <a href='../../index.php'>
                            <input type='submit' value='Torna alla pagina di login'>
                        </a>
                        <br><br>
                        <form action='zzz.php' method='post'>
                            <input type='submit' value='Torna alla pagina di upload'>
                        </form>
                    </section>
                </div>";
        }else{
            echo "<div>
                    <h1>Articolo caricato con successo.</h1>
                    <section>
                        <a href='../../index.php'>
                            <input type='submit' value='Torna alla pagina di login'>
                        </a>
                        <br><br>
                        <form action='zzz.php' method='post'>
                            <input type='submit' value='Torna alla pagina di upload'>
                        </form>
                    </section>
                </div>";
        }
    }else{
        echo "<div>
                <h1>".$output."</h1>
                    <section>
                        <a href='../../index.php'>
                            <input type='submit' value='Torna alla pagina di login'>
                        </a>
                        <br><br>
                        <form action='zzz.php' method='post'>
                            <input type='submit' value='Torna alla pagina di upload'>
                        </form>
                    </section>
            </div>";
    }

    mysqli_close($conn);
?>