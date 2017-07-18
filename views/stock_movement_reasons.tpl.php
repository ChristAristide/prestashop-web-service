<?php
global $PWS;
$PWS->read_resource_all('stock_movement_reasons');
$stock_movement_reasons = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$stock_movement_reason_attributes = [
    'id',
    'sign',
    'deleted',
    'date_add',
    'date_upd',
    'name',
];

$stock_movement_reason_attributes_compact_view = [
    'id',
    'sign',
    'name',
];

$attributes_list = ($view_option == 'full') ? $stock_movement_reason_attributes : $stock_movement_reason_attributes_compact_view;

//var_dump ($stock_movement_reasons);
?>

<div>
    <table>
        <caption>Liste des stock_movement_reasons</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($stock_movement_reasons as $stock_movement_reason_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $stock_movement_reason_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>