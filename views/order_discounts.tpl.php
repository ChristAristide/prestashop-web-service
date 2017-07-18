<?php
global $PWS;
$PWS->read_resource_all('order_discounts');
$order_discounts = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$order_discount_attributes = [
    'id',
    'id_order',
    'product_id',
    'product_attribute_id',
    'product_quantity_reinjected',
    'group_reduction',
    'discount_quantity_applied',
    'download_hash',
    'download_deadline',
    'id_order_invoice',
    'id_warehouse',
    'id_shop',
    'product_name',
    'product_quantity',
    'product_quantity_in_stock',
    'product_quantity_return',
    'product_quantity_refunded',
    'product_price',
    'reduction_percent',
    'reduction_amount',
    'reduction_amount_tax_incl',
    'reduction_amount_tax_excl',
    'product_quantity_discount',
    'product_ean13',
    'product_upc',
    'product_reference',
    'product_supplier_reference',
    'product_weight',
    'tax_computation_method',
    'id_tax_rules_group',
    'ecotax',
    'ecotax_tax_rate',
    'download_nb',
    'unit_price_tax_incl',
    'unit_price_tax_excl',
    'total_price_tax_incl',
    'total_price_tax_excl',
    'total_shipping_price_tax_excl',
    'total_shipping_price_tax_incl',
    'purchase_supplier_price',
    'original_product_price',
    'original_wholesale_price',
    'associations',
];

$order_discount_attributes_compact_view = [
    'id',
    'id_order',
    'product_id',
];

$attributes_list = ($view_option == 'full') ? $order_discount_attributes : $order_discount_attributes_compact_view;

//var_dump ($order_discounts);
?>

<div>
    <table>
        <caption>Liste des order_discounts</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($order_discounts as $order_discount_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $order_discount_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>