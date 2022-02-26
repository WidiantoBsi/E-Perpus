<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Buku
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form action="<?php echo base_url('Welcome/').'AddBuku'; ?>" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" name="Judul" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select name="Kategori" class="form-control">
                                            <?php foreach ($DbKategori as $rw){ ?>
                                                <option value="<?php echo $rw->Id_Kategori ;?>"><?php echo $rw->Kategori ;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pengarang</label>
                                        <input type="text" name="Pengarang" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Terbit</label>
                                        <select name="Th_Terbit" class="form-control">
                                            <?php
                                            for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                                ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input type="text" name="Penerbit" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input type="text" name="ISBN" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input min="0" max="10" type="number" name="Jumlah" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>

                                    <div class="form-group">
                                        <label>Lokasi</label>
                                        <input type="text" name="Lokasi" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" name="Gbr" class="form-control" placeholder="PLease Enter Keyword" required/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <?= validation_errors('<p style="color:red;">','</p>'); ?>
                        <?php
                        if($this->session->flashdata('alert')){
                          echo "<div class='alert alert-danger alert-dismissable'>";
                          echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                          echo $this->session->flashdata('alert');
                          echo "</div>";
                      }elseif ($this->session->flashdata('sucess')) {
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
                   Tabel Buku
               </div>
               <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>ISBN</th>
                                <th>Tahun Terbit</th>
                                <th>Kategori</th>
                                <th>Jumlah</th>
                                <th>Lokasi</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($DbBuku as $row){ 
                                $id = $row->Id_Kategori;
                                $Id_Buku = $row->Id_Buku;
                                $where = array('Id_Kategori' => $id);
                                $DB = $this->M_DB->edit_data($where,'kategori')->result();
                                foreach ($DB as $b) {
                                    $Kategori = $b->Kategori;
                                }
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $row->JudulBuku ;?></td>
                                    <td><?php echo $row->Pengarang ;?></td>
                                    <td><?php echo $row->penerbit ;?></td>
                                    <td><?php echo $row->Isbn ;?></td>
                                    <td><?php echo $row->Thn_Terbit ;?></td>
                                    <td><?php echo $Kategori ;?></td>
                                    <td><?php echo $row->Jumlah ;?></td>
                                    <td><?php echo $row->Lokasi ;?></td>
                                    <td>
                                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#EditBuku<?php echo $Id_Buku;?>" title="Edit"><i class="fa fa-edit "></i></button>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delet<?php echo $Id_Buku;?>" title="Hapus"><i class="fa fa-trash-o"></i></button></td>   
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

<!-- ============== Modal Edit Buku ====================== -->
<?php 
foreach($DbBuku as $bb){
    $IdData = $bb->Id_Buku;
    $id = $bb->Id_Kategori;
    $Judul = $bb->JudulBuku ;
    $Pengarang = $bb->Pengarang ;
    $Penerbit = $bb->penerbit ;
    $Isbn = $bb->Isbn ;
    $Th_Terbit = $bb->Thn_Terbit ;
    $Jumlah = $bb->Jumlah ;
    $Lokasi = $bb->Lokasi ;
    $Photo = $bb->Gambar ;

    $where = array('Id_Kategori' => $id);
    $DB = $this->M_DB->edit_data($where,'kategori')->result();
    foreach ($DB as $db) {
        $Kategori = $db->Kategori;
    }
    ?>
    <div class="modal fade" id="EditBuku<?php echo $IdData;?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <form action="<?php echo base_url('Welcome/').'EditBuku'; ?>" method="post" enctype="multipart/form-data">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" id="myModalLabel">Edit Buku</h3>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Judul Buku</label>
                    <input type="hidden" name="ID" value="<?php echo $IdData?>">
                    <input type="text" name="Judul" class="form-control" value="<?php echo $Judul ?>" />
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="Kategori" class="form-control">
                        <?php foreach ($DbKategori as $r){ ?>
                            <option value="<?php echo $r->Id_Kategori ;?>"><?php echo $r->Kategori ;?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pengarang</label>
                    <input type="text" name="Pengarang" class="form-control" value="<?php echo $Pengarang ?>" />
                </div>
                <div class="form-group">
                    <label>Tahun Terbit</label>
                    <select name="Th_Terbit" class="form-control">
                        <?php
                        for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                            ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Penerbit</label>
                    <input type="text" name="Penerbit" class="form-control" value="<?php echo $Penerbit ?>" />
                </div>

                <div class="form-group">
                    <label>ISBN</label>
                    <input type="text" name="ISBN" class="form-control" value="<?php echo $Isbn ?>" />
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input min="0" max="10" type="number" name="Jumlah" class="form-control" value="<?php echo $Jumlah ?>" />
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="Lokasi" class="form-control" value="<?php echo $Lokasi ?>" />
                </div>

                <div class="form-group">
                  <label for="exampleFormControlInput1">Photo</label>
                  <div class="">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="<?php echo base_url().'assets/upload/'.$Photo ; ?>">
                        <input type="hidden" name="Photo" value="<?php echo $Photo ?>">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Edit image</span><span class="fileupload-exists">Change</span>
                        <input type="file" name="foto"></span>
                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                </div>
            </div> 
        </div>

    </div>
    <div class="modal-footer">
        <input type="submit" value="Edit"  class="btn btn-sm btn-primary"/>
    </div>
</div>
</div>
</form>
</div>

<!-- =========================== Delet Buku ============================== -->
<div class="modal fade" id="delet<?php echo $IdData; ?>">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
        </div>
        <form action="<?php echo base_url('Welcome').'/HapusBuku'; ?>" method="post">
           <div class="modal-body">
              <input type="hidden" name="ID" value="<?php echo $IdData?>">
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