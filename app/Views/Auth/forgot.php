<?= $this->extend('admin/layout') ?> 
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Lupa Password</h4>
                </div>
                <div class="card-body">
                    <?= view('CodeIgniter\Shield\Views\_message_block') ?>
                    <p>Masukkan email kamu. Link reset akan dikirim.</p>

                    <form action="<?= url_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Link Reset</button>
                    </form>
                    <p class="text-center mt-3"><a href="<?= url_to('login') ?>">Kembali ke Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>