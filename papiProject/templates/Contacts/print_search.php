<h1>Résultat de Recherche</h1>

<?php
    if (is_null($tab_res)){
        echo "<h2>Il n\'y a pas de résultat</h2>";
    }else{
        echo "
            <table>
                <tr>
                    <th>";
                       echo $this->Form->postLink('ID SPF', ['action' => 'search', ]);
                    echo "</th>
                    <th>Titre</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Mail</th>
                    <th>Telephone</th>
                    <th>Edition</th>
                </tr>   ";

        foreach ($tab_res as $row):
            echo "
            <tr>
                <td>";
                    echo h($row->id_spf);
                echo "
                </td>
                <td>";
                    echo h($row->titre);
                echo "
                    </td>
                <td>";
                    echo $this->Html->link($row->nom,['action' => 'view', $row->id]);
                    echo"
                </td>
                <td>";
                    echo h($row->prenom);
                    echo"
                </td>
                <td>";
                    echo h($row->mail);
                    echo"
                </td>
                <td>";
                    echo h($row->telephone);
                echo "</td>

                <td>";
                    echo $this->Html->link('Voir plus',['action' => 'view', $row->id]);
                    echo $this->Html->link('Modifier',['action' => 'edit', $row->id]);
                    echo $this->Form->postLink('Supprimer', ['action' => 'delete', $row->id], ['confirm' => 'Etes-vous sûr?']);

                echo "</td>
            </tr>";
        endforeach;
        echo "</table>";
        }
?>

