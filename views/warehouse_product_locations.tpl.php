<?php
global $PWS;
$PWS->read_resource_all('warehouse_product_locations');
$warehouse_product_locations = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$warehouse_product_location_attributes = [
    'id',
    'id_product',
    'id_product_attribute',
    'id_warehouse',
    'location',
];

$warehouse_product_location_attributes_compact_view = [
    'id',
    'id_product',
    'location',
];

$attributes_list = ($view_option == 'full') ? $warehouse_product_location_attributes : $warehouse_product_location_attributes_compact_view;

//var_dump ($warehouse_product_locations);
?>

<div>
    <table>
        <caption>Liste des warehouse_product_locations</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($warehouse_product_locations as $warehouse_product_location_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $warehouse_product_location_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>