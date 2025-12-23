<?php
include 'baglan.php';
session_start();

if (isset($_POST['giris_yap'])) {
    $kadi = $_POST['kadi'];
    $sifre = $_POST['sifre'];

    $sorgu = mysqli_query($baglan, "SELECT * FROM kullanicilar WHERE kullanici_adi='$kadi' AND sifre='$sifre'");
    
    if (mysqli_num_rows($sorgu) > 0) {
        $kullanici = mysqli_fetch_assoc($sorgu);
        $_SESSION['kullanici_id'] = $kullanici['id'];
        $_SESSION['rol'] = $kullanici['rol'];
        $_SESSION['kadi'] = $kullanici['kullanici_adi'];

        if ($kullanici['rol'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
    } else {
        $hata = "Hatalı kullanıcı adı veya şifre!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Giriş Yap</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 card p-4 shadow">
                <h3 class="text-center">Giriş Yap</h3>
                <?php if(isset($hata)) echo "<div class='alert alert-danger'>$hata</div>"; ?>
                <form method="POST">
                    <input type="text" name="kadi" class="form-control mb-3" placeholder="Kullanıcı Adı" required>
                    <input type="password" name="sifre" class="form-control mb-3" placeholder="Şifre" required>
                    <button name="giris_yap" class="btn btn-primary w-100">Giriş</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>