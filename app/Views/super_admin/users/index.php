<?= $this->extend("super_admin/index") ?>

<?= $this->section("title") ?>
Users - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>

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

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url('super_admin/users/create') ?>" class="btn btn-primary mb-4">
            Create Data
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Telephone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $d) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $d['email']; ?></td>
                            <td><?= $d['username']; ?></td>
                            <td><?= $d['telephone']; ?></td>
                            <td><?= $d['address']; ?></td>
                            <td><?= $d['role']; ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-<?= $d['id'] ?>">
                                            Edit
                                        </button>

                                        <!-- Edit Data -->
                                        <div class="modal fade" id="editModal-<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('/super_admin/users/update/') ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" class="form-control" id="email" value="<?= $d['email'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="username">Username</label>
                                                                <input type="text" name="username" class="form-control" id="username" value="<?= $d['username'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="telephone">Telephone</label>
                                                                <input type="text" name="telephone" class="form-control" id="telephone" value="<?= $d['telephone'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" name="address" class="form-control" id="address" value="<?= $d['address'] ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role">Role</label>
                                                                <select class="form-control" name="role" id="role" required="required">
                                                                    <option hidden value="<?= $d['role'] ?>">-- Pilih Level --</option>
                                                                    <option value="super_admin">Super Admin</option>
                                                                    <option value="admin">Admin</option>
                                                                    <option value="user">User</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Edit Data -->
                                    </div>
                                    <div class="col-3">
                                        <form action="<?= base_url('/super_admin/users/delete/') ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
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