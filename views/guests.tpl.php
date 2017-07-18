<?php
global $PWS;
$PWS->read_resource_all('guests');
$guests = $PWS->get_retrieved_resource();
$view_options = ['compact', 'full'];
$view_option = 'full';
$attributes_list = [];

$guest_attributes = [
    'id',
    'id_customer',
    'id_operating_system',
    'id_web_browser',
    'javascript',
    'screen_resolution_x',
    'screen_resolution_y',
    'screen_color',
    'sun_java',
    'adobe_flash',
    'adobe_director',
    'apple_quicktime',
    'real_player',
    'windows_media',
    'accept_language',
    'mobile_theme',
];

$guest_attributes_compact_view = [
    'id',
    'id_customer',
    'id_operating_system',
];

$attributes_list = ($view_option == 'full') ? $guest_attributes : $guest_attributes_compact_view;

//var_dump ($guests);
?>

<div>
    <table>
        <caption>Liste des guests</caption>

        <thead>
            <?php foreach ($attributes_list as $attribute) : ?>
            <th><?php echo $attribute; ?></th>
        <?php endforeach; ?>
        </thead>
        <tbody>
            <?php foreach ($guests as $guest_details) : ?>
                <tr>
                    <?php foreach ($attributes_list as $attribute) : ?>
                        <td><?php echo $guest_details->$attribute; ?></td>
                    <?php endforeach; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>