
    <div class="nav-menu fixed-top ">
        <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" style="color: red;" href="index.html"><b>BBPPKS</b> <i style="color: white;">BANDUNG</i>
                            <!-- <img src="<= base_url(); ?>/mobapp/images/logo.png" class="img-fluid" alt="logo"> -->
                            </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link active" href="#home">HOME <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#features">FEATURES</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#sdm">SDM</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#gallery">GALLERY</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#pricing">PRICING</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#faq">F.A.Q.</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#contact">CONTACT</a> </li>
                                <!-- <li class="nav-item"> <a href="#" class="btn btn-outline-light my-3 my-sm-0 ml-lg-3">Sign In/Sign Out</a></li> -->
                            <?php if (session()->get('logged_in') ) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>logout">Logout</a></li>
                        <li><a>I'm <?= session()->get('name'); ?></a></li>
                        <!-- <li><a><img class="img-profile rounded-circle" src="<= base_url(); ?>/img/<= user()->users_image ?>" sizes="32x32"></a> -->
                        </li>
                            <?php else : ?>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>v_login"><span style="color:blue;">SIGNIN</span></a></li>
                            <?php endif; ?>
                        </ul>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        <!-- </div> -->
    </div>
