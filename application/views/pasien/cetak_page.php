  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style type="text/css">
    /* body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        } */

    @page {
      size: landscape;
      margin-left: 50px;
      margin-right: 50px;
      margin-top: 50px;
      margin-bottom: 50px;
    }
  </style>

  <table class="table table table-bordered table-striped DataTable">
    <thead>
      <tr>
        <th width="30px">NO</th>
        <th width="">NAMA PASIEN</th>
        <th width="">JENIS KELAMIN</th>
        <th width="">UMUR</th>
        <th width="">AKUMULASI CF</th>
        <th width="">DIAGNOSA</th>
        <th width="">TINGKAT</th>
        <th width="">TANGGAL KONSULTASI</th>
      </tr>
    </thead>
    <tbody>

      <?php $no = 1;
      foreach ($pasien as $row) { ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row->nama_pasien . '<br>' . $row->date_created ?></td>
          <td><?= $row->jenis_kelamin ?></td>
          <td><?= $row->umur ?></td>
          <td><?= $row->akumulasi_cf ?></td>
          <td><?= $row->nama_penyakit ?></td>
          <td><?= $row->tingkat ?></td>
          <td><?= $row->date_created ?></td>

        </tr>
      <?php $no++;
      } ?>
    </tbody>
  </table>

  <script>
    window.print()
  </script>