<?php
global $PWS;
$PWS->read_resource_all('translated_configurations');
$translated_configurations = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$translated_configuration_attributes = [
    'id',
    'value',
    'date_add',
    'date_upd',
    'name',
    'id_shop_group',
    'id_shop',
];

$translated_configuration_attributes_compact_view = [
    'id',
    'value',
    'name',
];

$attributes_list = ($view_option == 'full') ? $translated_configuration_attributes : $translated_configuration_attributes_compact_view;

//var_dump ($translated_configurations);
?>

<div>
    <table>
        <caption>Liste des translated_configurations</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($translated_configurations as $translated_configuration_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $translated_configuration_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>