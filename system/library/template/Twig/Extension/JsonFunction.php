<?php

class Twig_Extension_JsonFunction extends Twig_Extension {
    public function getFunctions(){
        return array(
            new Twig_SimpleFunction('json_parser','jsonFunction'),
        );
    }
    public function getName(){
        return 'json_parser';
    }
}

function jsonFunction($array){
    $named_array = array("kitten" => $array);
    $json = json_encode($named_array,JSON_PRETTY_PRINT);
    return $json;
}
?>