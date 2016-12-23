<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Converter
    |--------------------------------------------------------------------------
    |
    | This option specifies whether the converter feature is on or off.
    |
    */

    'enabled' => true,
    
    /*
    |--------------------------------------------------------------------------
    | Default Function
    |--------------------------------------------------------------------------
    |
    | This option controls the default function that will be used by the converting.
    | "strtr" options needs a translate list.
    | 
    | Supported: "strtr", "html_entity_decode"
    |
    */
    
    'default' => 'strtr',
    
    /*
    |--------------------------------------------------------------------------
    | Translate List
    |--------------------------------------------------------------------------
    |
    | This is translate list for "strtr" function. You can add additional values.
    | If you use "html_entity_decode" for default function, completely ignore translate list.
    |
    */
    
    'translate' => [
        '&ccedil;' => 'ç',
        '&Ccedil;' => 'Ç',
        '&ouml;'   => 'ö',
        '&Ouml;'   => 'Ö',
        '&uuml;'   => 'ü',
        '&Uuml;'   => 'Ü',
    ]

];
