<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Notifikasi Absen</h3>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="card">
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Dosen</th>
                        <th>Nama Matkul</th>
                        <th>Semester</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $jadwal) : ?>
                        <tr>
                            <td><?= $jadwal->nama_dosen ?></td>
                            <td><?= $jadwal->nama_matkul ?></td>
                            <td><?= $jadwal->semester ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('Dashboard::hadir', $jadwal->id_jadwal); ?>" class="btn-link">Hadir</a>
                                <a href="<?= route_to('Dashboard::tidakHadir', $jadwal->id_jadwal); ?>" class="btn-link text-danger">Tidak Hadir</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>