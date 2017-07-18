<?php
global $PWS;
$PWS->read_resource_all('order_carriers');
$order_carriers = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$order_carrier_attributes = [
    'id',
    'id_order',
    'id_carrier',
    'id_order_invoice',
    'weight',
    'shipping_cost_tax_excl',
    'shipping_cost_tax_incl',
    'tracking_number',
    'date_add',
];

$order_carrier_attributes_compact_view = [
    'id',
    'weight',
    'tracking_number',
];

$attributes_list = ($view_option == 'full') ? $order_carrier_attributes : $order_carrier_attributes_compact_view;

//var_dump ($order_carriers);
?>

<div>
    <table>
        <caption>Liste des order_carriers</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($order_carriers as $order_carrier_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $order_carrier_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>