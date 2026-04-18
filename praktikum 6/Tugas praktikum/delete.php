<?php
include 'auth_check.php';
include 'config.php';

$laporan = new Laporan($conn);

$id = $_GET['id'];
$laporan->delete($id);

header("Location: dashboard.php");
exit;
?>