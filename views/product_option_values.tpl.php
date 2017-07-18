<?php
global $PWS;
$PWS->read_resource_all('product_option_values');
$product_option_values = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$product_option_value_attributes = [
    'id',
    'id_attribute_group',
    'color',
    'position',
    'name',
];

$product_option_value_attributes_compact_view = [
    'id',
    'position',
    'name',
];

$attributes_list = ($view_option == 'full') ? $product_option_value_attributes : $product_option_value_attributes_compact_view;

//var_dump ($product_option_values);
?>

<div>
    <table>
        <caption>Liste des product_option_values</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($product_option_values as $product_option_value_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $product_option_value_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>