<?php
// Konfigurasi Database
$host = "localhost";
$user = "root";
$password = "";
$database = "identitas_diri";

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel
$sql = "SELECT id, nama, jenis_kelamin, alamat, deskripsi, foto FROM users";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">2203010002 - Mochamad Fauzan Diva Kusumah - TI-A</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#"><b>HOME</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><b>EDUCATION</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><b>PROJECT</b></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><b>CONTACT</b></a></li>
                    <li class="nav-item">
                        <button class="btn hire-btn"><b>Hire me</b></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-6 hero-content">
                        <h1><span>I’m</span> <br> <?= $row['nama'] ?></h1>
                        <p class="my-3">
                            <?= $row['deskripsi'] ?>
                        </p>
                        <a href="#" class="btn btn-custom">Download CV</a>
                    </div>
                    <div class="col-md-6 text-center hero-image">
                        <img src="Editor/assets/images/<?= $row['foto'] ?>" alt="Foto" width="300">
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section class="education-section bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">EDUCATION</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Pendidikan</th>
                        <th>Tahun</th>
                        <th>Nama Sekolah / Kampus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql_education = "SELECT id, pendidikan, tahun, nama_sekolah FROM education";
                    $result_education = $conn->query($sql_education);

                    if ($result_education && $result_education->num_rows > 0):
                        $no = 1;
                        while ($row = $result_education->fetch_assoc()): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['pendidikan'] ?></td>
                                <td><?= $row['tahun'] ?></td>
                                <td><?= $row['nama_sekolah'] ?></td>
                            </tr>
                        <?php endwhile; 
                    else: ?>
                        <tr>
                            <td colspan="4">Belum ada data pendidikan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="project-section py-5">
    <div class="container text-center">
        <h2 class="mb-4">PROJECT</h2>
        <div class="row justify-content-center">
            <!-- Project 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/image/Project2.png" class="card-img-top" alt="Membangun Web Unper">
                    <div class="card-body">
                        <h5 class="card-title">Membangun Web Unper</h5>
                        <p class="card-text">-</p>
                        <a href="#" class="btn btn-primary">Link</a>
                    </div>
                </div>
            </div>
            <!-- Project 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/image/Project1.png" class="card-img-top" alt="Membuat Web Portofolio">
                    <div class="card-body">
                        <h5 class="card-title">Membuat Web Portofolio</h5>
                        <p class="card-text">-</p>
                        <a href="#" class="btn btn-primary">Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Contact Section -->
    <section class="contact-section bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Contact</h2>
            <p>Address: 123 Main Street, Ciamis<br>State Province, Country</p>
            <div class="social-icons">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/_fauzandivakusumah/" target="_blank">Instagram</a>
                <a href="#"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-3 bg-dark text-white">
        <p>&copy; 2024 Your Website. All rights reserved. Privacy Policy | Terms of Service</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
