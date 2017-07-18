<?php
global $PWS;
$PWS->read_resource_all('shop_urls');
$shop_urls = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$shop_url_attributes = [
    'id',
    'id_shop',
    'active',
    'main',
    'domain',
    'domain_ssl',
    'physical_uri',
    'virtual_uri',
];

$shop_url_attributes_compact_view = [
    'id',
    'main',
    'domain',
];

$attributes_list = ($view_option == 'full') ? $shop_url_attributes : $shop_url_attributes_compact_view;

//var_dump ($shop_urls);
?>

<div>
    <table>
        <caption>Liste des shop_urls</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($shop_urls as $shop_url_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $shop_url_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>