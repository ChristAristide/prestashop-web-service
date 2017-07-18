<?php
global $PWS;
$PWS->read_resource_all('configurations');
$configurations = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$configuration_attributes = [
    'id',
    'value',
    'name',
    'id_shop_group',
    'id_shop',
    'date_add',
    'date_upd',
];

$configuration_attributes_compact_view = [
    'id',
    'value',
    'name',
];

$attributes_list = ($view_option == 'full') ? $configuration_attributes : $configuration_attributes_compact_view;

?>

<div>
    <table>
        <caption>Liste des configurations</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($configurations as $configuration_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $configuration_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>