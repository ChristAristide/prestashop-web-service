<?php
global $PWS;
$PWS->read_resource_all('customer_threads');
$customer_threads = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$customer_threads_attributes = [
    'id',
    'id_lang',
    'id_shop',
    'id_customer',
    'id_order',
    'id_product',
    'id_contact',
    'email',
    'token',
    'status',
    'date_add',
    'date_upd',
    'associations',
];

$customer_threads_attributes_compact_view = [
    'id',
    'email',
    'status',
];

$attributes_list = ($view_option == 'full') ? $customer_threads_attributes : $customer_threads_attributes_compact_view;

//var_dump ($customer_threads);
?>

<div>
    <table>
        <caption>Liste des customer_threads</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($customer_threads as $customer_threads_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $customer_threads_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>