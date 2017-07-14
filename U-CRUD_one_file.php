<html>

    <head>
        <title>Mise à jour d'une catégorie</title>
    </head>

</html>

<?php
require_once( '../PSWebServiceLibrary.php' );

try {
    // création de l'accès au service web
    $webService = new PrestaShopWebservice('http://localhost/prestashop/', 'FGY783QJ1WQU2IXTPC4I9PU5RBFP7NGW', false);

    //définition de la ressource à modifier : un fichier xml vide que nous éditerons
    $opt['resource'] = 'categories';
    if (isset($_GET['id']))
        $opt['id'] = $_GET['id'];
    
    // appel de la ressource : la methode get() prend en paramètre un tableau associatif ayant défini le champ 'resource'
    $xml = $webService->get($opt);

    $resources = $xml->children()->children();
    var_dump($resources);
    
    //mise à jour de la ressource
    $resources->id_parent = 2;
    
    //envoiu fichier
    // Resource definition
    $opt['resource'] = 'categories';
    
    $opt['id'] = $_GET['id'];

    //XML file definition
    $opt['putXml'] = $xml->asXML();

    // Calling asXML() returns a string corresponding to the file
    $xml = $webService->edit($opt);
    
    


} catch (PrestaShopWebserviceException $ex) {
    // Shows a message related to the error
    echo 'Other error: <br />' . $ex->getMessage();
}
