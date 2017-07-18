<?php
global $PWS;
$PWS->read_resource_all('product_options');
$product_options = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$product_option_attributes = [
    'id',
    'is_color_group',
    'group_type',
    'position',
    'name',
    'public_name',
    'associations',
];

$product_option_attributes_compact_view = [
    'id',
    'name',
    'public_name',
];

$attributes_list = ($view_option == 'full') ? $product_option_attributes : $product_option_attributes_compact_view;

//var_dump ($product_options);
?>

<div>
    <table>
        <caption>Liste des product_options</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($product_options as $product_option_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $product_option_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>