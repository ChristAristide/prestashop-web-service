<?php
global $PWS;
$PWS->read_resource_all('tags');
$tags = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$tag_attributes = [
    'id',
    'id_lang',
    'name',
];

$tag_attributes_compact_view = [
    'id',
    'id_lang',
    'name',
];

$attributes_list = ($view_option == 'full') ? $tag_attributes : $tag_attributes_compact_view;

//var_dump ($tags);
?>

<div>
    <table>
        <caption>Liste des tags</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($tags as $tag_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $tag_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>