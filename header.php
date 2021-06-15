<?php
session_start();
if(isset($_SESSION['id'])) {
    ?>
    <a href="./writing.php">글 쓰러 가기</a>
    <a href="./logout.php">로그아웃</a>
    <?php
}
else {
    ?>
    <a href="./login.php">로그인</a>
    <?php
}
?>