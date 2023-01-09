<?= view(OSN_VIEWPATH . '/components/head') ?>
<?= view(OSN_VIEWPATH . '/components/navbar') ?>

<div>This is main Dashboard</div>
<a href="<?=base_url("dashboard/excel-play")?>">Excel Play</a>

<?php
$usersession = session('usersession');
if($usersession['id']=='1' && isset($user) && isset($user['user_type']) && !empty($user['user_type']) && $user['user_type']=='admin'){
    echo view(OSN_VIEWPATH . '/components/add-video-form');
}
?>


<?= view(OSN_VIEWPATH . '/components/footer') ?>