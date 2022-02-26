<div id="page-wrapper" >
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Katalog Buku</h2>   
				<h5>Welcome <?php echo $this->session->userdata('nama'); ?> , Love to see you back. </h5>
				<?= validation_errors('<p style="color:red;">','</p>'); ?>
				<?php
				if($this->session->flashdata('alert')){
					echo "<div class='alert alert-danger alert-dismissable'>";
					echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
					echo $this->session->flashdata('alert');
					echo "</div>";
				}elseif ($this->session->flashdata('alert2')) {
					echo "<div class='alert alert-danger alert-message'>";
					echo $this->session->flashdata('alert2');
					echo "</div>";
				} 
				?>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />

		<div class="row">
			<?php
			foreach ($katalog as $row){ 
				$id = $row->Id_Buku;
				?>
				<div class="col-md-4 col-sm-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<?php echo $row->JudulBuku ;?>
						</div>
						<div class="panel-body">
							<center>
								<img src="<?php echo base_url().'/assets/upload/'.$row->Gambar; ?>" style="max-width:100%; max-height: 100%; height: 150px; width: 120px">
							</center><hr/>
							<table class="table table-striped">
								<tr>
									<td>Pengarang:</td>
									<td><?php echo $row->Pengarang ; ?></td>
								</tr>
								<tr>
									<td>Penerbit:</td>
									<td><?php echo $row->penerbit ; ?></td>
								</tr>
								<tr>
									<td>Tahun Terbit:</td>
									<td><?php echo $row->Thn_Terbit ; ?></td>
								</tr>
								<tr>
									<td>Lokasi:</td>
									<td><?php echo $row->Lokasi ; ?></td>
								</tr>
								<tr>
									<td>Status:</td>
									<?php 
									$Cek = $this->M_DB->edit_data(array('Id_Buku'=>$row->Id_Buku),'transaksi')->num_rows();
									if ($Cek < $row->Jumlah) { ?>
										<td>Tersedia</td>
									<?php }else{ ?>
										<td>Dipinjam</td>
									<?php } ?>
								</tr>
							</table>
						</div>
						<div class="panel-footer">
							<a href="<?php echo base_url('AdmAnggota/InputBuku/').$id; ?>" class="btn btn-primary btn-md"><i class="fa fa-shopping-cart"></i> Booking</a>
							<button class="btn btn-warning btn-md" data-toggle="modal" data-target="#Detail<?php echo $id;?>" title="Detail"><i class="fa fa-search"></i> Detail</button>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

	</div>
	<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>

<!-- ============== Modal Detail Buku ====================== -->
<?php 
foreach($katalog as $bb){
	$id = $bb->Id_Buku;
	$Judul = $bb->JudulBuku ;
	$Pengarang = $bb->Pengarang ;
	$Tahun = $bb->Thn_Terbit ;
	$Penerbit = $bb->penerbit ;
	$Isbn = $bb->Isbn ;
	$Lokasi = $bb->Lokasi;
	$Img = $bb->Gambar;
	?>
	<div class="modal fade" id="Detail<?php echo $id;?>" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		<form action="<?php echo base_url('Welcome/').'EditAnggota'; ?>" method="post" enctype="multipart/form-data">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title" id="myModalLabel">Edit Anggota</h3>
					</div>
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
								<td><?php echo $Judul; ?></td>
							</tr>
							<tr>
								<td>Pengarang</td>
								<td><?php echo $Pengarang; ?></td>
							</tr>
							<tr>
								<td>Penerbit</td>
								<td><?php echo $Penerbit; ?></td>
							</tr>
							<tr>
								<td>Tahun</td>
								<td><?php echo $Tahun; ?></td>
							</tr>
							<tr>
								<td>ISBN</td>
								<td><?php echo $Isbn; ?></td>
							</tr>
							<tr>
								<td>Lokasi</td>
								<td><?php echo $Lokasi; ?></td>
							</tr>
						</table>

					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" value="Tutup"  class="btn btn-primary"/>Tutup</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php } ?>