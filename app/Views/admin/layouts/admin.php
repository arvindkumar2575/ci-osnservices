<!DOCTYPE html>
<html lang="en">

<head>
    <?= view(ADMIN_VIEW.'/components/head') ?>
</head>

<body class="sb-nav-fixed">

    <?= view(ADMIN_VIEW.'/components/topnav') ?>

    <div id="layoutSidenav">
        <?= view(ADMIN_VIEW.'/components/leftsidebar') ?>
        <div id="layoutSidenav_content">
            <main>
                <?= $this->renderSection("content"); ?>
            </main>
            <?= view(ADMIN_VIEW.'/components/footer') ?>
        </div>
    </div>

    
    <script>
        let baseURL = "<?= base_url()?>"
        let adminURL = "<?= base_url('admin')?>"
    </script>
    <script src="<?= base_url(COMMON_ASSETS."/js/bootstrap.min.js")?>" crossorigin="anonymous"></script>
    <script src="<?= base_url(COMMON_ASSETS."/js/jquery.js") ?>"></script>
    <script src="<?= base_url(COMMON_ASSETS."/js/common.js") ?>"></script>
    <script src="<?= base_url(ADMIN_ASSETS."/js/admin.js") ?>"></script>
</body>

</html>