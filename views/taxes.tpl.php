<?php
global $PWS;
$PWS->read_resource_all('taxes');
$taxes = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$taxe_attributes = [
    'id',
    'rate',
    'active',
    'deleted',
    'name',
];

$taxe_attributes_compact_view = [
    'id',
    'rate',
    'name',
];

$attributes_list = ($view_option == 'full') ? $taxe_attributes : $taxe_attributes_compact_view;

//var_dump ($taxes);
?>

<div>
    <table>
        <caption>Liste des taxes</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($taxes as $taxe_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $taxe_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>