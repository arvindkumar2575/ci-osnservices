<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>OSN Services</title>

    <link rel="canonical" href="<?=base_url()?>">

    <link href="<?= base_url('assets/common/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= base_url() ?>">OSN Services</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('about-us') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('contact-us') ?>">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="intro-header">
            <div class="container">
                <div class="intro-message">
                    <h1>Contact Us</h1>
                    <h5>Fill below forms as per your reason of contact.</h5>
                    <hr class="intro-divider">
                </div>
            </div>
        </div>

        <?= view('landing-pages/lp-osnservices/contact-form') ?>


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </main>


    <script src="<?=base_url('assets/common/js/bootstrap.bundle.min.js')?>"></script>


</body>

</html>