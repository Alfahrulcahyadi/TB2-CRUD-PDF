<?= $this->extend("user/index") ?>

<?= $this->section("title") ?>
Dashboard - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Income</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp." . number_format($incomeTransaction, 0, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Transaction</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $transactionCount; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Type User -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Reward</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $type['status']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-award fa-2x <?php echo $type['color'] ?>"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-6">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Detail Income</div>
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section("js") ?>
<script>
    const options = {
        series: [
            <?php echo $paymentBalanceCount; ?>,
            <?php echo $paymentCashCount; ?>
        ],
        chart: {
            type: 'donut',
        },
        labels: ['Balance', 'Cash'],
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    const chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
<?= $this->endSection() ?>