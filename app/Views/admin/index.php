<?= $this->extend("layouts/templates/index") ?>

<?= $this->section("sidebar") ?>
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-balance-scale"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Basam</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Nav Item - Transaction -->
<li class="nav-item">
    <a class="nav-link" href="/admin/transactions">
        <i class="fas fa-fw fa-shopping-bag"></i>
        <span>Transaction</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
<?= $this->endSection() ?>

<?= $this->section("content-template") ?>

<?= $this->renderSection("content") ?>

<?= $this->endSection() ?>