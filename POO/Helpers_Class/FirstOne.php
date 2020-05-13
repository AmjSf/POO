<?php
class Form{
    private $stored;

    public function __construct($stored = []){
        $this->stored = $stored;
    }

    private function getVal($index){
        return isset($this->stored[$index]) ? $this->stored[$index] : null ; 
    }

    private function setSelected($index,$value){
        if(isset($this->stored[$index])){
            if($this->stored[$index] == $value){
                return 'selected="selected"';
            }else{
                return '';
            }
        }else{
            return '';
        }
    }

    private function checkRadio($index,$value){
        if(isset($this->stored[$index])){
            if($this->stored[$index] == $value){
                return 'checked';
            }else{
                return '';
            }
        }else{
            return '';
        }
    }

    private function getCheckboxChecked($index,$value){
        if(isset($this->stored[$index])){
            if(in_array($value,$this->stored[$index])){
                return 'checked';
            }else{
                return '';
            }
        }else{
            return '';
        }
    }

    public function formStart($action,$method,$class){
        return '<form action="'.$action.'" method="'.$method.'" class="'.$class.'">';
    }

    public function inputText($name){
        return '<input type="text" name="'.$name.'" value="'.$this->getVal($name).'">';
    }

    public function inputSelect($name,$options){
        $res = "";
        $res .= '<select name="'.$name.'">';
        foreach($options as $i => $value){
            $res .= '<option '.$this->getSelected($name,$value).'>'.$value.'</option>';
        }
        $res .= '</select>';
        return $res;
    }

    public function submitButton(){
        return '<button type="submit">Send</button>'; 
    }

    public function inputTextArea($name){
        return '<textarea name="'.$name.'" >'.$this->getVal($name).'</textarea>';
    }

    public function inputRadio($name,$options){
        $res = "";
        foreach($options as $i => $value){
            $res .= '<label for="'.$name.'">'.$value.'</label>';
            $res .= '<input type="radio" name="'.$name.'" id="'.$value.'" value="'.$value.'" '.$this->getRadioChecked($name,$value).'>';
        }
        return $res;
    }

    public function inputCheckbox($name,$options){
        $res = "";
        foreach($options as $i => $value){
            $res .= '<label for="'.$value.'">'.$value.'</label>';
            $res .= '<input type="checkbox" name="'.$name.'[]" id="'.$value.'" value="'.$i.'" '.$this->getCheckboxChecked($name,strval($i)).'>';
        }
        return $res;
    }
    
    public function formClose(){
        return '</form>';
    }
}