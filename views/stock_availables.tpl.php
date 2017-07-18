<?php
global $PWS;
$PWS->read_resource_all('stock_availables');
$stock_availables = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$stock_available_attributes = [
    'id',
    'id_product',
    'id_product_attribute',
    'id_shop',
    'id_shop_group',
    'quantity',
    'depends_on_stock',
    'out_of_stock',
];

$stock_available_attributes_compact_view = [
    'id',
    'id_product',
    'id_shop',
];

$attributes_list = ($view_option == 'full') ? $stock_available_attributes : $stock_available_attributes_compact_view;

//var_dump ($stock_availables);
?>

<div>
    <table>
        <caption>Liste des stock_availables</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($stock_availables as $stock_available_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $stock_available_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>