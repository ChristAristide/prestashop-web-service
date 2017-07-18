<?php
global $PWS;
$PWS->read_resource_all('order_states');
$order_states = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$order_state_attributes = [
    'id',
    'unremovable',
    'delivery',
    'hidden',
    'send_email',
    'module_name',
    'invoice',
    'color',
    'logable',
    'shipped',
    'paid',
    'pdf_delivery',
    'pdf_invoice',
    'deleted',
    'name',
    'template',
];

$order_state_attributes_compact_view = [
    'id',
    'unremovable',
    'delivery',
];

$attributes_list = ($view_option == 'full') ? $order_state_attributes : $order_state_attributes_compact_view;

//var_dump ($order_states);
?>

<div>
    <table>
        <caption>Liste des order_states</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($order_states as $order_state_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $order_state_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>