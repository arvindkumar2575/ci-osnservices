<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <h3 class="text-primary">
        <a href="<?=base_url('/dashboard')?>" class="flex-shrink-0 nav-link">
            My Dashboard
        </a>
    </h3>
    <div class="navbar-nav align-items-center ms-auto">
        <?php
        if (ADMIN_PANEL && isset($user['user_type']) && $user['user_type']=='admin') {
            if(strpos(current_url(),'admin')){
            ?>
            <div class="nav-item navb-btn">
                <a href="<?=base_url('/dashboard')?>" class="dropdown-item">Dashboard</a>
            </div>
            <?php
            }else{
            ?>
            <div class="nav-item navb-btn">
                <a href="<?=base_url('/admin')?>" class="dropdown-item">Admin Panel</a>
            </div>
            <?php
            }
        }
        ?>
        
        <div class="nav-item navb-btn">
            <a href="<?=base_url('/')?>" class="dropdown-item">Back to Website</a>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="<?=base_url('/assets/images/avatar-img.png')?>" alt="" style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex"><?=ucwords($user['first_name']).' '.ucwords($user['last_name'])?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <?php /* <!-- <a href="<?=base_url('/dashboard/profile')?>" class="dropdown-item">My Profile</a> -->
                <a href="<?=base_url('/dashboard/settings')?>" class="dropdown-item">Settings</a> */?>
                <a href="<?=base_url('/logout')?>" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>