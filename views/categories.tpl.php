<?php
global $PWS;
$PWS->read_resource_all('categories');
$categories = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$categorie_attributes = [
    'id',
    'id_parent',
    'active',
    'id_shop_default',
    'is_root_category',
    'position',
    'date_add',
    'date_upd',
    'name',
    'link_rewrite',
    'description',
    'meta_title',
    'meta_description',
    'meta_keywords',
    'associations',
];

$categorie_attributes_compact_view = [
    'id',
    'id_parent',
    'active',
];

$attributes_list = ($view_option == 'full') ? $categorie_attributes : $categorie_attributes_compact_view;
?>


<div>
    <table>
        <caption>Liste des categories</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($categories as $categorie_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $categorie_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>