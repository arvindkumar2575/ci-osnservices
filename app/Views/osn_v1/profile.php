<?= view(OSN_VIEWPATH . '/components/head') ?>
<?= view(OSN_VIEWPATH . '/components/navbar') ?>

<div>This is Profile Page</div>
<div><?=$user['username']?></div>
<div><?=$user['first_name'].' '.$user['last_name']?></div>

<?= view(OSN_VIEWPATH . '/components/footer') ?>