<?= $this->extend("super_admin/index") ?>

<?= $this->section("title") ?>
Profile - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>

<meta charset="utf-8">

<style>
table th {
    background: #0c1c60 !important;
    color: #fff !important;
    border: 1px solid #ddd !important;
    line-height: 15px !important;
    text-align: center !important;
    vertical-align: middle !important;

}

table td {
    line-height: 15px !important;
    text-align: center !important;
    border: 1px solid;
}
</style>
</head>

<!-- Message Alert -->
<?php
if (session()->getFlashData('success')) {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                <a href="<?= base_url('super_admin/profile/create') ?>" class="btn btn-primary mb-4">
                    Create CV
                </a>
            </div>
            <div class="col-12 col-sm-auto">
                <a href="<?= base_url('super_admin/profile/download-excel') ?>" class="btn btn-success mb-4">Download
                    Excel</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Pendidikan</th>
                        <th>Pengalaman</th>
                        <th>Prestasi</th>
                        <th>No Telpn</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $i = 1; ?>
                    <?php foreach ($users as $d) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $d['nama']; ?></td>
                        <td><?= $d['pendidikan']; ?></td>
                        <td><?= $d['pengalaman']; ?></td>
                        <td><?= $d['prestasi']; ?></td>
                        <td><?= $d['no_telepon']; ?></td>
                        <td>
                            <div class="row">
                                <div class="col-3">
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#editModal-<?= $d['id'] ?>">
                                        Edit
                                    </button>

                                    <!-- Edit Data -->
                                    <div class="modal fade" id="editModal-<?= $d['id'] ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('/super_admin/profile/update/') ?>"
                                                    method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" name="nama" class="form-control"
                                                                id="nama" value="<?= $d['nama'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pendidikan">Pendidikan</label>
                                                            <input type="text" name="pendidikan" class="form-control"
                                                                id="pendidikan" value="<?= $d['pendidikan'] ?>"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pengalaman">Pengalaman</label>
                                                            <input type="text" name="pengalaman" class="form-control"
                                                                id="pengalaman" value="<?= $d['telephone'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="prestasi">Prestasi</label>
                                                            <input type="text" name="prestasi" class="form-control"
                                                                id="prestasi" value="<?= $d['address'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_telepon">no_telepon</label>
                                                            <input type="text" name="no_telepon" class="form-control"
                                                                id="no_telepon" value="<?= $d['address'] ?>" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edit Data -->
                                </div>
                                <!-- Delete Data -->
                            </div>
                            <div class="col-3">
                                <form action="<?= base_url('/super_admin/profile/delete/') ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                            <div class="panel panel-danger">
                                <form action="<?= base_url('/super_admin/profile/pdf/') ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                    <button class="btn btn-info">
                                        Download PDF
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>