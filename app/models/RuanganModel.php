<?php

class RuanganModel
{

	private $table = 'ruangan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllRuangan()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getRuanganById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE ruangan_id=:ruangan_id');
		$this->db->bind('ruangan_id', $id);
		return $this->db->single();
	}

	public function tambahRuangan($data)
	{
		$query = "INSERT INTO ruangan (ruangan_nama) VALUES(:ruangan_nama)";
		$this->db->query($query);
		$this->db->bind('ruangan_nama', $data['ruangan_nama']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataRuangan($data)
	{
		$query = "UPDATE ruangan SET ruangan_nama=:ruangan_nama WHERE ruangan_id=:ruangan_id";
		$this->db->query($query);
		$this->db->bind('ruangan_id', $data['ruangan_id']);
		$this->db->bind('ruangan_nama', $data['ruangan_nama']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteRuangan($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE ruangan_id=:ruangan_id');
		$this->db->bind('ruangan_id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariRuangan()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE ruangan_nama LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
