<?php

require_once('function/koneksi.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;
$status = isset($_GET['status']) ? ($_GET['status']) : false;
?>


<?php if ($process == 'success') : ?>
    <div class="alert alert-success" role="alert">
        Data behasil dimasukan
    </div>
<?php endif; ?>

<?php if ($status == 'success') : ?>
    <div class="alert alert-success" role="alert">
        Data behasil dihapus
    </div>
<?php endif; ?>

<!-- mengambil data dari database -->
<?php

$mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

?>

<div class="container">
<div class="card mt-0">
        <div class="card-header bg-primary text-white">
            Data Mahasiswa
        </div>
    <div class="card-body">
    <!-- <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah Data</button> -->

        <a href="<?= BASE_URL . 'dashboard.php?page=create' ?>" class="btn btn-success mb-3">Tambah Data</a>
        <a href="<?= BASE_URL . 'dashboard.php?dosen=home' ?>" class="btn btn-primary mb-3">Dosen</a>
        <div class="row">
            <div class="col-md">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($mahasiswa as $p) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['noid'] ?></td>
                                <td><?= $p['nohp'] ?></td>
                                <td><?= $p['email'] ?></td>
                                <td><?= $p['alamat'] ?></td>
                                <td>
                                    <a class="btn btn-danger badge"href="<?= BASE_URL . 'process/process_delete.php?id=' . $p['id'] ?>">Delete</a>
                                    <a class="btn btn-info badge" href="<?= BASE_URL . 'dashboard.php?page=edit&id=' . $p['id'] ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>