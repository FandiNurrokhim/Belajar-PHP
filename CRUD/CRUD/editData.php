<?php
include "../koneksi/koneksi.php";

// ambil ID dari URL
$id = $_GET['id'];

// query untuk mengambil data dengan ID tertentu dari tabel mahasiswa
$query  = "SELECT * FROM mahasiswa WHERE id = $id";
$result = mysqli_query($conn, $query);
$data   = mysqli_fetch_array($result);

// cek apakah form telah disubmit
if (isset($_POST['submit'])) {
    // ambil data dari form
	$nama    = htmlspecialchars($_POST['nama']);
	$alamat  = htmlspecialchars($_POST['alamat']);
	$jurusan = htmlspecialchars($_POST['jurusan']);
    $gambar  = $_FILES['gambar']['name'];

    // query untuk mengupdate data di tabel mahasiswa
    updateData($id, $nama, $alamat, $jurusan, $gambar);
}
// menutup conn database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Mahasiswa</title>
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
<body>
<div class="container w-25 shadow p-3 bg-body rounded mx-auto mt-5">
	<h4 class="p-3 mb-5 mx-auto text-center my-auto bg-secondary bg-gradient">
		<span class="bi bi-flower3 fw-bold">EDIT DATA</span>
	</h4>
	<form method="post" action="" enctype="multipart/form-data">
		<div class="mb-3">
			<label for="nama" class="form-label">
				<i class="bi bi-person"></i> Nama:
			</label>
			<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>">
		</div>
		<div class="mb-3">
			<label for="alamat" class="form-label">
				<i class="bi bi-house"></i> Alamat:
			</label>
			<input class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>">
		</div>
		<div class="mb-3">
			<label for="jurusan" class="form-label">
				<i class="bi bi-journal"></i> Jurusan:
			</label>
			<input class="form-control" id="jurusan" name="jurusan" value="<?php echo $data['jurusan']; ?>">
		</div>
		<div class="mb-3">
			<label for="gambar" class="form-label">
				<i class="bi bi-file-image"></i> Gambar:
			</label>
			<input type="file" class="form-control" id="gambar" name="gambar"><br>
		</div>
		<div class="mb-3">
			<input type="submit" class="btn btn-primary w-100" name="submit" value="SIMPAN PERUBAHAN">
		</div>
	</form>
</div>

</body>
</html>

