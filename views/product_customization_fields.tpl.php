<?php
global $PWS;
$PWS->read_resource_all('product_customization_fields');
$product_customization_fields = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$product_customization_field_attributes = [
    'id',
    'id_product',
    'type',
    'required',
    'name',
];

$product_customization_field_attributes_compact_view = [
    'id',
    'id_product',
    'name',
];

$attributes_list = ($view_option == 'full') ? $product_customization_field_attributes : $product_customization_field_attributes_compact_view;

//var_dump ($product_customization_fields);
?>

<div>
    <table>
        <caption>Liste des product_customization_fields</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($product_customization_fields as $product_customization_field_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $product_customization_field_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>