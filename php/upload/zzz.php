<?php
  session_start();
  if($_SESSION["username"] !== "root"){
      header("Location: ../../index.php");
      exit;
  }
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/style_index.css">
    <link rel="stylesheet" type="text/css" href="../../css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <script src="../../js/upload_check.js" defer></script>
  </head>

  <body id="main">
    <div class="limiter">
    <div class="container-login100" style="background-image: url('../../img/bg-01.jpg');">
        <div class="wrap-login100">            
            <span class="login100-form-logo">
				<i class="zmdi zmdi-landscape"></i>
			</span>

            <span class="login100-form-title p-b-34 p-t-27">
			    Upload Articoli
			</span>

            <form class="login100-form validate-form" action="upload.php" name="upload" method="post" enctype="multipart/form-data">

                <div class="wrap-input100 validate-input">
                    <input id="file" type="file" class="input100" name="file" placeholder="Immagine dell'articolo">
                    <span class="focus-input100" data-placeholder="&#xf17f;"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <textarea id="title" type="text" class="input100" name="title" rows="4" cols="50" placeholder="Titolo dell'articolo"></textarea>
                    <span class="focus-input100" data-placeholder="&#xf256;"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <textarea id="heading" type="text" class="input100" name="heading" rows="10" cols="100" placeholder="Header dell'articolo"></textarea>
                    <span class="focus-input100" data-placeholder="&#xf256;"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <textarea id="paragraph" type="text" class="input100" name="paragraph" rows="10" cols="100" placeholder="Corpo dell'articolo"></textarea>
                    <span class="focus-input100" data-placeholder="&#xf256;"></span>
                </div>
                <div class="wrap-input100 validate-input">
                    <label for="type" class="input100">Tipo di articolo</label>
                    <select id="type" name="type">
                        <option value="crypto">Crypto</option>
                        <option value="stocks">Stocks</option>
                        <option value="business">Business</option>
                        <option value="music">Music</option>
                    </select>
                    <span class="focus-input100" data-placeholder="&#xf256;"></span>
                </div>

                <div id="message">
                    <h5>Parametri da rispettare:</h5>
                    <p id="mandatory_file" class="invalid">File con estensione <b>jpg o jpeg</b></p>
                    <p id="mandatory_title" class="invalid">Titolo con lunghezza compresa tra <b>30 e 132 caratteri</b></p>
                    <p id="mandatory_heading" class="invalid">Heading con lunghezza compresa tra <b>50 e 290 caratteri</b></p>
                </div>

                <div type="submit" class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Carica
                    </button>
                    &nbsp;
                    <button id="exit" class="login100-form-btn" formaction="../logout.php">
                        Esci
                    </button>
                </div>

          </form>
        </div>
		
      </div>
    </div>
  </body>
</html>