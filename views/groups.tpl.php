<?php
global $PWS;
$PWS->read_resource_all('groups');
$groups = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$group_attributes = [
    'id',
    'reduction',
    'price_display_method',
    'show_prices',
    'date_add',
    'date_upd',
    'name',
];

$group_attributes_compact_view = [
    'id',
    'reduction',
    'name',
];

$attributes_list = ($view_option == 'full') ? $group_attributes : $group_attributes_compact_view;

//var_dump ($groups);
?>

<div>
    <table>
        <caption>Liste des groups</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($groups as $group_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $group_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>