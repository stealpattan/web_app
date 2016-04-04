<?php
  require("../dbconnect.php");
  session_start();
  var_dump($_POST);

  $error = array();
  if (isset($_POST) && !empty($_POST)) {
    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      $sql = sprintf('SELECT * FROM `users` WHERE email="%s"', $email);
      $record = mysqli_query($db, $sql) or die(mysqli_error($db));
      $table = mysqli_fetch_assoc($record);
      // テストようです。
      // echo "<br>";
      // echo "<pre>";
      // var_dump($pass);
      // echo "</pre>";
      if (!empty($table)) {
        if ($email == $table['email']) {
          if ($pass == $table['pass']) {
            $_SESSION['signIn']['email'] = $email;
            $_SESSION['signIn']['pass'] = $pass;
            //テストようです
            //var_dump($_SESSION);
            header("Location: ../my_page/my_page.php");
            exit();
          }
          else {
            $error['UnMatch'] = true;
          }
        }
      }
      else{
        $error['Unexist'] = true;
      }
    }
    else{
      $error['UnEntered'] = true;
    }
  }
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin</title>

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
          <a class="navbar-brand" href="#"><i class="fa fa-gears"></i>Log in Page!</a>
        </div>
      </div>
    </div>

    <div class="container">

      <form class="form-signin" method = "post" action = "login.php">
        <h2 class="form-signin-heading">Please log in</h2>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control"
              name = "email" placeholder="Email address" value = "<?php if(isset($_POST['email'])&&!empty($_POST['email'])){echo $_POST['email'];} ?>"
              required autofocus>
        <?php if (isset($error['Unexist']) && $error['Unexist'] == true): ?>
          <h4 style = "color: red;">E-mail address that you entered is not exist.</h4>
        <?php endif; ?>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name = "pass" placeholder="Password" required>
        <?php if (isset($error['UnEntered']) && $error['UnEntered']): ?>
          <h4 style = "color: red;">Please enter all form.</h4>
        <?php endif; ?>
        <?php if (isset($error['UnMatch']) && !empty($error['UnMatch'])): ?>
          <h4 style = "color: red;">Mybe the password that you entered is wrong.</h4>
        <?php endif; ?>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <input type="submit" class = "btn btn-lg btn-primary btn-block" name="name" value="Sign in ->">
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
