<?php
global $PWS;
$PWS->read_resource_all('products');
$products = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'compact';
$attributes_list = [];

$product_attributes = [
    'id',
    'id_manufacturer',
    'id_supplier',
    'id_category_default',
    'new',
    'cache_default_attribute',
    'id_default_image',
    'id_default_combination',
    'id_tax_rules_group',
    'position_in_category',
    'type',
    'id_shop_default',
    'reference',
    'supplier_reference',
    'location',
    'width',
    'height',
    'depth',
    'weight',
    'quantity_discount',
    'ean13',
    'upc',
    'cache_is_pack',
    'cache_has_attachments',
    'is_virtual',
    'on_sale',
    'online_only',
    'ecotax',
    'minimal_quantity',
    'price',
    'wholesale_price',
    'unity',
    'unit_price_ratio',
    'additional_shipping_cost',
    'customizable',
    'text_fields',
    'uploadable_files',
    'active',
    'redirect_type',
    'id_product_redirected',
    'available_for_order',
    'available_date',
    'condition',
    'show_price',
    'indexed',
    'visibility',
    'advanced_stock_management',
    'date_add',
    'date_upd',
    'pack_stock_type',
    'meta_description',
    'meta_keywords',
    'meta_title',
    'link_rewrite',
    'name',
    'description',
    'description_short',
    'available_now',
    'available_later',
    'associations',
];

$product_attributes_compact_view = [
    'id',
    'name',
    'description_short',
];

$attributes_list = ($view_option == 'full') ? $product_attributes : $product_attributes_compact_view;

//var_dump ($products);
?>

<div>
    <table>
        <caption>Liste des products</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($products as $product_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $product_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>