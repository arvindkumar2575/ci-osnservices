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
                        <a class="nav-link <?=$page=='home'?'active':''?>" aria-current="page" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$page=='about-us'?'active':''?>" href="<?= base_url('about-us') ?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=$page=='contact-us'?'active':''?>" href="<?= base_url('contact-us') ?>">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>