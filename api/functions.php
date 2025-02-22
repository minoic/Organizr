<?php
// Set UTC timeone
date_default_timezone_set("UTC");
// Autoload frameworks
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
// Include all function and class files
foreach (glob(__DIR__ . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . '*.php') as $filename) {
	require_once $filename;
}
foreach (glob(__DIR__ . DIRECTORY_SEPARATOR . 'homepage' . DIRECTORY_SEPARATOR . '*.php') as $filename) {
	require_once $filename;
}
foreach (glob(__DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . '*.php') as $filename) {
	require_once $filename;
}
// Include all pages files
foreach (glob(__DIR__ . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . "*.php") as $filename) {
	require_once $filename;
}
// Include all custom pages files
if (file_exists(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'pages')) {
	foreach (glob(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . '*.php') as $filename) {
		require_once $filename;
	}
}

// Include all plugin files
$folder = __DIR__ . DIRECTORY_SEPARATOR . 'plugins';
$directoryIterator = new RecursiveDirectoryIterator($folder, FilesystemIterator::SKIP_DOTS);
$iteratorIterator = new RecursiveIteratorIterator($directoryIterator);
foreach ($iteratorIterator as $info) {
	if ($info->getFilename() == 'plugin.php' || strpos($info->getFilename(), 'page.php') !== false || $info->getFilename() == 'cron.php') {
		require_once $info->getPathname();
	}
}
// Include all custom plugin files
if (file_exists(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'plugins')) {
	$folder = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'plugins';
	$directoryIterator = new RecursiveDirectoryIterator($folder, FilesystemIterator::SKIP_DOTS);
	$iteratorIterator = new RecursiveIteratorIterator($directoryIterator);
	foreach ($iteratorIterator as $info) {
		if ($info->getFilename() == 'plugin.php' || strpos($info->getFilename(), 'page.php') !== false || $info->getFilename() == 'cron.php') {
			require_once $info->getPathname();
		}
	}
}