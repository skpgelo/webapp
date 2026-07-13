
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
                            <?php if (auth()->loggedIn()): ?>
                                <!-- <p>Halo, <= esc(auth()->user()->username) ?> 👋</p> -->
                                <!-- <a href="/logout" class="btn btn-danger">Logout</a> -->
                                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/logout">LOGOUT</a></li>
                                <li><a>I'm <?= esc(auth()->user()->username) ?></a></li>

                            <?php else: ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/login"><span style="color:blue;">SIGNIN</span></a></li>                                <p>Kamu belum login</p>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/register"><span style="color:blue;">REGISTER</span></a></li>                                <p>Kamu belum login</p>
                                <!-- <a href="/login" class="btn">Login</a>  -->
                                <!-- <a href="/register" class="btn">Register</a> -->
                            <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        <!-- </div> -->
    </div>
