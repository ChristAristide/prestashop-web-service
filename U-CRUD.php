<html>

    <head>
        <title>Update one product</title>
    </head>

</html>

<?php
require_once( '../PSWebServiceLibrary.php' );

try {
    // creating web service access
    $webService = new PrestaShopWebservice('http://localhost/prestashop/', 'FGY783QJ1WQU2IXTPC4I9PU5RBFP7NGW', false);

    // call to retrieve all products
    $opt['resource'] = 'products';
    if (isset($_GET['id']))
        $opt['id'] = $_GET['id'];
    $xml = $webService->get($opt);

    $resources = $xml->product->children();

    //product form and redirect to 'test.php' 
    echo '<form method="POST" action="test.php?id='.$_GET['id'].'">';
    foreach ($resources as $key => $value) {
        echo '<p><label for="pseudo">'.$key.'</label> : <input type="text" name="'.$key.'" value = "'.$value.'"/></p>';
    }  
     echo '<input type="submit" value="Envoyer" /></form>';


} catch (PrestaShopWebserviceException $ex) {
    // Shows a message related to the error
    echo 'Other error: <br />' . $ex->getMessage();
}
