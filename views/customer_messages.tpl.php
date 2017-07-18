<?php
global $PWS;
$PWS->read_resource_all('customer_messages');
$customer_messages = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$customer_message_attributes = [
    'id',
    'id_employee',
    'id_customer_thread',
    'ip_address',
    'message',
    'file_name',
    'user_agent',
    'private',
    'date_add',
    'date_upd',
    'read',
];

$customer_message_attributes_compact_view = [
    'id',
    'message',
    'read',
];

$attributes_list = ($view_option == 'full') ? $customer_message_attributes : $customer_message_attributes_compact_view;

//var_dump ($customer_messages);
?>

<div>
    <table>
        <caption>Liste des customer_messages</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($customer_messages as $customer_message_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $customer_message_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>