<!-- /.box-header -->

<div class="row">
    <div class="col-md-6">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div>

            <div class="box-body">


                <form action="<?= base_url('diagnosa/add'); ?>" method="POST">
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        <input type="text" class="form-control" required name="nama_pasien" placeholder="Nama Pasien">
                    </div>

                    <div class="form-group">
                        <label for="">Umur</label>
                        <input type="number" class="form-control" required name="umur" placeholder="Umur">
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Mulai Periksa <i class="fa fa-arrow-right"></i></button>

                </form>
            </div>

        </div>
    </div>

    <!-- /.box-body -->
</div>