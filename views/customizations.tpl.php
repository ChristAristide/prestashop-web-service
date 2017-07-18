<?php
global $PWS;
$PWS->read_resource_all('customizations');
$customizations = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$customization_attributes = [
   'id',
'id_address_delivery',
'id_cart',
'id_product',
'id_product_attribute',
'quantity',
'quantity_refunded',
'quantity_returned',
'in_cart',
'associations',
];

$customization_attributes_compact_view = [
    'id',
    'id_address_delivery',
    'id_cart',
];

$attributes_list = ($view_option == 'full') ? $customization_attributes : $customization_attributes_compact_view;

//var_dump ($customizations);
?>

<div>
    <table>
        <caption>Liste des customizations</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($customizations as $customization_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $customization_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>