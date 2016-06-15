<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 15.06.2016
 * Time: 21:30
 */

class createContent{
    private static $instance = null;

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function replaceMarkers($markers, $origContent){
        $content = $origContent;

        foreach ($markers as $key => $value) {
            $content = str_replace('###'.$key.'###', $value, $content);
        }

        $content .= " Test";

        return $content;
    }

    /*public function getContent(){

    }*/
} 