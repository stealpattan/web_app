<?php
  echo "hi!";

  if (isset($_POST['search_comment']) && !empty($_POST['search_comment'])) {
    $title_name = $_POST['search_comment'];
    require('../dbconnect.php');
    $sql = sprintf('SELECT * FROM `comment` WHERE comment_title LIKE "%%%s%%"', $title_name);
    $record = mysqli_query($db, $sql) or die(mysqli_error($db));
    $table = array();
    while($rec = mysqli_fetch_assoc($record)){
      $table[] = $rec;
    }
    // echo "<pre>";
    // var_dump($table);
    // echo "</pre>";

	}

  if (isset($_SESSION) && !empty($_SESSION)) {
    $_SESSION['signIn']['text'] = '';
    $_SESSION['signIn']['title'] = '';
  }

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Search result</title>
   </head>
   <body>
     <?php if (isset($table) && !empty($table)): ?>
       <?php foreach ($table as $table): ?>
         <a href="index.php?comment_number=<?php echo $table['comment_id']; ?>">Go help this comment!</a>
         <h4>Title:<?php echo $table['comment_title']; ?></h4>
         <p>
           <?php echo $table['comment']; ?>
         </p>
       <?php endforeach; ?>
     <?php endif; ?>
     <br>
     <a href="index.php">Back.</a>
   </body>
 </html>
