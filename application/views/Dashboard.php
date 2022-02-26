<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
               <h2>Admin Dashboard</h2>   
               <h5>Welcome <?php echo $this->session->userdata('nama'); ?> , Love to see you back. </h5>
           </div>
       </div>              
       <!-- /. ROW  -->
       <hr />
       <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">           
         <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="fa fa-users"></i>
            </span>
            <div class="text-box" >
                <p class="main-text"><?php echo $this->M_DB->get_data('anggota')->num_rows() ;?> New</p>
                <p class="text-muted">Anggota</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">           
     <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-green set-icon">
            <i class="fa fa-book"></i>
        </span>
        <div class="text-box" >
            <p class="main-text"><?php echo $this->M_DB->get_data('buku')->num_rows() ;?> New</p>
            <p class="text-muted">Katalog Buku</p>
        </div>
    </div>
</div>
<div class="col-md-3 col-sm-6 col-xs-6">           
 <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-blue set-icon">
        <i class="fa fa-bar-chart-o"></i>
    </span>
    <div class="text-box" >
        <p class="main-text"><?php echo $this->M_DB->get_data('transaksi')->num_rows() ;?> Tasks</p>
        <p class="text-muted">Peminjaman</p>
    </div>
</div>
</div>

</div>
<!-- /. ROW  -->
<hr />
<!-- /. ROW  -->
<div class="row" >
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
             Data Buku
         </div>
         <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($hasil as $row){ 
                            $id = $row->Id_Kategori;
                            $where = array('Id_Kategori' => $id);
                            $DB = $this->M_DB->edit_data($where,'kategori')->result();
                            foreach ($DB as $b) {
                                $Kategori = $b->Kategori;
                            }
                            ?>
                            <tr class="odd gradeX">
                                <td><img src="<?php echo base_url().'/assets/upload/'.$row->Gambar; ?>" width="80" height="80" alt="gambar tidak ada"></td>
                                <td><?php echo $row->JudulBuku ;?></td>
                                <td><?php echo $row->Pengarang ;?></td>
                                <td><?php echo $row->penerbit ;?></td>
                                <td><?php echo $row->Thn_Terbit ;?></td>
                                <td><?php echo $Kategori ;?></td>
                                <td class="center"><?php echo $row->Jumlah ;?></td>
                                <td class="center"><?php echo $row->Lokasi ;?></td>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>