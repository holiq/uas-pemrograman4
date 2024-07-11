<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Edit Dosen</h3>
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

    <a href="<?= route_to('Dosen::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Dosen::update', $dosen->id_dosen) ?>">
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-4">
                    <label for"nama_dosen">Nama Dosen</label>
                    <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" value="<?= $dosen->nama_dosen ?>">
                </div>

                <div class="mb-4">
                    <label for"nidn_dosen">NIDN</label>
                    <input type="text" name="nidn_dosen" id="nidn_dosen" class="form-control" value="<?= $dosen->nidn_dosen ?>">
                </div>

                <div class="mb-4">
                    <label for"alamat_dosen">Alamat Dosen</label>
                    <input type="text" name="alamat_dosen" id="alamat_dosen" class="form-control" value="<?= $dosen->alamat_dosen ?>">
                </div>

                <div class="mb-4">
                    <label for"status_dosen">Status Dosen</label>
                    <select name="status_dosen" id="status_dosen" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="0" <?= (!$dosen->status_dosen) ? 'selected' : '' ?>>Tidak Aktif</option>
                        <option value="1" <?= ($dosen->status_dosen) ? 'selected' : '' ?>>Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>