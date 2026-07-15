                    <?= view('CodeIgniter\Shield\Views\_message_block') ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= old('username') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirm">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
                    
                    <p class="text-center mt-3">
                        Sudah punya akun? <a href="<?= url_to('login') ?>">Login</a>
                    </p>