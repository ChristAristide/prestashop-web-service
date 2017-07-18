<?php
global $PWS;
$PWS->read_resource_all('tax_rules');
$tax_rules = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$tax_rule_attributes = [
    'id',
    'id_tax_rules_group',
    'id_state',
    'id_country',
    'zipcode_from',
    'zipcode_to',
    'id_tax',
    'behavior',
    'description',
];

$tax_rule_attributes_compact_view = [
    'id',
    'id_state',
    'description',
];

$attributes_list = ($view_option == 'full') ? $tax_rule_attributes : $tax_rule_attributes_compact_view;

//var_dump ($tax_rules);
?>

<div>
    <table>
        <caption>Liste des tax_rules</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($tax_rules as $tax_rule_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $tax_rule_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>