<?php
/**
 * APPLICATION FOLDER PATH
 */
$app_path = realpath(__DIR__ . '/../../application');
define('APP_PATH', $app_path);

/**
 * FRAME FOLDER PATH
 */
$frame_path = realpath(__DIR__ . '/../../framework');
define('FRAME_PATH', $frame_path);

/**
 * SET PATH
 */
set_include_path(implode(PATH_SEPARATOR, array(
	$frame_path,
	$app_path
)));

/**
 * INIT FRAMEWORK
 */
include 'core/Core.php';
\core\Core::getInstance()->frameInit();
?>