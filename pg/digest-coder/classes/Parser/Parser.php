<?php
/**
 * Created by PhpStorm.
 * User: R.Yaroma
 * Date: 25.04.14
 * Time: 12:17
 */

class Parser {

    public $parsed_text = array();


    function __construct($text){

    }

    public function parseByPatterns($text, $name, $pattern, $global=false){
        if($global){
            if(!preg_match_all($pattern, $text, $this->parsed_text[$name]))
                throw new Exception('Не удалось найти совпадения в шаблоне '.$name);
        } else {
            if(!preg_match($pattern, $text, $this->parsed_text[$name]))
                throw new Exception('Не удалось найти совпадение в шаблоне '.$name);
        }
    }

    public function parseText($text, $patterns, $global=false){
        $this->parsed_text = array();
        foreach($patterns as $name => $pattern)
            $this->parseByPatterns($text,$name,$pattern, $global);
    }

    public function splitText($delimiter, $text, $reg_exp=false){
        $this->parsed_text = array();
        if(!$reg_exp)
            $this->parsed_text = explode($delimiter, $text);
        else
            $this->parsed_text = preg_split($delimiter, $text, -1, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
    }

    public function deleteFromParsedText($needle, $reg_exp=false){
        if(!$reg_exp)
            foreach($this->parsed_text as $key => $item){
                if($item == $needle)
                    unset($this->parsed_text[$key]);
            }
        else
            foreach($this->parsed_text as $key => $item){
                if(preg_match($needle, $item))
                    unset($this->parsed_text[$key]);
            }
    }

    public function renameParsedTextItem($old_name,$new_name){
        foreach($this->parsed_text as $key => $item)
            if($key == $old_name) {
                $this->parsed_text[$new_name] = $this->parsed_text[$old_name];
                unset($this->parsed_text[$old_name]);
            }
    }

    public function getParsedText(){
        return $this->parsed_text;
    }

}