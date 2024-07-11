<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>
<div class="alert alert-light-primary alert-dismissible show fade">
    <h1>Selamat datang kembali, <?= session()->get('name') ?>!</h1>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?= $this->endSection(); ?>