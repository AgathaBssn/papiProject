<h1>Titre</h1>
<?= $this->Html->link('add Article',['action' => 'add'])?>
<table>
    <tr>
        <th>Title</th>
        <th>Edition</th>

    </tr>

    <?php foreach ($resultset as $row): ?>
    <tr>
        <td>
            <?= $this->Html->link($row->title,['action' => 'view', $row->slug])
            //framework generateur html deja include
            ?>
            <?php //Le texte afficher puis le lien vers quoi ça renvoie (stocké dans slud dans la db) -- > ?>
        </td>
        <td>
            <?= $this->Html->link('Edit',['action' => 'edit', $row->slug])?>

            <?= $this->Form->postLink('Delete', ['action' => 'delete', $row->slug], ['confirm' => 'etes vous sur?']); ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>
