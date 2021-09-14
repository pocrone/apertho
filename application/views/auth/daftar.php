<body class="bg-primary">

    <!-- loader -->
    <div id="loader">
        <img src="<?= base_url() ?>assets/mobile/img/logo-icon.png" alt="icon" class="loading-icon">
        <br>
        <h3 class="ml-2 text-light">Loading ... </h3>
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

    <div class="wallet-card-daftar">
        <!-- Balance -->
        <div class="balance">
            <div class="left">

                <h2 class="text-primary">Daftar Aplikasi Apertho</h2>
                <span class="text-primary text-small">Buat Akun Apherto untuk bisa mengakses materi!</span>
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
                <form action="">
                    <div class="form-group">
                        <!-- <label class="text-dark">Nama</label> -->
                        <input type="text" class="form-control form-lg form-rounded" placeholder="Masukkan Nama Kamu" style="border-radius: 1.5em;">
                    </div>
                    <div class="form-group">
                        <!-- <label class="text-dark">Email address</label> -->
                        <input type="email" class="form-control form-lg form-rounded" placeholder="Masukkan Email" style="border-radius: 1.5em;">
                    </div>
                    <div class="form-group">
                        <!-- <label class="text-dark">Password</label> -->
                        <input type="password" class="form-control form-lg form-rounded" placeholder="Masukkan Password" style="border-radius: 1.5em">
                    </div>
                    <div class="form-group">
                        <!-- <label class="text-dark">Konfirmasi Password</label> -->
                        <input type="password" class="form-control form-lg form-rounded" placeholder="Masukkan Konfirmasi Password" style="border-radius: 1.5em">
                    </div>

                    <input type="submit" class="btn btn-md btn-block bg-primary mt-2" style="border-radius: 1.5em;" value="Daftar Sekarang">
                </form>

                <!-- <h4 class="mt-2 text-center"><a href="" class="text-primary">Lupa Password ?</a></h4> -->
                <h4 class="mt-5 text-center">Sudah punya akun ?<a href="<?= base_url('auth') ?>" class="text-warning">Login Sekarang</a></h4>

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