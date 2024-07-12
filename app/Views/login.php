<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="container-sm min-vh-100 d-flex flex-column">
        <div class="m-auto w-100" style="max-width: 40rem;">
            <?php if (!empty(session()->getFlashdata('errors'))) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="card">
                <div class="card-header">
                    <h1>Login</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="<?= route_to('Login::process') ?>">
                        <div class="mb-4">
                            <label for"username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label for"password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>