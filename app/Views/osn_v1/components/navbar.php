<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="<?=base_url('/dashboard')?>" class="sidebar-toggler flex-shrink-0 nav-link">
        <h3 class="text-primary">My Dashboard</h3>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="<?=base_url('/assets/images/avatar-img.png')?>" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex"><?=$user['first_name'].' '.$user['last_name']?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="<?=base_url('/dashboard/profile')?>" class="dropdown-item">My Profile</a>
                <a href="<?=base_url('/dashboard/settings')?>" class="dropdown-item">Settings</a>
                <a href="<?=base_url('/logout')?>" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>