<?php
namespace Core\Classes\Util;

// Constants utilities

class MOW_Utils_Const
{   
    public static function get_is_set_or( $const, $alt_value = '' )
    {
        return isset( $const ) ? $const : $alt_value;
    }
}