<?php
namespace Core\Classes\Util;

require_once( __DIR__ . '/mow-checker-arrays.class.php' );

use Core\Classes\Util\MOW_Checker_Arrays as MCA;

// variables checks

class MOW_Checker_Vars
{
    // test if defined
    public static function is_exists( &$var )
    {
        if ( isset( $var ) )
        {
            return true;
        } 
        return false;
    }
    
    // test if defined and value != null
    public static function is_has_value( &$var )
    {
        if ( isset( $var ) and !is_null( $var ) )
        {
            return true;
        } 
        return false;
    }
    
    // test if defined and value not empty ()
    //
    // are considered empty :
    //  "" (une chaîne vide)
    //  0 (0 en tant qu'entier)
    //  0.0 (0 en tant que nombre à virgule flottante)
    //  "0" (0 en tant que chaîne de caractères)
    //  NULL
    //  FALSE
    //  array() (un tableau vide)
    //  $var; (une variable déclarée, mais sans valeur)
    //
    public static function is_has_not_empty_value( &$var )
    {
        if ( !empty( $var ) )
        {
            return true;
        } 
        return false;
    }
    
    public static function is_valid_types( $values, $types )
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
        if( MCA::is_associative( $values ) )
        {
            trigger_error( "Expecting indexed array as \$values argument" );
            return;
        }
        if( !is_array( $types ) )
        {
            trigger_error( "Expecting array as \$types argument" );
            return;
        }
        if( MCA::is_associative( $types ) )
        {
            trigger_error( "Expecting indexed array as \$types argument" );
            return;
        }
        if( count( $types ) < count( $values )  )
        {
            trigger_error( "types list given is smaller than nb of values to test" );
            return;
        }
        foreach( $types as $type )
        {
            if( !in_array( $type, $valid_types ) )
            {
                trigger_error( "type specified in types list is invalid" );
                return;
            }
        }
        
        // check if parameters match corresponding given types
        foreach( $values as $idx => $value )
        {            
            if( 'any' === $types[ $idx ] )
            {
                continue;
            }
            
            $check_func_name = 'is_' . $types[ $idx ];
            
            if ( !$check_func_name( $value ) )
            {
                return false;
            }
        }
        
        return true;
    }
    
    public static function is_empty_values( $values )
    {
        // check parameters
        
        // foreach, call method ( empty() ), if not ok return false
        
        return true;
    }
    
    public static function is_array_values( $arrays )
    {
        // check parameters
        
        // foreach, call method ( is_array() ), if not ok return false
        
        return true;
    }
    
    public static function is_indexed_arrays( $arrays )
    {
        // check parameters
        
        // foreach, call method ( !is_associative() ), if not ok return false
        
        return true;
    }
    
    public static function is_associative_arrays( $arrays )
    {
        // check parameters
        
        // foreach, call method ( is_associative() ), if not ok return false
        
        return true;
    }
    
    public static function is_int_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_int() ), if not ok return false
        
        return true;
    }
    
    public static function is_integer_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_integer() ), if not ok return false
        
        return true;
    }
    
    public static function is_long_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_long() ), if not ok return false
        
        return true;
    }
    
    public static function is_float_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_float() ), if not ok return false
        
        return true;
    }
    
    public static function is_double_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_double() ), if not ok return false
        
        return true;
    }
    
    public static function is_real_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_real() ), if not ok return false
        
        return true;
    }
    
    public static function is_scalar_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_scalar() ), if not ok return false
        
        return true;
    }
    
    public static function is_null_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_null() ), if not ok return false
        
        return true;
    }
    
    public static function is_ressource_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_ressource() ), if not ok return false
        
        return true;
    }
    
    public static function is_object_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_object() ), if not ok return false
        
        return true;
    }
    
    public static function is_bool_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_bool() ), if not ok return false
        
        return true;
    }
    
    public static function is_string_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_string() ), if not ok return false
        
        return true;
    }
    
    public static function is_numeric_values( $values )
    {
        // check parameters
        
        // foreach, call method ( is_numeric() ), if not ok return false
        
        return true;
    }
    
    //!\\ Must be rechecked. Missing initial arguments check
    public static function is_correct_type( $value, $type )
    {
        // check parameters
        
        $native_valid_types = [ 'int', 'integer', 'long', 'float', 'double', 'real', 'numeric', 'string', 'scalar', 'bool', 'array', 'object', 'ressource' ];
        $custom_valid_types = [ 'any', 'array_indexed', 'array_associative' ];
        $valid_types = array_merge( $native_valid_types, $custom_valid_types );
        
        /*----- internal functions -----*/
        $is_valid_type = function() use( $type, $valid_types )
        {
            return in_array( $type, $valid_types );
        };
        $is_custom_type = function() use( $type, $custom_valid_types )
        {
            return in_array( $type, $custom_valid_types );
        };
        
        /*----- internal checks -----*/
        // check that given type is valid, i.e in $valid_types list
        if( !$is_valid_type() )
        {
            trigger_error( 'Invalid type given as type argument' );
            return;
        }
        
        /*----- validation checks -----*/
        // check if custom type, i.e in $custom_valid_types list
        if( $is_custom_type() )
        {
            switch( $type )
            {
                case 'any':
                    echo "<br>type set as 'any'<br>";
                    return true;
                    break;
                case 'array_indexed':
                    echo "<br>checking if indexed array<br>";
                    if(  !MCA::is_associative( $value ) )
                    {
                        return true;
                    }
                    break;
                case 'array_associative':
                    echo "<br>checking if associative array<br>";
                    if(  MCA::is_associative( $value ) )
                    {
                        return true;
                    }
                    break;
            }
        } else
        {
            // if not custom type, check if native type
            $check_func_name = 'is_' . $type;

            echo "<br>check_func_name : $check_func_name <br>";

            if ( $check_func_name( $value ) )
            {
                return true;
            }
        }
        
        // if no checks successful
        echo "<br>incorrect type<br>";
        return false;
    }
    
    //!\\ not tested
    public static function is_correct_type_multiple( $value, $types )
    {
        // can accept $types as indexed array or string like "type1|type2|type3"
        
        // make successive calls to is_correct_type();
    }
    
    //!\\ fully tested and functional
    public static function is_max_length_verified( $value, $maxlen )
    {
        // to do : check parameters
        
        $type = gettype( $value );
        
        //echo "<br>value : $value<br>";
        //echo "<br>type : $type<br>";
        
        switch ( $type )
        {
            case 'boolean' :
                trigger_error( 'Cannot check length on boolean value', E_USER_ERROR );
                return;
                break;
            case 'integer' :
            case 'double' :
                
                if( $value <= $maxlen )
                { 
                    return true;
                }
                break;
            case 'string' :
                if( strlen( $value ) <= $maxlen )
                {
                    return true;
                }
                break;
            case 'array' :
                if( count( $value ) <= $maxlen )
                {
                    return true;
                }
                break;
            case 'object' :
                trigger_error( 'Cannot check length on object', E_USER_ERROR );
                return;
                break;
            case 'resource' :
                $resource_type = get_resource_type( $value );
                if( $resource_type == 'file' or $resource_type == 'stream' )
                {
                    $file_infos = fstat( $value );
                    if( empty( $file_infos ) )
                    {
                        trigger_error( "Couldn't get file infos", E_USER_ERROR );
                        return;
                    } else {
                        $file_size = $file_infos[ 'size' ];
                        //echo "<br>file size : $file_size<br>";
                        if( $file_size <= $maxlen )
                        {
                            return true;
                        }
                    }
                } else
                {
                    trigger_error( "Cannot check length on resource that isn't a file", E_USER_ERROR );
                    return;
                }
                break;
            case 'NULL':
                trigger_error( 'Cannot check length on null value', E_USER_ERROR );
                return;
                break;
            default :
                trigger_error( "Cannot determine type of value argument", E_USER_ERROR );
                return;
        }
        
        // if no checks successful
        return false;
    }
    
    //!\\ not fully verified
    public static function is_valid_value( $value, $checks, $options = [] )
    {
        //echo '<br>' . "call to is_valid_value() " . '<br>';
        
        // check if function should check it own arguments
        if( !in_array( 'pass_own_args_validation', $options ) )
        {
            // check arguments received
            if( !self::is_valid_value( $checks, 
            [ 
                'correct_types' => 'array',
                'empty_accepted' => false
            ],
            [
                'pass_own_args_validation'
            ] ) )
            {
                trigger_error( 'Wrong arguments given to function' );
                return;
            }
        }
        
        $possible_checks = [ 'correct_types', 'empty_accepted', 'max_length' ];
        // check_own_args defines whether to check its own arguments => to avoid infinite reflexive calls
        $options = [ 'check_own_args' ];
        
        // verify $checks keys match values in $possible_checks and that values are not empty
        if( !MCA::is_array_keys_in_list( $checks, $possible_checks ) )
        {
            trigger_error( 'Wrong keys given for checklist array' );
            return;
        }
        
        // by default, the method will not accept empty values unless specified explicitely
        $check_empty = ( isset( $checks[ 'empty_accepted' ] ) )
            ? $checks[ 'empty_accepted' ]
            : false;
        
        echo "<br>checks : <br>";
        var_dump( $checks );
        
        // by default, the method will not accept empty values unless specified explicitely
//        if( !isset( $checks[ 'empty_accepted' ] ) )
//        {
//            $checks[ 'empty_accepted' ] = false;
//        }

        /*----- checks -----*/
        $nb_checks_to_do = count( $checks );
        echo "<br>nb of check to do : $nb_checks_to_do <br>";
        $nb_checks_passed = 0;
        
        // check correct type
        if( isset( $checks[ 'correct_types' ] ) )
        {
            // to do : implement method
            if( self::is_correct_type( $value, $checks[ 'correct_types' ] ) )
            {
                echo "<br>type test passed<br>";
                $nb_checks_passed++;
            }
        }

        // check empty status
        if( isset( $checks[ 'empty_accepted' ] ) )
        {
            if( $check_empty )
            {
                if( !empty( $value ) )
                {
                    echo "<br>empty test passed <br>";
                    $nb_checks_passed++;
                }
            } else
            {
                echo "<br>empty test passed <br>";
                $nb_checks_passed++;
            }
        }

        // check max length
        if( isset( $checks[ 'max_length' ] ) )
        {
            if( self::is_max_length_verified( $value, $checks[ 'max_length' ] ) )
            {
            echo "<br>length test passed<br>";
               $nb_checks_passed++;
            }
            
        }
        
        // if all checks passed
        if( $nb_checks_passed == $nb_checks_to_do )
        {
            echo "<br>validation passed <br>";
            return true;
        } else
        {
            echo "<br>validation failed <br>";
            return false;
        }
    }
    
    public static function is_valid_values( $values, $checks )
    {
        // to do : check parameters
        // reflexive call to check parameters received
        // NOTE : make independant calls to is_valid_value()
        // $values = [
        //    string ,
        //    array,
        //]
        // verify that $values is an indexed array
        // verify that each $values value is a string
        // $checks = [
        //    'correct_types' => [ 'aaa', 'bbb', 'ccc', ... ]
        //    'empty_statuses' => [ true, false, true, ... ]
        //]
        // verify that $checks is an associative array
        // verify that each $checks value is an indexed array
        
        $possible_checks = [ 'correct_types', 'empty_accepted', 'max_lengths' ];
        
        // verify $checks keys match values in $possible_checks
        if ( !MCA::is_array_keys_in_list( $checks, $possible_checks ) )
        {
            trigger_error( 'Invalid checks keys' );
            return;
        }
        
        // to do : verify for each $checks that the array values type match expected
        
        // verify that each $checks values array length equals the array length of $values
        foreach( $checks as $checks_key => $checks_values )
        {
            if ( !MCA::is_arrays_lengths_equal( $checks_values, $values ) )
            {
                trigger_error( 'The array length of check values must be equal to array length of values to check' );
                return;
            }
        }
        
        // check each value in $values
        foreach( $values as $idx => $value )
        {
            $single_checks = [];
            $single_checks_key = '';
            
            foreach( $checks as $checks_key => $check_values )
            {
                // remove the final "s" of the $checks key
                $single_checks_key = ( 'correct_types' == $checks_key )
                    ? 'correct_type'
                    : ( 'empty_accepted' == $checks_key )
                        ? 'empty_accepted'
                        : ( 'max_lengths' == $checks_key )
                            ? 'max_length'
                            : '';
                $single_checks[ $single_checks_key ] = $check_values[ $idx ];
            }
            
            if( !is_valid_value( $value, $single_checks ) )
            {
                return false;
            }
        }
        
        return true;
    }
}