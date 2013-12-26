<?php

require 'app/config/config.php';

$src = Configuration::$providers;
foreach ($src as $key) {
	require $key;
}

$model = glob('app/Models/*.php');
foreach ($model as $key) {
	require $key;
}

$app = new Bootstrap();
