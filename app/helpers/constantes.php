<?php
define('CONTROLLER_PATH', "app\\controllers\\"); 
define('ROOT', dirname(__FILE__, 3));
define('VIEWS', ROOT.'/app/views/');
define('PUBLIC_HTML', '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/'.'public_html/');
define('IMGS', 'assets/img/');
define('HEADER', 'css/header.css');
define('CSS', 'css/');
define('FOOTER', 'css/footer.css');
define('JS', 'script/index.js');
define('LOGGED', 'LOGGED');