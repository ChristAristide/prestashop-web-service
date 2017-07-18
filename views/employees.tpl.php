<?php
global $PWS;
$PWS->read_resource_all('employees');
$employees = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$employee_attributes = [
    'id',
    'id_lang',
    'last_passwd_gen',
    'stats_date_from',
    'stats_date_to',
    'stats_compare_from',
    'stats_compare_to',
    'passwd',
    'lastname',
    'firstname',
    'email',
    'active',
    'optin',
    'id_profile',
    'bo_color',
    'default_tab',
    'bo_theme',
    'bo_css',
    'bo_width',
    'bo_menu',
    'stats_compare_option',
    'preselect_date_range',
    'id_last_order',
    'id_last_customer_message',
    'id_last_customer',
];

$employee_attributes_compact_view = [
    'id',
    'lastname',
    'firstname',
];

$attributes_list = ($view_option == 'full') ? $employee_attributes : $employee_attributes_compact_view;

//var_dump ($employees);
?>

<div>
    <table>
        <caption>Liste des employees</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $employee_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>