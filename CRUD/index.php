<?php
include "koneksi/koneksi.php";

// query untuk mengambil data dari tabel mahasiswa
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);
// menutup conn database
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tabel Data Mahasiswa</title>
</head>

<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #4CAF50;
    color: white;
  }

  tr:hover {
    background-color: #f5f5f5;
  }

  img {
    width: 100px;
    height: auto;
    object-fit: cover;
  }
</style>
<body>
	<h1>Tabel Data Mahasiswa</h1>
	<table border='1'>
		<tr>
			<th>ID</th>
			<th>Foto</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jurusan</th>
			<th>Aksi</th>
		</tr>
		<?php
		while ($data = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$data['id']."</td>";
			echo "<td><img src='Gambar/".$data['gambar']."' alt='".$data['nama']."'></td>";
			echo "<td>".$data['nama']."</td>";
			echo "<td>".$data['alamat']."</td>";
			echo "<td>".$data['jurusan']."</td>";
			echo "<td>
			<a href='CRUD/insertData.php'>Tambah Data</a>
			<a href='CRUD/editData.php?id=".$data['id']."'>Edit</a>
			<a href='CRUD/delete.php?id=".$data['id']."'>Hapus</a>
			</td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>
