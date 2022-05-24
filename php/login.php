<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">      
    <link href="../css/style_utils.css" rel="stylesheet">
</head>

<?php
    session_start();
    if(isset($_SESSION["username"])){
        header("Location: ../home.php");
        exit;
    }

    include 'databaseinf.php';

    if(isset($_POST["username"]) && isset($_POST["password"])){

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $query = "SELECT * FROM users";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        $user = mysqli_real_escape_string($conn, $_POST['username']);

        while($row = mysqli_fetch_object($res)){

            if($_POST["username"] == $row->username){

                $pass = $row->salt . mysqli_real_escape_string($conn, $_POST["password"]);;
                $hashpass = hash('sha256', $pass);
                if($row->password == $hashpass){
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["personid"] = $row->personid;
                    if($_POST["username"] == "root"){
                        header("Location: upload/zzz.php");
                        exit;
                    }
                    header("Location: ../home.php");
                    exit;
                }else{
                    echo"<script>
                    var timeleft = 3;
                    var downloadTimer = setInterval('redirect()', 1000);
                    function redirect(){
                        if(timeleft <= 0){
                            clearInterval(downloadTimer);
                            window.location.href='../index.php';
                        }
                        document.getElementById('seconds').innerHTML = timeleft;
                        timeleft -= 1;
                    }
                    </script>
                <div>
                    <h1>Password Errata</h1>
                    <section>
                        <p>Verrà reindirizzato alla pagina di login tra <span id='seconds'></span></p>
                    </section>
                </div>"; 
                    exit;
                }

            }else{
                $checkuser = false;
            }

        }

        if($checkuser == false){
            echo"<script>
                    var timeleft = 3;
                    var downloadTimer = setInterval('redirect()', 1000);
                    function redirect(){
                        if(timeleft <= 0){
                            clearInterval(downloadTimer);
                            window.location.href='../index.php';
                        }
                        document.getElementById('seconds').innerHTML = timeleft;
                        timeleft -= 1;
                    }
                    </script>
                <div>
                    <h1>Non esiste alcun account registrato con questo username.</h1>
                    <section>
                        <p>Verrà reindirizzato alla pagina di login tra <span id='seconds'></span></p>
                    </section>
                </div>";
            exit;
        }
        mysqli_close($conn);
    }
?>
