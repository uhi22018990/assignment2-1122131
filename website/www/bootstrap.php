<?php

declare(strict_types=1);

ini_set('display_errors', 'true');
ini_set('track_errors', 'true');
ini_set('display_startup_errors', 'true');
error_reporting(E_ALL);

define('ME', microtime(true));
define('SESTO_MEM_START', memory_get_usage(true));

/* setup the system dir */
$sys_dir = realpath(__DIR__ . '/..');

require $sys_dir . '/lib/sesto/initme.php';
require $sys_dir . '/lib/bella/initme.php';
require BELLA_DIR . '/engine.php';
require SESTO_DIR . '/app/run.php';

$error = '';
sesto_app_run($sys_dir, 'bella_engine', [], '', false, $error);
