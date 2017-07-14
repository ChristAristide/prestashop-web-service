<?php
namespace Core\Classes\Util;

// html operations

class MOW_Utils_HTML
{    
    public static function get_wrap_bold( $content )
    {
        // to do : check parameters
        
        return '<b>' . $content . '</b>';
    }
    
    public static function get_wrap_strong( $content )
    {
        // to do : check parameters
        
        return '<strong>' . $content . '</strong>';
    }
    
    public static function get_wrap_paragraph( $content )
    {
        // to do : check parameters
        
        return '<p>' . $content . '</p>';
    }
    
    public static function get_wrap_pre( $content )
    {
        // to do : check parameters
        
        return '<pre>' . $content . '</pre>';
    }
    
    public static function get_wrap_br( $content )
    {
        // to do : check parameters
        
        return '<br>' . $content . '<br>';
    }
    
    public static function get_wrap_in_tag( $content, $tag )
    {
        // to do : check parameters
        $opening = "<$tag>";
        $closing = "</$tag>";
        
        return $opening . $content . $closing;
    }
    
    public static function get_wrap_in_tag_with_class( $content, $tag, $class )
    {
        // to do : check parameters
        $opening = "<$tag class='" . $class . "'>";
        $closing = "</$tag>";
        
        return $opening . $content . $closing;
    }
    
    //!\\ NOT IMPLEMENTED
    public static function get_prepend_to_paragraph( $content_to_prepend, $paragraph )
    {
        // to do : check parameters
        
        // to do : implement method ...
        $modified_paragraph = $paragraph;
        
        return $modified_paragraph;
    }
}