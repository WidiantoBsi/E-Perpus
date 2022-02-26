<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Book Cart</h2>   
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />

		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading">
						Tabel Pinjaman
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Gambar</th>
										<th>Judul Buku</th>
										<th>Tanggal Pinjam</th>
										<th>Tanggal Kembali</th>
										<th>Denda</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// if (count($DbPinjam)>0) {
									foreach ($DbPinjam as $row){ 
										$id = $row->Id_Buku;
										$id_Anggota = $row->Id_Anggota;
										$where2 = array('Id_Anggota' => $id_Anggota);
										$where = array('Id_Buku' => $id);
										$DB = $this->M_DB->edit_data($where,'buku')->result();
										$tgl_msk = $row->Tgl_Pinjam;
										$dt_Tgl = date('Y-m-d', strtotime('+6 days', strtotime($tgl_msk)));
										foreach ($DB as $b) {
											$Judul = $b->JudulBuku;
											$Gbr = $b->Gambar;
										}
										$jumlah = $this->M_DB->edit_data($where2,'transaksi')->num_rows();
										?>
										<tr class="odd gradeX">
											<td><img src="<?php echo base_url().'/assets/upload/'.$Gbr; ?>" width="80" height="80" alt="gambar tidak ada"></td>    
											<td><?php echo $Judul ;?></td>
											<td><?php echo $row->Tgl_Pinjam ;?></td>
											<td><?php echo $dt_Tgl ;?></td>
											<td><?php echo $row->Denda.'/Hari' ;?></td>
											<td>
												<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delet<?php echo $id;?>" title="Hapus"><i class="fa fa-trash-o"></i> Hapus</button></td>   
											</tr>
										</tbody>
										<tr>
											<th colspan="5"><?php echo 'Total: '.$jumlah.' Buku' ?></th>
											<td>
												<a href="<?php echo base_url('AdmAnggota/Inputpinjam/'); ?>" class="btn btn-success btn-sm" title="Proses"><i class="fa fa-check"></i> Proses</a>
											</td>
										</tr>
									<?php } ?> 
								</table>
							</div>
						</div>

					</div>
					<!-- /. PAGE INNER  -->
				</div>

			</div>

		</div>
		<!-- /. PAGE INNER  -->
	</div>

	<!-- ============== Modal Hapus Pinjaman ====================== -->
	<?php 
	foreach($DbPinjam as $bb){
		$Id = $bb->Id_Buku;
	?>
	<div class="modal fade" id="delet<?php echo $Id; ?>">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Hapus Data ?</h4>
        </div>
        <form action="<?php echo base_url('AdmAnggota').'/HapusPinjam'; ?>" method="post">
         <div class="modal-body">
          <input type="hidden" name="ID" value="<?php echo $Id?>">
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