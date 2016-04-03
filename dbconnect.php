<?php

  $db = mysqli_connect('localhost', 'root', '', 'web_app') or
  die(mysqli_connect_error());
  mysqli_set_charset($db, 'UTF8');
 ?>
