<section class="signup-section bg-light" id="mohon">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="fa fa-circle-info fa-4x mb-2 text-white " aria-hidden="true"></i>
                    <!-- <i class="far fa-paper-plane fa-2x mb-2 text-white"></i> <i class="fa-regular fa-paper-plane"></i>-->
                        <h4 class="text-white text-uppercase mb-3">Permohonan Informasi Publik</h4>
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Email address input-->
                            <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="nik" type="text" placeholder="Nomor Induk Kependudukan" aria-label="Nomor Induk Kependudukan" data-sb-validations="required" /></div></p>
                            <div class="col"><input class="form-control" id="nama" type="text" placeholder="Nama Lengkap" aria-label="Nama Lengkap" data-sb-validations="required" /></div></p>
                            <div class="col"><input class="form-control" id="email" type="email" placeholder="eMail" aria-label="eMail" data-sb-validations="required,email" /></div></p>
                            <div class="col"><input class="form-control" id="foto" type="file" placeholder="Upload Foto Diri dan KTP" aria-label="Informasi yang dimohon" data-sb-validations="required" /></div></p>
                            <div class="col"><input class="form-control" id="informasi" type="textarea" placeholder="Permohonan Informasi" aria-label="eMail" data-sb-validations="required" /></div></p>
                            <div class="col-auto mt-2"><button class="btn btn-primary disabled" id="submitButton" type="submit">Kirim</button></div>
                            <div class="col mt-2"><button class="btn btn-danger disabled" id="tutorial" >tutorial: tata cara memohon informasi</button></div>
                            </div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required"> Harus mempunyai email.</div>
                            <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email tidak valid.</div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3 mt-2 text-white">
                                    <div class="fw-bolder">Sukses mengirim data Permohonan Informasi!</div>
                                    <br />
                                    <!-- <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a> -->
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3 mt-2">Gagal mengirim data Permohonan Informasi!</div></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>