<?php 
session_start();
 
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../index.php?pesan=info_login");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Peminjam</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">	  
</head>
<body>
<div class="container">
    <div class="content mt-3">
      <div class="card bg-secondary bg-gradient">
        <div class="card-body">
        <div class="dropdown">
          <a href="index.php" class="btn text-light">Dashboard</a>
          <a href="buku.php" class="btn text-light">Buku</a>
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Kategori
            </button>
            <ul class="dropdown-menu">
            <?php
          include '../koneksi.php';
          $no = 1;
          $data = "SELECT * FROM kategoribuku";
          $result = mysqli_query($koneksi, $data);
          while ($row = mysqli_fetch_assoc($result)) { ?>
              <li><a class="dropdown-item" href="kategori.php?nama_kategori=<?php echo $row['nama_kategori']; ?>"><?= $row['nama_kategori']; ?></a></li>
              <?php } ?>
            </ul>
          <a href="koleksi.php" class="btn text-light">Koleksi</a>
          <a href="../logout.php" class="btn text-light">Logout</a>
          </div>
        </div>
      </div>
    </div>

		<div class="content mt-5">
			<h7 class="justify-content-center">
				<b> Selamat Datang <?php echo $_SESSION['username']; ?> Anda login pada <span class="text-primary"><?php echo date('l, d F Y'); ?></span></b>
			</h7>
			<div class="card mt-3">
				<div class="card-body">
					<table class="table table-striped">

						<tr>
							<td width="200">Nama</td>
							<td width="1">:</td>
							<td><?php echo $_SESSION['username']; ?></td>
						</tr>
						<tr>
							<td width="200">Level User</td>
							<td width="1">:</td>
							<td><?php echo $_SESSION['level']; ?></td>
						</tr>
						<tr>
							<td width="200">Tanggal Login</td>
							<td width="1">:</td>
							<td><?php echo date('l, d m Y'); ?></td>
						</tr>

					</table>
				</div>
			</div>
		</div>


	<!-- footer -->
    <div class="content mt-3 fixed-bottom bg-white">
      <p class="text-center"> Aplikasi Perpustakaan Digital | 2024 </p>
    </div>

</div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>



