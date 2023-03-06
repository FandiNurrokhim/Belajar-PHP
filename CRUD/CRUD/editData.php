<?php
include "../koneksi/koneksi.php";

// ambil ID dari URL
$id = $_GET['id'];

// query untuk mengambil data dengan ID tertentu dari tabel mahasiswa
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);

// cek apakah form telah disubmit
if (isset($_POST['submit'])) {
    // ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];
    $gambar = $_FILES['gambar']['name'];

    // query untuk mengupdate data di tabel mahasiswa
    $query = "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', jurusan='$jurusan', gambar='$gambar' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    $target_dir = "../Gambar/";
	$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    // redirect ke halaman utama setelah data berhasil diupdate
    header("Location: ../index.php");
}
// menutup conn database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h2>Edit Data Mahasiswa</h2>
		<form method="post" action="" enctype="multipart/form-data">
			<div>
				<label for="nama">Nama:</label>
				<input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
			</div>
			<div>
				<label for="alamat">Alamat:</label>
				<textarea id="alamat" name="alamat"><?php echo $data['alamat']; ?></textarea>
			</div>
			<div>
				<label for="jurusan">Jurusan:</label>
				<textarea id="jurusan" name="jurusan"><?php echo $data['jurusan']; ?></textarea>
			</div>
			<div>
				<label for="gambar">Gambar:</label>
				<input type="file" id="gambar" name="gambar"><br>
			</div>
			<div>
				<input type="submit" name="submit" value="Update">
			</div>
		</form>
	</div>
</body>
</html>

