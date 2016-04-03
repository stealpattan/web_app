<?php
	session_start();
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
		<form class="none" action="index.php" method="post">
			<input type="button" name="name" value="hogehoge" onClick = "get_mainContent_position()">
			<input type="button" name="name" value="hohoho" onClick = "obj_move()">
		</form>

		<!-- 画面上部に固定ヘッダーの設置 -->
		    <div class="navbar navbar-default navbar-fixed-top">
		      <div class="container">
		        <div class="navbar-header">
		          <a class="navbar-brand" href="#" style = "position: absolute; left: 50px;"><i class="fa fa-gears"></i>Sharing Error Page</a>
							<form class="" action="index.php" method="post">
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
		<div id="main_content">
			<span>コメントはここに表示されることになっています</span>
		</div>

		<div id="obj1">
			<span>hogehoge</span>
			<p>
				コメントハコチラニタダシクヒョウジサレルコトトナッテイマス。ゴリョウショウクダサイ
			</p>
		</div>
		<div id="obj2">
			<span></span>
			<p>
				コメントハコチラニヒョウジサレマス。ツギハ、コメントノハイッテイルコメントボックスヲウゴカセルヨウニシマショウ。
			</p>
		</div>

		<div id="obj3">
			<span></span>
			<p>
				コメントハコチラニヒョウジサレマス。ツギハ、コメントノハイッテイルコメントボックスヲウゴカセルヨウニシマショウ。
			</p>
		</div>

		<div id="obj4">
			<span></span>
			<p>
				コメントハコチラニヒョウジサレマス。ツギハ、コメントノハイッテイルコメントボックスヲウゴカセルヨウニシマショウ。
			</p>
		</div>

		<div id="obj5">
			<span></span>
			<p>
				コメントハコチラニヒョウジサレマス。ツギハ、コメントノハイッテイルコメントボックスヲウゴカセルヨウニシマショウ。
			</p>
		</div>

		<div id="reply_comment">
			<span>hoe</span>
			<form class="reply_form" action="index.php" method="post">
				<dl class="">
					<dt><input type="text" style = "width: 300px; height: 650px; color: black; position: absolute; left: 50px;" name="replyComment" value=""></dt>
					<dt><input type="submit" name="reply_submit" value="返信します" style = "position: absolute; left: 150px; top: 700px;"></dt>
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
		</script>
	</body>
</html>
