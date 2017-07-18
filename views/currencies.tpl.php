<?php
global $PWS;
$PWS->read_resource_all('currencies');
$currencies = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$currencie_attributes = [
    'id',
    'name',
    'iso_code',
    'iso_code_num',
    'blank',
    'sign',
    'format',
    'decimals',
    'conversion_rate',
    'deleted',
    'active',
];

$currencie_attributes_compact_view = [
    'id',
    'name',
    'active',
];

$attributes_list = ($view_option == 'full') ? $currencie_attributes : $currencie_attributes_compact_view;

//var_dump ($currencies);
?>

<div>
    <table>
        <caption>Liste des currencies</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($currencies as $currencie_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $currencie_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>