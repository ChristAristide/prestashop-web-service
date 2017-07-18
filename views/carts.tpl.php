<?php
global $PWS;
$PWS->read_resource_all('carts');
$carts = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$cart_attributes = [
    'id',
    'id_address_delivery',
    'id_address_invoice',
    'id_currency',
    'id_customer',
    'id_guest',
    'id_lang',
    'id_shop_group',
    'id_shop',
    'id_carrier',
    'recyclable',
    'gift',
    'gift_message',
    'mobile_theme',
    'delivery_option',
    'secure_key',
    'allow_seperated_package',
    'date_add',
    'date_upd',
    'associations',
];

$cart_attributes_compact_view = [
    'id',
    'id_address_delivery',
    'id_address_invoice',
];

$attributes_list = ($view_option == 'full') ? $cart_attributes : $cart_attributes_compact_view;
//var_dump ($carts);
?>

<div>
    <table>
        <caption>Liste des carts</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($carts as $cart_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $cart_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>