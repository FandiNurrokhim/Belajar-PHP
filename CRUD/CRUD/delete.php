<?php
include "../koneksi/koneksi.php";

// ambil ID dari URL
$id = $_GET['id'];

// query untuk menghapus data dengan ID tertentu dari tabel mahasiswa
$query  = "DELETE FROM mahasiswa WHERE id = $id";
$result = mysqli_query($conn, $query);

// redirect ke halaman utama setelah data berhasil dihapus
header("Location: ../index.php");

// menutup conn database
mysqli_close($conn);
?>
