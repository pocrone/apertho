<body class="bg-primary">

    <!-- loader -->
    <div id="loader">
        <img src="<?= base_url() ?>assets/mobile/img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <img src="<?= base_url() ?>assets/img/logo.png" alt="logo" class="logo">
        </div>

    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Wallet Card -->
        <div class="section wallet-card-section mt-2">

        </div>
        <!-- Wallet Card -->


    </div>

    <div class="wallet-card ">
        <!-- Balance -->
        <div class="balance">
            <div class="left">

                <h2 class="text-primary">Masuk Aplikasi Apertho</h2>
                <span class=" text-primary">Login menggunakan akun terdaftar</span>
            </div>
            <!-- <div class="right">
                <a href="#" class="button" data-toggle="modal" data-target="#depositActionSheet">
                    <ion-icon name="add-outline"></ion-icon>
                </a>
            </div> -->
        </div>
        <!-- * Balance -->
        <!-- Wallet Footer -->
        <div class="wallet-footer">

            <div class="col-12">
                <div class="text-danger text-center font-weight-bold small p-0">
                    <?php echo validation_errors(); ?>

                </div>
                <form action="<?= base_url('auth') ?>" method="post">
                    <div class="form-group">
                        <label class="text-dark">Email address</label>
                        <input type="text" class="form-control form-lg form-rounded" placeholder="Masukkan Email Kamu" name="username" style="border-radius: 1.5em;">
                    </div>
                    <div class="form-group">
                        <label class="text-dark">Password</label>
                        <input type="password" class="form-control form-lg form-rounded" placeholder="Masukkan Password" name="password" style="border-radius: 1.5em">
                    </div>

                    <input type="submit" class="btn btn-md btn-block bg-primary mt-2" style="border-radius: 1.5em;" value="LOGIN">
                </form>

                <!-- <h4 class="mt-2 text-center"><a href="" class="text-primary">Lupa Password ?</a></h4> -->
                <h4 class="mt-5 text-center">Belum punya akun ?<a href="<?= base_url('auth/daftar') ?>" class="text-warning">Daftar Sekarang</a></h4>

            </div>

        </div>
        <!-- * Wallet Footer -->
    </div>


    <!-- app footer -->

    <!-- * app footer -->

    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->

    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->