<?php 
include 'baglan.php'; 
session_start(); 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genç Haber | Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stil.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">GENÇ HABER</a>
    <div class="navbar-nav ms-auto text-white">
      <?php if(isset($_SESSION['kadi'])): ?>
          <span class="nav-link">Hoş geldin, <b><?php echo $_SESSION['kadi']; ?></b></span>
          <?php if($_SESSION['rol'] == 'admin'): ?>
              <a class="nav-link btn btn-warning text-dark mx-2" href="admin.php">Yönetici Paneli</a>
          <?php endif; ?>
          <a class="nav-link btn btn-danger text-white" href="cikis.php">Çıkış Yap</a>
      <?php else: ?>
          <a class="nav-link" href="login.php">Giriş Yap</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<div class="container my-5">
    <h2 class="mb-4 border-start border-primary border-4 ps-3">Son Dakika Haberler</h2>
    
    <div class="row g-4">
        <?php
        $sorgu = mysqli_query($baglan, "SELECT * FROM haberler ORDER BY id DESC");
        while ($satir = mysqli_fetch_assoc($sorgu)) {
            ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <?php if (!empty($satir['resim'])): ?>
                         <img src="img/<?php echo $satir['resim']; ?>" class="card-img-top" alt="Haber Resmi">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/400x180?text=Resim+Yok" class="card-img-top" alt="Resim Yok">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo $satir['baslik']; ?></h5>
                        <p class="card-text text-muted">
                            <?php echo substr($satir['icerik'], 0, 120); ?>...
                         </p>
                        <a href="haber_detay.php?id=<?php echo $satir['id']; ?>" class="btn btn-sm btn-primary">Devamını Oku</a>
                    </div>
                    <div class="card-footer bg-white border-0 text-muted small">
                        📅 <?php echo date("d.m.Y", strtotime($satir['tarih'])); ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>