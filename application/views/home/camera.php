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
    <div id="appCapsule" class="pb-0">



    </div>

    <div class="wallet-card mt-2" style="height: 100vh;">
        <!-- Balance -->
        <div class="balance">
            <div class="left">
                <h2 class="text-primary">Camera</h2>
                <span class=" text-primary">Foto yang bagus ya</span>
                <button id="webcamon">start camera</button>
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


            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12">
                    <div class="container">
                        <video id="webcam" autoplay playsinline style="width:100%;height:50vh"></video>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 mx-auto">
                        <a href="" class="btn btn-danger btn-lg">Take Photo</a>
                    </div>
                    <div class="col-xs-6 mx-auto"><a href="" class="btn btn-primary btn-lg">Flip Camera</a></div>
                </div>
                <canvas id="canvas" class="d-none">
                </canvas>
            </div>




        </div>
        <!-- * Wallet Footer -->
    </div>


    <!-- app footer -->

    <!-- * app footer -->


    <!-- * App Capsule -->


    <!-- App Bottom Menu -->

    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->