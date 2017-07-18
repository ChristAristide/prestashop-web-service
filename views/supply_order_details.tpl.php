<?php
global $PWS;
$PWS->read_resource_all('supply_order_details');
$supply_order_details = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$supply_order_detail_attributes = [
    'id',
    'id_supply_order',
    'id_product',
    'id_product_attribute',
    'reference',
    'supplier_reference',
    'name',
    'ean13',
    'upc',
    'exchange_rate',
    'unit_price_te',
    'quantity_expected',
    'quantity_received',
    'price_te',
    'discount_rate',
    'discount_value_te',
    'price_with_discount_te',
    'tax_rate',
    'tax_value',
    'price_ti',
    'tax_value_with_order_discount',
    'price_with_order_discount_te',
];

$supply_order_detail_attributes_compact_view = [
    'id',
    'name',
    'price_ti',
];

$attributes_list = ($view_option == 'full') ? $supply_order_detail_attributes : $supply_order_detail_attributes_compact_view;

//var_dump ($supply_order_details);
?>

<div>
    <table>
        <caption>Liste des supply_order_details</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($supply_order_details as $supply_order_detail_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $supply_order_detail_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>