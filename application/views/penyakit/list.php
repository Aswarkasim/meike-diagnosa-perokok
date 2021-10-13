<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">



    <div class="container-fluid">
      <p>
        <a href="<?= base_url($add) ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
      </p>



      <table class="table table table-bordered table-striped dataTables">
        <thead>
          <tr>
            <th width="30px">NO</th>
            <th>KODE</th>
            <th width="200">NAMA</th>
            <th>DESKRIPSI</th>
            <th>PENYEBAB</th>
            <th>AKIBAT</th>
            <th>PENANGANAN</th>
            <th>LINK VIDEO</th>
            <th width="100px"></th>
          </tr>
        </thead>
        <tbody>

          <?php $no = 1;
          foreach ($penyakit as $row) { ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $row->kode_penyakit ?></td>
              <td><a href="<?= base_url('penyakit/detail/' . $row->kode_penyakit); ?>"><strong><?= $row->nama_penyakit ?></strong></a></td>
              <td><?= character_limiter($row->deskripsi, 100) ?></td>
              <td><?= character_limiter($row->penyebab, 100) ?></td>
              <td><?= character_limiter($row->akibat, 100) ?></td>
              <td><?= character_limiter($row->penanganan, 100) ?></td>
              <td><a href="<?= $row->link_video ?>" target="blank">Lihat Video</a></td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-cogs"></i></button>
                  <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="<?= base_url($role . $row->kode_penyakit) ?>"><i class="fa fa-exchange"></i> Atur Role</a></li>
                    <li><a href="<?= base_url($edit . $row->kode_penyakit) ?>"><i class="fa fa-edit"></i> Edit</a></li>
                    <li><a href="<?= base_url($delete . $row->kode_penyakit) ?>"><i class="fa fa-trash"></i>Hapus</a></li>
                  </ul>
                </div>
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