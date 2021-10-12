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

	public function getPegawaiById($nip)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE nip=:nip');
		$this->db->bind('nip', $nip);
		return $this->db->single();
	}

	public function tambahPegawai($data)
	{
		$query = "INSERT INTO pegawai (nama, divisi_id, alamat, tanggal_lahir, no_hp) VALUES(:nama, :divisi_id, :alamat, :tanggal_lahir, :no_hp)";
		$this->db->query($query);
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
		$query = "UPDATE pegawai SET nama=:nama, divisi_id=:divisi_id, alamat=:alamat, tanggal_lahir=:tanggal_lahir, no_hp=:no_hp WHERE nip=:nip";
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

	public function deletePegawai($nip)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE nip=:nip');
		$this->db->bind('nip', $nip);
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
