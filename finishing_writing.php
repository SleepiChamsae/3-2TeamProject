<?php

include 'init.php';

if(!(isset($_POST['title']) && isset($_POST['contents']))) {
    exit();
    //TODO: 작성 안 함 에러 발동
}

//TODO: [FIRST] 여기에 유저를 추가하는 내용의 코드 작성하기

$title = $_POST['title'];
$contents = $_POST['contents'];


$sql = "INSERT INTO blog VALUE('','$title','$contents')";
$res = mysqli_query($conn, $sql);

if(!$res) {
    //TODO: 데이터베이스에 전송 실패 에러
}
?>