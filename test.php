<html>

    <head>
        <title>TEST</title>
    </head>

</html>

<?php
require_once( '../PSWebServiceLibrary.php' );

$valid_resources = ['categories', 'customers'];

// check if valid resource are given
if (in_array($valid_resources, $resource)) {
    throw new Exception('Invalid resource');
}

if (in_array('d', $tab))
    echo 'yes';
else
    echo 'false';