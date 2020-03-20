<?php

// /home/username/public_html
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', '/home/zlatkom/public_html/partizan-news.in.rs/admin');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS .'admin' . DS . 'includes');

require_once('functions.php');
require_once('new_config.php');
require_once('database.php');
require_once('user.php');
require_once('session.php');
require_once('helper.php');
require_once('category.php');
require_once('news.php');
require_once('helper.php');
require_once('comment.php');
require_once('ads.php');

?>