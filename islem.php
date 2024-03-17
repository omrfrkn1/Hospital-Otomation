<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hastane Otomasyon Sistemi</title>
    <link rel="icon" href="images/icon.png" type="image/icon type">
    <link rel="stylesheet" href="loading.css">
  </head>
</html>
<?php

ob_start();
session_start();

include 'baglan.php';

echo '
<h1 class="title">Loading</h1>
<div class="rainbow-marker-loader"></div>
';

if(isset($_POST['kullaniciKaydet'])){
    $hasta_Tc = isset($_POST['hasta_Tc']) ? $_POST['hasta_Tc'] : null;
    $hasta_ad = isset($_POST['hasta_ad']) ? $_POST['hasta_ad'] : null;
    $hasta_soyad = isset($_POST['hasta_soyad']) ? $_POST['hasta_soyad'] : null;
    $hasta_sifre = isset($_POST['hasta_sifre']) ? $_POST['hasta_sifre'] : null;

    //Veritabanı Ekleme İşlemleri
    $sorgu = $db->prepare('INSERT INTO hasta SET
        hasta_Tc = ?,
        hasta_ad = ?,
        hasta_soyad = ?,
        hasta_sifre = ?
    ');

    $ekle = $sorgu->execute([
        $hasta_Tc, $hasta_ad, $hasta_soyad, $hasta_sifre]);

    if($ekle){
        header('refresh:2;url=giris.php?giris=hasta');
    }else{
        $hata = $sorgu ->errorInfo();
        echo 'mysql hatası' .$hata[2];
    }
}

if(isset($_POST['giris_yap'])){
    $hasta_Tc = $_POST['hasta_Tc'];
    $hasta_sifre = $_POST['hasta_sifre'];

    $hastasor = $db->prepare("SELECT * FROM hasta WHERE hasta_Tc=:hasta_Tc and hasta_sifre=:hasta_sifre");
    $hastasor->execute([
        'hasta_Tc'=> $hasta_Tc,
        'hasta_sifre' => $hasta_sifre
    ]);

    $say = $hastasor->rowCount();

    if($say==1){
        $_SESSION['patienthasta_Tc']=$hasta_Tc;
        header('refresh:2;url=anamenu.php');
        exit;
    }
    else{
        header('refresh:2;url=giris.php?giris=hasta&durum=basarisiz');
        exit;
    }
}

if(isset($_POST['doktor_giris'])){
    $_SESSION['patienthasta_Tc'] = $_POST['doktorad'];
    header('refresh:2;url=anamenu.php?kullanici=doktor');     
}




if(isset($_POST['randevu_kaydet'])){
    $muayene_doktor = isset($_POST['doktor']) ? $_POST['doktor']:null;
    $muayene_tarih = isset($_POST['tarih']) ? $_POST['tarih']:null;
    $muayene_klinik = isset($_POST['klinik']) ? $_POST['klinik']:null;
    $mua_hs_id = isset($_POST['hasta_id']) ? $_POST['hasta_id']:null;

    $kaydet = $db->prepare("INSERT INTO muayene SET
        muayene_doktor = ?,
        muayene_tarih = ?,
        muayene_klinik = ?,
        mua_hs_id = ?
    ");

    $insert = $kaydet->execute([
        $muayene_doktor, $muayene_tarih, $muayene_klinik, $mua_hs_id
    ]);

    if($insert){
        header("refresh:2;url=liste.php?kullanici=hasta");
    }
    else{
        header("refresh:2;url=randevual.php");
    }
}

if(isset($_POST['ilac_yaz'])){
  $hastasec = $_POST['hastasec'];
  $ilacsec = $_POST['ilacsec'];
  $aciklama = $_POST['aciklama'];
  $recete_hs_id = $_POST['recete_hs_id'];

  $ilackaydet = $db->prepare("INSERT INTO recete SET
      recete_hasta = ?,
      recete_ilac = ?,
      recete_aciklama = ?,
      recete_hs_id = ?
  ");

  $ilacekle = $ilackaydet->execute([
    $hastasec, $ilacsec, $aciklama, $recete_hs_id
  ]);

  if($ilacekle)
    header("refresh:2;url=anamenu.php?kullanici=doktor");
  else
    header("refresh:2;url=ilacyaz.php");

}

if(isset($_GET['iptal'])){
  $iptal_id = $_GET['iptal'];

  $db->prepare("DELETE FROM muayene WHERE muayene_id=?")->execute([$iptal_id]);

  header("refresh:2;url=liste.php?kullanici=hasta");
}

if(isset($_POST['edit_doktor'])){
  $edit_id = $_POST['edit_id'];
  $edit_ad = $_POST['edit_ad'];
  $edit_yas = $_POST['edit_yas'];
  $edit_boy = $_POST['edit_boy'];
  $edit_kilo = $_POST['edit_kilo'];

  if($edit_ad != null){
    $guncelle = $db->prepare("UPDATE doktorlar SET doktor_adi = ? WHERE doktor_id = ?");

    $guncelle -> execute([
      $edit_ad, $edit_id
    ]);

    $_SESSION['patienthasta_Tc']=$edit_ad;
  }

  if($edit_yas != null){
    $guncelle = $db->prepare("UPDATE doktorlar SET doktor_yas = ? WHERE doktor_id = ?");

    $guncelle -> execute([
      $edit_yas, $edit_id
    ]);
  }

  if($edit_boy != null){
    $guncelle = $db->prepare("UPDATE doktorlar SET doktor_boy = ? WHERE doktor_id = ?");

    $guncelle -> execute([
      $edit_boy, $edit_id
    ]);
  }

  if($edit_kilo != null){
    $guncelle = $db->prepare("UPDATE doktorlar SET doktor_kilo = ? WHERE doktor_id = ?");

    $guncelle -> execute([
      $edit_kilo, $edit_id
    ]);
  }

  header("refresh:2;url=profil.php?kullanici=doktor");
}


if(isset($_POST['edit_hasta'])){
  $edit_id = $_POST['edit_id'];
  $edit_ad = $_POST['edit_ad'];
  $edit_soyad = $_POST['edit_soyad'];
  $edit_sifre = $_POST['edit_sifre'];
  $edit_yas = $_POST['edit_yas'];
  $edit_boy = $_POST['edit_boy'];
  $edit_kilo = $_POST['edit_kilo'];

  if($edit_ad != null){
    $guncelle = $db->prepare("UPDATE hasta SET hasta_ad = ? WHERE hasta_id = ?");

    $guncelle -> execute([
      $edit_ad, $edit_id
    ]);
  }

  if($edit_soyad != null){
    $guncelle = $db->prepare("UPDATE hasta SET hasta_soyad = ? WHERE hasta_id = ?");

    $guncelle -> execute([
      $edit_soyad, $edit_id
    ]);
  }

  if($edit_sifre != null){
    $guncelle = $db->prepare("UPDATE hasta SET hasta_sifre = ? WHERE hasta_id = ?");

    $guncelle -> execute([
      $edit_sifre, $edit_id
    ]);
  }

  if($edit_yas != null){
    $guncelle = $db->prepare("UPDATE hasta SET hasta_yas = ? WHERE hasta_id = ?");

    $guncelle -> execute([
      $edit_yas, $edit_id
    ]);
  }

  if($edit_boy != null){
    $guncelle = $db->prepare("UPDATE hasta SET hasta_boy = ? WHERE hasta_id = ?");

    $guncelle -> execute([
      $edit_boy, $edit_id
    ]);
  }

  if($edit_kilo != null){
    $guncelle = $db->prepare("UPDATE hasta SET hasta_kilo = ? WHERE hasta_id = ?");

    $guncelle -> execute([
      $edit_kilo, $edit_id
    ]);
  }

  header("refresh:2;url=profil.php");
}
?>
