<?php

include 'init.php';

$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "INSERT INTO user VALUE('$id', '$pw')";
$res = mysqli_query($conn, $sql);

header('index.php');
?>