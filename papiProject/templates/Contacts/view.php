
<h1>Contact numéro : <?= h($contact->id_spf) ?></h1>

<h2><?= h($contact->titre) ?><?= h($contact->nom) ?><?= h($contact->prenom) ?></h2>

<table>
    <th>
        <h3>Coordonnées : </h3>
    </th>
    <th>
        <h3>Informations : </h3>
    </th>
    <tr>
        <td>
            <ul>
                <li><?= h($contact->adresse) ?></li>
                <li><?= h($contact->cp) ?></li>
                <li><?= h($contact->ville) ?></li>
                <li><?= h($contact->telephone) ?></li>
                <li><?= h($contact->telephone_bis) ?></li>
            </ul>
        </td>
        <td>
            <ul>
                <li><?= h($contact->fonction) ?></li>
                <li><?= h($contact->categorie) ?></li>
                <li><?= h($contact->organisme) ?></li>
                <li>Date d'ajout : <?= h($contact->created) ?></li>
            </ul>
        </td>
    </tr>

</table>

<p><?= h($contact->mail) ?></p>
