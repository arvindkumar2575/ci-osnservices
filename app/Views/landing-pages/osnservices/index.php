<?= view(OSNSERVICES_VIEWPATH . '/components/head') ?>
<?= view(OSNSERVICES_VIEWPATH . '/components/navbar') ?>

<?= view(OSNSERVICES_VIEWPATH . '/components/image-carousel') ?>

<?php
if (isset($excel_play_config) && !empty($excel_play_config) && $excel_play_config == 'true') {
    echo view(OSNSERVICES_VIEWPATH . '/components/product-section');
}
?>

<?= view(OSNSERVICES_VIEWPATH . '/components/features') ?>

<?= view(OSNSERVICES_VIEWPATH . '/components/footer') ?>

