<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebService
 *
 * @author Kouassi Christ
 */
require_once( '../PSWebServiceLibrary.php' );
require_once( 'util/mow-checker-arrays.class.php' );
require_once( 'util/mow-utils-html.class.php' );

use Core\Classes\Util\MOW_Checker_Arrays as MCA;
use Core\Classes\Util\MOW_Utils_HTML as MUHTML;

class MOW_Prestashop_Web_Service {

    // à compléter ...
    const AVAILABLE_RESOURCES = ['addresses',
        'carriers',
        'cart_rules',
        'carts',
        'categories',
        'combinations',
        'configurations',
        'contacts',
        'content_management_system',
        'countries',
        'currencies',
        'customer_messages',
        'customer_threads',
        'customers',
        'customizations',
        'deliveries',
        'employees',
        'groups',
        'guests',
        'image_types',
        'images',
        'languages',
        'manufacturers',
        'order_carriers',
        'order_details',
        'order_discounts',
        'order_histories',
        'order_invoices',
        'order_payments',
        'order_slip',
        'order_states',
        'orders',
        'price_ranges',
        'product_customization_fields',
        'product_feature_values',
        'product_features',
        'product_option_values',
        'product_options',
        'product_suppliers',
        'products',
        'search',
        'shop_groups',
        'shop_urls',
        'shops',
        'specific_price_rules',
        'specific_prices',
        'states',
        'stock_availables',
        'stock_movement_reasons',
        'stock_movements',
        'stocks',
        'stores',
        'suppliers',
        'supply_order_details',
        'supply_order_histories',
        'supply_order_receipt_histories',
        'supply_order_states',
        'supply_orders',
        'tags',
        'tax_rule_groups',
        'tax_rules',
        'taxes',
        'translated_configurations',
        'warehouse_product_locations',
        'warehouses',
        'weight_ranges',
        'zones'];
    // à compléter ...
    const AVAILABLE_REQUEST_OPTIONS = ['resource', 'id'];
    const RESET_VALUES = [
        'current_resource_name' => '',
        'current_id' => 0,
        'current_options' => [],
        'retrieved_resource' => null,
    ];

    // e-commerce url
    private $url;
    // api key
    private $key;
    // debug option (true | false)
    private $debug;
    // prestashop web service instance
    private $web_service;
    // string that identifies the resource requested (ex: products)
    private $current_resource_name;
    // requested id
    private $current_id;
    // request options
    private $current_options;
    // response parsed as SimpleXML
    private $retrieved_resource;

    public function __construct($options) {
        $valid_options = ['url', 'key', 'debug'];
        $required_options = $valid_options;

        // check if required parameters are given
        if (!MCA::is_key_value_pairs_given($required_options, $options)) {
            throw new Exception('Invalid options');
        }

        $this->set_url($options['url']);
        $this->set_key($options['key']);
        $this->set_debug($options['debug']);

        // creating web service access
        $this->web_service = new PrestaShopWebservice($this->url, $this->key, $this->debug);
    }

    /* ==========================================
     * ========== PUBLIC METHODS ===============
     * ======================================* */

    /* ========== CRUD METHODS =============== */

    /**
     * Listing resources
     * @param type $resource
     * @return SimpleXML $resource
     */
    function read_resource($resource_name, $id = 0) {

        // check if valid resource name is given
        if (!in_array($resource_name, self::AVAILABLE_RESOURCES)) {
            throw new Exception('Invalid resource name');
        }

        //$parameters_association = [
        //    'customers' => [  ]
        //];
        // call to the generic method
        //$this->read_resource_algo($parameters_association[$resource]);
        // set request option : resource name
        $this->reset_current_options();
        $this->current_options['resource'] = $resource_name;

        // if id is defined
        if ($id) {
            // set request option : id
            $this->current_options['id'] = $id;
        }

        // retrieve resource as SimpleXML
        $this->retrieved_resource = $this->web_service->get($this->current_options);

        // extract the useful XML data
        $this->retrieved_resource = $this->get_resource_filtered_to_useful_fom_resource($this->retrieved_resource);

        return $this->retrieved_resource;
    }

    function read_ressource_all($resource) {
        $resources = [];

        // loops over each resources from a group then return an array of SimpleXML objects
        // first : retrieve the resources list from the read_resource($resource_name) method
        // second : loop over each resource from the list and make a call to read_resource($resource_name, $id) specifying the id

        return $resources;
    }

    /**
     * Add a resource
     * 
     * @param type $resource
     * @return type
     * @throws Exception
     */
    private function create_resource($resource) {
        $valid_resources = ['categories', 'customers', 'products'];

        // check if valid resource are given
        if (!in_array($resource, $valid_resources)) {
            throw new Exception('Invalid resource');
        }

        // The key-value array
        $this->current_options = [];
        $this->current_options['url'] = $this->url . 'api/' . $resource . '?schema=blank';

        // call to retrieve all resources
        $this->retrieved_resource = $this->web_service->get($this->current_options);

        //Retrieving the XML data
        $resources = $this->retrieved_resource->children()->children();

        return $resources;
    }

    /**
     * Add a categorie
     * 
     * @return type
     */
    function create_categorie() {
        $resources = $this->create_resource('categories');

        if (count($_POST) > 0) {
            //update the resource
            //required data :  name, link_rewrite, active
            $resources->name->language = htmlspecialchars($_POST['name']); //définition du contenu du champ
            $resources->name->language['id'] = 1; //définition de paramètre du champ
            $resources->name->language['xlink:href'] = 'http://localhost/prestashop/api/languages/' . 1;

            $resources->link_rewrite->language = htmlspecialchars($_POST['link_rewrite']);
            $resources->link_rewrite->language['id'] = 1;
            $resources->link_rewrite->language['xlink:href'] = 'http://localhost/prestashop/api/languages/' . 1;

            $resources->id_parent = htmlspecialchars($_POST['id_parent']);
            $resources->active = htmlspecialchars($_POST['active']);

            //post the datas
            $this->current_options = [];
            $this->current_options['resource'] = 'categories';
            $this->current_options['postXml'] = $this->retrieved_resource->asXML();
            $this->retrieved_resource = $this->web_service->add($this->current_options);

            return $resources;
        } else {
            //create the form 
            echo '<form method="POST" action="">';
            echo '<p><label for="pseudo">Name</label> : <input type="text" name="name" value = ""/></p>'
            . '<p><label for="pseudo">Link_rewrite</label> : <input type="text" name="link_rewrite" value = ""/></p>'
            . '<p><label for="pseudo">Id_parent</label> : <input type="text" name="id_parent" value = ""/></p>'
            . '<p><label for="pseudo">Active</label> : <input type="text" name="active" value = ""/></p>';
            echo '<input type="submit" value="Envoyer" /></form>';
        }
    }

    /**
     * Add a customer
     * 
     * @return type
     */
    function create_customer() {
        $resources = $this->create_resource('customers');

        if (count($_POST) > 0) {
            //update the resource
            //required data : lastname, firstname, email, passwd
            $resources->lastname = htmlspecialchars($_POST['lastname']);
            $resources->firstname = htmlspecialchars($_POST['firstname']);
            $resources->email = htmlspecialchars($_POST['email']);
            $resources->passwd = htmlspecialchars($_POST['passwd']);

            //post the datas
            $this->current_options = [];
            $this->current_options['resource'] = 'customers';
            $this->current_options['postXml'] = $this->retrieved_resource->asXML();
            $this->retrieved_resource = $this->web_service->add($this->current_options);

            return $resources;
        } else {
            //create the form 
            echo '<form method="POST" action="">';
            echo '<p><label for="pseudo">Lastname</label> : <input type="text" name="lastname" value = "' . $resources->lastname . '"/></p>'
            . '<p><label for="pseudo">firstname</label> : <input type="text" name="firstname" value = "' . $resources->firstname . '"/></p>'
            . '<p><label for="pseudo">email</label> : <input type="text" name="email" value = "' . $resources->email . '"/></p>'
            . '<p><label for="pseudo">passwd</label> : <input type="text" name="passwd" value = "' . $resources->passwd . '"/></p>';
            echo '<input type="submit" value="Envoyer" /></form>';
        }
    }

    function update_customer($id) {
        $resources = $this->read_resource('customers', $id);

        if (count($_POST) > 0) {
            //update the resource
            //required data : lastname, firstname, email
            $resources->lastname = htmlspecialchars($_POST['lastname']);
            $resources->firstname = htmlspecialchars($_POST['firstname']);
            $resources->email = htmlspecialchars($_POST['email']);
            $resources->show_public_prices = htmlspecialchars($_POST['show_public_prices']);

            //post the datas
            $this->current_options = [];
            $this->current_options['resource'] = 'customers';
            $this->current_options['id'] = $id;
            //XML file definition
            $this->current_options['putXml'] = $this->retrieved_resource->asXML();

            //$opt['url'] = 'http://localhost/prestashop/api/categories/38';
            // Calling asXML() returns a string corresponding to the file
            $this->retrieved_resource = $this->web_service->edit($this->current_options);

            return $resources;
        } else {
            //create the form 
            echo '<form method="POST" action="">';
            echo '<p><label for="pseudo">Lastname</label> : <input type="text" name="lastname" value = "' . $resources->lastname . '"/></p>'
            . '<p><label for="pseudo">firstname</label> : <input type="text" name="firstname" value = "' . $resources->firstname . '"/></p>'
            . '<p><label for="pseudo">email</label> : <input type="text" name="email" value = "' . $resources->email . '"/></p>'
            . '<p><label for="pseudo">show_public_prices?</label> : <input type="text" name="show_public_prices" value = "' . $resources->show_public_prices . '"/></p>';
            echo '<input type="submit" value="Envoyer" /></form>';
        }
    }

    /**
     * Removing resource from the database
     * @param type $resource
     * @param type $id
     */
    function delete_resource($resource, $id) {
        $valid_resources = ['categories', 'customers', 'products'];

        // check if valid resource are given
        if (!in_array($resource, $valid_resources)) {
            throw new Exception('Invalid resource');
        }

        // The key-value array
        $this->current_options = [];
        $this->current_options['resource'] = $resource;
        $this->current_options['id'] = $id;

        $this->web_service->delete($this->current_options);                 // Delete
        // If we can see this message, that means we have not left the try block
        echo $resource . $this->current_options['id'] . ' successfully deleted!';
    }

    /* ========== DISPLAY METHODS =============== */

    // write display methods here

    /* ============================================
     * ========== INTERNAL METHODS ===============
     * ========================================* */

    function reset_current_resource_name() {
        $this->current_resource_name = self::RESET_VALUES['current_resource_name'];
    }

    function reset_current_id() {
        $this->current_id = self::RESET_VALUES['current_id'];
    }

    function reset_current_options() {
        $this->current_options = self::RESET_VALUES['current_options'];
    }

    function reset_retrieved_resource() {
        $this->retrieved_resource = self::RESET_VALUES['retrieved_resource'];
    }

    function get_resource_filtered_to_useful_fom_resource($xml_resource) {
        // to do : check that the $xml_resource is a SimpleXML object
        // extract the useful XML data
        $useful_data = $xml_resource->children()->children();

        return $useful_data;
    }

    /* =================================== 
     * ========== GETTERS ===============
     * ===============================* */

    function get_url() {
        return $this->url;
    }

    function get_key() {
        return $this->key;
    }

    function get_debug() {
        return $this->debug;
    }

    function get_retrieved_resource() {
        return $this->retrieved_resource;
    }

    /* =================================== 
     * ========== SETTERS ===============
     * ===============================* */

    function set_url($url) {
        // to do : check parameter. 

        $this->url = $url;
        return true;
    }

    function set_key($key) {
        // to do : check parameter. 

        $this->key = $key;
        return true;
    }

    function set_debug($debug) {
        // check parameter
        if (!is_bool($debug)) {
            return false;
        }

        $this->debug = $debug;
        return true;
    }

}
