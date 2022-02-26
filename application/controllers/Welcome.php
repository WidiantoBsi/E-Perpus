<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function index()
	{
		$data['hasil']=$this->M_DB->get_data('buku')->result();
		$this->load->view('Header');
		$this->load->view('Dashboard',$data);
		$this->load->view('Footer');
	}

	// Data Buku
	function DataBuku(){
		$data['DbBuku']=$this->M_DB->get_data('buku')->result();
		$data['DbKategori']=$this->M_DB->get_data('kategori')->result();
		$this->load->view('Header');
		$this->load->view('DataBuku',$data);
		$this->load->view('Footer');
	}

	function AddBuku(){
		$Judul = $this->input->post('Judul');
		$Kategori = $this->input->post('Kategori');
		$Pengarang = $this->input->post('Pengarang');
		$Th_Terbit = $this->input->post('Th_Terbit');
		$Penerbit = $this->input->post('Penerbit');
		$ISBN = $this->input->post('ISBN');
		$Jumlah = $this->input->post('Jumlah');
		$Lokasi = $this->input->post('Lokasi');
		$Tgl = date('Y-m-d');


		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = 'Gbr'.time();

		$this->load->library('upload',$config);
		if($this->upload->do_upload('Gbr')){
			$image = $this->upload->data();
			$data = array(
				'Id_Kategori' => $Kategori,
				'JudulBuku' => $Judul,
				'Pengarang' => $Pengarang,
				'Thn_Terbit' => $Th_Terbit,
				'penerbit' => $Penerbit,
				'Isbn' => $ISBN,
				'Jumlah' => $Jumlah,
				'Lokasi' => $Lokasi,
				'Gambar' => $image['file_name'],
				'Tgl_Input' => $Tgl
			);
			$this->M_DB->insert_data($data,'buku');
			$this->session->set_flashdata('sucess','File Berhasil Di Tambah Kedalam DataBase');
			redirect(base_url().'DataBuku');
		}else {
			$this->session->set_flashdata('alert','File Gagal di upload!, Pastikan Format jpg, png, jpeg dan ukuran max 2048Kb/5Gb');
			redirect(base_url().'DataBuku');
		}
	}

	function EditBuku(){
		$Judul = $this->input->post('Judul');
		$Kategori = $this->input->post('Kategori');
		$Pengarang = $this->input->post('Pengarang');
		$Th_Terbit = $this->input->post('Th_Terbit');
		$Penerbit = $this->input->post('Penerbit');
		$ISBN = $this->input->post('ISBN');
		$Jumlah = $this->input->post('Jumlah');
		$Lokasi = $this->input->post('Lokasi');
		$ID = $this->input->post('ID');
		$Tgl = date('Y-m-d');

		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = 'foto'.time();

		$where = array('Id_Buku' => $ID);
		$data = array(
			'Id_Kategori' => $Kategori,
			'JudulBuku' => $Judul,
			'Pengarang' => $Pengarang,
			'Thn_Terbit' => $Th_Terbit,
			'penerbit' => $Penerbit,
			'Isbn' => $ISBN,
			'Jumlah' => $Jumlah,
			'Lokasi' => $Lokasi,
			'Tgl_Input' => $Tgl
		);

		$this->load->library('upload',$config);
		if($this->upload->do_upload('foto')){
			$image = $this->upload->data();
			unlink('assets/upload/'.$this->input->post('old_pict',TRUE));
			$data['gambar'] = $image['file_name'];
			$this->M_DB->update_data('buku',$data,$where);
			$this->session->set_flashdata('sucess','File Gambar Berhasil Di Ubah');
			redirect(base_url().'DataBuku');
		}else {
			$this->M_DB->update_data('buku',$data,$where);
			redirect(base_url().'DataBuku');
		}
	}

	function HapusBuku(){
		$id = $this->input->post('ID');
		$where = array('Id_Buku' => $id);
		$db = $this->M_DB->edit_data($where,'buku')->result();
		foreach ($db as $row){ //Hapus Photo di folder
			unlink("assets/upload/".$row->Gambar);
		}
		$this->M_DB->delete_data($where,'buku'); // Hapus data buku
		redirect('DataBuku');
	}
	// End Data Buku
	// Data Anggota
	function Anggota(){
		$data['Anggota']=$this->M_DB->get_data('anggota')->result();
		$data['id']=$this->M_DB->kodeAnggota('4');
		$this->load->view('Header');
		$this->load->view('Anggota',$data);
		$this->load->view('Footer');
	}

	function AddAnggota(){
		$id = $this->input->post('id');
		$Nama = $this->input->post('Nama');
		$Gender = $this->input->post('Gender');
		$NoHp = $this->input->post('NoHp');
		$Alamat = $this->input->post('Alamat');
		$Email = $this->input->post('Email');
		$Password = $this->input->post('Password');

		$data = array(
			'Id_Anggota' => $id,
			'Nama' => $Nama,
			'Gender' => $Gender,
			'NoHp' => $NoHp,
			'Alamat' => $Alamat,
			'Email' => $Email,
			'Password' => $Password
		);
		$this->M_DB->insert_data($data,'anggota');
		$this->session->set_flashdata('sucess','Data Berhasil Di Tambah Kedalam DataBase');
		redirect(base_url().'Anggota');
	}

	function EditAnggota(){
		$id = $this->input->post('id');
		$Nama = $this->input->post('Nama');
		$Gender = $this->input->post('Gender');
		$NoHp = $this->input->post('NoHp');
		$Alamat = $this->input->post('Alamat');
		$Email = $this->input->post('Email');
		$Password = $this->input->post('Password');

		$where = array('Id_Anggota' => $id);
		$data = array(
			'Nama' => $Nama,
			'Gender' => $Gender,
			'NoHp' => $NoHp,
			'Alamat' => $Alamat,
			'Email' => $Email,
			'Password' => $Password
		);
		$this->M_DB->update_data('anggota',$data,$where);
		$this->session->set_flashdata('sucess','Data Berhasil Di Ubah');
		redirect(base_url().'Anggota');
	}

	function HapusAnggota(){
		$id = $this->input->post('ID');
		$where = array('Id_Anggota' => $id);
		$this->M_DB->delete_data($where,'anggota'); // Hapus data Anggota
		redirect('Anggota');
	}

	function Transaksi(){ //data Transaksi
		$where = array('Status' => 'N');
		$data['pinjam'] = $this->M_DB->edit_data($where,'peminjaman')->result();
		// $data['pinjam']=$this->M_DB->get_data('peminjaman')->result();
		$this->load->view('Header');
		$this->load->view('Transaksi',$data);
		$this->load->view('Footer');
	}

	function Selesai(){
		$id = $this->input->post('ID');
		$Ttl = $this->input->post('TtlDenda');
		$Status = 'Y';

		$where = array('Id_Pijam' => $id);
		$data = array(
			'Total_Denda' => $Ttl,
			'Status' => $Status
		);
		$this->M_DB->update_data('peminjaman',$data,$where);
		// $this->M_DB->delete_data($where,'peminjaman'); // Hapus data Peminjaman
		redirect('Transaksi');
	}

	function Laporan(){
		$where = array('Status' => 'Y');
		$data['pinjam'] = $this->M_DB->edit_data($where,'peminjaman')->result();
		$this->load->view('Header');
		$this->load->view('Laporan',$data);
		$this->load->view('Footer');
	}

	function HapusLaporan(){
		$id = $this->input->post('ID');
		$where = array('Id_Pijam' => $id);
		$this->M_DB->delete_data($where,'peminjaman'); // Hapus data Anggota
		redirect('Laporan');
	}

	function EditLaporan(){
		$id = $this->input->post('ID');
		$Status = 'N';
		$Denda = 0;

		$where = array('Id_Pijam' => $id);
		$data = array(
			'Status' => $Status,
			'Total_Denda' => $Denda
		);
		$this->M_DB->update_data('peminjaman',$data,$where);
		redirect('Laporan');
	}
}
