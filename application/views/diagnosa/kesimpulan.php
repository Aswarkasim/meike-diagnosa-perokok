<div class="form-group">
  <label for=""><strong>NAMA PASIEN</strong></label><br>
  <strong><?= $pasien->nama_pasien; ?></strong>
</div>
<hr>

<div class="form-group">
  <label for=""><strong>UMUR</strong></label><br>
  <strong><?= $pasien->umur . ' Tahun'; ?></strong>
</div>
<hr>

<div class="form-group">
  <label for=""><strong>DIAGNOSA PENYAKIT</strong></label><br>
  <strong class="text-danger"><?= $pasien->nama_penyakit; ?></strong>
</div>
<hr>
<div class="form-group">
  <label for=""><strong>PERSENTASE KEAKURATAN</strong></label><br>
  <span class="text-danger"><strong><?= $pasien->akumulasi_cf . '%'; ?></strong></span>
</div>
<hr>

<div class="form-group">
  <label for=""><strong>DESKRIPSI</strong></label><br>
  <span class=""><?= $penyakit->deskripsi ?></span>
</div>
<hr>

<div class="form-group">
  <label for=""><strong>PENANGANAN</strong></label><br>
  <span class=""><?= $penyakit->penanganan ?></span>
</div>
<hr>

<!-- <div class="form-group">
  <label for=""><strong>GAMBAR</strong></label><br>
  <span class="">
    <img src="<?= base_url($penyakit->gambar); ?>" width="300px" alt="">
  </span>
</div> -->
<hr>