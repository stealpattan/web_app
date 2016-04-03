<?php
	session_start();
	//セッションの存在確認に用います。
	//var_dump($_SESSION);

	if (isset($_SESSION) && !empty($_SESSION)) {
		require("../dbconnect.php");

		$sql = sprintf('SELECT comment_title, comment, comment_id FROM `comment` WHERE 1 ORDER BY "created" DESC LIMIT 3;');
		$record = mysqli_query($db, $sql) or die(mysqli_error($db));
		$tables = array();
		while($rec = mysqli_fetch_assoc($record)){
			$tables[] = $rec;
		}

		$sql2 = sprintf('SELECT comment_title, comment, comment_id FROM `comment` WHERE 1 ORDER BY "created" DESC LIMIT 3, 3;');
		$record = mysqli_query($db, $sql) or die(mysqli_error($db));
		$tables2 = array();
		while($rec = mysqli_fetch_assoc($record)){
			$tables2[] = $rec;
		}
		//データの正常取得の監視に用いたテストコード共
		// echo "<pre>";
		// var_dump($rec);
		// var_dump($tables);
		// var_dump($tables2);
		// echo "</pre>";
	}
	else{
		header("Location: ../login_page/login.php");
		exit();
	}

	if (isset($_GET) && !empty($_GET)) {
		if (isset($_GET['comment_num']) && !empty($_GET['comment_num'])) {
			header("Location: ../main_pages/index.php?comment_num=" . $_GET['comment_num']);
			exit();
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

    <title>MY PAGE</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

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
            <li role="presentation" class="active"><a href="../welcome_page/welcome.php">Welcome page -></a></li>
            <li role="presentation" class = "active"><a href="../login_page/login.php">Logout -></a></li>
            <li role="presentation" class = "active"><a href="https://www.facebook.com/profile.php?id=100009528349094">Contact Creater-></a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Only your page!</h3>
      </div>

      <div class="jumbotron">
        <h2><?php echo $_SESSION['signIn']['email']; ?>: Only your page</h2>
        <p class="lead">Go sharing error!</p>
        <p><a class="btn btn-lg btn-success" href="../main_pages/index.php" role="button">
					<img src="button_design.bmp" width = "300px" height = "240px"></a>
				</p>
      </div>

      <div class="row marketing">
				<div class="none" style = "background-color: white; border-radius: 50px; text-align:center;">
					<h4>New comments</h4>
				</div>
        <div class="col-lg-6">
					<?php if (isset($tables) && !empty($tables)): ?>
						<?php foreach ($tables as $tables): ?>
							<div class="none" style = "background-color: white; border-radius: 50px; text-align: center;">
								<h4><a href="my_page.php?comment_num=<?php echo $tables['comment_id']; ?>"><?php echo $tables['comment_title']; ?></a></h4>
			          <p><?php echo $tables['comment']; ?></p>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
        <div class="col-lg-6">
					<?php if (isset($tables2) && !empty($tables2)): ?>
						<?php foreach ($tables2 as $tables2): ?>
							<div class="none" style = "background-color: white; border-radius: 50px; text-align: center;">
								<h4><a href="my_page.php?comment_num=<?php echo $tables2['comment_id']; ?>"><?php echo $tables['comment_title']; ?></a></h4>
			          <p><?php echo $tables2['comment']; ?></p>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
        </div>
      </div>

      <footer class="footer">
        <p>&copy; Made for Bootstrap</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
