<?php
$conn = mysqli_connect('localhost','root','') or die("서버 접속 에러");
mysqli_select_db($conn, 'test') or die("db 접속 에러");

//테이블 창조 페이지
$sql = 'DESC user';
$res = mysqli_query($conn, $sql);
if(!$res) {
   $sql = 'CREATE TABLE user(id varchar(20) PRIMARY KEY, pw TEXT NOT NULL)';
   $res = mysqli_query($conn, $sql);
}

$sql = 'DESC blog';
$res = mysqli_query($conn, $sql);
if(!$res) {
    $sql = 'CREATE TABLE blog(num INT AUTO_INCREMENT PRIMARY KEY, title TEXT, contents TEXT)';
    $res = mysqli_query($conn, $sql);
}

//info 페이지를 만들어야 함
$key = 'ASDFQWER';

function Encrypt()
{
    
}
?>