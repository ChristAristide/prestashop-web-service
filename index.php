<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('mow-prestashop-web-service.class.php');

$PWS = new MOW_Prestashop_Web_Service([
    'url' => 'http://localhost/prestashop/',
    'key' => 'FGY783QJ1WQU2IXTPC4I9PU5RBFP7NGW',
    'debug' => false
]);

include_once( 'views/customers.tpl.php' );

//$ws->create_customer();
//$ws->delete_resource('customers',8);



