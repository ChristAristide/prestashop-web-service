<?php
namespace Core\Classes\Util;

// array manipulation and test on array

class MOW_Utils_Array
{    
    public static function get_reindexed_array( $arr )
    {
        // to do : check parameters
        
        return array_values( $arr );
    }
}