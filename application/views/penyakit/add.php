<div class="box">
    <div class="container-fluid">
        <div class="box-header">
            <h3 class="box-title"><strong>Tambah Penyakit</strong></h3><br><br>
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
                    <div class="col-md-3"><strong>KODE PENYAKIT <small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="kode">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"><strong>NAMA PENYAKIT <small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="nama">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"><strong>DESKRIPSI <span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="deskripsi" id="editor1" cols="30" rows="10"></textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"><strong>AKIBAT <span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="akibat" id="editor2" cols="30" rows="10"></textarea>
                    </div>
                </div><br>
                
            </div>
            
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3"><strong>PENYEBAB <span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="penyebab" id="editor4" cols="30" rows="10"></textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3"><strong>PENANGANAN <span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="penanganan" id="editor3" cols="30" rows="10"></textarea>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-3"><strong>LINK VIDEO <small class="text-danger">*</small><span class="pull-right">:</span></strong></div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="link_video">
                    </div>
                </div><br>

            </div>

        </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= base_url($back) ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-upload"></i> Tambah</button>
                </div>
            </div><br>
        </form>
    </div>
  </div>
  <!-- /.box-body -->
</div>