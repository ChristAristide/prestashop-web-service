<?php
global $PWS;
$PWS->read_resource_all('carriers');
$carriers = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$carrier_attributes = [
    'id',
    'deleted',
    'is_module',
    'id_tax_rules_group',
    'id_reference',
    'name',
    'active',
    'is_free',
    'url',
    'shipping_handling',
    'shipping_external',
    'range_behavior',
    'shipping_method',
    'max_width',
    'max_height',
    'max_depth',
    'max_weight',
    'grade',
    'external_module_name',
    'need_range',
    'delay ',
        ];

$carrier_attributes_compact_view = [
    'id',
    'lastname',
    'firstname',
];

$attributes_list = ($view_option == 'full') ? $carrier_attributes : $carrier_attributes_compact_view;

?>

<div>
    <table>
        <caption>Liste des carriers</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($carriers as $carrier_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $carrier_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>