<?php

class JamKuliahModel
{

	private $table = 'jam_kuliah';
	private $tableTransaksi = 'jadwal';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllJamKuliah()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getJamKuliahById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE jam_id=:jam_id');
		$this->db->bind('jam_id', $id);
		return $this->db->single();
	}

	public function tambahJamKuliah($data)
	{
		$query = "INSERT INTO jam_kuliah (jamkuliah) VALUES(:jamkuliah)";
		$this->db->query($query);
		$this->db->bind('jamkuliah', $data['jamkuliah']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataJamKuliah($data)
	{
		$query = "UPDATE jam_kuliah SET jamkuliah=:jamkuliah WHERE jam_id=:jam_id";
		$this->db->query($query);
		$this->db->bind('jam_id', $data['jam_id']);
		$this->db->bind('jamkuliah', $data['jamkuliah']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteJamKuliah($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE jam_id=:jam_id');
		$this->db->bind('jam_id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cekJamKuliah($id)
	{
		$this->db->query('SELECT * FROM ' . $this->tableTransaksi . ' WHERE jam_id=:jam_id');
		$this->db->bind('jam_id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariJamKuliah()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE jamkuliah LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
