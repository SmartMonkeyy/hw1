<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HW1</title>
    <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/style_index.css">
    <link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/script_checkuserpass.js" defer></script>
  </head>

  <body id="main">
    <div class="limiter">
    <div class="container-login100" style="background-image: url('img/bg-01.jpg');">
      <div class="wrap-login100">

          <form class="login100-form validate-form" action="php/login.php" name="login" method="post">
            
            <span class="login100-form-logo">
						  <i class="zmdi zmdi-landscape"></i>
					  </span>

            <span class="login100-form-title p-b-34 p-t-27">
						  Log in
					  </span>

            <div class="wrap-input100 validate-input" data-validate = "Enter username">
              <input type="text" class="input100" placeholder="User name" name="username">
              <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Enter password">
              <input id="psw" type="password" class="input100" placeholder="Password" name="password">
              <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div type="submit" class="container-login100-form-btn">
						  <button class="login100-form-btn">
							Log In 
              <i class="fa fa-sign-in" aria-hidden="true"></i>
						  </button>
					  </div>

            <div class="text-center p-t-90">
						  <a class="txt1" href="register.php">
							  Create account
                <i class="fa fa-user-plus" aria-hidden="true"></i>
						  </a>
					  </div>

          </form>
        </div>	
      </div>
    </div>
  </body>
</html>