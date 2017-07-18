<?php
global $PWS;
$PWS->read_resource_all('languages');
$languages = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$language_attributes = [
    'id',
    'name',
    'iso_code',
    'language_code',
    'active',
    'is_rtl',
    'date_format_lite',
    'date_format_full',
];

$language_attributes_compact_view = [
    'id',
    'name',
    'iso_code',
];

$attributes_list = ($view_option == 'full') ? $language_attributes : $language_attributes_compact_view;

//var_dump ($languages);
?>

<div>
    <table>
        <caption>Liste des languages</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($languages as $language_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $language_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>