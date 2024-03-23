<div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link <?=$page=='mydashboard'?'active':''?>" href="<?=base_url("/mydashboard")?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link <?=$page=='excelplay'?'active':''?>" href="<?=base_url("/excelplay")?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        ExcelPlay
                    </a>
                    <?php /* 
                    <a class="nav-link <?=$type==1?'active':''?>" href="<?=base_url("/crm/visitor-visa")?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Visitor Visa
                    </a>
                    <a class="nav-link <?=$type==2?'active':''?>" href="<?=base_url("/crm/study-visa")?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Study Visa
                    </a>
                    <a class="nav-link <?=$type==3?'active':''?>" href="<?=base_url("/crm/work-visa")?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Work Visa
                    </a> 
                    */ ?>
                </div>
            </div>
            <?php /*<div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Start Bootstrap
            </div>*/ ?>
        </nav>
    </div>