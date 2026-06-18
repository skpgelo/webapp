<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $title ?> || BBPPKS Bandung</title>
        <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/img/Kemensos.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url(); ?>lp_gray/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?=$this->include('layout_lp/_navigasi')?>

        <!-- Masthead-->
        <section class="signup-section bg-light" style="height: 100vh; " id="login">
            <div class="container ">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-12 col-lg-4 mx-auto text-center" >
                    <!-- <i class="fa fa-circle-info fa-4x mb-2 text-white " aria-hidden="true"></i> -->
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i> 
                    <!-- <i class="fa-regular fa-paper-plane"></i> -->
                        <h2 class=" my-220 text-uppercase mt-200 text-white mb-2" ><?= $title ?></h2>
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- * * SB Forms Contact Form * *-->
                            <!-- * * * * * * * * * * * * * * *-->
                            <!-- This form is pre-integrated with SB Forms.-->
                            <!-- To make this form functional, sign up at-->
                            <!-- https://startbootstrap.com/solution/contact-forms-->
                            <!-- to get an API token!-->
                            <?php
                            if(session()->getFlashdata('msg')):?>
                            <span style="opacity: 0.75;">
                            <div class="form-check mb-3 mx-auto text-center text-white" class="alert alert-warning">
                            <?= session()->getFlashdata('msg') ?>
                            </div>
                            </span>
                            <?php endif;?>
                        <form method="POST" action="<?= base_url(); ?>loginAuth">
                            <!-- <form method="POST" action="" class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN"> -->
                            <!-- Email address input-->
                            <div class="row input-group-newsletter" >
                                <div class="col">
                                    <input class="form-control" style="background-color: rgba(255, 253, 253, 0.5)" id="email" name="email"  type="email" placeholder="Email" aria-label="email" data-sb-validations="required" />
                                </div></p>
                                <!-- <div class="col"><input class="form-control" style="background-color: rgba(255, 253, 253, 0.5)" id="inputUsername" name="inputUsername" type="text" placeholder="Username" aria-label="inputUsername" data-sb-validations="required" /></div></p> -->
                                <div class="col">
                                    <input class="form-control" style="background-color: rgba(255, 253, 253, 0.5)" id="password" name="password" type="password" placeholder="Password" aria-label="password" data-sb-validations="required" />
                                </div></p>
                                <div class="form-check mb-3">
                                    <span style="opacity: 0.75;"><input class="check-input" id="inputRememberPassword" name="remember_me" type="checkbox" value="1" />
                                    <label class="form-check-label my-220 mt-200 text-white mb-1" for="inputRememberPassword">Ingatkan Password</label></span>
                                </div>
                                <div class="col"><button class="btn btn-primary" class=" my-220 text-uppercase mt-200 mb-3" id="submit" name="submit" type="submit" >sign in</button></div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required"> Harus mempunyai password.
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Password tidak valid.
                            </div>
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the form-->
                                <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder">Sukses Login!</div>
                                        <br />
                                        <!-- <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a> -->
                                </div>  
                            </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3 mt-2">Gagal Login!</div>
                            </div>
                        </form>
                            <br />
                            <div>
                                <span style="opacity: 0.75;">
                                <a href="<?= base_url(); ?>signup"><h6 class=" my-220 text-uppercase mt-200 text-white mb-3">belum punya akun? sign up</> </h6></a>
                                </span>
                            </div>
                            <div>
                                <span style="opacity: 0.75;">
                                <a href="<?= base_url(); ?>password"><h6 class=" my-220 text-uppercase mt-200 text-white mb-3">lupa password? reset</> </h6></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- <footer class="footer text-center text-white-50">
                <div><i>copyright &copy; <span style="color:red">ppid</span>bbppks bandung <?= date('Y'); ?></i>
                </div>
            </footer> -->
        </section>
        <!-- About-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url(); ?>lp_gray/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
