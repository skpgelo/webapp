<nav class="navbar navbar-expand-sm navbar-light fixed-top" id="mainNav">
            <div class="px-4 px-lg-12">
                <!-- <a class="navbar-brand" style="font-size:medium;" href="#page-top"> -->
                <!-- <span style="color:red;"><i>ppid</span>bbppks bandung</i> -->
                <!-- </a> -->
                <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button> -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto" style="font-size:0.9rem ">
                        <!-- <li class="nav-item"><a class="nav-link" href="#about">Kami</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="#profile"><span style="color:primary;">Tentang Kami</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#berkala"><span style="color:primary;">Informasi Berkala</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#sertamerta"><span style="color:primary;">Informasi Serta Merta</span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#setiapsaat"><span style="color:primary;">Informasi Setiap Saat</span></a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#mohon"><span style="color:primary;">Permohonan Informasi</span></a></li> -->
                        <!-- <li class="nav-item" class="dropdown"><a class="nav-link" class="dropbtn" href="<?= base_url(); ?>ragam">Ragam</a> -->
                        <!-- <a href="#">Home sub 1</a>
                        <a href="#">Home sub 2</a>
                        <a href="#">Home sub 3</a> -->
                        <!-- <lu ><a class="nav-link" href="#lain">Lainnya</a></lu>
                            <lu ><a class="nav-link" href="#lain">Lainnya</a></lu> -->
                        </li>
                            <?php if (auth()->loggedIn()): ?>
                                <!-- <p>Halo, <= esc(auth()->user()->username) ?> 👋</p> -->
                                <!-- <a href="/logout" class="btn btn-danger">Logout</a> -->
                                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/logout"><span style="color:primary;">Logout</span></a></li>
                                <!-- <li><a>I'm <= esc(auth()->user()->username) ?></a></li> -->

                            <?php else: ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/login"><span style="color:primary;">SignIn</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>/register"><span style="color:primary;">Register</span></a></li>
                                <!-- <a href="/login" class="btn">Login</a>  -->
                                <!-- <a href="/register" class="btn">Register</a> -->
                            <?php endif; ?>

                        </ul>
                        <!-- <ul class="topnav">
                        <li><a class="active" href="#home">Home</a></li>
                        <li><a href="#news">News</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#about">About</a></li>
                        <li class="dropdown right">
                            <a href="javascript:void(0)" class="dropbtn">Dropdown</a>
                            <div class="dropdown-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                            </div>
                        </li>
                        </ul> -->
                </div>
            </div>
        </nav>