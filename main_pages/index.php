<?php
	session_start();
	require('../dbconnect.php');
	echo "<pre>";
	var_dump($_SESSION);
	echo "セッション";
	echo "</pre>";
	echo "<pre>";
	var_dump($_POST);
	echo "ポスト";
	echo "</pre>";

	if (isset($_GET) && !empty($_GET)) {
		if (isset($_SESSION) && !empty($_SESSION)) {
			$_SESSION['signIn']['title'] = '';
			$_SESSION['signIn']['text'] = '';
		}
		$comment_number = $_GET['comment_number'];

		$sql = sprintf('SELECT * FROM `comment` WHERE `comment_id` = %s', $comment_number);
		$record = mysqli_query($db, $sql) or die(mysqli_error($db));
		$main_data = mysqli_fetch_assoc($record);
		echo "<pre>";
		var_dump($main_data);
		echo "main_dataの表示";
		echo "</pre>";

		$sql2 = sprintf('SELECT * FROM `comment` WHERE `reply_id` = %s ORDER BY `created` DESC LIMIT 1, 5', $comment_number);
		$record = mysqli_query($db, $sql2) or die(mysqli_error($db));
		$reply_data = array();
		while ($rec = mysqli_fetch_assoc($record)) {
			$reply_data[] = $rec;
		}
		// echo "<pre>";
		// var_dump($reply_data);
		// echo "</pre>";

		//ゲット送信されたデータが存在している時に返信を可能にします
		if (isset($_POST) && !empty($_POST)) {
			if (isset($_POST['replyComment']) && !empty($_POST['replyComment'])) {
				// header("Location: index.php");//11にはコメントが存在しているようなので、デフォルトで、ここを指定しておきます
				echo "<br>";
				echo "無事送信されました";
				echo "<pre>";
				var_dump($_POST['replyComment']);
				echo "</pre>";

				$reply_comment = $_POST['replyComment'];
				//SQL文を発行していきます
				if (isset($_SESSION) && !empty($_SESSION)) {
					$user_exist = $_SESSION['signIn']['email'];
				}
				else{
					$user_exist = 1;//個の場合、ログインしているユーザからのコメントではないことを示します。
				}
				$sql3 = sprintf('INSERT INTO `comment` (comment, reply_id, user_id, created)
																			VALUES ("%s", %s, %s, NOW())', $reply_comment, $comment_number, $user_exist);
				$record = mysqli_query($db, $sql3) or die(mysqli_error($db));
			}
		}
	}


 ?>

<!DOCTYPE html>

<html lang = "ja">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../favicon.ico">

	    <title>Share your Error!!</title>

	    <!-- Bootstrap core CSS -->
	    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

	    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

	    <!-- 独自作成したわけではないけど、追記部分とか色々あるやつ -->
	    <link rel="stylesheet" type="text/css" href="change_index_design.css">

	    <!-- Custom styles for this template -->
	    <link href="allowed_change.css" rel="stylesheet">

	    <!-- 独自作成したcssファイル。こちらでデザインの詳細を設定しています -->
	    <link rel="stylesheet" type="text/css" href="index_main.css">

	    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

			<!-- 独自作成しjavascriptファイルを読み込みます -->
			<script src="JS/main.js" charset="utf-8"></script>
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>

		<!-- 画面上部に固定ヘッダーの設置 -->
		    <div class="navbar navbar-default navbar-fixed-top">
		      <div class="container">
		        <div class="navbar-header">
		          <a class="navbar-brand" href="../welcome_page/welcome.php" style = "position: absolute; left: 50px;"><i class="fa fa-gears"></i>Sharing Error Page</a>
							<form class="" action="search_result.php" method="post">
								<input type="text" name="search_comment" value="" style = "position: relative; top: 12px; text-align: center; height: 25px; size: 50px; color: black;">
								<input type="submit" name="name" value="Search Errors!" style = " position: relative; top: 12px; border: 2px solid #7fffd4; background-color: green;">
								<?php if (isset($_SESSION) && !empty($_SESSION)): ?>
									<a href="../my_page/my_page.php" style = "right: 60px; position: absolute; top: 12px;"><input type="button" name="name" value="Your Home"></a>
								<?php endif; ?>
								<!-- <input type="button" name="name" value="Your Home" style = "right: 60px; position: absolute; top: 12px;"> -->
							</form>
		        </div>
		      </div>
		    </div>


		<!-- メインコンテンツ。ここにコメントを表示したり、動き（アニメーション）を与えていきます -->
		<div id="main_content" style="color: black;">
			<?php if(isset($main_data) && !empty($main_data)){ ?>
				<span><?php echo $main_data['comment_title']; ?></span>
				<p>
					<?php echo $main_data['comment']; ?>
				</p>
			<?php }else if(isset($_SESSION['signIn']['text']) && !empty($_SESSION['signIn']['text'])){ ?>
				<?php if (isset($_SESSION['signIn']['title']) && !empty($_SESSION['signIn']['title'])): ?>
					<span><?php echo $_SESSION['signIn']['title']; ?></span>
				<?php endif; ?>
				<p><?php echo $_SESSION['signIn']['text']; ?></p>
			<?php } ?>
		</div>

		<div id="obj1">
			<?php if(isset($reply_comment['0']) && !empty($reply_comment[''])){ ?>
			<span><?php echo $reply_comment['0']['comment_title']; ?></span>
			<p>
				<?php echo $reply_comment['0']['comment']; ?></p>
			<?php } ?>
		</div>

		<div id="obj2">
			<?php if(isset($reply_comment['1']) && !empty($reply_comment[''])){ ?>
			<span><?php echo $reply_comment['1']['comment_title']; ?></span>
			<p>
				<?php echo $reply_comment['1']['comment']; ?>
			</p>
			<?php } ?>
		</div>

		<div id="obj3">
			<?php if(isset($reply_comment['2']) && !empty($reply_comment[''])){ ?>
			<span><?php echo $reply_comment['2']['comment_title']; ?></span>
			<p>
				<?php echo $reply_comment['2']['comment']; ?>
			</p>
			<?php } ?>
		</div>

		<div id="obj4">
			<?php if(isset($reply_comment['3']) && !empty($reply_comment[''])){ ?>
			<span><?php echo $reply_comment['3']['comment_title']; ?></span>
			<p>
				<?php echo $reply_comment['3']['comment']; ?>
			</p>
			<?php } ?>
		</div>

		<div id="obj5">
			<?php if(isset($reply_comment['4']) && !empty($reply_comment[''])){ ?>
			<span><?php echo $reply_comment['4']['comment_title']; ?></span>
			<p>
				<?php echo $reply_comment['4']['comment']; ?>
			</p>
			<?php } ?>
		</div>

		<!-- 返信コメントの送信に使う部分 -->
		<div id="reply_comment">
			<span style = "color: black; position: relative; top: 5px; left: 50px;">Please help him...</span>
			<form class="reply_form" action="index.php" method="post">
				<dl class="">
					<dt><input type="text" style = "width: 300px; height: 650px; color: black; position: absolute; left: 50px;" name="replyComment" value=""></dt>
					<dt><input type="submit" name="reply_submit" style = "position: absolute; left: 150px; top: 700px;"></dt>
				</dl>
			</form>
		</div>
		<!-- 以下のスクリプト部分でメインコメントオブジェクトの位置を指定して表示しています。 -->
		<script type="text/javascript">
			var pos_x,pos_y;
			var obj_name = "obj1";
			var obj_array = new Array("obj1");
			function get_mainContent_position(){
				// メインコンテンツを表示する場所を取得しています
				var w_x = window.innerWidth;
				var w_y = window.innerHeight;
				pos_x = (w_x / 2) - 200;
				pos_y = ((w_y - 100) / 3) + 100;
				// メインコンテンツの位置取得終了
				var main_content = document.getElementById("main_content");
				document.body.appendChild(main_content);
				main_content.style.position = "absolute";
				main_content.style.width = "400px";
				main_content.style.height = "200px";
				main_content.style.border = "3px solid #7fffd4";
				main_content.style.backgroundColor = "white";
				main_content.style.left = (pos_x) + "px";
				main_content.style.top = (pos_y) + "px";

				var pos_rx, pos_ry;
				pos_rx = pos_x;
				pos_ry = pos_y + 450;
				var reply_content = document.getElementById("reply_comment");
				document.body.appendChild(reply_content);
				reply_content.style.position = "absolute";
				reply_content.style.width = "400px";
				reply_content.style.height = "750px";
				reply_content.style.border = "10px solid #7fffd4";
				reply_content.style.backgroundColor = "white";
				reply_content.style.left = (pos_rx) + "px";
				reply_content.style.top = (pos_ry) + "px";
				//メインコンテンツの表示を終了

			  	obj_set(pos_x, pos_y);
			//	get_obj_position(obj_array[0],1,pos_x,pos_y);
			// 	get_obj_position(obj_name, 1, pos_x, pos_y);

			}
			get_mainContent_position();
		</script>
	</body>
</html>
