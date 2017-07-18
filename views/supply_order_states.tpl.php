<?php
global $PWS;
$PWS->read_resource_all('supply_order_states');
$supply_order_states = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$supply_order_state_attributes = [
    'id',
    'delivery_note',
    'editable',
    'receipt_state',
    'pending_receipt',
    'enclosed',
    'color',
    'name',
];

$supply_order_state_attributes_compact_view = [
    'id',
    'color',
    'name',
];

$attributes_list = ($view_option == 'full') ? $supply_order_state_attributes : $supply_order_state_attributes_compact_view;

//var_dump ($supply_order_states);
?>

<div>
    <table>
        <caption>Liste des supply_order_states</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($supply_order_states as $supply_order_state_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $supply_order_state_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>