<?php

class Upload {

	public static function make($files,$destination,$return=null,$rename=null){
		$filename = $files['name'];
		move_uploaded_file($files['tmp_name'],"$destination/".$filename);
		if (!is_null($rename)) {
            $tipe=explode(".",$filename);
            $rename=$rename.".".end($tipe);
            rename("$destination/".$filename,"$destination/".$rename);
        }

        if(!is_null($return) && !is_null($rename)){
        	return "destination/$rename";
        }else{
            return "destination/$filename";
        }

        return true;
	}
}