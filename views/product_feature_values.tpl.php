<?php
global $PWS;
$PWS->read_resource_all('product_feature_values');
$product_feature_values = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$product_feature_value_attributes = [
    'id',
    'id_feature',
    'custom',
    'value',
];

$product_feature_value_attributes_compact_view = [
    'id',
    'id_feature',
    'value',
];

$attributes_list = ($view_option == 'full') ? $product_feature_value_attributes : $product_feature_value_attributes_compact_view;

//var_dump ($product_feature_values);
?>

<div>
    <table>
        <caption>Liste des product_feature_values</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($product_feature_values as $product_feature_value_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $product_feature_value_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>