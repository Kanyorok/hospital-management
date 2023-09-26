<?php

    defined('DS') ? null: define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS. 'newv'.DS.'htdocs'.DS.'hospital-management');
    defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
    defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

    //load dbconn file
    require_once(INC_PATH.DS."dbconn.php");

    //Include classes
    require_once(CORE_PATH.DS."patient.php");

