<?php

class FroggyController {
	public function autoload(){
        $dir = glob('app/Models/*.php');
		foreach ($dir as $key) {
			require $key;
		}
    }
}