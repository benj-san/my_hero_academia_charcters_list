<?php


class Autoloader
{
    static function register(){
        spl_autoload_register("Autoloader::load");
    }

    static function load($className){
        require '../src/class/'.$className.'.php';
    }
}