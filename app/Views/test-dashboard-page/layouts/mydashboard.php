<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('test-dashboard-page/components/head') ?>
</head>

<body class="sb-nav-fixed">

    <?= view('test-dashboard-page/components/topnav') ?>

    <div id="layoutSidenav">
        <?= view('test-dashboard-page/components/leftsidebar') ?>
        <div id="layoutSidenav_content">
            <main>
                <?= $this->renderSection("content"); ?>
            </main>
            <?= view('test-dashboard-page/components/footer') ?>
        </div>
    </div>

    
    <script>
        let baseURL = "<?= base_url()?>"
        let crmURL = "<?= base_url('crm')?>"
    </script>
    <script src="<?= base_url("assets/test-dashboard-page/js/bootstrap.min.js")?>" crossorigin="anonymous"></script>
    <script src="<?= base_url("assets/test-dashboard-page/js/jquery.js") ?>"></script>
    <script src="<?= base_url("assets/test-dashboard-page/js/common.js") ?>"></script>
    <script src="<?= base_url("assets/test-dashboard-page/js/app.js") ?>"></script>
</body>

</html>