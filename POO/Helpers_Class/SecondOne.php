<?php
class Html{
    public function doctype(){
        return "<!DOCTYPE html>";
    }
    public function htmlStart($lang){
        return '<html lang="'.$lang.'">';
    }
    public function headStart(){
        return '<head>';
    }
    public function title($title){
        return '<title>'.$title.'</title>';
    }
    public function metaDesc($descr){
        return '<meta name="description" content="'.$descr.'">';
    }
    public function metaCharset($charset){
        return  '<meta charset="'.$charset.'">';
    }
    public function style($css){
        return '<link rel="stylesheet" href="'.$css.'">';
    }
    public function headEnd(){
        return '</head>';
    }
    public function bodyStart(){
        return '<body>';
    }
    public function setImg($imglink,$alt){
        return '<img src="'.$imglink.'" alt="'.$alt.'">';
    }
    public function setLink($link,$namelink){
        return '<a href="'.$link.'">'.$namelink.'</a>';
    }
    public function bodyEnd(){
        return '</body>';
    }
    public function setScript($jslink){
        return '<script src="'.$jslink.'"></script>';
    }
    public function htmlClose(){
        return '</html>';
    }
}