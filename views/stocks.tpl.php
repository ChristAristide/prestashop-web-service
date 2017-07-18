<?php
global $PWS;
$PWS->read_resource_all('stocks');
$stocks = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$stock_attributes = [
    'id',
    'id_warehouse',
    'id_product',
    'id_product_attribute',
    'reference',
    'ean13',
    'upc',
    'physical_quantity',
    'usable_quantity',
    'price_te',
];

$stock_attributes_compact_view = [
    'id',
    'reference',
    'price_te',
];

$attributes_list = ($view_option == 'full') ? $stock_attributes : $stock_attributes_compact_view;

//var_dump ($stocks);
?>

<div>
    <table>
        <caption>Liste des stocks</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($stocks as $stock_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $stock_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>