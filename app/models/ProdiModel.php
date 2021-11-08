<?php

class ProdiModel
{

	private $table = 'prodi';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllProdi()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getProdiById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE prodi_id=:prodi_id');
		$this->db->bind('prodi_id', $id);
		return $this->db->single();
	}

	public function tambahProdi($data)
	{
		$query = "INSERT INTO prodi (nama_prodi) VALUES(:nama_prodi)";
		$this->db->query($query);
		$this->db->bind('nama_prodi', $data['nama_prodi']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataProdi($data)
	{
		$query = "UPDATE prodi SET nama_prodi=:nama_prodi WHERE prodi_id=:prodi_id";
		$this->db->query($query);
		$this->db->bind('prodi_id', $data['prodi_id']);
		$this->db->bind('nama_prodi', $data['nama_prodi']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteProdi($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE prodi_id=:prodi_id');
		$this->db->bind('prodi_id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariProdi()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_prodi LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
