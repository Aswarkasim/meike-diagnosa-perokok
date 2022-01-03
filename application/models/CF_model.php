<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CF_model extends CI_Model
{
  function getValuePenyakit($id_pasien)
  {
    $penyakit = $this->DM->groupPenyakit();

    $keputusan = [
      'P01'    => 0,
      'P02'    => 0,
      'P03'    => 0,
      'P04'    => 0,
      'P05'    => 0,
      'P06'    => 0,
      'P07'    => 0,
      'P08'    => 0,
      'P09'    => 0,
      'P10'   => 0,
    ];
    foreach ($penyakit as $row) {
      // echo $row->kode_penyakit . '<br>';
      $roles = $this->Crud_model->listingOneAll('tbl_role', 'kode_penyakit', $row->kode_penyakit);
      foreach ($roles as $role) {
        $diagnosa = $this->DM->dataDiagnosaByPasien($id_pasien, $role->kode_gejala);

        if (isset($diagnosa)) {
          if ($role->kode_gejala == $diagnosa->kode_gejala) {
            // echo $role->kode_penyakit . '<br>';
            switch ($role->kode_penyakit) {
              case 'P01':
                $keputusan['P01'] = $keputusan['P01'] + 1;
                break;

              case 'P02':
                $keputusan['P02'] = $keputusan['P02'] + 1;
                break;

              case 'P03':
                $keputusan['P03'] = $keputusan['P03'] + 1;
                break;

              case 'P04':
                $keputusan['P04'] = $keputusan['P04'] + 1;
                break;

              case 'P05':
                $keputusan['P05'] = $keputusan['P05'] + 1;
                break;

              case 'P06':
                $keputusan['P06'] = $keputusan['P06'] + 1;
                break;

              case 'P07':
                $keputusan['P07'] = $keputusan['P07'] + 1;
                break;

              case 'P08':
                $keputusan['P08'] = $keputusan['P08'] + 1;
                break;

              case 'P09':
                $keputusan['P09'] = $keputusan['P09'] + 1;
                break;

              case 'P10':
                $keputusan['P10'] = $keputusan['P10'] + 1;
                break;

              default:
                break;
            }
          }
        }
      }
    }

    $value = max($keputusan);
    $key = array_search($value, $keputusan);
    return $key;

    // return $keputusan;
  }


  function hitung_cf($data)
  {
    $cf_old = 0;

    // printr_pretty($cf_last['cf_hasil']);
    foreach ($data as $key => $value) {
      if ($key == 0) {
        $cf_old = $value->cf_hasil;
      } else {
        $cf_old = $cf_old + $value->cf_hasil * (1 - $cf_old);
      }
    }
    $persentase = $cf_old * 100;
    return $persentase;
  }


  // Formula Default
  function hitung_cf_backup($data)
  {

    $i = 0;
    $cf_1 = 0;
    $cf_2 = 0;
    $cf_old = 0;
    foreach ($data as $key => $value) {

      if ($key == 0) {
        $cf_1 = $value->cf_hasil;
      }
      if ($key == 1) {
        $cf_2 = $value->cf_hasil;
      }
    }
    $cf_old = $cf_1 + $cf_2 * (1 - $cf_1);
    //echo $cf_old . '</br>';

    foreach ($data as $key => $value) {
      $cf_old = $cf_old + $value->cf_hasil * (1 - $cf_old);
      //echo $cf_old . '</br>';
    }
    // echo $cf_old . '</br>';

    $persentase = $cf_old * 100;
    // echo $persentase;
    return $persentase;
  }
}


/* End of file ModelName.php */
