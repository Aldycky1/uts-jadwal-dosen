<?php

class DosenModel
{

	private $table = 'dosen';
	private $tableTransaksi = 'jadwal';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllDosen()
	{
		$this->db->query("SELECT dosen.*, pendidikan.nama_pen FROM " . $this->table . " JOIN pendidikan ON pendidikan.pen_id = dosen.pen_id");
		return $this->db->resultSet();
	}

	public function getAllSSatu()
	{
		$this->db->query("SELECT COUNT(pen_id) AS jml_S1 FROM " . $this->table . " WHERE pen_id=1");
		return $this->db->resultSet();
	}

	public function getAllSDua()
	{
		$this->db->query("SELECT COUNT(pen_id) AS jml_S2 FROM " . $this->table . " WHERE pen_id=2");
		return $this->db->resultSet();
	}

	public function getAllSTiga()
	{
		$this->db->query("SELECT COUNT(pen_id) AS jml_S3 FROM " . $this->table . " WHERE pen_id=3");
		return $this->db->resultSet();
	}

	public function getCountDosen()
	{
		$this->db->query("SELECT COUNT(dosen_id) AS jml_dosen FROM " . $this->table);
		return $this->db->resultSet();
	}

	public function getDosenById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE dosen_id=:dosen_id');
		$this->db->bind('dosen_id', $id);
		return $this->db->single();
	}

	public function tambahDosen($data)
	{
		$query = "INSERT INTO dosen (nama_dosen, alamat_dosen, tgl_lahir, tlp_dosen, pen_id) VALUES(:nama_dosen, :alamat_dosen, :tgl_lahir, :tlp_dosen, :pen_id)";
		$this->db->query($query);
		$this->db->bind('nama_dosen', $data['nama_dosen']);
		$this->db->bind('alamat_dosen', $data['alamat_dosen']);
		$this->db->bind('tgl_lahir', $data['tgl_lahir']);
		$this->db->bind('tlp_dosen', $data['tlp_dosen']);
		$this->db->bind('pen_id', $data['pen_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataDosen($data)
	{
		$query = "UPDATE dosen SET nama_dosen=:nama_dosen, alamat_dosen=:alamat_dosen, tgl_lahir=:tgl_lahir, tlp_dosen=:tlp_dosen, pen_id=:pen_id WHERE dosen_id=:dosen_id";
		$this->db->query($query);
		$this->db->bind('dosen_id', $data['dosen_id']);
		$this->db->bind('nama_dosen', $data['nama_dosen']);
		$this->db->bind('alamat_dosen', $data['alamat_dosen']);
		$this->db->bind('tgl_lahir', $data['tgl_lahir']);
		$this->db->bind('tlp_dosen', $data['tlp_dosen']);
		$this->db->bind('pen_id', $data['pen_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDosen($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE dosen_id=:dosen_id');
		$this->db->bind('dosen_id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cekDosen($id)
	{
		$this->db->query('SELECT * FROM ' . $this->tableTransaksi . ' WHERE dosen_id=:dosen_id');
		$this->db->bind('dosen_id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDosen()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT dosen.*, pendidikan.nama_pen FROM " . $this->table . " JOIN pendidikan ON pendidikan.pen_id = dosen.pen_id" . " WHERE nama_dosen LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
