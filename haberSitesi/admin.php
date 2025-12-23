<?php 
include 'baglan.php'; 
session_start();


if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}

$mesaj = ''; 


if (isset($_POST['haber_ekle'])) {
    $gelen_baslik = mysqli_real_escape_string($baglan, $_POST['baslik']);
    $gelen_icerik = mysqli_real_escape_string($baglan, $_POST['icerik']);
    $resim_adi = NULL;
    
    if (isset($_FILES['haber_resim']) && $_FILES['haber_resim']['error'] == 0) {
    $hedef_dizin = "img/"; 
    $dosya_adi = basename($_FILES['haber_resim']['name']);
    
    
    $yeni_dosya_adi = uniqid() . "_" . $dosya_adi; 
    $hedef_dosya = $hedef_dizin . $yeni_dosya_adi;
    
    $resim_tipi = strtolower(pathinfo($hedef_dosya, PATHINFO_EXTENSION));

    
    if (move_uploaded_file($_FILES['haber_resim']['tmp_name'], $hedef_dosya)) {
        $resim_adi = $yeni_dosya_adi; 
    }

       
        $check = getimagesize($_FILES['haber_resim']['tmp_name']);
        if($check !== false) {
           
            if($resim_tipi != "jpg" && $resim_tipi != "png" && $resim_tipi != "jpeg" && $resim_tipi != "gif" ) {
                $mesaj = '<div class="alert alert-warning">Sadece JPG, JPEG, PNG & GIF dosyalarına izin verilir.</div>';
            } else {
                if (move_uploaded_file($_FILES['haber_resim']['tmp_name'], $hedef_dosya)) {
                    $resim_adi = basename($hedef_dosya); 
                } else {
                    $mesaj = '<div class="alert alert-danger">Resim yüklenirken bir hata oluştu.</div>';
                }
            }
        } else {
            $mesaj = '<div class="alert alert-warning">Yüklediğiniz dosya bir resim değil.</div>';
        }
    }

    
    if ($mesaj == '' || strpos($mesaj, 'danger') === false) { 
        $sorgu = "INSERT INTO haberler (baslik, icerik, resim) VALUES ('$gelen_baslik', '$gelen_icerik', '$resim_adi')";
        
        if (mysqli_query($baglan, $sorgu)) {
            $mesaj = '<div class="alert alert-success">Haber başarıyla yayınlandı!</div>';
        } else {
            $mesaj = '<div class="alert alert-danger">Hata: ' . mysqli_error($baglan) . '</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Haber Ekle - Yönetici Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Yeni Haber Yaz</h4>
                    <div>
                        <span class="text-white me-2">Hoş geldin, <b><?php echo $_SESSION['kadi']; ?></b> (Admin)</span>
                        <a href="index.php" class="btn btn-sm btn-outline-light">Siteye Dön</a>
                        <a href="cikis.php" class="btn btn-sm btn-outline-danger">Çıkış Yap</a>
                    </div>
                </div>
                <div class="card-body">
                    
                    <?php if(isset($mesaj)) echo $mesaj; ?>

                    <form action="admin.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Haber Başlığı</label>
                            <input type="text" name="baslik" class="form-control" placeholder="Etkileyici bir başlık yazın..." required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Haber İçeriği</label>
                            <textarea name="icerik" class="form-control" rows="10" placeholder="Haberin detaylarını buraya girin..." required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Haber Resmi</label>
                            <input type="file" name="haber_resim" class="form-control">
                            <small class="text-muted">JPG, JPEG, PNG veya GIF formatında bir görsel yükleyin.</small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="haber_ekle" class="btn btn-primary btn-lg">Haberi Paylaş</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>