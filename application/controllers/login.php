<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function index()
	{
		$this->load->view('Login');
	}

	function LogOut(){
		$session = array('id','nama');
		$this->session->sess_destroy($session);
	    $this->load->view('Login');
	}

	function Cek(){
		$email = $this->input->post('email');
		$password = $this->input->post('pass');

		$where = array('Email'=>$email, 'Password'=>$password);
		$data = $this->M_DB->edit_data($where,'admin');
		$dt = $this->M_DB->edit_data($where, 'anggota');
		$cek = $data->num_rows();
		$proses = $dt->num_rows();
		if ($cek > 0) {
			$where = array('Email' => $email);
			$DB = $this->M_DB->edit_data($where,'admin')->result();
			foreach ($DB as $bb) {
				$Admin = $bb->Nama;
			}
			
			$session = array('nama' => $Admin);
			$this->session->set_userdata($session);
			redirect(base_url().'Welcome');
		}elseif ($proses > 0) {
			$where = array('Email' => $email);
			$DB = $this->M_DB->edit_data($where,'anggota')->result();
			foreach ($DB as $b) {
				$Id_Anggota = $b->Id_Anggota;
				$nama = $b->Nama;
			}
			
			$session = array('Id' => $Id_Anggota, 'nama' => $nama);
			$this->session->set_userdata($session);
			redirect(base_url().'AdmAnggota');
		}else{
			redirect(base_url().'login');
		}

	}

}