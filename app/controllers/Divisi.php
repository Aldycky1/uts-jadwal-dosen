<?php

class Divisi extends Controller
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
		$data['title'] = 'Data Divisi';
		$data['divisi'] = $this->model('DivisiModel')->getAllDivisi();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('divisi/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Divisi';
		$data['divisi'] = $this->model('DivisiModel')->cariDivisi();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('divisi/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Divisi';
		$data['divisi'] = $this->model('DivisiModel')->getDivisiById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('divisi/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Divisi';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('divisi/create', $data);
		$this->view('templates/footer');
	}

	public function simpanDivisi()
	{
		if ($this->model('DivisiModel')->tambahDivisi($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/divisi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/divisi');
			exit;
		}
	}

	public function updateDivisi()
	{
		if ($this->model('DivisiModel')->updateDataDivisi($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/divisi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/divisi');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('DivisiModel')->deleteDivisi($id) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/divisi');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/divisi');
			exit;
		}
	}
}
