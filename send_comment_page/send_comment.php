<?php
  session_start();
  var_dump($_POST);
  if (!isset($_SESSION) || empty($_SESSION)) {
    header("Location: ../login_page/login.php");
    exit();
  }
  if (isset($_POST) && !empty($_POST)) {
    if ($_POST['text'] != '') {
      $_SESSION['signIn']['text'] = $_POST['text'];
      $_SESSION['signIn']['title'] = $_POST['title'];
      echo "<pre>";
      var_dump($_SESSION);
      echo "</pre>";

      header("Location: check_comment.php");
      exit();

    }
    else{
      $error['empty_content'] = true;
      var_dump($error);
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

     <title>Comment!</title>

     <!-- Bootstrap core CSS -->
     <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

     <!-- 独自作成したわけではないけど、追記部分とか色々あるやつ -->
     <link rel="stylesheet" type="text/css" href="send_comment.css">

     <!-- Custom styles for this template -->
     <link href="jumbotron-narrow.css" rel="stylesheet">

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

     <div class="container">
       <div class="header clearfix">
         <nav>
           <ul class="nav nav-pills pull-right">
             <li role="presentation" class="active"><a href="../my_page/my_page.php">YOUR PAGE</a></li>
             <li role="presentation" class = "active"><a href="../welcome_page/welcome.php">Welcome page</a></li>
             <li role="presentation" class = "active"><a href="https://www.facebook.com/profile.php?id=100009528349094">Contact Creater</a></li>
           </ul>
         </nav>
         <h3 class="text-muted">Only your page!</h3>
       </div>
       <div class="jumbotron">
         <div class="container">
           <div class="row">
             <h3 style = "color: #708090;">Submit your mind!</h3>
           </div>
           <div class="row">
             <div class="">
                <div class="widget-area no-padding blank">
                  <div class="status-upload">
                    <form method = "post" action = "">
                     <div class="controls">
                       <label for="email">TITLE</label>
                       <input type="text" id="email" class="floatLabel" name="title">
                     </div>
                     <textarea placeholder="What error bothering you?" id = "style_text" name = "text"></textarea>
                     <?php if(!empty($error)): ?>
                       <?php if ($error['empty_content'] == true): ?>
                         <h4 style = "color: red;">You are not allowed empty comment.</h4>
                       <?php endif; ?>
                     <?php endif; ?>
                     <input type="submit" class="btn btn-success green" style = "margin-top: 15px;" value = "Submit!">
                    </form>
                  </div>
                </div>
             </div>
           </div>
         </div>

       </div>

       <!-- フッター。 -->
       <footer class="footer">
         <p>&copy; Made for Bootstrap</p>
       </footer>

     </div> <!-- /container -->


     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
   </body>
 </html>
