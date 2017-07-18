<?php
global $PWS;
$PWS->read_resource_all('images');
$images = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$image_attributes = [
    'general',
    'products',
    'categories',
    'manufacturers',
    'suppliers',
    'stores',
    'customizations',
];

$image_attributes_compact_view = [
    'general',
    'products',
    'categories',
];

$attributes_list = ($view_option == 'full') ? $image_attributes : $image_attributes_compact_view;

//var_dump ($images);
?>

<div>
    <table>
        <caption>Liste des images</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($images as $image_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $image_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>