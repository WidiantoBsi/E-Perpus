<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Perpus</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="<?php echo base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="<?php echo base_url()?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <link href="<?php echo base_url()?>assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <!-- TABLE STYLES-->
  <link href="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('Welcome')?>">E-Perpus</a> 
            </div>
            <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;">
            <?php echo 'Pinjaman '.$this->M_DB->edit_data(array('Id_Anggota'=>$this->session->userdata('Id')),'peminjaman')->num_rows() .' Buku'; ?> &nbsp; 
            <a href="<?php echo base_url('login/').'LogOut'?>" class="btn btn-danger square-btn-adjust">Logout</a> 
        </div>
    </nav>   
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <!-- <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                </li> -->

                <li>
                    <a class="<?php if($this->uri->segment(1)=="AdmAnggota" || $this->uri->segment(1)==""){echo "active-menu";}?>"  href="<?php echo base_url('AdmAnggota')?>"><i class="fa fa-book fa-3x"></i> Katalog Buku</a>
                </li>
                <li>
                    <a class="<?php if($this->uri->segment(1)=="BookCard" || $this->uri->segment(1)==""){echo "active-menu";}?>" href="<?php echo base_url('BookCard')?>"><i class="fa fa-shopping-cart fa-3x"></i> 
                    <?php echo $this->M_DB->edit_data(array('Id_Anggota'=>$this->session->userdata('Id')),'transaksi')->num_rows() ?> Book Cart</a>
                </li>
                <li  >
                    <a class="<?php if($this->uri->segment(1)=="Peminjaman" || $this->uri->segment(1)==""){echo "active-menu";}?>" href="<?php echo base_url('Peminjaman')?>"><i class="fa fa-bar-chart-o fa-3x"></i> Pinjaman</a>
                </li>	
            </ul>

        </div>

    </nav> 