<?php
global $PWS;
$PWS->read_resource_all('order_invoices');
$order_invoices = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$order_invoice_attributes = [
    'id',
    'id_order',
    'number',
    'delivery_number',
    'delivery_date',
    'total_discount_tax_excl',
    'total_discount_tax_incl',
    'total_paid_tax_excl',
    'total_paid_tax_incl',
    'total_products',
    'total_products_wt',
    'total_shipping_tax_excl',
    'total_shipping_tax_incl',
    'shipping_tax_computation_method',
    'total_wrapping_tax_excl',
    'total_wrapping_tax_incl',
    'shop_address',
    'invoice_address',
    'delivery_address',
    'note',
    'date_add',
];

$order_invoice_attributes_compact_view = [
    'id',
    'id_order',
    'number',
];

$attributes_list = ($view_option == 'full') ? $order_invoice_attributes : $order_invoice_attributes_compact_view;

//var_dump ($order_invoices);
?>

<div>
    <table>
        <caption>Liste des order_invoices</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($order_invoices as $order_invoice_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $order_invoice_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>