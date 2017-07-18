<?php
global $PWS;
$PWS->read_resource_all('customers');
$customers = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];
$action_url = '#';

$customer_attributes = [
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

$customer_attributes_compact_view = [
    'id',
    'lastname',
    'firstname',
];

$attributes_list = ($view_option == 'full') ? $customer_attributes : $customer_attributes_compact_view;

//var_dump ($customers);
?>

<div>
    <table>
        <caption>Liste des customers</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <form action="<?php $action_url ?>">
            <?php foreach ($customers as $customer_details) : ?>
                <tr class="customer-<?php echo $customer_details->id ?>">
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><input type="text" name="<?php echo $attribute; ?>" value="<?php echo $customer_details->$attribute; ?>" disabled/></td>
                    <?php endforeach; ?>
                        <td><button type="button" title="éditer ce client" data-edit-id="<?php echo $customer_details->id ?>">Editer</button></td>
                        <td><button type="button" title="supprimer ce client" data-delete-id="<?php echo $customer_details->id ?>">Supprimer</a></td>
                </tr>
                <?php endforeach; ?>
            </form>
        </tbody>
    </table>
</div>
<div>
    <button type="button" title="Ajouter un client">Ajouter un client</button>
</div>