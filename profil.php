<?php include 'header.php'; ?>

  <body>
    <div class="container">
      <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="formdiv col-4 bg-white p-5">

          <a href="<?php if(@$_GET['kullanici'] == "doktor") echo 'anamenu.php?kullanici=doktor'; else echo 'anamenu.php'; ?>"> <img class="d-flex m-auto mb-3" src="images/logo.png" width="100%"> </a>

          <?php
          if(@$_GET['kullanici'] == "doktor"){
            echo '
            <form action="islem.php" method="post">

              <h2 class="h3 fw-bold pt-3 d-flex">TEMEL BİLGİLER <i style="cursor: pointer;" onclick="edit()" class="fa-solid fa-pen h5 ms-auto my-auto"></i></h2>

              <label class="form-label mt-3 ms-1 text-muted lh-1">AD SOYAD</label>
              <p id="p_adsoyad" class="ps-1 fw-bold fs-4 lh-1">'.$_SESSION['patienthasta_Tc'].'&nbsp;&nbsp;</p>
              <input id="adsoyad" style="display:none;" class="form-control" type="text" name="edit_ad"">

              <div class="row">

                <div class="col-4">
                  <label class="form-label mt-3 ms-1 text-muted lh-1">YAŞ</label>
                  <p id="p_date" class="ps-1 fw-bold fs-4 lh-1">'.$doktorveri['doktor_yas'].'&nbsp;&nbsp;</p>
                  <input id="date" style="display:none;" class="form-control" type="number" step="1" min="0" max="150" name="edit_yas">
                </div>

                <div class="col-4">
                  <label class="form-label mt-3 ms-1 text-muted lh-1">BOY</label>
                  <p id="p_boy" class="ps-1 fw-bold fs-4 lh-1">'.$doktorveri['doktor_boy'].'&nbsp;&nbsp;</p>
                  <input id="boy" style="display:none;" class="form-control" type="number" step="1" min="0" max="300" name="edit_boy">
                </div>

                <div class="col-4">
                  <label class="form-label mt-3 ms-1 text-muted lh-1">KİLO</label>
                  <p id="p_kilo" class="ps-1 fw-bold fs-4 lh-1">'.$doktorveri['doktor_kilo'].'&nbsp;&nbsp;</p>
                  <input id="kilo" style="display:none;" class="form-control" type="number" step="0.5" min="0" max="300" name="edit_kilo">
                </div>

              </div>

              <input type="hidden" name="edit_id" value="'.$doktorveri['doktor_id'].'">
              <button id="edit-button" style="display:none;" class="btn btn-danger mt-4" type="submit" name="edit_doktor"> Kaydet </button>
              <a id="cancel-button" style="display:none;" class="btn mt-4 fw-bold" href="profil.php?kullanici=doktor" role="button">İptal</a>

            </form>
            ';
          }
          else {
            echo '
            <form action="islem.php" method="post">

              <h2 class="h3 fw-bold pt-3 d-flex">TEMEL BİLGİLER <i style="cursor: pointer;" onclick="edit()" class="fa-solid fa-pen h5 ms-auto my-auto"></i></h2>

              <div class="row">
                <div class="col-6">
                  <label class="form-label mt-3 ms-1 text-muted lh-1">AD</label>
                  <p id="p_ad" class="ps-1 fw-bold fs-4 lh-1">'.$hastacek['hasta_ad'].' &nbsp;&nbsp;</p>
                  <input id="ad" style="display:none;" class="form-control" type="text" name="edit_ad">
                </div>

                <div class="col-6">
                  <label class="form-label mt-3 ms-1 text-muted lh-1">SOYAD</label>
                  <p id="p_soyad" class="ps-1 fw-bold fs-4 lh-1">'.$hastacek['hasta_soyad'].' &nbsp;&nbsp;</p>
                  <input id="soyad" style="display:none;" class="form-control" type="text" name="edit_soyad">
                </div>
              </div>


              <label class="form-label mt-3 ms-1 text-muted lh-1">ŞİFRE</label>
              <p id="p_sifre" class="ps-1 fw-bold fs-4 lh-1"> ********** &nbsp;&nbsp;</p>
              <input id="sifre" style="display:none;" class="form-control" type="password" name="edit_sifre">

              <div class="row">

                <div class="col-4">
                  <label class="form-label mt-3 ms-1 text-muted lh-1">YAŞ</label>
                  <p id="p_date" class="ps-1 fw-bold fs-4 lh-1">'.$hastacek['hasta_yas'].'&nbsp;&nbsp;</p>
                  <input id="date" style="display:none;" class="form-control" type="number" step="1" min="0" max="150" name="edit_yas">
                </div>

                <div class="col-4">
                  <label class="form-label mt-3 ms-1 text-muted lh-1">BOY</label>
                  <p id="p_boy" class="ps-1 fw-bold fs-4 lh-1">'.$hastacek['hasta_boy'].'&nbsp;&nbsp;</p>
                  <input id="boy" style="display:none;" class="form-control" type="number" step="1" min="0" max="300" name="edit_boy">
                </div>

                <div class="col-4">
                  <label class="form-label mt-3 ms-1 text-muted lh-1">KİLO</label>
                  <p id="p_kilo" class="ps-1 fw-bold fs-4 lh-1">'.$hastacek['hasta_kilo'].'&nbsp;&nbsp;</p>
                  <input id="kilo" style="display:none;" class="form-control" type="number" step="0.5" min="0" max="300" name="edit_kilo">
                </div>

              </div>

              <input type="hidden" name="edit_id" value="'.$hastacek['hasta_id'].'">
              <button id="edit-button" style="display:none;" class="btn btn-danger mt-4" type="submit" name="edit_hasta"> Kaydet </button>
              <a id="cancel-button" style="display:none;" class="btn mt-4 fw-bold" href="profil.php" role="button">İptal</a>

            </form>
            ';
          }
          ?>

        </div>
      </div>
    </div>

    <!-- kaleme tıkladığımızda bilgileri değiştirebilmek için yazdığımız script kodu -->
    <script>
      function edit(){
        var adsoyad = document.getElementById("adsoyad");
        var ad = document.getElementById("ad");
        var soyad = document.getElementById("soyad");
        var sifre = document.getElementById("sifre");
        var date = document.getElementById("date");
        var boy = document.getElementById("boy");
        var kilo = document.getElementById("kilo");

        date.style.display = "block";
        boy.style.display = "block";
        kilo.style.display = "block";

        if(adsoyad){
          adsoyad.style.display = "block";
        }

        if(ad){
          ad.style.display = "block";
        }

        if(soyad){
          soyad.style.display = "block";
        }

        if(sifre){
          sifre.style.display = "block";
        }

        var p_adsoyad = document.getElementById("p_adsoyad");
        var p_ad = document.getElementById("p_ad");
        var p_soyad = document.getElementById("p_soyad");
        var p_sifre = document.getElementById("p_sifre");
        var p_date = document.getElementById("p_date");
        var p_boy = document.getElementById("p_boy");
        var p_kilo = document.getElementById("p_kilo");


        p_date.style.display = "none";
        p_boy.style.display = "none";
        p_kilo.style.display = "none";

        if (p_adsoyad){
          p_adsoyad.style.display = "none";
        }

        if (p_ad){
          p_ad.style.display = "none";
        }

        if (p_soyad){
          p_soyad.style.display = "none";
        }

        if (p_sifre){
          p_sifre.style.display = "none";
        }

        var button = document.getElementById("edit-button");
        var button2 = document.getElementById("cancel-button");

        button.style.display = "inline-block";
        button2.style.display = "inline-block";
      }
    </script>
  </body>
  </html>
