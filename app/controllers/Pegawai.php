<?php

class Pegawai extends Controller
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
		$data['title'] = 'Data Pegawai';
		$data['pegawai'] = $this->model('PegawaiModel')->getAllPegawai();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pegawai/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Pegawai';
		$data['pegawai'] = $this->model('PegawaiModel')->getAllPegawai();
		$this->view('pegawai/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['pegawai'] = $this->model('PegawaiModel')->getAllPegawai();

		$pdf = new FPDF('p', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();

		// Logo
		$pdf->Image('https://www.gadjian.com/static/images/feature_employee_data.png', 180, 10, 20, 20, 'PNG');
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(165, 20, 'PT Aldy Mengoding', 0, 1, 'R');

		$pdf->Ln(10);

		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial', 'B', 14);
		// mencetak string 
		$pdf->Cell(190, 7, 'LAPORAN PEGAWAI', 0, 1, 'C');

		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10, 7, '', 0, 1);

		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(8, 6, 'NIP', 1);
		$pdf->Cell(45, 6, 'NAMA', 1);
		$pdf->Cell(30, 6, 'DIVISI', 1);
		$pdf->Cell(35, 6, 'ALAMAT', 1);
		$pdf->Cell(35, 6, 'TANGGAL_LAHIR', 1);
		$pdf->Cell(35, 6, 'NO_HP', 1);
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 10);

		foreach ($data['pegawai'] as $row) {
			$pdf->Cell(8, 6, $row['nip'], 1);
			$pdf->Cell(45, 6, $row['nama'], 1);
			$pdf->Cell(30, 6, $row['nama_divisi'], 1);
			$pdf->Cell(35, 6, $row['alamat'], 1);
			$pdf->Cell(35, 6, $row['tanggal_lahir'], 1);
			$pdf->Cell(35, 6, $row['no_hp'], 1);
			$pdf->Ln();
		}

		$pdf->Output('D', 'Laporan Pegawai.pdf', true);
	}
	public function cari()
	{
		$data['title'] = 'Data Pegawai';
		$data['pegawai'] = $this->model('PegawaiModel')->cariPegawai();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pegawai/index', $data);
		$this->view('templates/footer');
	}

	public function edit($nip)
	{

		$data['title'] = 'Detail Pegawai';
		$data['divisi'] = $this->model('DivisiModel')->getAllDivisi();
		$data['pegawai'] = $this->model('PegawaiModel')->getPegawaiById($nip);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pegawai/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Pegawai';
		$data['divisi'] = $this->model('DivisiModel')->getAllDivisi();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pegawai/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPegawai()
	{

		if ($this->model('PegawaiModel')->tambahPegawai($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/pegawai');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/pegawai');
			exit;
		}
	}

	public function updatePegawai()
	{
		if ($this->model('PegawaiModel')->updateDataPegawai($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/pegawai');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/pegawai');
			exit;
		}
	}

	public function hapus($nip)
	{
		if ($this->model('PegawaiModel')->deletePegawai($nip) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/pegawai');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/pegawai');
			exit;
		}
	}
}
