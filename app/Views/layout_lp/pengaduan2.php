<?= $this->section('style') ?>
<style>
    /* Styling dasar agar terlihat rapi */
    body { font-family: sans-serif; padding: 20px; }
    
    .area-hover {
        padding: 20px;
        background-color: #f0f0f0;
        border: 2px dashed #999;
        display: inline-block;
        cursor: pointer;
    }

    /* Form disembunyikan secara default */
    #form-input {
        display: none;
        margin-top: 15px;
        padding: 15px;
        border: 1px solid #ccc;
        background-color: #e7f3fe;
        width: 300px;
    }
</style>
<?= $this->endSection() ?>
    <!-- Area yang akan dipantau pergerakan mouse -->
    <div class="area-hover" id="area-trigger">
        Arahkan Mouse ke Sini
    </div>

    <!-- Form Input HTML yang akan ditampilkan -->
    <div id="form-input">
        <form action="#" method="POST">
            <label for="nama">Nama Anda:</label><br>
            <input type="text" id="nama" name="nama" placeholder="Ketik nama di sini">
            <button type="submit">Kirim</button>
        </form>
    </div>


<div class="section" id="pengaduan">

    <div class="container">
        <div class="section-title">
                <small>INTERAKSI PUBLIK</small>
                <h3>Interaksi Publik</h3>

            <div class="row custom-row">

                <div class="col-12 col-lg-3">
                    <div class="card features">
                        <div class="card-body js-hover-col">
                            <div class="media">
                                <div class="media-body" >

                                    <a href="surveymasyarakat" class="btn btn-primary btn-lg btn-block main-btn" >PERMINTAAN INFORMASI</a>
                                    <div class="login-form-container">
                                        <!-- <form action="#">
                                            <div class="mb-2">
                                                <input type="text" class="form-control form-control-sm" placeholder="ID Admin" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="password" class="form-control form-control-sm" placeholder="Sandi" required>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-sm w-100">Masuk Admin</button>
                                        </form> -->
                                        <div class="section-title">
                                            <small>
                                            <p>Login Terlebih Dahulu..</p>
                                            <p>Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a></p>
                                            <p>Tidak punya akun? <a href="<?= base_url('login') ?>">Registrasi</a></p>
                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card features">
                        <div class="card-body js-hover-col">
                            <div class="media">
                               <div class="media-body">
                                    <a href="surveymasyarakat" class="btn btn-primary btn-lg btn-block main-btn" >KEBERATAN INFORMASI</a>
                                    <div class="login-form-container">
                                        <form action="#">
                                            <div class="mb-2">
                                                <input type="text" class="form-control form-control-lg" placeholder="ID Admin" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="password" class="form-control form-control-lg" placeholder="Sandi" required>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-sm w-100">Masuk Admin</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card features">
                        <div class="card-body js-hover-col">
                            <div class="media">
                                <div class="media-body">
                                    <a href="surveymasyarakat" class="btn btn-primary btn-lg btn-block main-btn" >PENGADUAN MASYARAKAT</a>
                                    <div class="login-form-container">
                                        <form action="#">
                                            <div class="mb-2">
                                                <input type="text" class="form-control form-control-sm" placeholder="ID Admin" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="password" class="form-control form-control-sm" placeholder="Sandi" required>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-sm w-100">Masuk Admin</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 js-hover-col">
                    <div class="card features">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <a href="surveymasyarakat" class="btn btn-primary btn-lg btn-block main-btn" >SURVEY MASYARAKAT</a>
                                    <div class="login-form-container">
                                        <form action="#">
                                            <div class="mb-2">
                                                <input type="text" class="form-control form-control-sm" placeholder="ID Admin" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="password" class="form-control form-control-sm" placeholder="Sandi" required>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-sm w-100">Masuk Admin</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->section('script') ?>
    <script>
        // Mengambil elemen berdasarkan ID
        const areaTrigger = document.getElementById('area-trigger');
        const formInput = document.getElementById('form-input');

        // Event: Saat mouse masuk ke dalam area
        areaTrigger.addEventListener('mouseover', function() {
            formInput.style.display = 'block';
        });

        // Event: Saat mouse keluar dari area
        areaTrigger.addEventListener('mouseleave', function() {
            formInput.style.display = 'none';
        });
    </script>
<?= $this->endSection() ?>