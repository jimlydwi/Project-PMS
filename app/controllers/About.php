<?php

class About extends Controller{
    public function index($nama = 'Budi', $nim = '123321', $prodi = 'TRPL'){
        $data['nama'] = $nama;
        $data['nim'] = $nim;
        $data['prodi'] = $prodi;

        $this->view('about/index', $data);
    }
}

?>