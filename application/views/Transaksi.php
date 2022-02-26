<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Transaksi Pinjaman</h2>   
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
											<td><?php echo $row->Denda.'/Hari' ;?></td>
											<td><?php echo $Peminjam ;?></td>
											<td><?php echo $Email ;?></td>
											<td>
												<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#proses<?php echo $row->Id_Pijam;?>" title="Selesai"><i class="fa fa-check-square-o"></i> Selesai</button>
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
		$Id = $rw->Id_Buku;
		$IdAgt = $rw->Id_Anggota;
		$Denda = $rw->Denda;
		$ID = $rw->Id_Pijam;
		$where2 = array('Id_Anggota' => $IdAgt);
		$where = array('Id_Buku' => $Id);
		$db = $this->M_DB->edit_data($where,'buku')->result();
		foreach ($db as $br) {
			$Jdl = $br->JudulBuku;
			$Img = $br->Gambar;
		}
		$DbAgt2 = $this->M_DB->edit_data($where2,'anggota')->result();
		foreach ($DbAgt2 as $rb) {
			$Peminjam = $rb->Nama;
		}

		$Tgl = date('Y-m-d');
		$awal  = strtotime($Tgl); 
		$akhir = strtotime($row->Tgl_Kembali);// waktu sekarang
		$diff  = $akhir-$awal;
		$hari = $diff / 60 / 60 / 24;
		if ($hari > 6) {
			$TtlDenda = 2000*$hari;
		}else{
			$TtlDenda = 0;
		}
		?>
		<div class="modal fade" id="proses<?php echo $ID; ?>">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Pinjaman Selesai</h4>
					</div>
					<form action="<?php echo base_url('Welcome').'/Selesai'; ?>" method="post">
						<div class="modal-body">

							<table class="table table-striped">
								<tr>
									<th colspan="2">
										<center>
											<img src="<?php echo base_url().'/assets/upload/'.$Img; ?>" style="max-width:100%; max-height: 100%; height: 150px; width: 120px">
										</center>
									</th>
								</tr>
								<tr>
									<td>Judul Buku</td>
									<td><?php echo $Jdl; ?></td>
								</tr>
								<tr>
									<td>Tanggal Pinjam</td>
									<td><?php echo $rw->Tgl_pinjam; ?></td>
								</tr>
								<tr>
									<td>Tanggal Kembali</td>
									<td><?php echo $rw->Tgl_Kembali; ?></td>
								</tr>
								<tr>
									<td>Denda</td>
									<input type="hidden" name="ID" value="<?php echo $ID ?>">
									<td><?php echo $Denda; ?></td>
								</tr>
								<tr>
									<td>Total Denda</td>
									<input type="hidden" name="TtlDenda" value="<?php echo $TtlDenda?>">
									<td><?php echo $TtlDenda; ?></td>
								</tr>
								<tr>
									<td>Peminjam</td>
									<td><?php echo $Peminjam; ?></td>
								</tr>
							</table>

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