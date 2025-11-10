<?php

class Mahasiswa extends Controller{
    protected $mahasiswaModel;

    public function __construct(){
        $this->mahasiswaModel = $this->model('Mahasiswa_models');
    }

    public function index(){
        $data['judul'] = 'Data Mahasiswa';
        $data['mhs'] = $this->mahasiswaModel->getAllMahasiswa();

        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer', $data);
    }

    // create
    public function simpan(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nim'       => $_POST['nim'],
                'nama'      => $_POST['nama'],
                'prodi'      => $_POST['prodi']
            ];

            if ($this->mahasiswaModel->addMahasiswa($data)) {
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                echo "Gagal menambah data mahasiswa.";
            }
        }
    }

    // update
    public function update($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id'        => $id,
                'nim'       => $_POST['nim'],
                'nama'      => $_POST['nama'],
                'prodi'      => $_POST['prodi']
            ];

            if ($this->mahasiswaModel->updateMahasiswa($data)) {
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                echo "Gagal memperbarui data mahasiswa.";
            }
        }
    }

    // delete
    public function delete($id) {
        if ($this->mahasiswaModel->deleteMahasiswa($id)) {
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            echo "Gagal menghapus data!";
        }
    }
}

?>