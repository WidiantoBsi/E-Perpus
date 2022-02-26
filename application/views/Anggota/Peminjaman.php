<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Peminjaman</h2>   
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />

		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading">
						Tabel Peminjaman
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
										<th>Sisa Waktu</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// if (count($DbPinjam)>0) {
									foreach ($Pinjaman as $row){ 
										$id = $row->Id_Anggota;

										$where = array('Id_Anggota' => $id);
										$DB = $this->M_DB->edit_data($where,'peminjaman')->result();
										foreach ($DB as $b) {
											$IdBuku = $b->Id_Buku;
										}

										$where2 = array('Id_Buku' => $IdBuku);
										$dbBuku = $this->M_DB->edit_data($where2,'buku')->result();
										foreach ($dbBuku as $rw) {
											$Gbr = $rw->Gambar;
											$Judul = $rw->JudulBuku;
										}
										$Tgl = date('Y-m-d');
										$awal  = strtotime($Tgl); 
										$akhir = strtotime($row->Tgl_Kembali);// waktu sekarang
										$diff  = $akhir-$awal;
										$hari = $diff / 60 / 60 / 24;
										?>
										<tr class="odd gradeX">
											<td><img src="<?php echo base_url().'/assets/upload/'.$Gbr; ?>" width="80" height="80" alt="gambar tidak ada"></td>    
											<td><?php echo $Judul ;?></td>
											<td><?php echo $row->Tgl_pinjam ;?></td>
											<td><?php echo $row->Tgl_Kembali ;?></td>
											<td><?php echo $row->Denda.'/Hari' ;?></td>
											<td><?php echo $hari.' Hari Lagi'; ?></td>   
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
		<!-- /. PAGE INNER  -->
	</div>