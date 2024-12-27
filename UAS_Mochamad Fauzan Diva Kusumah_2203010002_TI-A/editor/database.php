<?php
// Konfigurasi koneksi database
$host = 'localhost';
$user = 'root'; // Ganti dengan username MySQL Anda
$pass = ''; // Ganti dengan password MySQL Anda
$dbname = 'identitas_diri';

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
