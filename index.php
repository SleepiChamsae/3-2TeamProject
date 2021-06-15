<?php

        include 'init.php';
        /* 인덱스 함수 참고 http://blog.kurien.co.kr/529 */
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $sql = "SELECT COUNT(*) AS CNT FROM BLOG ORDER BY ID DESC";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);

        $allPost = $row['CNT']; //전체 글의 수

        const ONE_PAGE = 15; //한 페이지당 글 수
        $allPage = ceil($allPost / ONE_PAGE);

        if($page < 1 || ($allPage && $page > $allPage)) {
            ?>
<!-- error message -->
<?php
            exit;
        }

        $oneSection = 10;
        $currentSection = ceil($page / $oneSection);
        
        $allSection = ceil($allPage / $oneSection);
        $firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지

        if($currentSection == $allSection) {
            $lastPage = $allPage;
        } else {
            $lastPage = $currentSection * $oneSection;
        }

        $prevPage = (($currentSection - 1) * $oneSection);
        $nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1);

        //no echo last one time
        $paging = '<ul>';

        if($page != 1) {
            $paging .= '<li class="page page_start><a href="./index.php?page=1">처음</a></li>';
        }
        
        if($currentSection != 1) { 
            $paging .= '<li class="page page_prev"><a href="./index.php?page=' . $prevPage . '">이전</a></li>';
        }

        for($i = $firstPage; $i <= $lastPage; $i++) {
            if($i == $page) {
                $paging .= '<li class="page current">' . $i . '</li>';
            } else {
                $paging .= '<li class="page"><a href="./index.php?page=' . $i . '">' . $i . '</a></li>';
            }
        }

        if($currentSection != $allSection) { 
            $paging .= '<li class="page page_next"><a href="./index.php?page=' . $nextPage . '">다음</a></li>';
        }

        if($page != $allPage) { 
            $paging .= '<li class="page page_end"><a href="./index.php?page=' . $allPage . '">끝</a></li>';
        }
        $paging .= '</ul>';

        $currentLimit = (ONE_PAGE * $page) - ONE_PAGE;
        $sqlLimit = 'limit '.$currentLimit.','.ONE_PAGE;
        $sql = 'SELECT * FROM blog ORDER BY id DESC '. $sqlLimit;
        $res = mysqli_query($conn, $sql);

?>

<head>
    <title>블로그 알파</title>
</head>
<body>
    <article>
    <table>
        <thead>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($res)) {

                echo "<tr></tr><td>$row[id]</td>
                <td><a href='./ReadPage.php?id=$row[id]'>$row[title]</a></td>
                <td>$row[user]</td>
                <td>$row[uploadDate]</td></tr> ";
            }
            ?>
        </tbody>
    </table>
    </article>

    <?php echo $paging?>
</body>