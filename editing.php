<?php
include 'init.php';
session_start();

if(!isset($_SESSION['id'])) {
  exit();
  //ERR: 로그인이 되지 않음
}
if(!isset($_POST['id'])) {
  exit();
  //ERR: ID값이 존재하지 않음
}


?>
