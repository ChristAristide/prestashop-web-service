<?php
global $PWS;
$PWS->read_resource_all('deliveries');
$deliveries = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$deliverie_attributes = [
    'id',
    'id_carrier',
    'id_range_price',
    'id_range_weight',
    'id_zone',
    'id_shop',
    'id_shop_group',
    'price',
];

$deliverie_attributes_compact_view = [
    'id',
    'id_carrier',
    'price',
];

$attributes_list = ($view_option == 'full') ? $deliverie_attributes : $deliverie_attributes_compact_view;

//var_dump ($deliveries);
?>

<div>
    <table>
        <caption>Liste des deliveries</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($deliveries as $deliverie_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $deliverie_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>