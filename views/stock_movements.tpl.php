<?php
global $PWS;
$PWS->read_resource_all('stock_movements');
$stock_movements = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$stock_movement_attributes = [
    'id',
    'id_product',
    'id_product_attribute',
    'id_warehouse',
    'id_currency',
    'management_type',
    'id_employee',
    'id_stock',
    'id_stock_mvt_reason',
    'id_order',
    'id_supply_order',
    'product_name',
    'ean13',
    'upc',
    'reference',
    'physical_quantity',
    'sign',
    'last_wa',
    'current_wa',
    'price_te',
    'date_add',
];

$stock_movement_attributes_compact_view = [
    'id',
    'physical_quantity',
    'price_te',
];

$attributes_list = ($view_option == 'full') ? $stock_movement_attributes : $stock_movement_attributes_compact_view;

//var_dump ($stock_movements);
?>

<div>
    <table>
        <caption>Liste des stock_movements</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($stock_movements as $stock_movement_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $stock_movement_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>