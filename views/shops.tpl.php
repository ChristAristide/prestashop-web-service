<?php
global $PWS;
$PWS->read_resource_all('shops');
$shops = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$shop_attributes = [
    'id',
    'id_shop_group',
    'id_category',
    'id_theme',
    'active',
    'deleted',
    'name',
];

$shop_attributes_compact_view = [
    'id',
    'id_shop_group',
    'name',
];

$attributes_list = ($view_option == 'full') ? $shop_attributes : $shop_attributes_compact_view;

//var_dump ($shops);
?>

<div>
    <table>
        <caption>Liste des shops</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($shops as $shop_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $shop_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>