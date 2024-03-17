<?php include 'header.php'; ?>

<body>
  <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
      <div class="formdiv col-4 bg-white p-5">
        <a href="anamenu.php"> <img class="d-flex m-auto mb-3" src="images/logo.png" width="100%"> </a>
        <form action="islem.php" method="post">

          <h2 class="h3 fw-bold pt-3 d-flex"> RANDEVU AL </h2>

          <label class="form-label mt-2 ms-1">Tarih</label>
          <input class="form-control" type="date" name="tarih" required>

          <label class="form-label mt-4 ms-1">Klinik</label>
          <select class="form-select" name="klinik" id="select-klinik" onchange="kliniksecim()">
            <option selected>Seçiniz...</option>
            <?php

              $klinikler = $db->query("SELECT * FROM  klinikler",PDO::FETCH_ASSOC);

              foreach($klinikler as $klinik){
                $klinikid = $klinik["klinik_id"];
                $klinikad = $klinik["klinik_adi"];
                echo "<option id='$klinikid' value='$klinikad'>$klinikad</option>";
              }

            ?>
          </select>

          <label class="form-label mt-4 ms-1" id="doktor-label" style="display: none;">Doktor</label>
          <select class="form-select" name="doktor" id="select-doktor" style="display: none;">
            <option selected>Seçiniz...</option>
              <?php

                $doktorlar = $db->query("SELECT * FROM  doktorlar",PDO::FETCH_ASSOC);

                foreach($doktorlar as $doktor){
                  $doktorad = $doktor["doktor_adi"];
                  $doktor_klinik_id = $doktor["doktor_klinik_id"];
                  echo "<option id='$doktor_klinik_id' value='$doktorad'>$doktorad</option>";
                }

              ?>
          </select>

          <script>
            function kliniksecim(){
              var klinik_sec = document.getElementById("select-klinik");
              var id = klinik_sec[klinik_sec.selectedIndex].id;
              var doktor_sec = document.getElementById("select-doktor");
              var doktor_label = document.getElementById("doktor-label");
              doktor_sec.style.display = "inline-block";
              doktor_label.style.display = "inline-block";
              doktor_sec.selectedIndex = "0";

              document.querySelectorAll("#select-doktor option").forEach(opt => {
                if (opt.id != id) { //opt.id = Doktor id , id = Klinik İd
                  opt.style.display = "none";
                }
                else {
                  opt.style.display = "inline-block";
                }
              });
            }
          </script>

          <input type="hidden" name="hasta_id" value="<?php echo $hastacek['hasta_id']; ?>">
          <button class="btn btn-danger mt-4" type="submit" name="randevu_kaydet"> Randevu Kaydet </button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
