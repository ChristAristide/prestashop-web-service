<?php
global $PWS;
$PWS->read_resource_all('orders');
$orders = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$order_attributes = [
    'id',
    'id_address_delivery',
    'id_address_invoice',
    'id_cart',
    'id_currency',
    'id_lang',
    'id_customer',
    'id_carrier',
    'current_state',
    'module',
    'invoice_number',
    'invoice_date',
    'delivery_number',
    'delivery_date',
    'valid',
    'date_add',
    'date_upd',
    'shipping_number',
    'id_shop_group',
    'id_shop',
    'secure_key',
    'payment',
    'recyclable',
    'gift',
    'gift_message',
    'mobile_theme',
    'total_discounts',
    'total_discounts_tax_incl',
    'total_discounts_tax_excl',
    'total_paid',
    'total_paid_tax_incl',
    'total_paid_tax_excl',
    'total_paid_real',
    'total_products',
    'total_products_wt',
    'total_shipping',
    'total_shipping_tax_incl',
    'total_shipping_tax_excl',
    'carrier_tax_rate',
    'total_wrapping',
    'total_wrapping_tax_incl',
    'total_wrapping_tax_excl',
    'round_mode',
    'round_type',
    'conversion_rate',
    'reference',
    'associations',
];

$order_attributes_compact_view = [
    'id',
    'id_address_delivery',
    'id_address_invoice',
];

$attributes_list = ($view_option == 'full') ? $order_attributes : $order_attributes_compact_view;

//var_dump ($orders);
?>

<div>
    <table>
        <caption>Liste des orders</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($orders as $order_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $order_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>