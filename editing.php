<?php
include 'init.php';
session_start();

if(!isset($_SESSION['id'])) {
    exit();
    //ERR: 로그인이 되지 않음
}
if(!isset($_POST['id'])) {
    exit();
    //ERR: ID값이 존재하지 않음
}

$writingId = $_POST['id'];
$userId = $_SESSION['id'];

$sql = "SELECT * FROM BLOG WHERE id = '$writingId'";
$res = mysqli_query($conn, $sql);
if(!$res) {
    exit();
	//ERR: 블로그가 없거나 접속 에러가 남
}
$row = mysqli_fetch_array($res);
?>

<html>
    <head>
        <title>수정 -<?php $row['title'] ?></title>
        <style></style>
    </head>
    <body>
        <form action="finishing_editing.php" method="POST">
        <input name="id" value="<?php $row['id'] ?>" type="hidden" />
            <table>
                <tr>
                    <th>제목</th>
                    <th><input type="text" name="title" class="title" value="<?php $row['title'] ?>" placeholder="제목을 입력하십시오"/></th>
                </tr>
                <tr>
                    <th>내용</th>
                    <th><textarea name="contents" placeholder="내용을 입력하십시오" value="<?php $row['contents']?>"></textarea></th>
                </tr>
            </table>
        </form>
    </body>
</html>