<?php

class DivisiModel
{

	private $table = 'divisi';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllDivisi()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getDivisiById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDivisi($data)
	{
		$query = "INSERT INTO divisi (nama_divisi) VALUES(:nama_divisi)";
		$this->db->query($query);
		$this->db->bind('nama_divisi', $data['nama_divisi']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataDivisi($data)
	{
		$query = "UPDATE divisi SET nama_divisi=:nama_divisi WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('nama_divisi', $data['nama_divisi']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDivisi($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDivisi()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_divisi LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
