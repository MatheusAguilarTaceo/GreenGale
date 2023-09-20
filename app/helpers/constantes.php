<?php
define('CONTROLLER_PATH', "app\\controllers\\"); 
define('ROOT', dirname(__FILE__, 3));
define('VIEWS', ROOT.'/app/views/');
define('PUBLIC_HTML', '/'.explode('/', $_SERVER['REQUEST_URI'])[1].'/'.'public_html/');
define('IMGS', PUBLIC_HTML.'assets/img/');
define('CSS', PUBLIC_HTML.'css/styles.css');
define('JS', PUBLIC_HTML.'script/index.js');
define('LOGGED', 'LOGGED');