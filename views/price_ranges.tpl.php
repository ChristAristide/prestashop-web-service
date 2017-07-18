<?php
global $PWS;
$PWS->read_resource_all('price_ranges');
$price_ranges = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$price_range_attributes = [
    'id',
    'id_carrier',
    'delimiter1',
    'delimiter2',
];

$price_range_attributes_compact_view = [
    'id',
    'id_carrier',
    'delimiter1',
];

$attributes_list = ($view_option == 'full') ? $price_range_attributes : $price_range_attributes_compact_view;

//var_dump ($price_ranges);
?>

<div>
    <table>
        <caption>Liste des price_ranges</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($price_ranges as $price_range_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $price_range_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>