<?php

include 'init.php';

$id = $_POST['id'];
$pw = $_POST['pw'];

if(isNotFilled_register()) {
  //ERR: 회원 가입을 위한 정보 부족
  exit();
}

$sql = "INSERT INTO user VALUE('$id', '$pw')";
$res = mysqli_query($conn, $sql);

if(!$res) {
  //ERR: 이미 존재하는 id이다
  exit();
}

session_start();
$_SESSION['id'] = $id;

header('index.php');

function isNotFilled_register()
{
  return !(isset($_POST['id']) && isset($_POST['pw']));
}
?>
