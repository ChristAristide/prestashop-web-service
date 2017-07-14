<?php
namespace Core\Classes\Util;

// require common setup
require_once( __DIR__ . '/../../includes/setup.inc.php' );
//require_once( 'core/includes/classes-aliases.inc.php' );

class MOW_Printer
{   
    public static function e( $get_function, $params_array = [] )
    {
        if ( is_callable ($get_function) )
        {
            echo call_user_func_array( $get_function,  $params_array);
        }
    }
    
    public static function print_collection_in_pre( $collection, $label = '', $detailed = false )
    {
        if ( !is_array( $collection ) and !is_object( $collection ) )
        {
            trigger_error( "Expecting array or object as argument" );
            return;
        }
        if ( !is_string( $label ) )
        {
            trigger_error( "Expecting string as \$label argument" );
            return;
        }
        if ( !is_bool( $detailed ) )
        {
            trigger_error( "Expecting boolean as \$detailed argument" );
            return;
        }
        
        $result = ( $detailed === true )
            ? \MOW_Utils::variables()->get_dump_string( $collection )
            : print_r( $collection, true );
        
        if ( !empty( $label ) )
        {
            $label = \MOW_Utils::html()->get_wrap_bold( $label );
            $result = $label . ' : <br>' . $result;
        }
        
        echo \MOW_Utils::html()->get_wrap_pre( $result );
        
        return;
    }
    
    public static function get_value_formatted_for_output( $value, $label = '', $new_lines_before = 0, $new_lines_after = 0, $detailed = false )
    {        
        // output value
        $html = '';
        $invalid_value_types = [ 'resource', 'unknown type' ];
        $value_type = '';
        
        if ( empty( $value ) )
        {
            $html = '(empty)';
            goto end;
        }
        
        $value_type = gettype( $value );
        
        //echo "value_type : $value_type" . '<br>';
        
        // check if value type is invalid
        if ( in_array( $value, $invalid_value_types ) )
        {
            $html = '(invalid type)';
            goto end;
        }
        
        // if all ok, print specific result
        switch( $value_type )
        {
            case 'boolean':
                $html = \MOW_Utils::variables()->get_dump_string( $value );
                break;
            case 'integer':
            case 'double':
            case 'string':
                $html = ( $detailed === true )
                    ? \MOW_Utils::variables()->get_dump_string( $value )
                    : $value;
                break;
            case 'array':
            case 'object':
                $html = ( $detailed === true )
                    ? \MOW_Utils::variables()->get_dump_string( $value )
                    : print_r( $value, true );
                break;
        }
        
        end:
        /*----- format output -----*/
        // set requested number of <br> at begin and end of print
        $nl_before = ( $new_lines_before > 0 )
            ? str_repeat( '<br>', $new_lines_before)
            : '';
        $nl_after = ( $new_lines_after > 0 )
            ? str_repeat( '<br>', $new_lines_after)
            : '';
        // format label
        if ( !empty( $label ) )
        {
            $label .= ' : ';
            $label = \MOW_Utils::html()->get_wrap_bold( $label );
            $label .= ( ( 'array' == $value_type ) or ( 'object' == $value_type ) )
                ? '<br>'
                : '';
            $html = $label . $html;
        }
        // format for array presentation if is array or object
        if( ( 'array' == $value_type ) or ( 'object' == $value_type ) )
        {
            $html = \MOW_Utils::html()->get_wrap_pre( $html );
        }
        
        $html = $nl_before . $html . $nl_after;
        
        return $html;
    }
    
    public static function print_value( $value, $label = '', $new_lines_before = 0, $new_lines_after = 0, $detailed = false )
    {   
        // implement check when method is verified and fully functional
//        $types_validation_result = \MOW_Utils::get_types_validation_result( func_get_args(), [ 'array|object', 'string', 'int', 'int', 'bool' ] );
//        
//        if ( !$types_validation_result["valid"] )
//        {
//            $idx = $types_validation_result[ 'index' ];
//            trigger_error( "Invalid parameters given at position $idx" );
//            return;
//        }
        
        echo self::get_value_formatted_for_output( $value, $label, $new_lines_before, $new_lines_after, $detailed );
        
        return;
    }
}