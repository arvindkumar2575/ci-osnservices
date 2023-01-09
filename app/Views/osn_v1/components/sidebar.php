<?php
// $videoListTitles = array_keys($videoList);
// // echo '<pre>'; print_r($videoListTitles);die;
?>
<div class="sidebar">
    <nav class="navbar bg-light navbar-light">
        <a href="<?= base_url('excel-play') ?>" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Excel Play</h3>
        </a>

        <?php
        if(isset($user)){
        ?>
        <a href="<?= base_url('dashboard') ?>" class="navbar-brand mx-4 mb-3">
            <span class="text-dark">My Dashboard</span>
        </a>
        <?php
        }
        ?>

        <div class="navbar-nav w-100">
            <!-- <a href="<?=base_url("dashboard")?>" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>My Dashboard</a> -->
            
            <?php
            foreach ($videoList as $key => $value) {
                if(count($value['videos'])<1){

                }else{
                ?>
                <div class="dropdown-sidebar">
                    <div class="nav-link-sb dropdown-sidebar-item pointer"><i class="fa fa-laptop me-2"></i><?=$value['name']?></div>
                    <div class="dropdown-sidebar-menu bg-transparent border-0 pointer">
                        <?php
                        foreach ($value['videos'] as $key1 => $value1) {
                        ?>
                            <div data-id="<?=$value1['url']?>" class="nav-link-sb dropdown-sidebar-menu-item pointer video-url-link"><i class="fa fa-play fa-solid me-2"></i><?=$value1['title']?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                }
            }
            ?>
            
            
            
            
        </div>
    </nav>
</div>