<?php

class PendidikanModel
{

	private $table = 'pendidikan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPendidikan()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getPendidikanById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE pen_id=:pen_id');
		$this->db->bind('pen_id', $id);
		return $this->db->single();
	}

	public function tambahPendidikan($data)
	{
		$query = "INSERT INTO pendidikan (nama_pen) VALUES(:nama_pen)";
		$this->db->query($query);
		$this->db->bind('nama_pen', $data['nama_pen']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPendidikan($data)
	{
		$query = "UPDATE pendidikan SET nama_pen=:nama_pen WHERE pen_id=:pen_id";
		$this->db->query($query);
		$this->db->bind('pen_id', $data['pen_id']);
		$this->db->bind('nama_pen', $data['nama_pen']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePendidikan($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE pen_id=:pen_id');
		$this->db->bind('pen_id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariPendidikan()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_pen LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
