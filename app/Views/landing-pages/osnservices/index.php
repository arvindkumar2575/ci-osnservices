<?= view(OSNSERVICES_VIEWPATH . '/components/head') ?>
<?= view(OSNSERVICES_VIEWPATH . '/components/navbar') ?>

<?= view(OSNSERVICES_VIEWPATH . '/components/image-carousel') ?>


<?php
if (isset($excel_play_config) && !empty($excel_play_config) && $excel_play_config == 'true') {
    echo view(OSNSERVICES_VIEWPATH . '/components/product-section');
}else if(isset($free_excel_play_config) && !empty($free_excel_play_config) && $free_excel_play_config == 'true'){ ?>
    <div class="alternate-white">
        <div class="container product content">
            <div class="row col-sm-12 product-cards">
                <div class="col-sm-12 product-card">
                    <div class="product-body">
                        <div class="first-sec">
                            <div class="product-details">
                                <div class="product-title"><a class="pa-redirect" href="<?= base_url('excel-play') ?>">Excel Play</a></div>
                                <div class="product-desc-video-list">
                                    <p>Free excel course videos</p>
                                    <span>Course contain all basic, intermediate & advance - step by step topicwise videos.</span>
                                    <!-- <div class="product-video-heading">Topics</div>
                                    <div class="product-video-dropdown">
                                        <div class="product-video-dropdown-menu">Basic Excel</div>
                                        <ul class="product-video-dropdown-menu-ul">
                                            <li>video 1</li>
                                            <li>video 2</li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                            <div class="product-img">
                                <img src="<?= base_url('assets/images/excel-icon.png') ?>">
                            </div>
                        </div>
                        <div class="product-bottom-sec">
                            <div class="product-price">
                                <div class="startsat">Starts at&nbsp;</div><span class="cr-plan">Free</span> <?php /*<span class="cr-rupees-symbol">₹</span class="cr-rupees">79<span>/mo</span> */ ?>
                            </div>
                            <div class="product-btn">
                                <a href="<?=base_url('register')?>"><button class="btn btn-orange btn-buy-now">Register</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
?>

<?= view(OSNSERVICES_VIEWPATH . '/components/features') ?>

<?= view(OSNSERVICES_VIEWPATH . '/components/footer') ?>

