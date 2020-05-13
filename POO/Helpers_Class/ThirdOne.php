<?php
class Validator{
    public function evalText($text){
        if(preg_match('/[^A-Za-z- ]/',$text) or $text == ''){
            return false;
        }
        return true;
    }

    public function evalInteger($number){
        if(preg_match('/[^0-9]/',$number) or $number == ''){
            return false;
        }
        return true;
    }

    public function evalEmail($email){
        if( !preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9.-])*@([a-zA-Z0-9-])+([a-zA-Z0-9.-]+)+$/", $email)){
            return false;
        }
        return true;
    }

    public function evalFloat($float){
        if(preg_match('/[^0-9,.]/',$float) || $float == ''){
            return false;
        }
        return true;
    }

    public function evalImage($img,$extentionArray,$sizeInMB,$maxwidth,$maxheight){
        $fileinfo = @getimgsize($img['tmp_name']);
        $width = $fileinfo[0];
        $height = $fileinfo[1];
        if(! file_exists($img['tmp_name'])){
            return false;
        }
        if(! in_array(pathinfo($img['name'], PATHINFO_EXTENSION),$extentionArray)){
            return false;
        }
        if($img['size'] > ($sizeInMB1000000)){
            return false;
        }
        if($width > $maxwidth || $height > $maxheight){
            return false;
        }
        //Everythings ok
        return true;
    }
}