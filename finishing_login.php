<?php

include 'init.php';

$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM user WHERE id='$id' AND pw='$pw'";
$res = mysqli_query($conn, $sql);

if(!$res) {
    echo "로그인에 문제가 발생하였습니다. 아래의 돌아가기 버튼을 통해 로그인 페이지로 돌아가십시오";
}
$row = mysqli_fetch_array($res);

if(empty($row)) {
    echo "로그인 실패";
    exit();
}

if($row['id'] == $id && $row['pw'] == $pw) {
    echo "로그인 성공";
    session_start();
    $_SESSION['id'] = $row['id'];
    //세션을 이용해 로그인 상태 유지시키기
} else {
    echo "로그인 실패";
}

?>