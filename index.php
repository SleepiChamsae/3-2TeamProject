<?php
include 'init.php';
?>
<head>
    <title>블로그</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
        </tr>
    <?php
$currentPage = 0;
if(isset($_POST['currentPage'])) {
    $currentPage = $_POST['currentPage'];
} else {
    $currentPage = 1;
}
$sql = "SELECT COUNT(*) FROM blog";
//NOTICE: 이 코드는 모든 걸 가져오기 떄문에 비 효율적임;
$res = mysqli_query($conn, $sql);
$countOfWriting = mysqli_fetch_row($res)[0];
//DEBUG_CHECK:이게 되려나?
$maximumWritingsPerPage = 10;
$amountOfPage = intval($countOfWriting / $maximumWritingsPerPage + 1);

$pagePerSection = 10;
$amountOfSection = intval($amountOfPage / $pagePerSection + 1);

$WritingsInPage = 0;
if($currentPage < $amountOfPage) {
    $WritingsInPage = $maximumWritingsPerPage;
} else if($currentPage == $amountOfPage) {
    $WritingsInPage = $countOfWriting % $maximumWritingsPerPage;
} else {
    //요청 페이지 > 총 페이지 수
    $currentPage = $amountOfPage;
}

$sortBy = "";
if(isset($_POST['sortBy'])) {
    $sortBy = $_POST['sortBy'];
} else {
    $sortBy = "id";
}

$offset = ($currentPage - 1) * 10;
$sql = "SELECT R1.* FROM(
                    SELECT * FROM blog
                    ORDER BY $sortBy ASC
        )R1
        LIMIT $maximumWritingsPerPage OFFSET $offset";
$res = mysqli_query($conn, $sql);
if(!$res) {
    echo "님 sql 문 터짐 ㅅㄱ";
    exit();
    //ERR: 위가 잘못되었거나 접속 오류거나 
}
while($row = mysqli_fetch_array($res)) {
    ?>
        <tr>
            <th><?php echo "$row[id]" ?></th>
            <th><?php echo "$row[title]" ?></th>
            <th><?php echo "$row[user]" ?></th>
            <th><?php echo "$row[uploadDate]" ?></th>
        </tr>
        <?php
}
?>
    </table>
<?php 
//TODO: Index하면 진짜 localhost/index.php?뭐시기뭐시기로 되어있네
echo "<ul>";
$currentSection = intval($currentPage / $pagePerSection + 1);
    if($currentPage != 1) {
        echo "<li><a href='/index.php?currentPage=1'>처음</a></li>";
    }

    $prevPage = ($currentSection - 2) * 10 + 9;
    if($currentSection != 1) {
        echo "<li><a href='/index.php?currentPage=$prevPage'>이전</a></li>";
    }

    for($i = 0;$i < $currentSection; $i++) {
        $p = ($currentPage - 1) * 10 + $i;
        echo "<li><a href='/index.php?currentPage=$p'>$p</a></li>";
    }

    $nextPage = $currentSection * 10;
    if($currentSection != $amountOfSection) {
        echo "<li><a href='/index.php?currentPage=$nextPage'>다음</a></li>";
    }

    if($currentPage != $amountOfPage) {
        echo "<li><a href='/index.php?currentPage=$amountOfPage'>끝</a></li>";
    }

echo "</ul>";
?>
</body>