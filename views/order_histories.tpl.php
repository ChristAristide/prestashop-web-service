<?php
global $PWS;
$PWS->read_resource_all('order_histories');
$order_histories = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$order_historie_attributes = [
    'id',
    'id_employee',
    'id_order_state',
    'id_order',
    'date_add',
];

$order_historie_attributes_compact_view = [
    'id',
    'id_employee',
    'id_order_state',
];

$attributes_list = ($view_option == 'full') ? $order_historie_attributes : $order_historie_attributes_compact_view;

//var_dump ($order_histories);
?>

<div>
    <table>
        <caption>Liste des order_histories</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($order_histories as $order_historie_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $order_historie_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>