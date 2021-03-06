<?php

include 'init.php';

if(!isset($_GET['id'])) {
    exit();
    //ERR: 불러오는 id값이 없음 (404)
}
$id = $_GET['id'];
$sql = "SELECT * FROM blog WHERE id=$id";
$res = mysqli_query($conn, $sql);

if(!$res) {
    exit();
    //ERR: 불러오는 ID에 해당하는 글이 없음 (404)
}

$blogData = mysqli_fetch_array($res);
?>
<head>
    <title><?php echo "$blogData[title]";?></title>
    <style>
        textarea {
            width: 90%;
        }
        table {
            width: 100%;
        }
        .title {
            width: 90%;
        }
    </style>
</head>
<body>
    <center>
        <table>
            <tr>
                <th>제목</th>
                <th class="title"><?php echo "$blogData[title]" ?></th>
            </tr>
            <tr>
                <th>작성자</th>
                <th><?php echo "$blogData[user]" ?></th>&nbsp;&nbsp;<th>작성일</th>
                <th><?php echo "$blogData[uploadDate]"?></th>
            </tr>
            <tr>
                <th>내용</th>
                <th>
                    <textarea readonly="readonly"><?php echo "$blogData[contents]" ?></textarea>
                </th>
            </tr>
        </table>
        <?php
        session_start();
        if(isset($_SESSION['id'])) {
            if($_SESSION['id'] == $blogData['user']) {
                ?>
                <ul>
                    <li>
                        <a href='/editing.php?id=<?php echo "$id" ?>'>수정</a>
                    </li>
                    <li>
                        <a href='/deleting.php?id=<?php echo"$id"?>'>삭제</a>
                    </li>
                </ul>
            <?php
            }
        }
        ?>
    </center>
</body>