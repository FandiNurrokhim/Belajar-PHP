<?php
	include "../koneksi/koneksi.php";

	// cek apakah form telah disubmit
	if (isset($_POST['submit'])) {
		// ambil data dari form
		$nama    = htmlspecialchars($_POST['nama']);
		$alamat  = htmlspecialchars($_POST['alamat']);
		$jurusan = htmlspecialchars($_POST['jurusan']);
		$gambar  = $_FILES['gambar']['name'];

		// query untuk menambahkan data ke dalam tabel mahasiswa
		tambahMahasiswa($nama, $alamat, $jurusan, $gambar);
	}

	// menutup koneksi database
	mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tambah Data Mahasiswa</title>
	<!-- css -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- bootstrap icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<!-- Awesome Font -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- Javascript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<style>
    form {
    position: absolute;
    top: 35%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>

<body>
<!-- form untuk menambahkan data -->
<form method="post" enctype="multipart/form-data" class="w-25 shadow p-3 bg-body rounded mx-auto mt-5">
	<div class="mb-3">
		<label for="nama" class="form-label">
			<i class="bi bi-person"></i> Nama:
		</label>
		<input type="text" class="form-control"  name="nama" required>
	</div>

	<div class="mb-3">
		<label for="alamat" class="form-label">
			<i class="bi bi-house"></i> Alamat:
		</label>
		<input type="text" class="form-control"  name="alamat" required>
	</div>

	<div class="mb-3">
		<label for="jurusan" class="form-label">
			<i class="bi bi-journal"></i> Jurusan:
		</label>
		<input type="text" class="form-control" name="jurusan" required>
	</div>

	<div class="mb-3">
		<label for="gambar" class="form-label">
			<i class="bi bi-file-image"></i> Gambar:
		</label>
		<input type="file" class="form-control" name="gambar">
	</div>

	<div class="d-grid">
		<input type="submit" class="btn btn-primary bg-gradient" name="submit" value="Tambah">
	</div>
</form>



</body>
</html>
