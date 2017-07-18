<?php
global $PWS;
$PWS->read_resource_all('order_payments');
$order_payments = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$order_payment_attributes = [
    'id',
    'order_reference',
    'id_currency',
    'amount',
    'payment_method',
    'conversion_rate',
    'transaction_id',
    'card_number',
    'card_brand',
    'card_expiration',
    'card_holder',
    'date_add',
];

$order_payment_attributes_compact_view = [
    'id',
    'amount',
    'payment_method',
];

$attributes_list = ($view_option == 'full') ? $order_payment_attributes : $order_payment_attributes_compact_view;

//var_dump ($order_payments);
?>

<div>
    <table>
        <caption>Liste des order_payments</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($order_payments as $order_payment_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $order_payment_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>