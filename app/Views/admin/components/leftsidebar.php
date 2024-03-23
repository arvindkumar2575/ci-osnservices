<div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link <?=$page=='admin'?'active':''?>" href="<?=base_url("/admin")?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Admin
                    </a>
                    <a class="nav-link <?=$page=='excelplay'?'active':''?>" href="<?=base_url("/excelplay")?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        ExcelPlay
                    </a>
                </div>
            </div>
            <?php /*<div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>*/ ?>
        </nav>
    </div>