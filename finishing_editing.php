<?php
include 'init.php';
checkLogin();

$userID = $_SESSION['id'];
$writeID = intval($_POST['id']);


if(!(isset($_POST['title']) && isset($_POST['contents']))) {
    //ERR: 글이 작성되지 않음
    exit();
}

$title = $_POST['title'];
$contents = $_POST['contents'];
$date = date("Y-m-d");

$sql = "UPDATE blog SET title = '$title', contents='$contents', uploadDate='$date' WHERE id = $writeID";
$res = mysqli_query($conn, $sql);

if(!$res) {
    //ERR: 수정 실패
    exit();
}

//수정 성공

?>
