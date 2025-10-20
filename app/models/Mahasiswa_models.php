<?php

class Mahasiswa_models{
    private $table = 'mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        $this->db->query('select * from '.$this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaByNIM($nim){
        $this->db->query('select * from '.$this->table.' where nim = :nim');
        $this->db->stmt->bindParam(':nim'.$nim);
        return $this->db->single();
    }

    public function addMahasiswa($data){
        $this->db->query('insert into '.$this->table.'(nama, nim, prodi) values (:nama, :nim, :prodi)');
        $this->db->stmt->bindParam(':nama', $data['nama']);
        $this->db->stmt->bindParam(':nim', $data['nim']);
        $this->db->stmt->bindParam(':prodi', $data['prodi']);
        return $this->db->stmt->execute();
    }

    public function updateMahasiswa($data){
        $this->db->query('update '.$this->table.' set nama = :nama, nim = :nim, prodi = :prodi where id = :id');
        $this->db->stmt->bindParam(':nama', $data['nama']);
        $this->db->stmt->bindParam(':nim', $data['nim']);
        $this->db->stmt->bindParam(':prodi', $data['prodi']);
        $this->db->stmt->bindParam(':id', $data['id']);
        return $this->db->stmt->execute();
    }

    public function deleteMahasiswa($id) {
        $this->db->query('delete from '.$this->table.' where id = :id');
        $this->db->stmt->bindParam(':id', $id);
        return $this->db->stmt->execute();
    }
}

?>