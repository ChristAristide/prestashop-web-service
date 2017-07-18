<?php
global $PWS;
$PWS->read_resource_all('product_features');
$product_features = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$product_feature_attributes = [
    'id',
    'position',
    'name',
];

$product_feature_attributes_compact_view = [
    'id',
    'position',
    'name',
];

$attributes_list = ($view_option == 'full') ? $product_feature_attributes : $product_feature_attributes_compact_view;

//var_dump ($product_features);
?>

<div>
    <table>
        <caption>Liste des product_features</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($product_features as $product_feature_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $product_feature_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>