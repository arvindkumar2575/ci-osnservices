<!DOCTYPE html>
<html lang="en">

<head>
    <?= view(MYDASHBOARD_VIEW.'/components/head') ?>
</head>

<body class="sb-nav-fixed">

    <?= view(MYDASHBOARD_VIEW.'/components/topnav') ?>

    <div id="layoutSidenav">
        <?= view(MYDASHBOARD_VIEW.'/components/leftsidebar') ?>
        <div id="layoutSidenav_content">
            <main>
                <?= $this->renderSection("content"); ?>
            </main>
            <?= view(MYDASHBOARD_VIEW.'/components/footer') ?>
        </div>
    </div>

    
    <script>
        let baseURL = "<?= base_url()?>"
        let mydashboardURL = "<?= base_url('mydashboard')?>"
    </script>
    <script src="<?= base_url(COMMON_ASSETS."/js/bootstrap.min.js")?>" crossorigin="anonymous"></script>
    <script src="<?= base_url(COMMON_ASSETS."/js/jquery.min.js") ?>"></script>
    <script src="<?= base_url(COMMON_ASSETS."/js/common.js") ?>"></script>
    <script src="<?= base_url(MYDASHBOARD_ASSETS."/js/mydashboard.js") ?>"></script>
</body>

</html>