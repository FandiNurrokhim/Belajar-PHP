<?php
$conn = mysqli_connect('localhost', 'root', '', 'crud');

function tambahMahasiswa($nama, $alamat, $jurusan, $gambar) {
    global $conn;

    // query untuk menambahkan data ke dalam tabel mahasiswa
    $query = "INSERT INTO mahasiswa 
              (nama, alamat, jurusan, gambar) 
              VALUES ('$nama', '$alamat', '$jurusan', '$gambar')";

    $hasil = mysqli_query($conn, $query);

    // upload file gambar ke direktori yang ditentukan
    $target_dir = "../Gambar/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    if ($hasil) {
        header("location: ../index.php");
    }

    // kembalikan nilai dari variabel $hasil sebagai hasil dari query insert
    return $hasil;
}

function updateData($id, $nama, $alamat, $jurusan, $gambar) {
    global $conn;

    // sintaks sql
    $query = "UPDATE mahasiswa
              SET nama='$nama', alamat='$alamat', jurusan='$jurusan', gambar='$gambar'
              WHERE id='$id' ";
    // jalankan kode sql
    $hasil = mysqli_query($conn, $query);

    $target_dir = "../Gambar/";
	$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
	move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    // redirect ke halaman utama setelah data berhasil diupdate
    header("Location: ../index.php");

    return $hasil;
}
?>