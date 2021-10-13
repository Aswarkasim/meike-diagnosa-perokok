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
          <th width="100px">NO</th>
          <th>NAMA ADMIN</th>
          <th>NAMA</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      
      <?php $no = 1; foreach($admin as $row){ ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row->nama_admin ?></td>
          <td><?= $row->username ?></td>
          <td>
          <div class="btn-group">
              <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-cogs"></i></button>
              <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url($edit.$row->id_admin) ?>"><i class="fa fa-edit"></i> Edit</a></li>
                <li><a href="<?= base_url($delete.$row->id_admin) ?>"><i class="fa fa-trash"></i>Hapus</a></li>
              </ul>
            </div>
          </td>
        </tr>
      <?php $no++; } ?>
      </tbody>
    </table>
    </div>
  </div>
  <!-- /.box-body -->
</div>