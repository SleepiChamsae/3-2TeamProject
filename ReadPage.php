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

$Blogdata = mysqli_fetch_array($res);
?>
<head>
<title><?php $Blogdata['title']?></title>
</head>
<body>
<center>
    
</center>
</body>