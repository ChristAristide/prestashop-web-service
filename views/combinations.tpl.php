<?php
global $PWS;
$PWS->read_resource_all('combinations');
$combinations = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$combination_attributes = [
    'id',
    'id_product',
    'location',
    'ean13',
    'upc',
    'quantity',
    'reference',
    'supplier_reference',
    'wholesale_price',
    'price',
    'ecotax',
    'weight',
    'unit_price_impact',
    'minimal_quantity',
    'default_on',
    'available_date',
    'associations',
];

$combination_attributes_compact_view = [
    'id',
    'id_product',
    'location',
];

$attributes_list = ($view_option == 'full') ? $combination_attributes : $combination_attributes_compact_view;
?>


<div>
    <table>
        <caption>Liste des combinations</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($combinations as $combination_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $combination_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>