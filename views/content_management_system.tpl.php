<?php
global $PWS;
$PWS->read_resource_all('content_management_system');
$content_management_systems = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$content_management_system_attributes = [
    'id',
    'id_default_group',
    'id_lang',
    'newsletter_date_add',
    'ip_registration_newsletter',
    'last_passwd_gen',
    'secure_key',
    'deleted',
    'passwd',
    'lastname',
    'firstname',
    'email',
    'id_gender',
    'birthday',
    'newsletter',
    'optin',
    'website',
    'company',
    'siret',
    'ape',
    'outstanding_allow_amount',
    'show_public_prices',
    'id_risk',
    'max_payment_days',
    'active',
    'note',
    'is_guest',
    'id_shop',
    'id_shop_group',
    'date_add',
    'date_upd',
    'associations',
];

$content_management_system_attributes_compact_view = [
    'id',
    'active',
];

$attributes_list = ($view_option == 'full') ? $content_management_system_attributes : $content_management_system_attributes_compact_view;

//var_dump ($content_management_systems);
?>

<div>
    <table>
        <caption>Liste des content_management_systems</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($content_management_systems as $content_management_system_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $content_management_system_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>