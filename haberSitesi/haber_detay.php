<?php 
include 'baglan.php'; 
session_start();


if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($baglan, $_GET['id']);
    $sorgu = mysqli_query($baglan, "SELECT * FROM haberler WHERE id = '$id'");
    $haber = mysqli_fetch_assoc($sorgu);

   
    if (!$haber) {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $haber['baslik']; ?> - Genç Haber</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">GENÇ HABER</a>
    </div>
</nav>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow border-0 p-4">
                <?php if (!empty($haber['resim'])): ?>
                    <img src="img/<?php echo $haber['resim']; ?>" class="img-fluid rounded mb-4" alt="Haber Görseli" style="width: 100%; max-height: 500px; object-fit: cover;">
                <?php endif; ?>
                
                <h1 class="display-5 fw-bold text-dark"><?php echo $haber['baslik']; ?></h1>
                
                <div class="d-flex text-muted mb-4 border-bottom pb-2">
                    <span class="me-3">📅 <?php echo date("d.m.Y H:i", strtotime($haber['tarih'])); ?></span>
                    <span>👤 Admin</span>
                </div>

                <div class="haber-metni" style="font-size: 1.15rem; line-height: 1.9; color: #333;">
                    <?php echo nl2br($haber['icerik']); ?>
                </div>

                <div class="mt-5">
                    <a href="index.php" class="btn btn-outline-secondary">← Haberlere Geri Dön</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>