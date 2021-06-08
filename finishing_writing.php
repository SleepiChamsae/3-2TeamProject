<?php
//init setting
include 'init.php';
session_start();
//end init

if(!(isset($_POST['title']) && isset($_POST['contents']))) {
    exit();
    //ERR: 작성 안 함 에러 발동
}

if(!isset($_SESSION['id'])) {
    //ERR: 로그인 정보 없음 에러
}

$id = $_SESSION['id']
$title = $_POST['title'];
$contents = $_POST['contents'];
$date = date("Y-m-d");

$sql = "INSERT INTO blog VALUE('','$title','$contents','$id','$date')";
$res = mysqli_query($conn, $sql);

if(!$res) {
    //ERR: 데이터베이스에 전송 실패 에러
}
?>
