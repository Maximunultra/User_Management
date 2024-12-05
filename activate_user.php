<?php
include 'constant/config.php';

$id = $_GET['ID'];
$status = $_GET['Status'];

$newStatus = ($status == 'active') ? 'inactive' : 'active';
$conn->query("UPDATE users SET status='$newStatus' WHERE id=$id");

header("Location: index.php");
?>
