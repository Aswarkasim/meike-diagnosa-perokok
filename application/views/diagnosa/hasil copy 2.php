<!-- /.box-header -->
<div class="row">
    <div class="col-md-12">

        <div class="box">
            <div class="box-header">
                <h2 class="box-title"><strong>Kesimpulan Gejala</strong></h2>
                <hr>
            </div>

            <div class="box-body">

                <a href="<?= base_url('diagnosa'); ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Diagnosa Baru</a>
                <a href="" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a><br><br>

                <?php include('kesimpulan.php') ?>
            </div>

        </div>
    </div>

</div>
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
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($dataDiagnosa as $row) {
                            if ($row->nilai_cf != 0) { ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row->kode_gejala ?></td>
                                    <td><?= $row->nama_gejala ?></td>
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
                <h2 class="box-title"><strong>Kemungkinan Penyakit</strong></h2>
                <hr>
            </div>


            <div class="box-body">


                <table class="table table table-bordered table-striped dataTables">
                    <thead>
                        <tr>
                            <th width="10px">NO</th>
                            <th>KODE</th>
                            <th>NAMA</th>
                            <th>CF</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;

                        $this->load->model('Data_model', 'DM');
                        $cf_max = 0;
                        foreach ($diagnosa as $key => $d) {
                            // echo $d->kode_penyakit . '<br>';

                            $role = $this->Crud_model->listing('tbl_role');

                            foreach ($role as $r) {
                                $cek = $this->DM->dataDiagnosaByPasien($pasien->id_pasien, $r->kode_gejala);

                                if (empty($cek)) {
                                    if ($r->kode_gejala != $d->kode_gejala) {
                                        $data = [
                                            'id_pasien'     => $pasien->id_pasien,
                                            'kode_gejala'   => $r->kode_gejala,
                                            'nilai_cf'      => 0,
                                            'cf_hasil'      => 0
                                        ];
                                        $this->Crud_model->add('tbl_diagnosa', $data);
                                    }
                                    // die('gawat gan');
                                } else {
                                    // printr_pretty($cek);
                                    // die('Lolos gan');
                                }
                            }

                            $penyakit = $this->DM->listDiagnosaRoleByPenyakit($pasien->id_pasien, $d->kode_penyakit);

                            $cf = $this->CF->hitung_cf($penyakit);
                            // printr_pretty($cf); 
                            // foreach ($cf as $c) {
                            if ($cf_max <= $cf) {
                                $cf_max == $cf;
                            }
                            if ($cf != 0) {
                                $p_tampil = $this->Crud_model->listingOne('tbl_penyakit', 'kode_penyakit', $d->kode_penyakit);


                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d->kode_penyakit; ?></td>
                                    <td><?= $p_tampil->nama_penyakit; ?></td>
                                    <td><?= $cf; ?></td>
                                </tr>


                        <?php

                            }
                        }

                        $data = [
                            'akumulasi_cf' => $cf_max
                        ];
                        $this->Crud_model->edit('tbl_pasien', 'id_pasien', $id_pasien, $data);
                        ?>

                    </tbody>
                </table>
            </div>

        </div>



        <!-- /.box-body -->
    </div>