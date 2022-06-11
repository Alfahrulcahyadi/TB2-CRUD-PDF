<?= $this->extend("super_admin/index") ?>

<?= $this->section("title") ?>
Transaction - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create Transaction</h1>

<div class="card mb-4">
    <div class="card-header">
        Transaksi
    </div>
    <div class="card-body">
        <form action="<?= base_url('super_admin/item-transactions/store') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="row">
                <div class="col-4">
                    <h1>
                        <b>
                            <?= $codeTransaction; ?>
                        </b>
                    </h1>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="type_trash" class="col-sm-12 control-label">Garbage Type</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="type_trash" id="type_trash" required>
                                <option hidden>-- Select Type --</option>
                                <option value="organic">Organic</option>
                                <option value="inorganic">Inorganic</option>
                                <option value="b3">B3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-12 control-label">Garbage Price</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" value="" id="price" name="price" required="required">
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="qty" class="col-sm-12 control-label">Garbage Qty</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" value="" id="qty" name="qty" required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unit" class="col-sm-12 control-label">Garbage Unit</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="unit" id="unit" required>
                                <option hidden>-- Select Type --</option>
                                <option value="ons">ons</option>
                                <option value="kg">kg</option>
                                <option value="ton">ton</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info col-12">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        Cart
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($itemTransactions as $d) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?=
                                                $typeTrash = '';
                                                if ($d['type_trash'] == 'organic') {
                                                    $typeTrash = 'Organic';
                                                } else if ($d['type_trash'] == 'inorganic') {
                                                    $typeTrash = 'Inorganic';
                                                } else {
                                                    $typeTrash = 'B3';
                                                }
                                                echo $typeTrash;
                                                ?></td>
                            <td><?= "Rp." . number_format($d['price'], 0, ',', '.'); ?></td>
                            <td><?= $d['qty']; ?></td>
                            <td><?= $d['unit']; ?></td>
                            <td><?= "Rp." . number_format($d['total'], 0, ',', '.'); ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <form action="<?= base_url('/super_admin/item-transactions/delete/') ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                                                <i class="fas fa-trash"></i>
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
<div class="card mb-4">
    <div class="card-header">
        Checkout
    </div>
    <div class="card-body offset-6">
        <form action="<?= base_url('super_admin/transactions/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="col-12">
                <div class="form-group">
                    <label for="inputData" class="col-sm-4 control-label">Code Member</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="code_member" id="code_member" required>
                            <option hidden>-- Select Code Member --</option>
                            <?php foreach ($users as $d) : ?>
                                <option value="<?= $d['code_member']; ?>"><?= $d['code_member']; ?> - <?= $d['username']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="payment" class="col-sm-4 control-label">Payment</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="payment" id="payment" required>
                            <option hidden>-- Select Payment --</option>
                            <option value="cash">Cash</option>
                            <option value="balance">Balance</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-sm-4 control-label">Photo</label>
                    <div class="col-sm-12">
                        <input type="file" class="form-control" value="" id="image" name="image" required="required">
                    </div>
                </div>
                <button type="submit" class="btn btn-success offset-9">Checkout</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>