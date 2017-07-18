<?php
global $PWS;
$PWS->read_resource_all('zones');
$zones = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$zone_attributes = [
    'id',
    'name',
    'active',
];

$zone_attributes_compact_view = [
    'id',
    'name',
    'active',
];

$attributes_list = ($view_option == 'full') ? $zone_attributes : $zone_attributes_compact_view;

//var_dump ($zones);
?>

<div>
    <table>
        <caption>Liste des zones</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($zones as $zone_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $zone_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>