<?php

class Jadwal extends Controller
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
		$data['title'] = 'Data Jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->getAllJadwal();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->getAllJadwal();
		$this->view('jadwal/lihatlaporan', $data);
	}

	public function laporan()
	{
		$data['jadwal'] = $this->model('JadwalModel')->getAllJadwal();

		$pdf = new FPDF('L', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();

		// Logo
		$pdf->Image('https://www.graphicsprings.com/filestorage/stencils/f8886990992db06572f0afa573e75745.png?width=500&height=500', 255, 10, 40, 40, 'PNG');
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Ln(10);
		$pdf->Cell(250, 20, 'PT Aldy Mengoding', 0, 1, 'R');

		$pdf->Ln(10);

		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial', 'B', 14);
		// mencetak string 
		$pdf->Cell(0, 7, 'LAPORAN JADWAL', 0, 1, 'C');

		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10, 7, '', 0, 1);

		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(25, 6, 'HARI', 1);
		$pdf->Cell(40, 6, 'JAM', 1);
		$pdf->Cell(20, 6, 'SMTR', 1);
		$pdf->Cell(30, 6, 'KELAS', 1);
		$pdf->Cell(70, 6, 'MATKUL', 1);
		$pdf->Cell(15, 6, 'SKS', 1);
		$pdf->Cell(50, 6, 'DOSEN', 1);
		$pdf->Cell(25, 6, 'RUANGAN', 1);
		$pdf->Ln();
		$pdf->SetFont('Arial', '', 10);

		foreach ($data['jadwal'] as $row) {
			$pdf->Cell(25, 6, $row['hari'], 1);
			$pdf->Cell(40, 6, $row['jam_mulai'] . ' - ' . $row['jam_selesai'], 1);
			$pdf->Cell(20, 6, $row['semester'], 1);
			$pdf->Cell(30, 6, $row['nama_kelas'], 1);
			$pdf->Cell(70, 6, $row['nama_matakuliah'], 1);
			$pdf->Cell(15, 6, $row['sks'], 1);
			$pdf->Cell(50, 6, $row['nama_dosen'], 1);
			$pdf->Cell(25, 6, $row['ruangan_nama'], 1);
			$pdf->Ln();
		}

		$pdf->Output('D', 'Laporan Jadwal.pdf', true);
	}
	public function cari()
	{
		$data['title'] = 'Data Jadwal';
		$data['jadwal'] = $this->model('JadwalModel')->cariJadwal();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{

		$data['title'] = 'Detail Jadwal';
		$data['jam_kuliah'] = $this->model('JamKuliahModel')->getAllJamKuliah();
		$data['dosen'] = $this->model('DosenModel')->getAllDosen();
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$data['matakuliah'] = $this->model('MataKuliahModel')->getAllMataKuliah();
		$data['ruangan'] = $this->model('RuanganModel')->getAllRuangan();
		$data['jadwal'] = $this->model('JadwalModel')->getJadwalById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Jadwal';
		$data['jam_kuliah'] = $this->model('JamKuliahModel')->getAllJamKuliah();
		$data['dosen'] = $this->model('DosenModel')->getAllDosen();
		$data['kelas'] = $this->model('KelasModel')->getAllKelas();
		$data['matakuliah'] = $this->model('MataKuliahModel')->getAllMataKuliah();
		$data['ruangan'] = $this->model('RuanganModel')->getAllRuangan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jadwal/create', $data);
		$this->view('templates/footer');
	}

	public function simpanJadwal()
	{

		if ($this->model('JadwalModel')->tambahJadwal($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/jadwal');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/jadwal');
			exit;
		}
	}

	public function updateJadwal()
	{
		if ($this->model('JadwalModel')->updateDataJadwal($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/jadwal');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/jadwal');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('JadwalModel')->deleteJadwal($id) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/jadwal');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/jadwal');
			exit;
		}
	}
}
