<?php
global $PWS;
$PWS->read_resource_all('contacts');
$contacts = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$contact_attributes = [
    'id',
    'email',
    'customer_service',
    'name',
    'description',
    'contact',
];

$contact_attributes_compact_view = [
    'id',
    'email',
    'name',
    'contact',
];

$attributes_list = ($view_option == 'full') ? $contact_attributes : $contact_attributes_compact_view;

?>


<div>
    <table>
        <caption>Liste des contacts</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $contact_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>