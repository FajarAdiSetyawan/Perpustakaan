<div class="card">
  <div class="container">
    <form action="laporan/laporan_anggota.php" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-25">
          <label for="tglPinjam">Tanggal Pinjam</label>
        </div>
        <div class="col-75 form-tambah">
          <input id="tglPinjam" name="tanggal1" type="date" style="resize: none;">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="tglKembali">Tanggal Kembali</label>
        </div>
        <div class="col-75 form-tambah">
          <input id="tglKembali" name="tanggal2" type="date" style="resize: none;">
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-md btn-secondary">Cetak</button>
      <a href="./laporan/laporan_anggota.php" class="btn btn-outline-info" target="blank" style="margin-top: 8px; margin-left: 5px;"> Cetak Semua</a>
    </form>
  </div>
</div>