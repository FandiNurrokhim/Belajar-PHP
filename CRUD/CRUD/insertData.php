<?php
	include "../koneksi/koneksi.php";

	// cek apakah form telah disubmit
	if (isset($_POST['submit'])) {
		// ambil data dari form
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jurusan = $_POST['jurusan'];
		$gambar = $_FILES['gambar']['name'];

		// query untuk menambahkan data ke dalam tabel mahasiswa
		$query = "INSERT INTO mahasiswa (nama, alamat, jurusan, gambar) VALUES ('$nama', '$alamat', '$jurusan', '$gambar')";
		$result = mysqli_query($conn, $query);

		// upload file gambar ke direktori yang ditentukan
		$target_dir = "../Gambar/";
		$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
		move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

		// redirect ke halaman utama setelah data berhasil ditambahkan
		header("Location: ../index.php");
	}

	// menutup koneksi database
	mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Mahasiswa</title>
</head>
<body>
	<h2>Tambah Data Mahasiswa</h2>

	<!-- form untuk menambahkan data -->
	<form method="post" enctype="multipart/form-data">
		<label for="nama">Nama:</label><br>
		<input type="text" id="nama" name="nama"><br>

		<label for="alamat">Alamat:</label><br>
		<textarea id="alamat" name="alamat"></textarea><br>

		<label for="jurusan">Jurusan:</label><br>
		<textarea id="jurusan" name="jurusan"></textarea><br>

		<label for="gambar">Gambar:</label><br>
		<input type="file" id="gambar" name="gambar"><br>

		<input type="submit" name="submit" value="Tambah">
	</form>
</body>
</html>
