<?php
namespace Core\Classes\Util;

// dates utility methods

class MOW_Utils_Date
{    
    public static function get_date_as_mysql_datetime()
    {
        // to do : check parameters
        
        return date("Y-m-d H:i:s");
    }
}