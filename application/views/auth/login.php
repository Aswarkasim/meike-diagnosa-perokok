<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SISTEM </b>PAKAR</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?php
    echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i> ','</div>');
    if($this->session->flashdata('msg')){
        echo '<div class="alert alert-danger"><i class="fa fa-warning"></i>';
        echo $this->session->flashdata('msg');
        echo '</div>';
      }
  ?>
    <form action="<?= base_url('auth') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-8">
            <div class="pull-right">
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-sign-in"></i> Sign In</button>
            </div>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>