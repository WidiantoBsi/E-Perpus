<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdmAnggota extends CI_Controller {

	function index(){
		$data['katalog']=$this->M_DB->get_data('buku')->result();
		$this->load->view('Anggota/Header');
		$this->load->view('Anggota/Dashboard',$data);
		$this->load->view('Anggota/Footer');
	}

	function InputBuku($id){ //input ke kranjang
		$Id = $id; //Id Buku
		$Id_Anggota = $this->session->userdata('Id'); //Id Anggota
		$Tanggal = date('Y-m-d');
		$Denda = '2000';
		$Jml = $this->M_DB->edit_data(array('Id_Buku'=>$Id),'transaksi')->num_rows();
		$CekJml = $this->M_DB->edit_data(array('Id_Buku'=>$Id),'peminjaman')->num_rows();

		$where = array('Id_Buku' => $Id);
		$JmlBuku = $this->M_DB->edit_data($where,'buku')->result();
		foreach ($JmlBuku as $rw){ 
			$TtlBuku = $rw->Jumlah;
		}
		if ($TtlBuku == $Jml) {
			$this->session->set_flashdata('alert','Buku Tidak Tersedia');
			redirect(base_url().'AdmAnggota');
		}elseif ($CekJml > 0 or $Jml > 0) {
			$this->session->set_flashdata('alert2','Peminjaman Tidak Lebih dari 1');
			redirect(base_url().'AdmAnggota');
		}

		$data = array(
			'Id_Anggota' => $Id_Anggota,
			'Id_Buku' => $Id,
			'Tgl_Pinjam' => $Tanggal,
			'Denda' => $Denda
		);
		$this->M_DB->insert_data($data,'transaksi');
		redirect(base_url().'AdmAnggota');
	}

	function Pinjaman(){
		$Id = $this->session->userdata('Id'); //Id Anggota
		$where = array('Id_Anggota' => $Id);
		$data['DbPinjam'] = $this->M_DB->edit_data($where,'transaksi')->result();
		$this->load->view('Anggota/Header');
		$this->load->view('Anggota/Pinjaman',$data);
		$this->load->view('Anggota/Footer');
	}

	function HapusPinjam(){ //Hapus data Transaksi
		$Id = $this->input->post('ID');
		$where = array('Id_Buku' => $Id);
		$this->M_DB->delete_data($where,'transaksi'); // Hapus data transaksi
		redirect(base_url().'BookCard');
	}

	function Inputpinjam(){ //input peminjaman
		$Id = $this->session->userdata('Id'); //Id Anggota
		$where = array('Id_Anggota' => $Id);
		$dbPinjam = $this->M_DB->edit_data($where,'transaksi')->result();
		$Status = 'N';

		foreach ($dbPinjam as $rw){ 
			$Id = $rw->Id_Anggota;
			$IdBuku = $rw->Id_Buku;
			$Tgl_Pinjam = $rw->Tgl_Pinjam;
			$Denda = $rw->Denda;

			$tgl_msk = $Tgl_Pinjam;
			$dt_Tgl = date('Y-m-d', strtotime('+6 days', strtotime($tgl_msk)));

			$data = array(
				'Id_Anggota' => $Id,
				'Id_Buku' => $IdBuku,
				'Tgl_Pinjam' => $Tgl_Pinjam,
				'Tgl_Kembali' => $dt_Tgl,
				'Denda' => $Denda,
				'Status' => $Status
			);
			$this->M_DB->insert_data($data,'peminjaman');
		$this->M_DB->delete_data($where,'transaksi'); // Hapus data transaksi
	}
	redirect(base_url().'BookCard');
}

function Peminjaman(){
	$Id = $this->session->userdata('Id'); //Id Anggota
	$where = array('Id_Anggota' => $Id);
	$data['Pinjaman']=$this->M_DB->edit_data($where,'peminjaman')->result();
	$this->load->view('Anggota/Header');
	$this->load->view('Anggota/Peminjaman',$data);
	$this->load->view('Anggota/Footer');
}

}