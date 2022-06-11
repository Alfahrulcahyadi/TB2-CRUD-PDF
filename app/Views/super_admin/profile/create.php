<?= $this->extend("super_admin/index") ?>

<?= $this->section("title") ?>
Profile - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create CV</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create CV</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('super_admin/profile/store') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama">nama</label>
                    <input type="nama" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="pendidikan">pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control" id="pendidikan" required>
                </div>
                <div class="form-group">
                    <label for="pengalaman">pengalaman</label>
                    <input type="pengalaman" name="pengalaman" class="form-control" id="pengalaman" required>
                </div>
                <div class="form-group">
                    <label for="prestasi">prestasi</label>
                    <input type="prestasi" name="prestasi" class="form-control" id="prestasi" required>
                </div>
                <div class="form-group">
                    <label for="no_telepon">no_telepon</label>
                    <input type="no_telepon" name="no_telepon" class="form-control" id="no_telepon" required>
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