<?= $this->extend('dbadmin/admin') ?>

<?= $this->section('page-content') ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ganti Password</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Kami akan mengirimkan tautan untuk reset password.</div>
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="<?= base_url(); ?>login">Kembali login</a>
                                                <a class="btn btn-primary" href="<?= base_url(); ?>login">Reset Password</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    <a class="btn btn-secondary" href="<?= base_url(); ?>register">Sign up!</a></p>
                                    <a class="btn btn-secondary" href="<?= base_url(); ?>">Halaman Utama</a>
                                    <!-- <div class="small"><a href="<= base_url(); ?>register">Need an account? Sign up!</a></div></p>
                                    <div class="small"><a href="<= base_url(); ?>">Kembali ke Halaman Utama</a></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?= $this->endSection() ?>
