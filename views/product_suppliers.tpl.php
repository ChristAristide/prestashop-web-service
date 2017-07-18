<?php
global $PWS;
$PWS->read_resource_all('product_suppliers');
$product_suppliers = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$product_supplier_attributes = [
    'id',
    'id_product',
    'id_product_attribute',
    'id_supplier',
    'id_currency',
    'product_supplier_reference',
    'product_supplier_price_te',
];

$product_supplier_attributes_compact_view = [
    'id',
    'id_product',
    'id_product_attribute',
];

$attributes_list = ($view_option == 'full') ? $product_supplier_attributes : $product_supplier_attributes_compact_view;

//var_dump ($product_suppliers);
?>

<div>
    <table>
        <caption>Liste des product_suppliers</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($product_suppliers as $product_supplier_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $product_supplier_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>