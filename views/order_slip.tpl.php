<?php
global $PWS;
$PWS->read_resource_all('order_slip');
$order_slips = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$order_slip_attributes = [
    'id',
    'id_customer',
    'id_order',
    'conversion_rate',
    'total_products_tax_excl',
    'total_products_tax_incl',
    'total_shipping_tax_excl',
    'total_shipping_tax_incl',
    'amount',
    'shipping_cost',
    'shipping_cost_amount',
    'partial',
    'date_add',
    'date_upd',
    'order_slip_type',
    'associations',
];

$order_slip_attributes_compact_view = [
    'id',
    'amount',
    'order_slip_type',
];

$attributes_list = ($view_option == 'full') ? $order_slip_attributes : $order_slip_attributes_compact_view;

//var_dump ($order_slips);
?>

<div>
    <table>
        <caption>Liste des order_slips</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($order_slips as $order_slip_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $order_slip_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>