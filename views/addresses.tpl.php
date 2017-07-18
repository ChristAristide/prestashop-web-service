<?php
global $PWS;
$PWS->read_resource_all('addresses');
$addresses = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$address_attributes = [
'id',
'id_customer',
'id_manufacturer',
'id_supplier',
'id_warehouse',
'id_country',
'id_state',
'alias',
'company',
'lastname',
'firstname',
'vat_number',
'address1',
'address2',
'postcode',
'city',
'other',
'phone',
'phone_mobile',
'dni',
'deleted',
'date_add',
'date_upd',
];

$address_attributes_compact_view = [
    'id',
    'lastname',
    'firstname'
];

$attributes_list = ($view_option == 'full') ? $address_attributes : $address_attributes_compact_view;

?>

<div>
    <table>
        <caption>Liste des addresses</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($addresses as $address_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $address_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>