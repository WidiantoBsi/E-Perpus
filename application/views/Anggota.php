<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Anggota
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form action="<?php echo base_url('Welcome/').'AddAnggota'; ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="hidden" name="id" value="<?php echo $id;?>">
                                        <input type="text" name="Nama" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="Gender" class="form-control">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No Hp</label>
                                        <input min="0" type="number" name="NoHp" class="form-control" placeholder="08561234567890" required/>
                                    </div> 
                                </div>

                                <div class="col-md-6">
                                   <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="Alamat" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="Email" class="form-control" placeholder="email@gmail.com" required/>
                                    </div> 

                                  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="Password" class="form-control" placeholder="PLease Enter Keyword" required/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <?= validation_errors('<p style="color:red;">','</p>'); ?>
                    <?php
                    if($this->session->flashdata('sucess')){
                       echo "<div class='alert alert-info alert-message'>";
                      echo $this->session->flashdata('sucess');
                      echo "</div>";
                  } ?>
              </div>
          </div>
          <!-- End Form Elements -->
      </div>
      <!-- Data Tabel Buku -->
  </div>
  <div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
            Tabel Anggota
         </div>
         <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Gender</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($Anggota as $row){ 
                            $id = $row->Id_Anggota;
                            $Jenis = $row->Gender;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $row->Nama ;?></td>
                                <?php if ($Jenis=='L') { ?>
                                <td>Laki-Laki</td>
                                <?php }elseif ($Jenis=='P') { ?> 
                                <td>Wanita</td>   
                                <?php } ?>    
                                <td><?php echo $row->NoHp ;?></td>
                                <td><?php echo $row->Alamat ;?></td>
                                <td><?php echo $row->Email ;?></td>
                                <td><?php echo $row->Password ;?></td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Edit<?php echo $id;?>" title="Edit"><i class="fa fa-edit "></i></button>
                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delet<?php echo $id;?>" title="Hapus"><i class="fa fa-trash-o"></i></button></td>   
                                </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /. PAGE INNER  -->
    </div>

</div>
</div>
</div>

<!-- ============== Modal Edit Anggota ====================== -->
<?php 
foreach($Anggota as $bb){
    $id = $bb->Id_Anggota;
    $Nama = $bb->Nama ;
    $NoHp = $bb->NoHp ;
    $Alamat = $bb->Alamat ;
    $Email = $bb->Email ;
    $Password = $bb->Password ;
    ?>
<div class="modal fade" id="Edit<?php echo $id;?>" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<form action="<?php echo base_url('Welcome/').'EditAnggota'; ?>" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title" id="myModalLabel">Edit Anggota</h3>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="text" name="Nama" class="form-control" value="<?php echo $Nama ?>" />
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="Gender" class="form-control">
                <option value="L">Laki-Laki</option>
                <option value="P">Wanita</option>
            </select>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="Alamat" class="form-control" value="<?php echo $Alamat ?>" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="Email" class="form-control" value="<?php echo $Email ?>" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="Password" class="form-control" value="<?php echo $Password ?>" />
        </div>

</div>
<div class="modal-footer">
    <input type="submit" value="Edit"  class="btn btn-sm btn-primary"/>
</div>
</div>
</div>
</form>
</div>

<!-- =========================== Delet Anggota ============================== -->
  <div class="modal fade" id="delet<?php echo $id; ?>">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
        </div>
        <form action="<?php echo base_url('Welcome').'/HapusAnggota'; ?>" method="post">
         <div class="modal-body">
          <input type="hidden" name="ID" value="<?php echo $id?>">
          Apakah Anda yakin ingin membuang data ini ke tempat sampah?
         </div>   
        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <button type="submit" class="btn-sm btn-danger">Delete</button>
          <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>