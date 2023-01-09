<?= view(OSN_COMPONENTS_VIEWPATH . '/head') ?>

<div>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div style="display: none!important;" id="spinner" class="bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <?= view(OSN_COMPONENTS_VIEWPATH . '/sidebar') ?>

        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0" style="margin: 0.5rem 0;">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="free-excel-heading">
                    <h4>Free Excel Videos</h4>
                </div>

            </nav>
            <!-- Navbar End -->
            
            <div class="container-fluid pt-4 px-4">
                <iframe class="video-iframe" width="100%" height="480" src="https://www.youtube.com/embed/B_mQENWeJtE" frameborder="0" allow="" allowfullscreen></iframe>
            </div>

           

            <?php /*
            <div>
                <video class="gdriveVideo" width="100%" height="500" preload="auto" controls controlsList="nodownload">
                    <source src="https://drive.google.com/uc?id=1X5xSYAxiK8btNeB9ZznJqBUkQNcF8_Bo" type='video/mp4'>
                </video>
            </div>
            */ ?>

        </div>
    </div>
</div>

<?= view(OSN_COMPONENTS_VIEWPATH . '/footer') ?>