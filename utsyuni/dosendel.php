<?php
    $iddosen = $_GET["p1"];
    $sql = "SELECT tm.nama, tm.nidn, tm.notelpon, tm.alamat FROM tbdosen tm WHERE tm.iddosen='$iddosen';";
    $hasil = mysqli_query($cnn, $sql);
    if(mysqli_num_rows($hasil) > 0){
        $h = mysqli_fetch_assoc($hasil);
?>
<h3>Hapus Data Dosen <?=$h["nidn"]?></h3>
<form method="POST" action="datadosen.php">
    <input type="hidden" name="act" value="destroy">
    <input type="hidden" name="iddosen" value="<?=$iddosen?>">
    <div class="form-floating mb-3">
        <input type="text" name="txNAMA" class="form-control" id="floatingInput" placeholder="Nama Lengkap" disabled value="<?=$h["nama"]?>">
        <label for="floatingInput">Nama Lengkap</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="txNIDN" class="form-control" id="floatingInput" placeholder="NIDN" disabled value="<?=$h["nidn"]?>">
        <label for="floatingInput">NIDN</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="txNOTELPON" class="form-control" id="floatingInput" placeholder="No Telpon" disabled value="<?=$h["notelpon"]?>">
        <label for="floatingInput">No Telpon</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="txALAMAT" class="form-control" id="floatingInput" placeholder="Alamat" disabled value="<?=$h["alamat"]?>">
        <label for="floatingInput">Alamat</label>
    </div>
    <div class="form-floating mb-3">
        &nbsp;
    </div>
    <button type="submit" class="btn btn-danger"> Hapus Data Dosen</button>
    <a href="datadosen.php" class="btn btn-secondary"> Batal </a>
</form>
<?php
    } else {
        echo "<script>window.location.href='datadosen.php';</script>";
    }
?>
