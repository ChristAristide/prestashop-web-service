<?php
global $PWS;
$PWS->read_resource_all('cart_rules');
$cart_rules = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$cart_rule_attributes = [
    'id',
    'id_customer',
    'date_from',
    'date_to',
    'description',
    'quantity',
    'quantity_per_user',
    'priority',
    'partial_use',
    'code',
    'minimum_amount',
    'minimum_amount_tax',
    'minimum_amount_currency',
    'minimum_amount_shipping',
    'country_restriction',
    'carrier_restriction',
    'group_restriction',
    'cart_rule_restriction',
    'product_restriction',
    'shop_restriction',
    'free_shipping',
    'reduction_percent',
    'reduction_amount',
    'reduction_tax',
    'reduction_currency',
    'reduction_product',
    'gift_product',
    'gift_product_attribute',
    'highlight',
    'active',
    'date_add',
    'date_upd',
    'name',
];

$cart_rule_attributes_compact_view = [
    'id',
    'id_customer',
    'quantity',
];

$attributes_list = ($view_option == 'full') ? $cart_rule_attributes : $cart_rule_attributes_compact_view;
?>

<div>
    <table>
        <caption>Liste des cart rules</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($cart_rules as $cart_rule_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $cart_rule_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>