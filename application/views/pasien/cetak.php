<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cetak <?= $data->nama_pasien ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <style type="text/css">
    /* body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        } */

    @page {
      size: portrait;
      margin-left: 100px;
      margin-right: 100px;
      margin-top: 50px;
      margin-bottom: 50px;
    }

    .pembungkus {
      position: relative;
    }

    #qrCode {
      position: absolute;
      top: 10px;
      left: 10px;
    }

    /* h2 {
            position: absolute;
            left: 410px;
            top: 320px;
        }

        p {
            position: absolute;
            left: 220px;
            top: 380px;
            width: 600px
        } */
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="text-center">
      <h3>HASIL DIAGNOSA</h3>
    </div>
    <table class="table">
      <tr>
        <td align="right" width="200px">Nama :</td>
        <td><?= $data->nama_pasien; ?></td>
      </tr>
      <tr>
        <td align="right" width="200px">Jenis Kelamin :</td>
        <td><?= $data->jenis_kelamin; ?></td>
      </tr>
      <tr>
        <td align="right" width="200px">Umur :</td>
        <td><?= $data->umur . ' Tahun'; ?></td>
      </tr>
      <tr>
        <td align="right" width="200px">Diagnosa :</td>
        <td><?= $data->nama_penyakit; ?></td>
      </tr>
      <tr>
        <td align="right" width="200px">Keakuratan :</td>
        <td><?= $data->akumulasi_cf . ' %'; ?></td>
      </tr>
      <tr>
        <td align="right" width="200px">Deskripsi :</td>
        <td><?= $data->deskripsi; ?></td>
      </tr>

      <tr>
        <td align="right" width="200px">Penanganan :</td>
        <td><?= $data->penanganan; ?></td>
      </tr>


    </table>

    <h5>Kemungkinan Penyakit</h5>
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

        $this->load->model('CF_model', 'CF');
        $this->load->model('Data_model', 'DM');
        $cf_max = 0;
        foreach ($dataDiagnosa as $key => $d) {


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

        // $data = [
        //     'akumulasi_cf' => $cf_max
        // ];
        // $this->Crud_model->edit('tbl_pasien', 'id_pasien', $id_pasien, $data);
        ?>

      </tbody>
    </table>

  </div>



  <script>
    window.print()
  </script>
</body>

</html>