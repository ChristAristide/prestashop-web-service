<?php
global $PWS;
$PWS->read_resource_all('specific_prices');
$specific_prices = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$specific_price_attributes = [
    'id',
    'id_shop_group',
    'id_shop',
    'id_cart',
    'id_product',
    'id_product_attribute',
    'id_currency',
    'id_country',
    'id_group',
    'id_customer',
    'id_specific_price_rule',
    'price',
    'from_quantity',
    'reduction',
    'reduction_tax',
    'reduction_type',
    'from',
    'to',
];

$specific_price_attributes_compact_view = [
    'id',
    'price',
    'reduction',
];

$attributes_list = ($view_option == 'full') ? $specific_price_attributes : $specific_price_attributes_compact_view;

//var_dump ($specific_prices);
?>

<div>
    <table>
        <caption>Liste des specific_prices</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($specific_prices as $specific_price_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $specific_price_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>