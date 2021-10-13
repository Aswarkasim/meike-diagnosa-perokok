<div class="box">
    <div class="container-fluid">
        <div class="box-header">
            <h3 class="box-title"><strong>Tambah Gejala</strong></h3><br><br>
        </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        
        <form action="<?= base_url($add) ?>" method="post">
        <div class="row">
            <div class="col-md-6">
            <?php
            echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ','</div>');
            if($this->session->flashdata('msg')){
                echo '<div class="alert alert-warning"><i class="fa fa-check"></i>';
                echo $this->session->flashdata('msg');
                echo '</div>';
              }
        ?>
                <div class="row pt10">
                    <div class="col-md-3"><strong>GEJALA <small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <select name="kode_gejala" class="form-control">
                                <option value=""></option>
                                <?php foreach($gejala as $row){ ?>
                                <option value="<?= $row->kode_gejala ?>"><?= $row->kode_gejala ?> - <?= $row->nama_gejala ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"><strong>PERTANYAAN <small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="pertanyaan">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"><strong>JAWABAN YA <small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="is_yes">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"><strong>JAWABAN TIDAK <small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="is_no">
                    </div>
                </div><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <script type="text/javascript">
                    $(function () {
                        $("#jenis").change(function () {
                            
                            if ($(this).val() == "penyakit") {
                                $("#gejala").hide();
                                $("#penyakit").show();
                            }else if($(this).val() == "gejala"){
                                $("#gejala").show();
                                $("#penyakit").hide();
                            }else{
                                $("#gejala").hide();
                                $("#penyakit").hide();
                            }
                        });
                    });

                    $(function () {
                        $("#jenis_no").change(function () {
                            
                            if ($(this).val() == "penyakit_no") {
                                $("#gejala_no").hide();
                                $("#penyakit_no").show();
                            }else if($(this).val() == "gejala_no"){
                                $("#gejala_no").show();
                                $("#penyakit_no").hide();
                            }else{
                                $("#gejala_no").hide();
                                $("#penyakit_no").hide();
                            }
                        });
                    });

                </script>



                <div class="row">
                    <div class="col-md-3"><strong>YA<small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="gejala">Gejala</option>
                            <option value="penyakit">Penyakit</option>
                        </select><br>
                        
                        <div id="gejala"hidden>
                            <select name="to_yes_gejala" id="gejala" class="form-control" >
                                <option value="">--Pilih Gejala--</option>
                                <?php foreach($gejala as $row){ ?>
                                <option value="<?= $row->kode_gejala ?>"><?= $row->kode_gejala ?> - <?= $row->nama_gejala ?></option>
                                <?php  } ?>
                            </select><br>
                        </div>
                        <div id="penyakit"hidden>
                            <select name="to_yes_penyakit" id="penyakit" class="form-control">
                                <option value="">-- Pilih Penyakit --</option>
                                <?php foreach($penyakit as $row){ ?>
                                <option value="<?= $row->kode_penyakit ?>"><?= $row->kode_penyakit ?> - <?= $row->nama_penyakit ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"><strong>TIDAK<small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <select name="jenis_no" id="jenis_no" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="gejala_no">Gejala</option>
                            <option value="penyakit_no">Penyakit</option>
                        </select><br>
                        
                        <div id="gejala_no"hidden>
                            <select name="to_no_gejala" id="gejala" class="form-control" >
                                <option value="">-- Pilih Gejala --</option>
                                <?php foreach($gejala as $row){ ?>
                                <option value="<?= $row->kode_gejala ?>"><?= $row->kode_gejala ?> - <?= $row->nama_gejala ?></option>
                                <?php  } ?>
                            </select><br>
                        </div>
                        <div id="penyakit_no"hidden>
                            <select name="to_no_penyakit" id="penyakit" class="form-control">
                                <option value="">-- Pilih Penyakit --</option>
                                <option value="Tidak ada">Tidak terindikasi malaria</option>
                                <?php foreach($penyakit as $row){ ?>
                                <option value="<?= $row->kode_penyakit ?>"><?= $row->kode_penyakit ?> - <?= $row->nama_penyakit ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                </div><br>



                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-upload"></i> Tambah</button>
                    </div>
                </div><br>
            </div>
            </form>
            <div class="col-md-6">
                <p>
                1. Isikan semua field <br>
                2. Tanda * wajib untuk  di isi
                </p>
            </div>
        </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>