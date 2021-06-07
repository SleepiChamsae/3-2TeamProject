<?php
//TODO: [SECOND] 여기에 로그인을 안 한 상태라면 로그인 하라고 script:alter 띄우고 로그인 페이지로 넘기기
//그게 아니면 유저를 POST나 COOKIE나 SESSION을 통해서 Finishing_writing.php에 전송하기
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