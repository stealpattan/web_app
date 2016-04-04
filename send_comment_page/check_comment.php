<?php
  session_start();
  if (isset($_GET) && !empty($_GET)) {
    if($_GET['action'] == "ragistration"){
      comment_send();
    }
  }

  $title = $_SESSION['signIn']['title'];
  $text = $_SESSION['signIn']['text'];

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
             <h3 style = "color: #708090;">Check your comment!</h3>
           </div>
           <div class="row">
             <div class="">
                <div class="widget-area no-padding blank">
                  <div class="status-upload">
                    <form>
                     <div class="controls">
                       <label for="email">TITLE</label>
                       <p id = "email" class "floatLabel"><?php if(!empty($title)){echo $title;}else{echo "You did not set comment title.";} ?></p>
                     </div>
                     <p id = "style_text"><?php echo $text; ?></p>
                    </form>
                  </div>
                </div>
             </div>
           </div>
         </div>
         <form method = "post" action = ''>
           <a href="check_comment.php?action=ragistration" class="btn btn-success green" style = "margin-top: 15px;">I'm sure.(submit)</a>
           <br>
           <a href="send_comment.php" class="btn btn-success green" style = "margin-top: 15px;">Back.</a>
         </form>
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

<?php
function comment_send(){
  require("../dbconnect.php");
  $title = $_SESSION['signIn']['title'];
  $comment = $_SESSION['signIn']['text'];
  $user_id = $_SESSION['signIn']['user_id'];

  $sql = sprintf('INSERT INTO `comment`(comment_title, comment, user_id, created)
                  VALUES ("%s", "%s", "%s", NOW())' ,
                  $title,
                  $comment,
                  $user_id
                );
  //var_dump($sql);
  $record = mysqli_query($db, $sql) or die(mysqli_error($db));
  $sql2 = sprintf('SELECT comment_id FROM `comment` WHERE user_id=%s AND comment="%s"', $user_id, $text);
  $record = mysqli_query($db, $sql2) or die(mysqli_error($db));
  $table = mysqli_fetch_assoc($record);
  $_SESSION['signIn']['comment_id'] = $table['comment_id'];

  header("Location: ../main_pages/index.php");
  exit();
 }
 ?>
