<?php include 'header.php'; ?>

  <body>
    <div class="d-flex justify-content-center justify-content-sm-start">
      <img src="images/logo.png" width="300px" class="m-5">
    </div>


    <div class="container" style="height: 60vh">
      <div class="row justify-content-center" style="height:12%;">
        <div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
          <span class="h2 text-white text-center menu-kart py-3" style="width: 95%;">Hoşgeldin, Sayın <?php if(@$_GET['kullanici'] == 'doktor') echo "Prof. Dr. ".$_SESSION['patienthasta_Tc']; else echo $hastacek['hasta_ad']." ".$hastacek['hasta_soyad'] ?> </span>
        </div>
      </div>

      <div class="row justify-content-center" style="height:44%;">
        <div class="col-11 col-md-4 d-flex justify-content-center align-items-center">
          <div class="h-75" style="width:90%;">
            <div class="menu-kart w-100 h-100 d-flex">
              <div class="h-100 d-flex align-items-center justify-content-center" style="width: 30%;">
                <i class="fa-solid fa-address-book text-white" style="font-size: 4rem;"></i>
              </div>
              <div class="h-100 d-flex align-items-center justify-content-center" style="width: 70%;">
                <span class="h2 text-white">Profil</span>
              </div>
              <a href="<?php if(@$_GET['kullanici'] == 'doktor') echo 'profil.php?kullanici=doktor'; else echo 'profil.php'; ?>" class="stretched-link"></a>
            </div>
          </div>
        </div>
        <div class="col-11 col-md-4 d-flex justify-content-center align-items-center">
          <div class="h-75" style="width:90%;">
            <div class="menu-kart w-100 h-100 d-flex">
              <div class="h-100 d-flex align-items-center justify-content-center" style="width: 30%;">
                <i class="fa-solid fa-calendar-days text-white" style="font-size: 4rem;"></i>
              </div>
              <div class="h-100 d-flex align-items-center justify-content-center" style="width: 70%;">
                <span class="h2 text-white">Randevularım</span>
              </div>
              <a href="<?php if(@$_GET['kullanici'] == 'doktor') echo 'liste.php?kullanici=doktor'; else echo 'liste.php?kullanici=hasta'; ?>" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center" style="height:44%;">
        <div class="col-11 col-md-4 d-flex justify-content-center align-items-center">
          <div class="menu-kart h-75" style="width:90%;">
            <div class="w-100 h-100 d-flex">
              <div class="h-100 d-flex align-items-center justify-content-center" style="width: 30%;">
                <i class="fa-solid <?php if(@$_GET['kullanici'] == 'doktor') echo 'fa-syringe'; else echo 'fa-clipboard-list'; ?> text-white" style="font-size: 4rem;"></i>
              </div>
              <div class="h-100 d-flex align-items-center justify-content-center" style="width: 70%;">
                <span class="h2 text-white"><?php if(@$_GET['kullanici'] == 'doktor') echo 'İlaç Yaz'; else echo 'Reçetelerim'; ?></span>
              </div>
              <a href="<?php if(@$_GET['kullanici'] == 'doktor') echo 'ilacyaz.php'; else echo 'liste.php'; ?>" class="stretched-link"></a>
            </div>
          </div>
        </div>
        <div class="col-11 col-md-4 d-flex justify-content-center align-items-center">
          <div class="menu-kart h-75" style="width:90%;">
            <div class="w-100 h-100 d-flex">
              <div class="h-100 d-flex align-items-center justify-content-center" style="width: 30%;">
                <i class="fa-solid fa-arrow-right-from-bracket text-white" style="font-size: 4rem;"></i>
              </div>
              <div class="h-100 d-flex align-items-center justify-content-center" style="width: 70%;">
                <span class="h2 text-white">Çıkış Yap</span>
              </div>
              <a href="logout.php" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div>
    </div>



  </body>
</html>
