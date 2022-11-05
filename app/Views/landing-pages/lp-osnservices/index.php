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

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="bg-header-carousel-img" src="<?=base_url('/assets/images/intro-bg.jpg')?>" alt="income-tax-filling"/>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>OSN SERVICES</h1>
                            <p>Where You Find Easy & Most Usable Digital Services</p>
                            <p><a class="btn btn-lg btn-primary" href="<?=base_url('contact-us')?>">Fill Form</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="bg-header-carousel-img" src="<?=base_url('/assets/images/income-tax-filling.png')?>" alt="income-tax-filling"/>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Income Tax Filing</h1>
                            <p>Filing your income tax return with our affordable price</p>
                            <p><a class="btn btn-lg btn-primary" href="<?=base_url('contact-us?q=itr')?>">ITR Filing</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="bg-header-carousel-img" src="<?=base_url('/assets/images/income-tax-filling.png')?>" alt="income-tax-filling"/>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Dashboard Designing</h1>
                            <p>Convert your raw/excel/csv data into productive dashboard</p>
                            <p><a class="btn btn-lg btn-primary" href="<?=base_url('contact-us?q=dashboard')?>">Place order</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

        <!-- START THE FEATURETTES -->

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">ITR Filing</h2>
                    <p class="lead">Filing your Income Tax Return with OSN Services, give you the best & discount rates from market price. Amazing Cashback and redeem your discount on referral customers.</p>
                    <p>Write your query <a href="<?=base_url('contact-us')?>">here</a> to know more our services.</p>
                </div>
                <div class="col-md-5">
                    <img class="tile-img" src="<?=base_url('/assets/images/firstpage-img-3.png')?>" alt="income-tax-filling"/>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">Dashboard Designing</h2>
                    <p class="lead">Analyse your business Ups & Down, Profit & Loss by our Dashboard Product specially design for business purpose.</p>
                    <p>Write your query <a href="<?=base_url('contact-us')?>">here</a> to know more our services.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="tile-img" src="<?=base_url('/assets/images/firstpage-img-1.png')?>" alt="income-tax-filling"/>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">Accounting Work</h2>
                    <p class="lead">We are here to helps you in your Business by providing our Accounting Tools specially for accounting & MIS related problem.</p>
                    <p>Write your query <a href="<?=base_url('contact-us')?>">here</a> to know more our services.</p>
                </div>
                <div class="col-md-5">
                    <img class="tile-img" src="<?=base_url('/assets/images/firstpage-img-2.png')?>" alt="income-tax-filling"/>
                </div>
            </div>

            <hr class="featurette-divider">
            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2015–2022 Company, Inc. &middot; </p>
        </footer>
    </main>


    <script src="<?=base_url('assets/common/js/bootstrap.bundle.min.js')?>"></script>


</body>

</html>