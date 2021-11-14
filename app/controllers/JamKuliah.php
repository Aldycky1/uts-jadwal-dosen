<?php

class JamKuliah extends Controller
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
		$data['title'] = 'Data Jam Kuliah';
		$data['jam_kuliah'] = $this->model('JamKuliahModel')->getAllJamKuliah();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jamKuliah/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data JamKuliah';
		$data['jam_kuliah'] = $this->model('JamKuliahModel')->cariJamKuliah();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jamKuliah/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Jam Kuliah';
		$data['jam_kuliah'] = $this->model('JamKuliahModel')->getJamKuliahById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jamKuliah/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Jam Kuliah';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jamKuliah/create', $data);
		$this->view('templates/footer');
	}

	public function simpanJamKuliah()
	{
		if ($this->model('JamKuliahModel')->tambahJamKuliah($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/jamKuliah');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/jamKuliah');
			exit;
		}
	}

	public function updateJamKuliah()
	{
		if ($this->model('JamKuliahModel')->updateDataJamKuliah($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/jamKuliah');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/jamKuliah');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('JamKuliahModel')->deleteJamKuliah($id) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/jamKuliah');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/jamKuliah');
			exit;
		}
	}
}
