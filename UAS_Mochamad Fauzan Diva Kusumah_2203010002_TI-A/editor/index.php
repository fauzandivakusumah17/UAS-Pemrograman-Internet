<?php
include 'database.php';

// Query untuk mengambil semua data dari tabel users
$sql = "SELECT * FROM users";
$result = $conn->query($sql); // Eksekusi query

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Identitas Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Identitas Diri</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Identitas</a>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                            <td><?= htmlspecialchars($row['alamat']) ?></td>
                            <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                            <td>
                                <img src="assets/images/<?= htmlspecialchars($row['foto']) ?>" alt="Foto" width="100">
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Lihat</a>
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">Data tidak ditemukan</div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>
