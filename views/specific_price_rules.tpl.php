<?php
global $PWS;
$PWS->read_resource_all('specific_price_rules');
$specific_price_rules = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$specific_price_rule_attributes = [
    'id',
    'id_shop',
    'id_country',
    'id_currency',
    'id_group',
    'name',
    'from_quantity',
    'price',
    'reduction',
    'reduction_tax',
    'reduction_type',
    'from',
    'to',
];

$specific_price_rule_attributes_compact_view = [
    'id',
    'name',
    'price',
];

$attributes_list = ($view_option == 'full') ? $specific_price_rule_attributes : $specific_price_rule_attributes_compact_view;

//var_dump ($specific_price_rules);
?>

<div>
    <table>
        <caption>Liste des specific_price_rules</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($specific_price_rules as $specific_price_rule_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $specific_price_rule_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>