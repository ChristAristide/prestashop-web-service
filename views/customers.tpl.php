<?php 
global $PWS;
$PWS->read_resource('customers');
$customers = $PWS->get_retrieved_resource();
?>

<div>
    <table>
        <caption>Liste des clients</caption>

        <thead>
            <th>ID</th>
            <th>Titre</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Adresse e-mail</th>
            <th>Site web</th>     
        </thead>
        <tbody>
            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer->attributes()['id']; ?></td>
            <th>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>