<?php
  session_start();
  require('../dbconnect.php');

  var_dump($_SESSION);

  if (isset($_GET) && !empty($_GET)) {
    if ($_GET['decide_to_ragist'] == "ragist!") {
      ragistration();
    }
  }

  if (empty($_SESSION)) {
    header("location: ragistration.php");
    exit();
  }
  //登録用ファンクション。これが呼び出されると、登録処理がなされます
  function ragistration(){
    require("../dbconnect.php");
    if (isset($_SESSION) && !empty($_SESSION)) {
      $email = $_SESSION['signIn']['email'];
      $pass = $_SESSION['signIn']['password'];

      $sql = sprintf('INSERT INTO `users`(email, pass, created)
                      VALUES ("%s", "%s", NOW())' ,
                      $email,
                      $pass
                    );
    }
    $record = mysqli_query($db, $sql) or die(mysqli_error($db));
    header("Location: ../my_page/my_page.php");
    exit();
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
       <div class = "form-signin" id = "content_check">
         <h2 class = 'form-signin-heading'>Check Please</h2>
         <p class = "content">Your name is:<br>GEST SIR</p>
         <p class = "content">Your e-mail adress is:<br><span style = "color: orange;"><?php echo $_SESSION['signIn']['email']; ?></span></p>
         <p class = "content">Password is not appear.</p>
       </div>
       <form class="form-signin">
         <input type="hidden" name="decide_to_ragist" value="ragist!">
         <input type="submit" class = "btn btn-lg btn-primary btn-block" name="name" value="Decide and Ragistration.">
         <button type="button" class = "btn btn-lg btn-primary btn-block" onClick = "history.back()">back.</button>
       </form>
     </div> <!-- /container -->


     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
   </body>
 </html>
