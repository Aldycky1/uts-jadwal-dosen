<?php

class Prodi extends Controller
{
	public function __construct()
	{
		if ($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
			header('location: ' . base_url . '/login');
			exit;
		}
	}
	public function index()
	{
		$data['title'] = 'Data Prodi';
		$data['prodi'] = $this->model('ProdiModel')->getAllProdi();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('prodi/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Prodi';
		$data['prodi'] = $this->model('ProdiModel')->cariProdi();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('prodi/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Prodi';
		$data['prodi'] = $this->model('ProdiModel')->getProdiById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('prodi/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Prodi';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('prodi/create', $data);
		$this->view('templates/footer');
	}

	public function simpanProdi()
	{
		if ($this->model('ProdiModel')->tambahProdi($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/prodi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/prodi');
			exit;
		}
	}

	public function updateProdi()
	{
		if ($this->model('ProdiModel')->updateDataProdi($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/prodi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/prodi');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('ProdiModel')->cekProdi($id) > 0) {
			Flasher::setMessage('Tidak bisa', 'dihapus', 'danger');
			header('location: ' . base_url . '/prodi');
			exit;
		} else {
			if ($this->model('ProdiModel')->deleteProdi($id) > 0) {
				Flasher::setMessage('Berhasil', 'dihapus', 'success');
				header('location: ' . base_url . '/prodi');
				exit;
			} else {
				Flasher::setMessage('Gagal', 'dihapus', 'danger');
				header('location: ' . base_url . '/prodi');
				exit;
			}
		}
	}
}
