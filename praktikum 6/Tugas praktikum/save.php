<?php
session_start();
include 'auth_check.php';
include 'config.php';

$laporan = new Laporan($conn);

$id = $_POST['id'];
$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];

$foto = "";

if($_FILES['foto']['name'] != ""){
    $file = time().'_'.$_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/".$file);
    $foto = $file;
}

// kalau tidak upload foto, pakai foto lama
if($id != "" && $foto == ""){
    $data = mysqli_fetch_assoc($laporan->getById($id));
    $foto = $data['foto'];
}

$laporan->save($id, $nama, $kategori, $deskripsi, $foto);

header("Location: dashboard.php");
exit;
?>