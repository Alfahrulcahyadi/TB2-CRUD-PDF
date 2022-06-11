<?= $this->extend("super_admin/index") ?>

<?= $this->section("title") ?>
Users - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create Data</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Data</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('super_admin/users/store') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="number" name="telephone" class="form-control" id="telephone" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" id="address" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role" required>
                        <option hidden>-- Pilih Level --</option>
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
<?= $this->endSection(); ?>