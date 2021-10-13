<div class="row">
  <div class="col-md-8">


    <div class="box">
      <div class="box-header">
        <h3 class="box-title"></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">

        <div class="container-fluid">
          <p>
            <?php include('add.php') ?>

          </p>

          <!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div> -->



          <table class="table table table-bordered table-striped dataTables">
            <thead>
              <tr>
                <th width="100px">NO</th>
                <th>KODE GEJALA</th>
                <th>NAMA GEJALA</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <?php $no = 1;
              foreach ($role as $row) { ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $row->kode_gejala ?></td>
                  <td><?= $row->nama_gejala ?></td>
                  <td>
                    <a href="<?= base_url($delete . $row->kode_penyakit . '/' . $row->id_role) ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i>Hapus</a>
                    <button type="button" class="btn btn-warning btn-sx" data-toggle="modal" data-target="#modal-defaultEdit<?= $row->id_role; ?>">
                      <i class="fa fa-edit"></i>Edit
                    </button>
                    <?php include('edit.php') ?>

                  </td>
                </tr>
              <?php $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
    </div>

  </div>
</div>