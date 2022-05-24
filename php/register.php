<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style_utils.css" rel="stylesheet">
</head>

<?php
    session_start();

    include 'databaseinf.php';

    if(isset($_POST["username"]) && isset($_POST["password"])){
        
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $query = "SELECT * FROM users";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        while($row = mysqli_fetch_object($res)){

            if($_POST["username"] == $row->username){
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
                        <h1>Utente già registrato</h1>
                        <section>
                            <p>Verrà reindirizzato alla pagina di login tra <span id='seconds'></span></p>
                        </section>
                    </div>";
                exit;
            }
        }

        $query = "SELECT count(*) as tot FROM users";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        $row = mysqli_fetch_object($res);
        $tot = $row->tot;

        $user = mysqli_real_escape_string($conn, $_POST['username']);

        $salt = rand(10000, 99999);
        $pass = $salt . mysqli_real_escape_string($conn, $_POST["password"]);
        $hashpass = hash('sha256', $pass);

        $query = "INSERT INTO users VALUES('$tot', '$user', '$hashpass', '$salt')";
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
                    <h1>Registrazione effettuata.<br>Benvenuto " . $user ."</h1>
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
                    <h1>Errore durante la registrazione.</h1>
                    <section>
                        <p>Verrà reindirizzato alla pagina di login tra <span id='seconds'></span></p>
                    </section>
                </div>"; 
            exit;
        }
        mysqli_close($conn);
    }
?>