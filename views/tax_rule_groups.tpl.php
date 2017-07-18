<?php
global $PWS;
$PWS->read_resource_all('tax_rule_groups');
$tax_rule_groups = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$tax_rule_group_attributes = [
    'id',
    'name',
    'active',
    'deleted',
    'date_add',
    'date_upd',
];

$tax_rule_group_attributes_compact_view = [
    'id',
    'name',
    'active',
];

$attributes_list = ($view_option == 'full') ? $tax_rule_group_attributes : $tax_rule_group_attributes_compact_view;

//var_dump ($tax_rule_groups);
?>

<div>
    <table>
        <caption>Liste des tax_rule_groups</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($tax_rule_groups as $tax_rule_group_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $tax_rule_group_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>