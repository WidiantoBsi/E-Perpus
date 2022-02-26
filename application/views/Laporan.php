<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Laporan Pinjaman</h2>   
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
										<th>Peminjam</th>
										<th>Email</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// if (count($DbPinjam)>0) {
									foreach ($pinjam as $row){ 
										$id = $row->Id_Buku;
										$IdAgt = $row->Id_Anggota;
										$where2 = array('Id_Anggota' => $IdAgt);
										$where = array('Id_Buku' => $id);
										$DB = $this->M_DB->edit_data($where,'buku')->result();
										foreach ($DB as $b) {
											$Judul = $b->JudulBuku;
											$Gbr = $b->Gambar;
										}
										$DbAgt = $this->M_DB->edit_data($where2,'anggota')->result();
										foreach ($DbAgt as $bb) {
											$Peminjam = $bb->Nama;
											$Email = $bb->Email;
										}
										?>
										<tr class="odd gradeX">
											<td><img src="<?php echo base_url().'/assets/upload/'.$Gbr; ?>" width="80" height="80" alt="gambar tidak ada"></td>    
											<td><?php echo $Judul ;?></td>
											<td><?php echo $row->Tgl_pinjam ;?></td>
											<td><?php echo $row->Tgl_Kembali ;?></td>
											<td><?php echo 'Rp.'.$row->Total_Denda ;?></td>
											<td><?php echo $Peminjam ;?></td>
											<td><?php echo $Email ;?></td>
											<td>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-primary btn-xs">Transaksi Selesai <span class="caret"></span></button>
													<ul class="dropdown-menu">
														<li><a href="#" data-toggle="modal" data-target="#edit<?php echo $row->Id_Pijam;?>" title="Edit">Edit</a></li>
														<li><a href="#" data-toggle="modal" data-target="#delet<?php echo $row->Id_Pijam;?>" title="Hapus">Hapus</a></li>
													</ul>
												</div>
											</td>  
										</tr>
									</tbody>
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

<!-- ============== Modal Proses ====================== -->
<?php 
foreach($pinjam as $rw){
	$id = $rw->Id_Pijam;
	?>
	<div class="modal fade" id="delet<?php echo $id; ?>">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content" style="margin-top:100px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" style="text-align:center;">Hapus Laporan</h4>
				</div>
				<form action="<?php echo base_url('Welcome/').'HapusLaporan'; ?>" method="post">
					<div class="modal-body">

						<input type="hidden" name="ID" value="<?php echo $id?>">
						Apakah Anda yakin ingin membuang data ini ke tempat sampah?

					</div>   
					<div class="modal-footer">
						<button type="submit" class="btn-sm btn-primary">Proses</button>
						<button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
 <!-- Modal Edit Laporan  -->
	<div class="modal fade" id="edit<?php echo $id; ?>">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content" style="margin-top:100px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" style="text-align:center;">Edit Laporan</h4>
				</div>
				<form action="<?php echo base_url('Welcome/').'EditLaporan'; ?>" method="post">
					<div class="modal-body">

						<input type="hidden" name="ID" value="<?php echo $id?>">
						Apakah Anda yakin ingin merubah data ini?

					</div>   
					<div class="modal-footer">
						<button type="submit" class="btn-sm btn-primary">Proses</button>
						<button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>