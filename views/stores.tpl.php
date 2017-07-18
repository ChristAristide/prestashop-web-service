<?php
global $PWS;
$PWS->read_resource_all('stores');
$stores = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$store_attributes = [
    'id',
    'id_country',
    'id_state',
    'hours',
    'name',
    'address1',
    'address2',
    'postcode',
    'city',
    'latitude',
    'longitude',
    'phone',
    'fax',
    'note',
    'email',
    'active',
    'date_add',
    'date_upd',
];

$store_attributes_compact_view = [
    'id',
    'name',
    'city',
];

$attributes_list = ($view_option == 'full') ? $store_attributes : $store_attributes_compact_view;

//var_dump ($stores);
?>

<div>
    <table>
        <caption>Liste des stores</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($stores as $store_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $store_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>