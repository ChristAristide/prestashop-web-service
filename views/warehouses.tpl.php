<?php
global $PWS;
$PWS->read_resource_all('warehouses');
$warehouses = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$warehouse_attributes = [
    'id',
    'id_address',
    'id_employee',
    'id_currency',
    'deleted',
    'reference',
    'name',
    'management_type',
    'associations',
];

$warehouse_attributes_compact_view = [
    'id',
    'name',
    'management_type',
];

$attributes_list = ($view_option == 'full') ? $warehouse_attributes : $warehouse_attributes_compact_view;

//var_dump ($warehouses);
?>

<div>
    <table>
        <caption>Liste des warehouses</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($warehouses as $warehouse_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $warehouse_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>