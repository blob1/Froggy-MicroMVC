<?php

class HelloController extends FroggyController {

	public function index(){
		$data['title'] = 'Welcome to Froggy Micro Framework ';
		$data['content'] = 'More information see link bellow';

		return View::make('hello/index',$data);
	}

}
