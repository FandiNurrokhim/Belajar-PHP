<?php

$conn = mysqli_connect("localhost", "root", "", "multi_user");

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username tidak boleh sama
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username  = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo '<script>
                alert("User sudah terdaftar silahkan menggunakan username lain!");
              </script>';
        return false;
    }

    // cek konfirmasi
    if ( $password !== $password2) {
        echo '<script>
                alert("Password tidak sesuai!");
              </script>';
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan data ke database
    mysqli_query($conn, "INSERT INTO user values('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>