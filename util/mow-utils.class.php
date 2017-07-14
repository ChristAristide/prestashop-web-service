<?php
namespace Core\Classes\Util;

require_once( __DIR__ . '/mow-utils-array.class.php' );
require_once( __DIR__ . '/mow-utils-class.class.php' );
require_once( __DIR__ . '/mow-utils-vars.class.php' );
require_once( __DIR__ . '/mow-utils-const.class.php' );
require_once( __DIR__ . '/mow-utils-date.class.php' );
require_once( __DIR__ . '/mow-utils-func.class.php' );
require_once( __DIR__ . '/mow-utils-html.class.php' );
require_once( __DIR__ . '/mow-printer.class.php' );
require_once( __DIR__ . '/mow-checker.class.php' );

use Core\Classes\Util\MOW_Checker as MC;

class MOW_Utils
{
    
    public static function arrays()
    {
        return new MOW_Utils_Array();
    }
    
    public static function classes()
    {
        return new MOW_Utils_Class();
    }
    
    public static function variables()
    {
        return new MOW_Utils_Vars();
    }
    
    public static function constants()
    {
        return new MOW_Utils_Const();
    }
    
    public static function dates()
    {
        return new MOW_Utils_Date();
    }
    
    public static function functions()
    {
        return new MOW_Utils_Func();
    }
    
    public static function html()
    {
        return new MOW_Utils_HTML();
    }
    
    public static function printing()
    {
        return new MOW_Printer();
    }
    
    public static function check()
    {
        return new MOW_Checker();
    }
    
    /*------- general utility functions ---------*/
    
    
    public static function get_types_validation_result( $values, $types )
    {
        $valid_types = [ 'any', 'int', 'integer', 'long', 'float', 'double', 'real', 'numeric', 'string', 'scalar', 'bool', 'array', 'object', 'ressource' ];
        
        if( empty( $values ) )
        {
            trigger_error( "Empty value given as \$values argument" );
            return;
        }
        if( empty( $types ) )
        {
            trigger_error( "Empty value given as \$types argument" );
            return;
        }   
        if( !is_array( $values ) )
        {
            trigger_error( "Expecting array as \$values argument" );
            return;
        }
        if( MC::arrays()->is_associative( $values ) )
        {
            trigger_error( "Expecting indexed array as \$values argument" );
            return;
        }
        if( !is_array( $types ) )
        {
            trigger_error( "Expecting array as \$types argument" );
            return;
        }
        if( MC::arrays()->is_associative( $types ) )
        {
            trigger_error( "Expecting indexed array as \$types argument" );
            return;
        }
        if( count( $types ) < count( $values )  )
        {
            trigger_error( "types list given is smaller than nb of values to test" );
            return;
        }

        $do_validate_type = function( $type ) use ( $valid_types )
        {
            if( !in_array( $type, $valid_types ) )
            {
                trigger_error( "type specified in types list is invalid" );
                return;
            }
        };
        
        // run through $types array to :
        //  - check if type is given as string
        //  - explode if multiple types / value
        //  - check if type is valid
        foreach( $types as &$type )
        {
            // check if type is given as string
            if( !is_string( $type ) )
            {
                trigger_error( "Expecting type value to be a string" );
                return;
            }
            // explode if multipe types for a value
            if ( strpos($type, '|') !== false ) {
                $type = explode( '|', $type );
            }
            // check if type is valid
            if( is_array( $type ) )
            {
                foreach( $type as $t )
                {
                    $do_validate_type( $t );
                }
            } else
            {
                $do_validate_type( $type );
            }
        }
        
        $res = [
            "valid" => true,
            "index" => -1
        ];
        
        $do_validate_value_type = function( $value, $type, $idx ) use( &$res )
        {
            if( 'any' === $type )
            {
                return;
            }

            $check_func_name = 'is_' . $type;

            if ( !$check_func_name( $value ) )
            {
                $res[ "valid" ] = false;
                $res[ "index" ] = $idx + 1;
            }
        };
        
        // check parameters types
        foreach ( $values as $idx => $value )
        {
            $value_types = $types[ $idx ];
            
            if ( is_array( $value_types ) )
            {
                $scrore = 0;
                
                foreach( $value_types as $value_type )
                {
                    //$do_validate_value_type( $value, $value_type, $idx );
                    
                    if ( 'any' === $type )
                    {
                        return;
                    }

                    $check_func_name = 'is_' . $type;

                    if ( !$check_func_name( $value ) )
                    {
                        $res[ "valid" ] = false;
                        $res[ "index" ] = $idx + 1;
                    }
                }
            } else
            {
                $do_validate_value_type( $value, $value_types, $idx );
            }
        }
        
        return $res;
    }
    
}