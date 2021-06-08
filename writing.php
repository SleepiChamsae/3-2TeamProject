<?php
session_start();
if(!isset($_SESSION['id'])) {
  //ERR: 로그인이 되어 있지 않습니다.
  exit();
}
?>

<head>
<title>글 쓰기</title>
<style>
    textarea {
        width: 90%;
        height: 150px;
    }
    form {
        width:100%;
    }
    table {
        width:100%;
    }
    .title {
        width: 90%;
    }
</style>
</head>
<body>
<center>
    <form action="finishing_writing.php" method="POST">
        <table>
            <tr>
                <th>제목</th><th><input type="text" name="title" class="title" placeholder="제목을 입력하십시오" /></th>
            </tr>
            <tr>
                <th>내용</th><th><textarea name="contents" placeholder="내용을 입력하십시오" ></textarea></th>
            </tr>
        </table>
        <input type="submit" value="작성 완료" />
    </form>
</center>
</body>
