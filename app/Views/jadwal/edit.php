<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Edit Jadwal</h3>
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

    <a href="<?= route_to('Jadwal::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Jadwal::update', $jadwal->id_jadwal) ?>">
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-4">
                    <label for"dosen_id">Nama Dosen</label>
                    <select name="dosen_id" id="dosen_id" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($dosen as $data): ?>
                            <option value="<?= $data->id_dosen ?>" <?= ($jadwal->dosen_id == $data->id_dosen) ? 'selected' : '' ?>><?= $data->nama_dosen ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for"matkul_id">Nama Matkul</label>
                    <select name="matkul_id" id="matkul_id" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($matkul as $data): ?>
                            <option value="<?= $data->id_matkul ?>" <?= ($jadwal->matkul_id == $data->id_matkul) ? 'selected' : '' ?>><?= $data->nama_matkul ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label for"semester">Semester</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php for ($i = 1; $i <= 14; $i++): ?>
                            <option value="<?= $i ?>" <?= ($jadwal->semester == $i) ? 'selected' : '' ?>>Semester <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>