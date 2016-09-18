<?php
include 'config.inc.real.php';

/* Ensure we got the environment */
$vars = array(
    'PMA_ARBITRARY',
    'PMA_HOST',
    'PMA_HOSTS',
    'PMA_SESSION_TIMEOUT',
    'PMA_ABSOLUTE_URI'

);
foreach ($vars as $var) {
    if (!isset($_ENV[$var]) && getenv($var)) {
        $_ENV[$var] = getenv($var);
    }
}

$hosts = isset($_ENV['PMA_HOSTS']) ? $_ENV['PMA_HOSTS'] : (isset($_ENV['PMA_HOST']) ? $_ENV['PMA_HOST'] : 'mysql');
foreach (explode(',', $hosts) as $index => $host) {
	$config = &$cfg['Servers'][$index + 1];
	$host   = trim($host);
	if (strpos($host, ':') !== false) {
		list($host, $port) = explode(':', $host);
		$config['port'] = $port;
	}
	$config['host']            = $host;
	$config['AllowNoPassword'] = true;
}

if (isset($_ENV['PMA_ARBITRARY'])) {
	$cfg['AllowArbitraryServer'] = (bool)$_ENV['PMA_ARBITRARY'];
}

if (isset($_ENV['PMA_ABSOLUTE_URI'])) {
	$cfg['PmaAbsoluteUri'] = $_ENV['PMA_ABSOLUTE_URI'];
}

if (isset($_ENV['PMA_SESSION_TIMEOUT'])) {
	$cfg['LoginCookieValidity'] = $_ENV['PMA_SESSION_TIMEOUT'];
	ini_set('session.gc_maxlifetime', $_ENV['PMA_SESSION_TIMEOUT']);
}


