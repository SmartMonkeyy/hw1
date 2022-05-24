<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_utils.css" rel="stylesheet">
</head>


<?php
    include 'databaseinf.php';

    session_start(); 
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
        exit;
    }

    if($_POST["username"] !== $_SESSION["username"]){
        echo"<script>
                    var timeleft = 3;
                    var downloadTimer = setInterval('redirect()', 1000);
                    function redirect(){
                        if(timeleft <= 0){
                            clearInterval(downloadTimer);
                            window.location.href='../delete.php';
                        }
                        document.getElementById('seconds').innerHTML = timeleft;
                        timeleft -= 1;
                    }
                    </script>
                <div>
                    <h1>Non puoi eliminare un account diverso dal tuo.</h1>
                    <section>
                        <p>Verrà reindirizzato alla pagina di delete tra <span id='seconds'></span></p>
                    </section>
                </div>";
        exit;
    }

    if($_POST["username"] === "root"){
        echo"<script>
                    var timeleft = 3;
                    var downloadTimer = setInterval('redirect()', 1000);
                    function redirect(){
                        if(timeleft <= 0){
                            clearInterval(downloadTimer);
                            window.location.href='../delete.php';
                        }
                        document.getElementById('seconds').innerHTML = timeleft;
                        timeleft -= 1;
                    }
                    </script>
                <div>
                    <h1>Non puoi eliminare l'account root.</h1>
                    <section>
                        <p>Verrà reindirizzato alla pagina di delete tra <span id='seconds'></span></p>
                    </section>
                </div>";
        exit;
    }

    if(isset($_POST["username"]) && isset($_POST["password"])){

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $query = "SELECT * FROM users";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));

        $user = mysqli_real_escape_string($conn, $_POST['username']);

        while($row = mysqli_fetch_object($res)){
            
            $pass = $row->salt . mysqli_real_escape_string($conn, $_POST["password"]);
            $hashpass = hash('sha256', $pass);

            if($_POST["username"] == $row->username && $hashpass == $row->password){

                $query = "DELETE FROM users WHERE username='$user' and password='$hashpass'";
                $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
                if($res == 1){
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
                    <h1>Eliminazione effettuata</h1>
                    <section>
                        <p>Verrà reindirizzato alla pagina di login tra <span id='seconds'></span></p>
                    </section>
                </div>";
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
                    <h1>Errore durante l'eliminazione</h1>
                    <section>
                        <p>Verrà reindirizzato alla pagina di login tra <span id='seconds'></span></p>
                    </section>
                </div>";
                }
            }else{
                $checkuser = false;
            }

        }

        if($checkuser == null){
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
                    <h1>Impossibile eliminare questo account. Username o password errati</h1>
                    <section>
                        <p>Verrà reindirizzato alla pagina di login tra <span id='seconds'></span></p>
                    </section>
                </div>";
            exit;
        }
        mysqli_close($conn);
    }
?>
