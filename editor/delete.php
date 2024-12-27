<?php
include 'database.php';

// Mengambil ID dari parameter query string
$id = $_GET['id'];

// Hapus foto jika ada
$sql = "SELECT foto FROM users WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $foto = $row['foto'];

    if (!empty($foto) && file_exists("assets/images/$foto")) {
        unlink("assets/images/$foto");
    }
}

// Hapus data dari database
$sql = "DELETE FROM users WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
