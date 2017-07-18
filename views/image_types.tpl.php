<?php
global $PWS;
$PWS->read_resource_all('image_types');
$image_types = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$image_type_attributes = [
    'id',
'name',
'width',
'height',
'categories',
'products',
'manufacturers',
'suppliers',
'scenes',
'stores',
];

$image_type_attributes_compact_view = [
    'id',
    'name',
    'width',
];

$attributes_list = ($view_option == 'full') ? $image_type_attributes : $image_type_attributes_compact_view;

//var_dump ($image_types);
?>

<div>
    <table>
        <caption>Liste des image_types</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($image_types as $image_type_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $image_type_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>