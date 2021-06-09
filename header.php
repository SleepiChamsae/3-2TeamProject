<?php
session_start();
if(isset($_SESSION['id'])) {
    ?>
    여기에 로그인 한 생태에서의 html 작성하기
    <?php
}
else {
    ?>
    여기에 로그인 하지 않은 상태에서의 html 작성하기
    <?php
}
?>