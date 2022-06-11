<?= $this->extend("admin/index") ?>

<?= $this->section("title") ?>
Transaction - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">
    <?php echo $title; ?>
</h1>

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
        <a href="<?= base_url('admin/transactions/create') ?>" class="btn btn-primary mb-4">
            Create Data
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Photo</th>
                        <th>Consumer</th>
                        <th>Operator</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Photo</th>
                        <th>Consumer</th>
                        <th>Operator</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transactions as $d) :
                        $consumer = $transactionModel->getUser($d['consumer_id']);
                        $operator = $transactionModel->getUser($d['operator_id']);
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $d['code_transaction']; ?></td>
                            <td>
                                <img src="<?= base_url('uploads/images/' . $d['photo']) ?>" alt="" width="100">
                            </td>
                            <td><?= $consumer; ?></td>
                            <td><?= $operator; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>