<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class SiteConfigs extends BaseConfig
{
    public $siteName  = 'OSN Services';
    public $siteEmail = 'osnservices.in@gmail.com';
    // ...

    // common css 
    public $css = array(
        'bootstrap'=>COMMON_ASSETS.'/css/bootstrap.min.css',
    );

    // osn site css files
    public $css_osn = array(
        OSNSERVICES_ASSETS.'/css/n'
    );
}