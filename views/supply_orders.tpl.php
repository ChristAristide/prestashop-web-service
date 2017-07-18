<?php
global $PWS;
$PWS->read_resource_all('supply_orders');
$supply_orders = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$supply_order_attributes = [
    'id',
    'id_supplier',
    'id_lang',
    'id_warehouse',
    'id_supply_order_state',
    'id_currency',
    'supplier_name',
    'reference',
    'date_delivery_expected',
    'total_te',
    'total_with_discount_te',
    'total_ti',
    'total_tax',
    'discount_rate',
    'discount_value_te',
    'is_template',
    'date_add',
    'date_upd',
    'associations',
];

$supply_order_attributes_compact_view = [
    'id',
    'supplier_name',
    'reference',
];

$attributes_list = ($view_option == 'full') ? $supply_order_attributes : $supply_order_attributes_compact_view;

//var_dump ($supply_orders);
?>

<div>
    <table>
        <caption>Liste des supply_orders</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($supply_orders as $supply_order_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $supply_order_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>