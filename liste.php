<?php include 'header.php'; ?>
<script>
  function confirmDel() {
    var agree=confirm("Bu randevuyu silmek istediğinize emin misiniz?");
    if (agree) {
      return true; }
    else {
      return false; }
  }
</script>
<body>
    <a href="<?php if(@$_GET['kullanici'] == "doktor") echo 'anamenu.php?kullanici=doktor'; else echo 'anamenu.php'; ?>"> <img src="images/logo.png" width="300px" class="m-5"> </a>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-8 mt-5">

          <h1 class="display-4 fw-bold ms-1 mb-4 lh-1 d-flex">
            <?php
            if(@$_GET['kullanici'] == "hasta"){
              echo '
              Randevular <a class="btn btn-dark h-75 ms-auto my-auto" href="randevual.php"> Randevu Al </a>
              ';
            }
            elseif(@$_GET['kullanici'] == "doktor"){
              echo 'Randevular';
            }
            else{
              echo 'Reçetelerim';
            }

            ?>
          </h1>


          <div class="table-responsive">
            <table class="table table-light table-striped table-hover">
              <thead>
                <tr class="m-5">
                  <?php
                    if(@$_GET['kullanici'] == "doktor"){
                      echo '
                      <th scope="col">Tarih</th>
                      <th scope="col"> Hasta Adı Soyadı </th>
                      ';
                    }
                    elseif(@$_GET['kullanici'] == "hasta") {
                      echo '
                      <th scope="col"> Tarih </th>
                      <th scope="col"> Klinik </th>
                      <th scope="col"> Doktor </th>
                      <th scope="col" class="text-center"> İptal </th>
                      ';
                    }
                    else {
                      echo '
                      <th scope="col"> İlaç </th>
                      <th scope="col"> Açıklama </th>
                      ';
                    }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                  if(@$_GET['kullanici'] == "doktor"){
                    $muayene_sor = $db->prepare("SELECT * FROM  muayene  INNER JOIN doktorlar ON muayene.muayene_doktor = doktorlar.doktor_adi  WHERE doktor_adi=:doktor_adi");
                    $muayene_sor->execute([
                        'doktor_adi' => $_SESSION['patienthasta_Tc']
                    ]);

                    while($muayene_cek = $muayene_sor->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      echo "<td>".$muayene_cek['muayene_tarih']."</td>";

                      $hasta_adi= $db->prepare("SELECT hasta_ad, hasta_soyad FROM hasta WHERE hasta_id=?");
                      $hasta_adi->execute([$muayene_cek['mua_hs_id']]);
                      $hasta_adi_yaz = $hasta_adi->fetch();

                      echo "<td>".$hasta_adi_yaz[0]." ".$hasta_adi_yaz[1]."</td>";
                      echo "</tr>";
                    }
                  }
                  elseif(@$_GET['kullanici'] == "hasta") {
                    $muayene_sor = $db->prepare("SELECT * FROM  muayene  INNER JOIN hasta ON muayene.mua_hs_id = hasta.hasta_id  WHERE hasta_Tc=:hasta_Tc");
                    $muayene_sor->execute([
                        'hasta_Tc' => $_SESSION['patienthasta_Tc']
                    ]);

                    while($muayene_cek = $muayene_sor->fetch(PDO::FETCH_ASSOC)) {
                      echo "
                      <tr>
                          <td>".$muayene_cek['muayene_tarih']."</td>
                          <td>".$muayene_cek['muayene_klinik']."</td>
                          <td>".$muayene_cek['muayene_doktor']."</td>
                          <td> <a href='islem.php?iptal=".$muayene_cek['muayene_id']."' onClick='return confirmDel();' class='text-decoration-none text-black d-flex justify-content-center'> <i class='fa-solid fa-trash-can'> </i> </a></td>
                      </tr>
                      ";
                    }
                  }
                  else {
                    $recete_sor = $db->prepare("SELECT * FROM  recete INNER JOIN hasta ON recete.recete_hs_id = hasta.hasta_id  WHERE hasta_Tc=:hasta_Tc");
                    $recete_sor->execute([
                        'hasta_Tc' => $_SESSION['patienthasta_Tc']
                    ]);

                    while($recete_cek = $recete_sor->fetch(PDO::FETCH_ASSOC)) {
                      echo "
                      <tr>
                          <td>".$recete_cek['recete_ilac']."</td>
                          <td>".$recete_cek['recete_aciklama']."</td>
                      </tr>
                      ";
                    }
                  }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>




  </body>
</html>
