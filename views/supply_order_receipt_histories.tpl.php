<?php
global $PWS;
$PWS->read_resource_all('supply_order_receipt_histories');
$supply_order_receipt_histories = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$supply_order_receipt_historie_attributes = [
    'id',
    'id_supply_order_detail',
    'id_employee',
    'id_supply_order_state',
    'employee_firstname',
    'employee_lastname',
    'quantity',
    'date_add',
];

$supply_order_receipt_historie_attributes_compact_view = [
    'id',
    'employee_firstname',
    'employee_lastname',
];

$attributes_list = ($view_option == 'full') ? $supply_order_receipt_historie_attributes : $supply_order_receipt_historie_attributes_compact_view;

//var_dump ($supply_order_receipt_histories);
?>

<div>
    <table>
        <caption>Liste des supply_order_receipt_histories</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($supply_order_receipt_histories as $supply_order_receipt_historie_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $supply_order_receipt_historie_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>