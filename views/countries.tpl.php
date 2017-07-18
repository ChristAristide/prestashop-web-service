<?php
global $PWS;
$PWS->read_resource_all('countries');
$countries = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$countrie_attributes = [
    'id',
    'id_zone',
    'id_currency',
    'call_prefix',
    'iso_code',
    'active',
    'contains_states',
    'need_identification_number',
    'need_zip_code',
    'zip_code_format',
    'display_tax_label',
    'name',
];

$countrie_attributes_compact_view = [
    'id',
    'active',
    'name',
];

$attributes_list = ($view_option == 'full') ? $countrie_attributes : $countrie_attributes_compact_view;

//var_dump ($countries);
?>

<div>
    <table>
        <caption>Liste des countries</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($countries as $countrie_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $countrie_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>