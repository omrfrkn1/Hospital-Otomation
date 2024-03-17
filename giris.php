<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hastane Otomasyon Sistemi</title>
    <link rel="icon" href="images/icon.png" type="image/icon type">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>
  <body>

    <?php
      if(@$_GET['giris'] == "hasta"){
        echo '
        <div class="container">
          <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="formdiv col-4 bg-white p-5">
              <a href="giris.php"> <img class="d-flex m-auto mb-3" src="images/logo.png" width="100%"> </a>
              <form action="islem.php" method="post">
                <label class="form-label mt-4 ms-1">TC Kimlik No</label>
                <input class="form-control" type="text" name="hasta_Tc" maxlength="11" pattern="[0-9]{11}" required>

                <label class="form-label mt-4 ms-1">Şifre</label>
                <input class="form-control "type="password" name="hasta_sifre" required>

                <button class="btn btn-danger mt-4" type="submit" name="giris_yap"> Giriş Yap </button>
              </form>
            </div>
          </div>
        </div>
        ';
      }

      elseif(@$_GET['giris'] == "doktor"){
        include 'baglan.php';
        $doktorAdlar = $db->query("SELECT * FROM doktorlar",PDO::FETCH_ASSOC);
        echo '
        <div class="container">
          <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="formdiv col-4 bg-white p-5">
              <a href="giris.php"> <img class="d-flex m-auto mb-3" src="images/logo.png" width="100%"> </a>
              <form action="islem.php" method="post">
                <label class="form-label mt-4 ms-1">Doktor</label>
                <select class="form-select" name="doktorad" required>
        ';
        foreach($doktorAdlar as $doktor){
          echo '<option value="'.$doktor["doktor_adi"].'">'.$doktor["doktor_adi"].'</option>';
        }
        echo ' 
                </select>

                <button class="btn btn-danger mt-4" type="submit" name="doktor_giris"> Giriş Yap </button>
              </form>
            </div>
          </div>
        </div>
        ';
      }

      elseif(@$_GET['giris'] == "kayıt"){
        echo '
        <div class="container">
          <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="formdiv col-4 bg-white p-5">
              <a href="giris.php"> <img class="d-flex m-auto mb-3" src="images/logo.png" width="100%"> </a>
              <form action="islem.php" method="post">
                <div class="row">
                  <div class="col">
                    <label class="form-label mt-4 ms-1">Ad</label>
                    <input class="form-control" type="text" name="hasta_ad" required>
                  </div>
                  <div class="col">
                    <label class="form-label mt-4 ms-1">Soyad</label>
                    <input class="form-control" type="text" name="hasta_soyad" required>
                  </div>
                </div>

                <label class="form-label mt-4 ms-1">TC Kimlik No</label>
                <input class="form-control" type="text" name="hasta_Tc" maxlength="11" pattern="[0-9]{11}" required>

                <label class="form-label mt-4 ms-1">Şifre</label>
                <input class="form-control "type="password" name="hasta_sifre" required>

                <button class="btn btn-danger mt-4" type="submit" name="kullaniciKaydet"> Kayıt Ol </button>
              </form>
            </div>
          </div>
        </div>
        ';
      }

      else {
        echo '
        <div class="container-fluid">
          <div class="row justify-content-center" style="height: 100vh;">

            <div class="col-12 d-flex justify-content-center align-items-center">
              <img src="images/logo.png" width="40%">
            </div>


            <div class="col-2">
              <div class="giris-kart">
                <div class="w-100 h-75 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-user text-white"></i>
                </div>
                <span class="h2 d-block text-center text-white">Hasta Girişi</span>
                <a href="giris.php?giris=hasta" class="stretched-link"></a>
              </div>
            </div>

            <div class="col-2">
              <div class="giris-kart">
                <div class="w-100 h-75 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-user-doctor text-white"></i>
                </div>
                <span class="h2 d-block text-center text-white">Doktor Girişi</span>
                <a href="giris.php?giris=doktor" class="stretched-link"></a>
              </div>
            </div>

            <div class="col-2">
              <div class="giris-kart">
                <div class="w-100 h-75 d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-circle-plus text-white" style="font-size: 4vw;"></i>
                </div>
                <span class="h2 d-block text-center text-white">Hasta Kayıt</span>
                <a href="giris.php?giris=kayıt" class="stretched-link"></a>
              <div>
            </div>

          </div>
        </div>
        ';
      }
    ?>














    <script src="https://kit.fontawesome.com/a3f76828ca.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
