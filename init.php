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
    $sql = 'CREATE TABLE blog(id INT AUTO_INCREMENT PRIMARY KEY, title TEXT, contents TEXT
            , user varchar(20) NOT NULL, uploadDate DATE,
            FOREIGN KEY(user) REFERENCES user(id))';
    $res = mysqli_query($conn, $sql);
}

//WANT: 암호화 복호화 하기
$key = 'ASDFQWER';

function Encrypt()
{

}

function checkLogin()
{
    session_start();
    if(!isset($_SESSION['id'])) {
        exit();
        //ERR: 로그인이 안 되어 있음
    }
}
?>
