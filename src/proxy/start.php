<?php

declare(strict_types=1);

namespace proxy {

	use proxy\Config;

	const COMPOSER = 'vendor/autoload.php';

	if(is_file(COMPOSER)){
		/** @noinspection PhpIncludeInspection */
		require_once(COMPOSER);
	}else{
		echo "[-] Composer autoloader not found." . PHP_EOL;
		exit(1);
	}
	
	//change the ip in server.yml to your ipv4
	$config = new Config("server.yml", Config::YAML, [
		'server-ip' => '127.0.0.1',
		'server-port' => 19132,
		'interface' => '0.0.0.0',
		'bind-port' => 19132,
		'without-plugins' => false
	]);
	$settings = $config->getAll();
	new Proxy($settings['server-ip'], $settings['server-port'], $settings['interface'], $settings['bind-port'], $settings['without-plugins']);
}
