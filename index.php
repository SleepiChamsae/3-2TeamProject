<?php
include 'db.php';
?>
<head>
<title>블로그</title>
</head>
<body>
<table border=1>
<?php
//TODO: 페이징 함수 만들기(인터넷을 참고하는 것이 좋을 것으로 보임)
for($i = 0; i < $writings; $i++) {
    echo"";//TODO: 여기에 글 쓰는 코드 넣기
}
?>
</table>
</body>
