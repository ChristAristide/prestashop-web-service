<?php
global $PWS;
$PWS->read_resource_all('shop_groups');
$shop_groups = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$shop_group_attributes = [
    'id',
    'name',
    'share_customer',
    'share_order',
    'share_stock',
    'active',
    'deleted',
];

$shop_group_attributes_compact_view = [
    'id',
    'name',
    'active',
];

$attributes_list = ($view_option == 'full') ? $shop_group_attributes : $shop_group_attributes_compact_view;

//var_dump ($shop_groups);
?>

<div>
    <table>
        <caption>Liste des shop_groups</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($shop_groups as $shop_group_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $shop_group_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>