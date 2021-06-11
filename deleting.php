<?php
include 'init.php';

session_start();
if(!isset($_SESSION['id'])) {
    exit();
    //ERR: 로그인 안 한 상태
}
$userID = $_SESSION['id'];

if(!isset($_GET['id'])) {
    exit();
    //ERR: 삭제하는 글이 무엇인지 알려지지 않음
}
$writingID = $_GET['id'];

$sql = "SELECT * FROM blog WHERE id=$writingID";
$res = mysqli_query($conn, $sql);
if(!$res) {
    exit();
    //ERR: 존재하지 않는 글 호출
}
$row = mysqli_fetch_array($res);

if($row['user'] != $_SESSION['id']) {
    exit();
    //ERR: 권한이 없는 유저가 글을 삭제하려고 시도함
}

$sql = "DELETE FROM blog WHERE id=$writingID";
$res = mysqli_query($conn, $sql);
if(!$res) {
    exit();
    //ERR: 삭제 실패!
}
?>