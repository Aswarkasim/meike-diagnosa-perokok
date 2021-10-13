<!-- /.box-header -->

<div class="row">

    <div class="col-md-6">

        <div class="box">
            <div class="box-header">
                <h2 class="box-title"><strong>Kesimpulan Gejala</strong></h2>
                <hr>
            </div>

            <div class="box-body">

                <a href="" class="btn btn-primary"><i class="fa fa-refresh"></i> Diagnosa Baru</a>
                <a href="" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a><br><br>

                <?php include('kesimpulan.php') ?>
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
                        foreach ($dataDiagnosa as $row) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->kode_gejala ?></td>
                                <td><?= $row->nama_gejala ?></td>
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