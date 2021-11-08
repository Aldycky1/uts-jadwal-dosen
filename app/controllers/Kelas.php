<?php

class Kelas extends Controller
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
		$data['title'] = 'Data Kelas';
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kelas/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Kelas';
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$this->view('kelas/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();

		$pdf = new FPDF('p', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();

		// Logo
		$pdf->Image('https://png.pngtree.com/template/20190316/ourmid/pngtree-books-logo-image_79143.jpg', 165, 10, 40, 40, 'JPG');
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Ln(10);
		$pdf->Cell(160, 20, 'PT Aldy Mengoding', 0, 1, 'R');

		$pdf->Ln(10);

		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial', 'B', 14);
		// mencetak string 
		$pdf->Cell(190, 7, 'LAPORAN KELAS', 0, 1, 'C');

		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10, 7, '', 0, 1);

		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(85, 6, 'JUDUL', 1);
		$pdf->Cell(30, 6, 'PENERBIT', 1);
		$pdf->Cell(30, 6, 'PENGARANG', 1);
		$pdf->Cell(15, 6, 'TAHUN', 1);
		$pdf->Cell(25, 6, 'KATEGORI', 1);
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 10);

		foreach ($data['kelas'] as $row) {
			$pdf->Cell(85, 6, $row['judul'], 1);
			$pdf->Cell(30, 6, $row['penerbit'], 1);
			$pdf->Cell(30, 6, $row['pengarang'], 1);
			$pdf->Cell(15, 6, $row['tahun'], 1);
			$pdf->Cell(25, 6, $row['nama_kategori'], 1);
			$pdf->Ln();
		}

		$pdf->Output('D', 'Laporan Kelas.pdf', true);
	}
	public function cari()
	{
		$data['title'] = 'Data Kelas';
		$data['kelas'] = $this->model('KelasModel')->cariKelas();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kelas/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{

		$data['title'] = 'Detail Kelas';
		$data['prodi'] = $this->model('ProdiModel')->getAllProdi();
		$data['kelas'] = $this->model('KelasModel')->getKelasById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kelas/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Kelas';
		$data['prodi'] = $this->model('ProdiModel')->getAllProdi();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('kelas/create', $data);
		$this->view('templates/footer');
	}

	public function simpanKelas()
	{

		if ($this->model('KelasModel')->tambahKelas($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/kelas');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/kelas');
			exit;
		}
	}

	public function updateKelas()
	{
		if ($this->model('KelasModel')->updateDataKelas($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/kelas');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/kelas');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('KelasModel')->deleteKelas($id) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/kelas');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/kelas');
			exit;
		}
	}
}
