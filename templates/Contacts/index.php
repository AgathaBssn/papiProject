<h1>Accueil</h1>
<?= $this->Html->link('Recherche ',['action' => 'search'])?>

<?= $this->Html->link('Ajouter Contact ',['action' => 'add'])?>
<table>
    <tr>
        <th>ID SPF</th>
        <th>Titre</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Mail</th>
        <th>Telephone</th>
        <th>Edition</th>
    </tr>

    <?php foreach ($resultset as $row): ?>
        <tr>
            <td>
                <?= h($row->id_spf) ?>
            </td>
            <td>
                <?= h($row->titre) ?>
            </td>
            <td>
                <?= $this->Html->link($row->nom,['action' => 'view', $row->id])?>
            </td>
            <td>
                <?= h($row->prenom) ?>
            </td>
            <td>
                <?= h($row->mail) ?>
            </td>
            <td>
                <?= h($row->telephone) ?>
            </td>

            <td>
                <?= $this->Html->link('Voir plus',['action' => 'view', $row->id])?>
                <?= $this->Html->link('Modifier',['action' => 'edit', $row->id])?>
                <?= $this->Form->postLink('Supprimer', ['action' => 'delete', $row->id], ['confirm' => 'Etes-vous sûr?']); ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>




