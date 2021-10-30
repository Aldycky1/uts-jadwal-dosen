<?php

class PegawaiModel
{

	private $table = 'pegawai';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPegawai()
	{
		$this->db->query("SELECT pegawai.*, divisi.nama_divisi FROM " . $this->table . " JOIN divisi ON divisi.id = pegawai.divisi_id");
		return $this->db->resultSet();
	}

	public function getPegawaiById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahPegawai($data)
	{
		$query = "INSERT INTO pegawai (nip, nama, divisi_id, alamat, tanggal_lahir, no_hp) VALUES(:nip, :nama, :divisi_id, :alamat, :tanggal_lahir, :no_hp)";
		$this->db->query($query);
		$this->db->bind('nip', $data['nip']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('divisi_id', $data['divisi_id']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
		$this->db->bind('no_hp', $data['no_hp']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPegawai($data)
	{
		$query = "UPDATE pegawai SET nip=:nip, nama=:nama, divisi_id=:divisi_id, alamat=:alamat, tanggal_lahir=:tanggal_lahir, no_hp=:no_hp WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('nip', $data['nip']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('divisi_id', $data['divisi_id']);
		$this->db->bind('alamat', $data['alamat']);
		$this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
		$this->db->bind('no_hp', $data['no_hp']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePegawai($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariPegawai()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
