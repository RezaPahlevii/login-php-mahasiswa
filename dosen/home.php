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

$dosen = mysqli_query($koneksi, "SELECT * FROM dosen");

?>

<div class="container">
<div class="card mt-0">
        <div class="card-header bg-primary text-white">
            Data dosen
        </div>
    <div class="card-body">
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
        Tambah Data</button>
        <a href="<?= BASE_URL . 'dashboard.php?page=home' ?> "class="btn btn-primary mb-3">Mahasiswa</a>
        <div class="row">
            <div class="col-md">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($dosen as $p) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['prodi'] ?></td>
                             
                                
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