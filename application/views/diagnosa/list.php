<!-- /.box-header -->

<div class="row">
    <div class="col-md-6">

        <div class="box">
            <div class="box-header">
                <h2 class="box-title"><strong>Daftar Gejala</strong></h2>
                <hr>
            </div>

            <div class="box-body">
                <table class="table table table-bordered table-striped dataTables">
                    <thead>
                        <tr>
                            <th width="10px">NO</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <th>PILIH</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php


                        $this->load->model('Data_model', 'DM');

                        $no = 1;
                        foreach ($gejala as $row) {
                            $pilih = $this->DM->cekGejala($id_pasien, $row->kode_gejala);

                            if ($pilih == null) {
                        ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_gejala ?></td>
                                    <td><?= $row->nama_gejala ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-flat"><i class="fa fa-cogs"></i></button>
                                            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?= base_url('diagnosa/pilih/' . $id_pasien . '/' . $row->kode_gejala . '/1'); ?>">Kemungkinan Besar</a></li>
                                                <li><a href="<?= base_url('diagnosa/pilih/' . $id_pasien . '/' . $row->kode_gejala . '/2'); ?>">Hampir Pasti</a></li>
                                                <li><a href="<?= base_url('diagnosa/pilih/' . $id_pasien . '/' . $row->kode_gejala . '/3'); ?>">Pasti</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                        <?php $no++;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <div class="col-md-6">

        <div class="box">
            <div class="box-header">
                <h2 class="box-title"><strong>Daftar Gejala</strong></h2>
                <hr>
            </div>

            <div class="box-body">

                <a href="<?= base_url('diagnosa/proses/' . $id_pasien); ?>" class="btn btn-primary btn-lg"><i class="fa fa-refresh"></i> Diagnosa</a><br><br>

                <table class="table table table-bordered table-striped dataTables">
                    <thead>
                        <tr>
                            <th width="10px">NO</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <th>PILIH</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($pilihGejala as $row) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->kode_gejala ?></td>
                                <td><?= $row->nama_gejala ?></td>
                                <td>
                                    <a href="<?= base_url('diagnosa/salah/' . $id_pasien . '/' . $row->id_diagnosa); ?>" class="btn btn-danger">Salah <i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- /.box-body -->
</div>