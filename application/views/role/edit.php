<form action="<?= base_url('role/edit/' . $row->id_role); ?>" method="POST">
    <div class="modal fade" id="modal-defaultEdit<?= $row->id_role; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Role</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Gejala</label>

                        <input type="hidden" name="kode_penyakit" value="<?= $kode_penyakit; ?>">
                        <select name="kode_gejala" required class="form-control" id="">
                            <option value="">-- Kode Gejala --</option>
                            <?php foreach ($gejala as $g) { ?>
                                <option <?= $row->kode_gejala == $g->kode_gejala ? 'selected' : ''; ?> value="<?= $g->kode_gejala; ?>"><?= $g->kode_gejala . ' - ' . $g->nama_gejala; ?></option>
                            <?php } ?>
                        </select>
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