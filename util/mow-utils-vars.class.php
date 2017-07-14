<?php
namespace Core\Classes\Util;

// Variables utilities

class MOW_Utils_Vars
{   
    public static function get_is_set_or( &$var, $alt_value = '' )
    {
        return isset( $var ) ? $var : $alt_value;
    }
    
    // to do : check why reference ... ?
    public static function get_is_equal_set_or( &$var, $compare_value, $set_value, $alt_value = '' )
    {
        //$res = ( $var == $compare_value ) ? $set_value : $alt_value;
        //echo $res;
        return ( $var == $compare_value ) ? $set_value : $alt_value;
    }
    
    public static function get_dump_string( $value )
    {
        ob_start();
        var_dump( $value );
        return ob_get_clean();
    }
}