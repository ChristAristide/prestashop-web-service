<?php
global $PWS;
$PWS->read_resource_all('weight_ranges');
$weight_ranges = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$weight_range_attributes = [
    'id',
    'id_carrier',
    'delimiter1',
    'delimiter2',
];

$weight_range_attributes_compact_view = [
    'id',
    'id_carrier',
    'delimiter1',
];

$attributes_list = ($view_option == 'full') ? $weight_range_attributes : $weight_range_attributes_compact_view;

//var_dump ($weight_ranges);
?>

<div>
    <table>
        <caption>Liste des weight_ranges</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($weight_ranges as $weight_range_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $weight_range_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>