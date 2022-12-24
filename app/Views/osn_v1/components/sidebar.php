<?php
$videoListTitles = array_keys($videoList);
// echo '<pre>'; print_r($videoListTitles);die;
?>
<div class="sidebar">
    <nav class="navbar bg-light navbar-light">
        <a href="<?= base_url('dashboard/excel-play') ?>" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Excel Play</h3>
        </a>

        <div class="navbar-nav w-100">
            <a href="<?=base_url("dashboard")?>" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>My Dashboard</a>
            <?php
            foreach ($videoListTitles as $key1 => $value1) {
            ?>
                <div class="dropdown-sidebar">
                    <div class="nav-link-sb dropdown-sidebar-item pointer"><i class="fa fa-laptop me-2"></i><?=$value1?></div>
                    <div class="dropdown-sidebar-menu bg-transparent border-0 pointer">
                        <?php
                        foreach ($videoList[$value1] as $key2 => $value2) {
                        ?>
                            <div data-id="<?=$value2?>" class="nav-link-sb dropdown-sidebar-menu-item pointer"><i class="fa fa-play fa-solid me-2"></i><?=$key2?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </nav>
</div>