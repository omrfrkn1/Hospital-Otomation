<?php include 'header.php'; ?>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="formdiv col-4 bg-white p-5">
        <a href="anamenu.php?kullanici=doktor"> <img class="d-flex m-auto mb-3" src="images/logo.png" width="100%"> </a>
        <form action="islem.php" method="post">

          <h2 class="h3 fw-bold pt-3 d-flex"> İLAÇ YAZ </h2>

          <label class="form-label mt-4 ms-1">Hasta Seç</label>
          <select class="form-select" id="hastasec" name="hastasec" onchange="hasta_id_al()" required>
            <option value="">Seçiniz...</option>
            <?php
              $hastalar = $db->query("SELECT * FROM hasta",PDO::FETCH_ASSOC);

              foreach($hastalar as $hasta){
                $hasta_ad = $hasta["hasta_ad"];
                $hasta_soyad = $hasta["hasta_soyad"];
                $hasta_id = $hasta['hasta_id'];

                echo "<option id='$hasta_id' value='$hasta_ad $hasta_soyad'>$hasta_ad $hasta_soyad</option>";
              }
            ?>
          </select>

          <script>
            function hasta_id_al(){
              var hastasec = document.getElementById("hastasec");
              var id = hastasec[hastasec.selectedIndex].id;

              document.getElementById("hidden").value = id;
            }
          </script>

          <label class="form-label mt-4 ms-1">İlaç Seç</label>
          <select class="form-select" name="ilacsec" required>
            <option value="">Seçiniz...</option>
            <option value="Parol">Parol</option>
            <option value="Aferin">Aferin</option>
            <option value="Akineton">Akineton</option>
            <option value="Dopamin">Dopamin</option>
            <option value="Flomax">Flomax</option>
            <option value="Humulin">Humulin</option>
            <option value="Lamisil">Lamisil</option>
            <option value="Monoket">Moneket</option>
            <option value="Karvea">Karvea</option>
            <option value="Azarga">Azarga</option>
            <option value="Oneptus">Oneptus</option>
            <option value="Tegretol">Tegretol</option>
          </select>

          <label class="form-label mt-4 ms-1">Açıklama</label>
          <textarea class="form-control" name="aciklama" rows="3"></textarea>

          <input type="hidden" id="hidden" name="recete_hs_id" value="">
          <button class="btn btn-danger mt-4" type="submit" name="ilac_yaz"> İlaç Yaz </button>
        </form>
      </div>
    </div>
  </div>
</body>
