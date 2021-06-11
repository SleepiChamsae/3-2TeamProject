<?php
include 'init.php';
session_start();

if(!isset($_SESSION['id'])) {
    exit();
    //ERR: 로그인이 되지 않음
}
if(!isset($_GET['id'])) {
    exit();
    //ERR: ID값이 존재하지 않음
}

$writingId = $_GET['id'];
$userId = $_SESSION['id'];

$sql = "SELECT * FROM BLOG WHERE id = '$writingId'";
$res = mysqli_query($conn, $sql);
if(!$res) {
    exit();
	//ERR: 블로그가 없거나 접속 에러가 남
}
$row = mysqli_fetch_array($res);

if($row['user'] != $_SESSION['id']) {
    exit();
    //ERR: 글을 쓴 유저가 아닌 사람이 접속을 시도함
}
?>

<html>
    <head>
        <title>수정 -<?php echo "$row[title]" ?></title>
        <style></style>
    </head>
    <body>
        <form action="finishing_editing.php" method="POST">
        <input name="id" value="<?php echo"$row[id]" ?>" type="hidden" />
            <table>
                <tr>
                    <th>제목</th>
                    <th><input type="text" name="title" class="title" value="<?php echo "$row[title]" ?>" placeholder="제목을 입력하십시오"/></th>
                </tr>
                <tr>
                    <th>내용</th>
                    <th><textarea name="contents" placeholder="내용을 입력하십시오"><?php echo "$row[contents]" ?></textarea></th>
                </tr>
            </table>
            <input type='submit' value='제출' />
        </form>
    </body>
</html>