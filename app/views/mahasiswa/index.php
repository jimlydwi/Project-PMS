<!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><?= $data['judul']; ?></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                                    <i class="fas fa-plus-square"></i> Tambah
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Prodi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i=1;
                                                foreach ($data['mhs'] as $mhs) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $mhs['nim']; ?></td>
                                                        <td><?= $mhs['nama']; ?></td>
                                                        <td><?= $mhs['prodi']; ?></td>
                                                        <td>
                                                        <a href="#editModal-<?= $mhs['id']; ?>" data-toggle="modal" class="btn btn-warning btn-sm">Edit</a>
                                                        <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= BASEURL; ?>/mahasiswa/delete/<?= $mhs['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                        </td>
                                                    </tr>
                                        <?php
                                            $i++;
                                            endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal tambah data -->
                    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="dialog">
                            <div class="modal-content">
                                <form action="<?= BASEURL; ?>/mahasiswa/simpan" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $data['judul']; ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold">Nama Mahasiswa:</label>
                                                <input type="text" id="nama" name="nama" class="form-control shadow-none" required>
                                            </div>
                                            <div class="mt-3 col-12">
                                                <label class="form-label fw-bold">NIM:</label>
                                                <input type="number" id="nim" name="nim" class="form-control shadow-none" required>
                                            </div>
                                            <div class="mt-3 col-12">
                                                <label class="form-label fw-bold">Prodi:</label>
                                                <input type="text" id="prodi" name="prodi" class="form-control shadow-none" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- end modal -->

                <!-- modal edit data -->
                <?php foreach ($data['mhs'] as $mhs): ?>
                    <div class="modal fade" id="editModal-<?= $mhs['id']; ?>" tabindex="-1" >
                        <div class="modal-dialog" role="dialog">
                            <div class="modal-content">
                                <form action="<?= BASEURL; ?>/mahasiswa/update/<?= $mhs['id']; ?>" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $data['judul']; ?> <?= $mhs['nama']; ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold">Nama Mahasiswa:</label>
                                                <input type="text" id="nama" name="nama" class="form-control shadow-none" value="<?= $mhs['nama'] ?>">
                                            </div>
                                            <div class="mt-3 col-12">
                                                <label class="form-label fw-bold">NIM:</label>
                                                <input type="number" id="nim" name="nim" class="form-control shadow-none" value="<?= $mhs['nim'] ?>">
                                            </div>
                                            <div class="mt-3 col-12">
                                                <label class="form-label fw-bold">Prodi:</label>
                                                <input type="text" id="prodi" name="prodi" class="form-control shadow-none" value="<?= $mhs['prodi'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- end modal -->