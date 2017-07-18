<?php
global $PWS;
$PWS->read_resource_all('suppliers');
$suppliers = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$supplier_attributes = [
    'id',
    'link_rewrite',
    'name',
    'active',
    'date_add',
    'date_upd',
    'description',
    'meta_title',
    'meta_description',
    'meta_keywords',
];

$supplier_attributes_compact_view = [
    'id',
    'name',
    'description',
];

$attributes_list = ($view_option == 'full') ? $supplier_attributes : $supplier_attributes_compact_view;

//var_dump ($suppliers);
?>

<div>
    <table>
        <caption>Liste des suppliers</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($suppliers as $supplier_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $supplier_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>