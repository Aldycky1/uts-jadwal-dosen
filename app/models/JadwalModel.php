<?php

class JadwalModel
{

	private $table = 'jadwal';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllJadwal()
	{
		$this->db->query("SELECT jadwal.*, jam_kuliah.jam_mulai, jam_kuliah.jam_selesai, matakuliah.semester, kelas.nama_kelas, matakuliah.nama_matakuliah, matakuliah.sks, dosen.nama_dosen, ruangan.ruangan_nama FROM " . $this->table . " JOIN jam_kuliah ON jam_kuliah.jam_id = jadwal.jam_id" . " JOIN dosen ON dosen.dosen_id = jadwal.dosen_id" . " JOIN kelas ON kelas.kelas_id = jadwal.kelas_id" . " JOIN matakuliah ON matakuliah.matakuliah_id = jadwal.matakuliah_id" . " JOIN ruangan ON ruangan.ruangan_id = jadwal.ruangan_id");
		return $this->db->resultSet();
	}

	public function getJadwalById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE jadwal_id=:jadwal_id');
		$this->db->bind('jadwal_id', $id);
		return $this->db->single();
	}

	public function tambahJadwal($data)
	{
		$query = "INSERT INTO jadwal (hari, jam_id, dosen_id, kelas_id, matakuliah_id, ruangan_id) VALUES(:hari, :jam_id, :dosen_id, :kelas_id, :matakuliah_id, :ruangan_id)";
		$this->db->query($query);
		$this->db->bind('hari', $data['hari']);
		$this->db->bind('jam_id', $data['jam_id']);
		$this->db->bind('dosen_id', $data['dosen_id']);
		$this->db->bind('kelas_id', $data['kelas_id']);
		$this->db->bind('matakuliah_id', $data['matakuliah_id']);
		$this->db->bind('ruangan_id', $data['ruangan_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataJadwal($data)
	{
		$query = "UPDATE jadwal SET hari=:hari, jam_id=:jam_id, dosen_id=:dosen_id, kelas_id=:kelas_id, matakuliah_id=:matakuliah_id, ruangan_id=:ruangan_id WHERE jadwal_id=:jadwal_id";
		$this->db->query($query);
		$this->db->bind('jadwal_id', $data['jadwal_id']);
		$this->db->bind('hari', $data['hari']);
		$this->db->bind('jam_id', $data['jam_id']);
		$this->db->bind('dosen_id', $data['dosen_id']);
		$this->db->bind('kelas_id', $data['kelas_id']);
		$this->db->bind('matakuliah_id', $data['matakuliah_id']);
		$this->db->bind('ruangan_id', $data['ruangan_id']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteJadwal($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE jadwal_id=:jadwal_id');
		$this->db->bind('jadwal_id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariJadwal()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT jadwal.*, jam_kuliah.jamkuliah, matakuliah.semester, kelas.nama_kelas, matakuliah.nama_matakuliah, matakuliah.sks, dosen.nama_dosen, ruangan.ruangan_nama FROM " . $this->table . " JOIN jam_kuliah ON jam_kuliah.jam_id = jadwal.jam_id" . " JOIN dosen ON dosen.dosen_id = jadwal.dosen_id" . " JOIN kelas ON kelas.kelas_id = jadwal.kelas_id" . " JOIN matakuliah ON matakuliah.matakuliah_id = jadwal.matakuliah_id" . " JOIN ruangan ON ruangan.ruangan_id = jadwal.ruangan_id" . " WHERE hari LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
