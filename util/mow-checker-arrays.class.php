<?php
namespace Core\Classes\Util;

require_once( __DIR__ . '/mow-utils-class.class.php' );

use Core\Classes\Util\MOW_Utils_Class as CU;

// arrays checks

class MOW_Checker_Arrays
{
    public static function is_associative( array $array )
    {
        // the function tests if there is at least one string key,
        // if so it will be considered as an associative array.
        $test = count( array_filter( array_keys( $array ), 'is_string' ) ) > 0;
        return $test;
    }
    
    public static function is_key_value_pairs_given( array $required_keys, array $arr )
    {
        if ( empty( $required_keys ) or self::is_associative( $required_keys ) )
        {
            trigger_error( 'Expecting indexed non empty array for $required_keys parameter' );
        }
        
        foreach( $required_keys as $required_key )
        {
            if ( !array_key_exists( $required_key, $arr ) )
            {
                return false;
            }
        }
        
        return true;
    }
    
    public static function is_key_value_pairs_given_and_not_null( array $required_keys, array $arr )
    {
        if ( empty( $required_keys ) or self::is_associative( $required_keys ) )
        {
            trigger_error( 'Expecting indexed non empty array for $required_keys parameter' );
        }
        
        foreach( $required_keys as $required_key )
        {
            if ( !array_key_exists( $required_key, $arr ) or empty( $arr[ $required_key ] ) )
            {
                return false;
            }
        }
        
        return true;
    }
    
    public static function is_array_keys_in_list( $array_to_check, $list )
    {
        foreach( $array_to_check as $key => $value )
        {
            if ( !in_array( $key, $list ) )
            {
                return false;
            }
        }

        return true;
    }
    
    // can receive variable number of arrays
    public static function is_arrays_lengths_equal()
    {
        // to do : check parameters (loop over unknown given arguments and check if array)

        $nb_arrays = func_num_args();

        // check that at least two arrays are given
         if ( $nb_arrays < 2 ) {
            trigger_error( "Arrays to compare must be at least two" );
            return;
        }

        // compare each array to the previous
        for ( $i = 1; $i < $nb_arrays; $i++ ) {
            if ( count( func_get_arg( $i ) ) !== count( func_get_arg( $i - 1 ) ) )
            {
                return false;
            }
        }

        return true;
    }
}