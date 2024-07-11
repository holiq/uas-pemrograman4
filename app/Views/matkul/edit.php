<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Edit Matkul</h3>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('message') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Matkul::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Matkul::update', $matkul->id_matkul) ?>">
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-4">
                    <label for"kode_matkul">Kode Matkul</label>
                    <input type="text" name="kode_matkul" id="kode_matkul" class="form-control" value="<?= $matkul->kode_matkul ?>">
                </div>

                <div class="mb-4">
                    <label for"nama_matkul">Nama Matkul</label>
                    <input type="text" name="nama_matkul" id="nama_matkul" class="form-control" value="<?= $matkul->nama_matkul ?>">
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>