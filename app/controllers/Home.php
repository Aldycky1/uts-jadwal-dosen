<?php

class Home extends Controller
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
		$data['title'] = 'Halaman Dashboard';
		$data['SSatu'] = $this->model('DosenModel')->getAllSSatu();
		$data['SDua'] = $this->model('DosenModel')->getAllSDua();
		$data['STiga'] = $this->model('DosenModel')->getAllSTiga();

		$data['CountDosen'] = $this->model('DosenModel')->getCountDosen();
		$data['CountKelas'] = $this->model('KelasModel')->getCountKelas();
		$data['CountMataKuliah'] = $this->model('MataKuliahModel')->getCountMataKuliah();
		$data['CountRuangan'] = $this->model('RuanganModel')->getCountRuangan();

		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}
