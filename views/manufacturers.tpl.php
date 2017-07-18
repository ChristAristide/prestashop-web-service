<?php
global $PWS;
$PWS->read_resource_all('manufacturers');
$manufacturers = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$manufacturer_attributes = [
    'id',
    'active',
    'name',
    'date_add',
    'date_upd',
    'description',
    'short_description',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'associations',
];

$manufacturer_attributes_compact_view = [
    'id',
    'name',
    'short_description',
];

$attributes_list = ($view_option == 'full') ? $manufacturer_attributes : $manufacturer_attributes_compact_view;

//var_dump ($manufacturers);
?>

<div>
    <table>
        <caption>Liste des manufacturers</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($manufacturers as $manufacturer_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $manufacturer_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>