<button type="button" class="btn btn-warning btn-sx" data-toggle="modal" data-target="#modal-default">
    <i class="fa fa-plus"></i>Tambah
</button>
<form action="<?= base_url('role/add'); ?>" method="POST">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Role</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="pull-right">Nama Gejala</label>
                            </div>
                            <div class="col-md-9">
                                <input type="hidden" name="kode_penyakit" value="<?= $kode_penyakit; ?>">
                                <select name="kode_gejala" required class="form-control" id="">
                                    <option value="">-- Kode Gejala --</option>
                                    <?php foreach ($gejala as $row) { ?>
                                        <option value="<?= $row->kode_gejala; ?>"><?= $row->kode_gejala . ' - ' . $row->nama_gejala; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</form>