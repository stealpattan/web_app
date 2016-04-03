<?php
  session_start();

  require('../dbconnect.php');
  //dbconnection();

  $error['email'] = false;
  $error['password'] = false;
  $error['misMatch'] = false;
  if (isset($_POST) && !empty($_POST)) {

    if ($_POST['email'] == ""){
      $error['email'] = true;
    }
    if($_POST['password'] == ""){
      $error['password'] = true;
    }
    if ($_POST['password'] != $_POST['check_password']) {
      $error['misMatch'] = true;
    }
    if($error['email'] == false && $error['password'] == false && $error['misMatch'] == false){
      $email = $_POST['email'];
      $sql = sprintf('SELECT COUNT(*) AS cnt FROM `users` WHERE email = "%s"', mysqli_real_escape_string($db, $email));
      $record = mysqli_query($db, $sql) or die(mysqli_error($db));
      $table = mysqli_fetch_assoc($record);
      if($table['cnt'] > 0){
        $error['email'] = true;
      }
      else{
        //var_dump($_POST);//テスト用
        $_SESSION['signIn'] = $_POST;
        header("Location: check.php");
        exit();
      }

    }
  }

 ?>


 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="../../favicon.ico">

     <title>Ragistration</title>

     <!-- Bootstrap core CSS -->
     <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="signin.css" rel="stylesheet">

     <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
     <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
     <script src="../assets/js/ie-emulation-modes-warning.js"></script>

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
     <!--[if lt IE 9]>
       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
   </head>

   <body>

     <div class="navbar navbar-default navbar-fixed-top">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="#"><i class="fa fa-gears"></i>Let's ragistration!</a>
         </div>
       </div>
     </div>

     <div class="container">
       <form class="form-signin" method = "post" action = "ragistration.php">
         <h2 class="form-signin-heading">Ragistration</h2>
         <br>
         <label for="inputEmail" class="sr-only">Email address</label>
         <input type="email" id="inputEmail" class="form-control"
                placeholder="Email address" name = "email" value = "<?php
                if(isset($_POST) && !empty($_POST['email'])){
                  echo $_POST['email'];
                }
                else if(isset($_SESSION) && !empty($_SESSION)){
                  echo $_SESSION['signIn']['email'];
                } ?>" required autofocus>
         <?php if($error['email'] == true){ ?>
           <h4 style = "color: red">You are not allowed empty email-address. <br>
              Or email-addoress that you enterd is already be used. Please check it.
           </h4>
         <?php } ?>
         <br>
         <label for="inputPassword" class="sr-only">Password</label>
         <input type="password" id="inputPassword" class="form-control"
                placeholder="Password" name = "password" value = "<?php
                if(isset($_POST) && !empty($_POST['password'])){
                  echo $_POST['password'];
                }
                else if(isset($_SESSION) && !empty($_SESSION)){
                  echo $_SESSION['signIn']['password'];
                } ?>" required>
         <?php if($error['password'] == true){ ?>
           <h4 style = "color: red;">You are not allowed empty password</h4>
         <?php } ?>
         <label for="inputPassword" class="sr-only">Check_Password</label>
         <input type="password" id="inputPassword" class="form-control" placeholder="Check Password" name = "check_password" required>
         <?php if($error['misMatch'] == true){ ?>
           <h4>I'm sorry but you couldn't enter the correct password</h4>
         <?php } ?>
         <div class="checkbox">
           <label>
             <input type="checkbox" value="remember-me"> Are you agree with membership rules?
           </label>
         </div>
         <input type="submit" name="submit_button" value="SUBMIT!" class = "btn btn-lg btn-primary btn-block">
         <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button> -->
       </form>
     </div> <!-- /container -->


     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
   </body>
 </html>
