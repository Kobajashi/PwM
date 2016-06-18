<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 17.06.2016
 * Time: 18:13
 */

//TODO: Get this shit DONE
class parentClass {
    private static $instance = null;

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
}