<?php
namespace Core\Classes\Util;

require_once( __DIR__ . '/mow-checker-vars.class.php' );
require_once( __DIR__ . '/mow-checker-arrays.class.php' );
require_once( __DIR__ . '/mow-checker-func.class.php' );

class MOW_Checker
{    
    public static function variables()
    {
        return new MOW_Checker_Vars();
    }
    
    public static function arrays()
    {
        return new MOW_Checker_Arrays();
    }
    
    public static function functions()
    {
        return new MOW_Checker_Func();
    }
    
    // forms checker not yet implemented
//    public static function forms()
//    {
//        return new MOW_Checker_Forms();
//    }
    
}