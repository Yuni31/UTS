<h3>Tambah Data User</h3>
<form method="POST" action="datadosen.php">
    <input type="hidden" name="act" value="store">
    <div class="form-floating mb-3">
        <input type="text" name="txNAMA" class="form-control" id="floatingInput" placeholder="Nama Lengkap">
        <label for="floatingInput">Nama Lengkap</label>
    </div>
    <div class="form-floating mb-3">
        <input type="int" name="txNIDN" class="form-control" id="floatingInput" placeholder="Alamat Email">
        <label for="floatingInput">NIDN</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="txNOTELPON" class="form-control" id="floatingInput" placeholder="User Name">
        <label for="floatingInput">No Telpon</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" name="txALAMAT" class="form-control" id="floatingInput" placeholder="Alamat">
        <label for="floatingInput">Alamat</label>
    </div>
    </div>
    <div class="form-floating mb-3">
        &nbsp;
    </div>
    <button type="submit" class="btn btn-primary"> Buat Data Dosen </button>
    <a href="datadosen.php" class="btn btn-secondary"> Batal </a>
</form>