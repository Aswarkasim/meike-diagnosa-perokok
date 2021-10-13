<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class=""><a href="#"><i class="s"></i> <span>Dashboard</span></a></li>

      <li class="<?php if ($this->uri->segment(1) == "petunjuk") {
                    echo "active";
                  } ?>">
        <a href="<?php echo base_url('petunjuk') ?>"><i class="fa fa-book"></i>
          <span>Petunjuk</span></a>
      </li>

      <li class="<?php if ($this->uri->segment(1) == "diagnosa") {
                    echo "active";
                  } ?>">
        <a href="<?php echo base_url('diagnosa') ?>"><i class="fa fa-safari"></i>
          <span>Diagnosa</span></a>
      </li>


      <?php if ($this->session->userdata('id_admin') != "") { ?>
        <li class="<?php if ($this->uri->segment(1) == "penyakit") {
                      echo "active";
                    } ?>">
          <a href="<?php echo base_url('penyakit') ?>"><i class="fa fa-object-group"></i>
            <span>Penyakit</span></a>
        </li>

        <li class="<?php if ($this->uri->segment(1) == "gejala") {
                      echo "active";
                    } ?>">
          <a href="<?php echo base_url('gejala') ?>"><i class="fa fa-puzzle-piece"></i>
            <span>Gejala</span></a>
        </li>

        <!-- <li class="<?php if ($this->uri->segment(1) == "role") {
                          echo "active";
                        } ?>">
          <a href="<?php echo base_url('role') ?>"><i class="fa fa-exchange"></i>
            <span>Role</span></a>
        </li> -->

        <!-- <li class="<?php if ($this->uri->segment(1) == "knowledge") {
                          echo "active";
                        } ?>">
          <a href="<?php echo base_url('knowledge') ?>"><i class="fa fa-language"></i>
            <span>Knowledge</span></a>
        </li> -->

        <li class="<?php if ($this->uri->segment(1) == "admin") {
                      echo "active";
                    } ?>">
          <a href="<?php echo base_url('admin') ?>"><i class="fa fa-user"></i>
            <span>Admin</span></a>
        </li>
      <?php } ?>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <strong> <?= isset($title) ? $title : '' ?></strong>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
        | Your Page Content Here |
        -------------------------->