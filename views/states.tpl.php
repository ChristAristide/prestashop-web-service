<?php
global $PWS;
$PWS->read_resource_all('states');
$states = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$state_attributes = [
    'id',
    'id_zone',
    'id_country',
    'iso_code',
    'name',
    'active',
];

$state_attributes_compact_view = [
    'id',
    'name',
    'active',
];

$attributes_list = ($view_option == 'full') ? $state_attributes : $state_attributes_compact_view;

//var_dump ($states);
?>

<div>
    <table>
        <caption>Liste des states</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($states as $state_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $state_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>