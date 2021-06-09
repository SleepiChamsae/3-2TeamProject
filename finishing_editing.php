<?php
include 'init.php';
checkLogin();

$userID = $_SESSION['id'];
$writeID = $_POST['id'];

if(!(isset($_POST['title']) && isset($_POSt['contents']))) {
    //ERR: 글이 작성되지 않음
    exit();
}

$title = $_SESSION['title'];
$contents = $_SESSION['contents'];
$date = date("Y-m-d");

$sql = "UPDATE blog SET title = '$title' contents='$contents' user='$userID' WHERE id = $writeID";
$res = mysqli_query($conn, $sql);

if(!$res) {
    //ERR: 수정 실패
    exit();
}

//수정 성공

?>
