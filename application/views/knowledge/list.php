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
          <th width="15px">NO</th>
          <th width="30px">GEJALA</th>
          <th>PERTANYAAN</th>
          <th>JAWAB YA</th>
          <th>JAWAB TIDAK</th>
          <th width="30px">YA</th>
          <th width="30px">TIDAK</th>
          <th width="50px"></th>
        </tr>
      </thead>
      <tbody>
      
      <?php $no = 1; foreach($knowledge as $row){ ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row->gejala ?></td>
          <td><?= $row->pertanyaan ?></td>
          <td><?= $row->is_yes ?></td>
          <td><?= $row->is_no ?></td>
          <td><?= $row->to_yes ?></td>
          <td><?= $row->to_no ?></td>
          <td>
          <div class="btn-group">
              <button type="button" class="btn btn-danger btn-flat"><i class="fa fa-cogs"></i></button>
              <button type="button" class="btn btn-danger btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url($edit.$row->id_know) ?>"><i class="fa fa-edit"></i> Edit</a></li>
                <li><a href="<?= base_url($delete.$row->id_know) ?>"><i class="fa fa-trash"></i>Hapus</a></li>
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