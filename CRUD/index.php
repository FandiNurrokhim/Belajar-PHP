<?php
include "koneksi/koneksi.php";

// query untuk mengambil data dari tabel mahasiswa
if( isset($_GET['cari']) ){
    $cari = $_GET['cari'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$cari%'";
}else{
    $query = "SELECT * FROM mahasiswa";
}

$result = mysqli_query($conn, $query);
if(!$result){
    die("Query Error: " . mysqli_error($conn));
}


// menutup conn database
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabel Data Mahasiswa</title>
	<!-- css -->
	<link rel="stylesheet" href="css/style.css">
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
	<!-- navbar yang berisi search input -->
	<div>
		<form action="" method="GET" class="navbar d-flex justify-content-around w-50 mx-auto">
			<h4>Tabel Data Mahasiswa</h4>
			<div class="input-group w-50">
				<input type="text" class="form-control" placeholder="Cari data.." aria-label="Recipient's username" aria-describedby="button-addon2" name="cari">
				<button class="btn btn-primary bg-gradient" type="submit" id="button-addon2" value="cari">Cari</button>
			</div>
		</form>
	</div>
	
<!-- Menampilkan Data -->
	<div class="container-md">
		<div class="row">
			<div class="col-md-8 mx-auto">
			<a href="CRUD/insertData.php" class="btn btn-warning bg-gradient text-white">
				<span class="bi bi-plus-lg fw-bold"></span> Tambah Data
			</a>
			<table class="table table-striped table-hover mt-3">
				
				<tr>
					<th>NO</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Jurusan</th>
					<th>Aksi</th>
				</tr>
				
				<?php 
				$no = 1;
				foreach($result as $data): ?>
					<tr>
						<td><?= $no++ ?></td>
						<!-- mengecek img apakah user sudah upload atau belum -->
						<td>
							<?php if ($data['gambar'] == ''): ?>
							<img src='Gambar/default.webp' alt='Default Image' width='100px' height='auto'>
							<?php else: ?>
							<img src='Gambar/<?= $data['gambar']; ?>' alt='<?= $data['nama']; ?>' width='100px' height='auto'>
							<?php endif; ?>
						</td>
						<!-- menampilkan data -->
						<td><?= $data['nama']; ?></td>
						<td><?= $data['alamat']; ?></td>
						<td><?= $data['jurusan']; ?></td>
						<!-- Tombol Aksi -->
						<td>
							<a href='CRUD/editData.php?id=<?= $data['id']; ?>' class="btn btn-primary me-2">
							<span class="bi bi-pencil-fill"></span> Edit
							</a>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $data['id']; ?>">
							<span class="bi bi-trash"></span> Hapus
							</button>
							<!-- Modal -->
							<div class="modal fade" id="exampleModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-body">
										<h5>Anda yakin ingin menghapus data ini?</h5>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
										<a class="btn btn-danger" href='CRUD/delete.php?id=<?= $data['id']; ?>'>Hapus</a>
									</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>


</table>
</body>
</html>
