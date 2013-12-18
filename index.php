<?php

$src = glob('froggy/*/*.php');
foreach ($src as $key) {
	require $key;
}

$model = glob('app/Models/*.php');
foreach ($model as $key) {
	require $key;
}

$config = glob('app/Controllers/*.php');
foreach ($config as $key) {
	require $key;
}

$app = new Bootstrap();
